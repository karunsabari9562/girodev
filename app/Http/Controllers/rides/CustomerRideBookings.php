<?php

namespace App\Http\Controllers\rides;

use App\Http\Controllers\Controller;
use DB,Auth;
use Illuminate\Http\Request;
use App\Models\driver_reg_fee;
use App\Models\vehicle_type;
use App\Models\franchise_detail;
use App\Models\active_driver;
use App\Models\rides_booking;
use App\Models\ride_booking_history;
use App\Models\driver_registration;
use App\Models\unfinished_bookings;
use Illuminate\Support\Facades\Validator;

class CustomerRideBookings extends Controller
{
  private $database;

  public function __construct()
  {
    $this->database = \App\services\FirebaseService::connect();
  }

     public function active_vehicle_types($catid)
    {
       $types=vehicle_type::where('category',$catid)->where('status',1)->get();
       return response()->json([

      
        'types'=>$types

        ],200);


       ;
    }


    public function drivers_list(Request $req)
    {

      $rules = [
              // 'img' => 'required',
            'from_latitude' => 'required',
            'from_longitude' => 'required',
            'to_latitude' => 'required',
            'to_longitude'=>'required',
            'vehicle_type' => 'required',
            
            
          ];
    
      $validator = Validator::make($req->all(), $rules);  

        if ($validator->fails())
        {
          return response()->json(['error_message'=>$validator->errors()],400);
        } 
          else
        {

      $lat=$req->from_latitude;
      $lon=$req->from_longitude;
      $v_type=$req->vehicle_type;
      $dt=date('Y-m-d');

      $v_det=vehicle_type::where('id',$v_type)->first();
            
        $franchise = DB::table("franchise_details")
            ->where('status',1)
                ->where('valid_to','>=',$dt)
              ->select("franchise_details.id"
                ,DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                * cos(radians(franchise_details.latitude)) 
                * cos(radians(franchise_details.longitude) - radians(" . $lon . ")) 
                + sin(radians(" .$lat. ")) 
                * sin(radians(franchise_details.latitude))) AS distance"))               
                ->orderBy('distance','ASC')
                ->limit(1)
                ->first();

                
        $drivers = DB::table("active_drivers")
            ->join('driver_registrations', 'active_drivers.dr_id', '=', 'driver_registrations.id')
            ->where('active_drivers.franchise',$franchise->id)
            ->where('active_drivers.status',1)
            ->where('active_drivers.availability_status',1)
            ->where('active_drivers.ride_status',0)
            ->where('active_drivers.vehicle_type',$v_type)

              ->select('active_drivers.dr_id','active_drivers.driver_id','driver_registrations.name','driver_registrations.photo'
                ,DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
                * cos(radians(active_drivers.latitude)) 
                * cos(radians(active_drivers.longitude) - radians(" . $lon . ")) 
                + sin(radians(" .$lat. ")) 
                * sin(radians(active_drivers.latitude))) AS distances"))            
                ->orderBy('distances','ASC')
                ->limit(5)
                ->get();  

                $available_drivers = 0;
                $dr = [];

                if(!$drivers->isEmpty())
                foreach ($drivers as $d)
                 {
                  if($d->distances<5)
                  {
                    $available_drivers=count($drivers);
                    $dr[]= $d;
                  }
                  // elseif($d->distances>=50)
                  // {
                  //   $available_drivers=0;
                  //   $dr=[];
                  // }
                  
                }
                else
                {
                  $available_drivers=0;
                  $dr=[];
                }
                
                     

       $to_lat=$req->to_latitude;
       $to_lon=$req->to_longitude;
          $apiKey = 'AIzaSyAV9nmFBGBHAJ8OsNg1XhGNmoftJXBdyqQ';
          $origin = $lat.','.$lon;
         $destination = $to_lat.','.$to_lon;
         $url = 'https://maps.googleapis.com/maps/api/directions/json?origin=' . $origin . '&destination=' . $destination . '&key=' . $apiKey;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response);

    $distance = $data->routes[0]->legs[0]->distance->value/1000;
    $time = $data->routes[0]->legs[0]->duration->text;
    $points = $data->routes[0]->overview_polyline->points;
    $decimals = 2; 
    $dist=round($distance,$decimals);

                if($dist>$v_det->minimum_distance)
                {
                  $fares=($dist-$v_det->minimum_distance)*$v_det->fare+$v_det->minimum_fare;
                }
                else
                 {
                  $fares=$v_det->minimum_fare;
                }

  
            if($v_det->special_ride==1)
            {
              $tm=date('H:i:s');
              if($tm>$v_det->timefrom && $tm<$v_det->timeto)
              {
                $ride_fare=round($fares*$v_det->sp_charge,$decimals);
                //$tax_amount=round(($ride_fare+$v_det->service_charge)*$v_det->ride_tax/100,$decimals);
                $tax_amount=round((0+$v_det->service_charge)*$v_det->ride_tax/100,$decimals);
                $total_fare=$ride_fare+$tax_amount+$v_det->service_charge;
                $extra_charge_status=1;

              }
              else
              {
                $ride_fare=round($fares,$decimals);
                //$tax_amount=round(($ride_fare+$v_det->service_charge)*$v_det->ride_tax/100,$decimals);
                $tax_amount=round((0+$v_det->service_charge)*$v_det->ride_tax/100,$decimals);
                $total_fare=$ride_fare+$tax_amount+$v_det->service_charge;
                $extra_charge_status=0;
              }
              
            }
            else
            {
              $ride_fare=round($fares,$decimals);
              //$tax_amount=round(($ride_fare+$v_det->service_charge)*$v_det->ride_tax/100,$decimals);
             $tax_amount=round((0+$v_det->service_charge)*$v_det->ride_tax/100,$decimals);
              $total_fare=$ride_fare+$tax_amount+$v_det->service_charge;
              $extra_charge_status=0;
            }

        
       return response()->json([

       
        'vehicle_details'=>$v_det,
        'ride_distance'=>$dist,
        'ride_time'=>$time,
        'ride_fare'=>$ride_fare,
        'tax_amount'=>$tax_amount,
        'service_charge'=>$v_det->service_charge,
        'total_fare'=>$total_fare,        
        'extra_charge_status'=>$extra_charge_status,
        'available_drivers'=>$available_drivers,
        'franchise'=>$franchise->id,  
        'drivers_list'=>$dr,
        'points'=>$points,

     
              

        ],200);


       ;
    }
  }


    public function ride_booking(Request $req)
    
  {
      
      

    $rules = [
            
            'from_latitude' => 'required',
            'from_longitude' => 'required',
            'from_location' => 'required',
            'to_latitude' => 'required',
            'to_longitude'=>'required',
            'to_location'=>'required',
            'vehicle_type' => 'required',
            'driver_id' => 'required',
            'franchise' => 'required',
            'ride_distance' => 'required',
            'ride_fare' => 'required',
            'tax_amount' => 'required',
            'total_fare' => 'required',
            'ride_duration' => 'required',
            'extra_charge_status' => 'required',
            'points' => 'required',
            
            
          ];
    
      $validator = Validator::make($req->all(), $rules);  

        if ($validator->fails())
        {
          return response()->json(['error_message'=>$validator->errors()],400);
        } 
          else
        {

          $user=Auth::guard('customerapi')->user()->id;
          $dt=date('Y-m-d');
          $cusride=rides_booking::where('booked_date',$dt)
           ->where('customer_id',$user)
           ->where(function($q) {
              $q->where('status', 0)
              ->orWhere('status', 1)
              ->orWhere('status', 5);
          })->count();
          
          if($cusride!=0)
          {
             return response()->json([

                'message'=>'An active booking has been found. A new booking cannot be made',           
                
                ],408); 
          }
          else
          {
    
                              $type=vehicle_type::where('id',$req->vehicle_type)->first();
                              $frdet=franchise_detail::select('profit')->where('id',$req->franchise)->first();
                              $frcharge=$type->service_charge*$frdet->profit/100;
                              $admcharge=$type->service_charge-$frcharge;
                              $drcharge=$req->ride_fare*$type->driver_profit/100;
                              $admdrcharge=$req->ride_fare-$drcharge;
                              $cdate = date("Y-m-d H:i:s");
                              $currentDate = strtotime($cdate);
                              $futureDate = $currentDate+(60*1);
                              $formatDate = date("Y-m-d H:i:s", $futureDate);
                          
                            rides_booking::create([
                                    
                                    'customer_id'=>$user,
                                    'booked_at'=>date("Y-m-d H:i:s"),
                                    'timeout'=>$formatDate,
                    
                                    'booked_date'=>date('Y-m-d'),
                                    'from_latitude'=>$req->from_latitude,
                                    'from_longitude'=>$req->from_longitude,
                                    'from_location'=>$req->from_location,
                                    'to_latitude'=>$req->to_latitude,
                    
                                    'to_longitude'=>$req->to_longitude,
                                    'to_location'=>$req->to_location,
                                    'vehicle_type'=>$req->vehicle_type,
                    
                                    'driver_id'=>$req->driver_id,
                                    'distance'=>$req->ride_distance,
                                    'time'=>$req->ride_duration,
                                    'franchise'=>$req->franchise,
                    
                                    'fare'=>$req->ride_fare,
                                    'tax'=>$req->tax_amount,
                                    'total_fare'=>$req->total_fare,
                                    'service_charge'=>$type->service_charge,
                                    'night_ride'=>$req->extra_charge_status,
                    
                                    'driver_percent'=>$type->driver_profit,
                                    'driver_fare'=>$drcharge,
                                    'tax_percent'=>$type->ride_tax,
                                    'franchise_percent'=>$frdet->profit,
                                    'franchise_fare'=>$frcharge,
                                    'admin_fare'=>$admcharge,
                                    'admin_ride_fare'=>$admdrcharge,
                    
                                    'status'=>0,
                                    'payment_status'=>0,
                                    
                    
                                    ]);
                    
                        $bk=rides_booking::select('id','driver_id','status','from_latitude','from_longitude','from_location','to_location','total_fare','distance','to_latitude','to_longitude')->where('customer_id',$user)->where('status',0)->limit(1)->latest()->first();
                    
                            $tb="new_bookings";
                             $postData=[
                    
                              'd_id'=>$req->driver_id,
                              'status'=>0,
                              'payment_status'=>'',
                              'payment_type'=>'',
                              'start_points'=>'',
                              'points'=>$req->points,
                              'd_lat'=>'',
                              'd_lng'=>'',
                    
                            ];
                        
                    
                        $this->database->getReference($tb)->getChild($bk->id)->set($postData);
                    
                        active_driver::where('dr_id',$bk->driver_id)->update([
                                       
                          'ride_status'=>1,
                          
                          ]);
                    
                        $dr=driver_registration::select('device_key')->where('id',$bk->driver_id)->first();
                    
                        $url = "https://fcm.googleapis.com/fcm/send";
                    
                            $token = $dr->device_key;
                    
                            $serverKey = 'AAAAbfHrF2w:APA91bH7iXBYzCW6Do-zDqtXq35tjVH8qMat3wczyYcPcwtuPYFHeawoJwYeQz3189BApSkmUPfsxivzUkvvS3pH-OH-sTS3m95hPKzX9nqknx4OHCyqQEfGj2rnPOkVTsd4b5rLpGd6';
                    
                            $title = "New booking request";
                    
                            $body = "Please accept booking";
                    
                            
                    
                            $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
                            $data = array('booking_id' =>$bk->id, 'from_location' =>$bk->from_location, 'to_location' =>$bk->to_location, 'fare' =>$bk->total_fare, 'distance' =>$bk->distance, 'type' =>'new_booking');
                    
                            $arrayToSend = array('to' => $token, 'notification' => $notification, 'data' => $data, 'priority'=>'high');
                            $json = json_encode($arrayToSend);
                    
                            $headers = array();
                    
                            $headers[] = 'Content-Type: application/json';
                    
                            $headers[] = 'Authorization: key='. $serverKey;
                    
                            $ch = curl_init();
                    
                            curl_setopt($ch, CURLOPT_URL, $url);
                    
                            curl_setopt($ch, CURLOPT_CUSTOMREQUEST,
                    
                            "POST");
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                    
                            curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
                            //Send the request
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    
                            $response = curl_exec($ch);
                            //Close request
                    
                            if ($response === FALSE) {
                    
                            die('FCM Send Error: ' . curl_error($ch));
                    
                            }
                            curl_close($ch);
                    
                    
                            return response()->json([
                             'booking_id'=>$bk->id, 
                            'message'=>'Booking submitted successfully.',
                            //'res'=>$response,     
                            
                            ],200);

          }

      
    } 
      
    
  }



    public function cancel_booking(Request $req)
        
    {

        $rules = [
              // 'img' => 'required',
            'booking_id' => 'required',
 
          ];
    
      $validator = Validator::make($req->all(), $rules);  

        if ($validator->fails())
        {
          return response()->json(['error_message'=>$validator->errors()],400);
        } 
          else
        {

        $user=Auth::guard('customerapi')->user()->id;
        
       $book_id=$req->booking_id;

       $bookdt=rides_booking::where('id',$book_id)->where('customer_id',$user)->where('status','!=',6)->first();

       if($bookdt)
       {

            if($bookdt->status==2)
            {
               return response()->json([

                'message'=>'Booking already rejected by the driver ! ',           
                
                ],408); 
            }
            elseif($bookdt->status==4)
            {
                return response()->json([

                'message'=>'Booking already timeout ! ',           
                
                ],408);
            }
            else
            {

                              unfinished_bookings::updateOrCreate([
                        
                              'bid'   => $book_id,
                        
                            ],
                            [ 
                                'bid'=>$book_id,
                                'booking_id'=>"GKB". $book_id,
                        
                                'customer_id'=>$bookdt->customer_id,
                                'booked_at'=>$bookdt->booked_at,
                                'booked_date'=>$bookdt->booked_date,
                        
                                'from_latitude'=>$bookdt->from_latitude,
                                'from_longitude'=>$bookdt->from_longitude,
                                'from_location'=>$bookdt->from_location,
                        
                                'to_latitude'=>$bookdt->to_latitude,
                                'to_longitude'=>$bookdt->to_longitude,
                                'to_location'=>$bookdt->to_location,
                        
                                'vehicle_type'=>$bookdt->vehicle_type,
                                'driver_id'=>$bookdt->driver_id,
                                'franchise'=>$bookdt->franchise,
                        
                                'distance'=>$bookdt->distance,
                                'time'=>$bookdt->time,
                                'fare'=>$bookdt->fare,

                                'night_ride'=>$bookdt->night_ride,
                                'payment_type'=>$bookdt->payment_type,
                                'payment_status'=>$bookdt->payment_status,
                                'payment_date'=>$bookdt->payment_date,
                                'paid_amount'=>$bookdt->total_fare,
                                'reference_id'=>$bookdt->reference_id,
                                'total_fare'=>$bookdt->total_fare,
                                'started_at'=>$bookdt->started_at,
                                'refund_status'=>0,
                        
                                'status'=>3,
                        
                                'reason'=>$req->cancel_reason,
                                
                        
                            ]);
                                    
                            rides_booking::where('id',$book_id)->update([
                                           
                            'status'=>3,
                            'reason'=>$req->cancel_reason,
                                            
                            ]);
                            active_driver::where('dr_id',$bookdt->driver_id)->update([
                                           
                              'ride_status'=>0,
                              
                              ]);
                                            
                                $tb="new_bookings";
                                 $postData=[
                        
                                  'status'=>3,
                        
                                ];
                                $key=$book_id;
                            
                        
                            $this->database->getReference($tb.'/'.$key)->update($postData);          
                                            
                              
                            $dr=driver_registration::select('device_key')->where('id',$bookdt->driver_id)->first();
                        
                            $url = "https://fcm.googleapis.com/fcm/send";
                        
                        $token = $dr->device_key;
                        
                        $serverKey = 'AAAAbfHrF2w:APA91bH7iXBYzCW6Do-zDqtXq35tjVH8qMat3wczyYcPcwtuPYFHeawoJwYeQz3189BApSkmUPfsxivzUkvvS3pH-OH-sTS3m95hPKzX9nqknx4OHCyqQEfGj2rnPOkVTsd4b5rLpGd6';
                        
                        $title = "Booking request cancelled";
                        
                        $body = "Please view booking details";
                        
                        //$d = $bk->id;
                        
                        $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
                        $data = array('booking_id' =>$book_id,'type' =>'cancel_booking');
                        
                        $arrayToSend = array('to' => $token, 'notification' => $notification, 'data' => $data, 'priority'=>'high');
                        $json = json_encode($arrayToSend);
                        
                        $headers = array();
                        
                        $headers[] = 'Content-Type: application/json';
                        
                        $headers[] = 'Authorization: key='. $serverKey;
                        
                        $ch = curl_init();
                        
                        curl_setopt($ch, CURLOPT_URL, $url);
                        
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST,
                        
                        "POST");
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                        
                        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        //Send the request
                        
                        //$response = curl_exec($ch);
                        //Close request
                        curl_close($ch);
                        // if ($response === FALSE) {
                        
                        // die('FCM Send Error: ' . curl_error($ch));
                        
                        // }
                        // curl_close($ch);              
                                            
                                            
                                            
                                        return response()->json([
                        
                                        'message'=>'Booking cancelled successfully.',           
                                        
                                        ],200);
                
            }
            
        }
        else{
            return response()->json([

                'message'=>'Invalid request',           
                
                ],408);
            
        }
      }      
            
        
    }

    public function timeout_booking(Request $req)
        
    {

      $rules = [
              // 'img' => 'required',
            'booking_id' => 'required',
 
          ];
    
      $validator = Validator::make($req->all(), $rules);  

        if ($validator->fails())
        {
          return response()->json(['error_message'=>$validator->errors()],400);
        } 
          else
        {

        $user=Auth::guard('customerapi')->user()->id;
        
       $book_id=$req->booking_id;

       $bookdt=rides_booking::where('id',$book_id)->where('status',0)->first();
       
       if($bookdt)
       {

                          unfinished_bookings::updateOrCreate([
                    
                          'bid'   => $book_id,
                    
                        ],
                        [ 
                            'bid'=>$book_id,
                            'booking_id'=>"GKB". $book_id,
                    
                            'customer_id'=>$bookdt->customer_id,
                            'booked_at'=>$bookdt->booked_at,
                            'booked_date'=>$bookdt->booked_date,
                    
                            'from_latitude'=>$bookdt->from_latitude,
                            'from_longitude'=>$bookdt->from_longitude,
                            'from_location'=>$bookdt->from_location,
                    
                            'to_latitude'=>$bookdt->to_latitude,
                            'to_longitude'=>$bookdt->to_longitude,
                            'to_location'=>$bookdt->to_location,
                    
                            'vehicle_type'=>$bookdt->vehicle_type,
                            'driver_id'=>$bookdt->driver_id,
                            'franchise'=>$bookdt->franchise,
                    
                            'distance'=>$bookdt->distance,
                            'time'=>$bookdt->time,
                            'fare'=>$bookdt->fare,

                            'night_ride'=>$bookdt->night_ride,
                            'payment_type'=>$bookdt->payment_type,
                            'payment_status'=>$bookdt->payment_status,
                            'payment_date'=>$bookdt->payment_date,
                            'paid_amount'=>$bookdt->total_fare,
                            'reference_id'=>$bookdt->reference_id,
                            'total_fare'=>$bookdt->total_fare,
                            'started_at'=>$bookdt->started_at,
                            'refund_status'=>0,
                    
                            'status'=>4,
                            
                        ]);
                                
                        rides_booking::where('id',$book_id)->update([
                                      
                        'status'=>4,                  
                    
                          ]);
                    
                          active_driver::where('dr_id',$bookdt->driver_id)->update([
                                       
                            'ride_status'=>0,
                            
                            ]);
                                        
                        $tb="new_bookings";
                             $postData=[
                    
                              'status'=>4,
                    
                            ];
                            $key=$book_id;
                        
                    
                        $this->database->getReference($tb.'/'.$key)->update($postData);                  
                                        
                                    return response()->json([
                    
                                    'message'=>'Booking request timeout.',           
                                    
                                    ],200); 
                                    
                } 
                else
                {
                    return response()->json([
                    
                                    'message'=>'Invalid request',           
                                    
                                    ],408);
                }

           }                
        
    }


    public function payment_type(Request $req)
        
    {
        $rules = [
              // 'img' => 'required',
            'booking_id' => 'required',
            'payment_type' => 'required',
         
 
          ];
    
      $validator = Validator::make($req->all(), $rules);  

        if ($validator->fails())
        {
          return response()->json(['error_message'=>$validator->errors()],400);
        } 
        else
        {
      

              $user=Auth::guard('customerapi')->user()->id;
        
              $book_id=$req->booking_id;

              $bookdt=rides_booking::where('id',$book_id)->where('customer_id',$user)->first();

       if($bookdt)
       {
            
                  rides_booking::where('id',$book_id)->update([
                  
                    'payment_type'=>$req->payment_type,
                                   
                    ]);

                   $tb="new_bookings";
                   $postData=[

                  'payment_type'=>$req->payment_type,

                    ];
                $key=$book_id;
  
         $this->database->getReference($tb.'/'.$key)->update($postData); 

                  return response()->json([

                  'message'=>'Payment type updated successfully.',           
                
                  ],200);
                }

              else
                {
                  return response()->json([

                  'message'=>'Invalid request',           
                
                  ],408);
                }

             
               
            }    
                       
        
    }
  
    public function fare_payments(Request $req)
        
    {
        $rules = [
              // 'img' => 'required',
            'booking_id' => 'required',
            'payment_date' => 'required',
            'reference_id' => 'required',
            //'fare' => 'required',
 
          ];
    
      $validator = Validator::make($req->all(), $rules);  

        if ($validator->fails())
        {
          return response()->json(['error_message'=>$validator->errors()],400);
        } 
        else
        {
      

              $user=Auth::guard('customerapi')->user()->id;
        
              $book_id=$req->booking_id;

              $bookdt=rides_booking::where('id',$book_id)->where('customer_id',$user)->first();

       if($bookdt)
       {
            
                  rides_booking::where('id',$book_id)->update([
                  
                    'payment_type'=>1,
                    'payment_status'=>1,
                    'payment_date'=>$req->payment_date,
                    'paid_amount'=>$bookdt->total_fare,
                    'reference_id'=>$req->reference_id,                  

                    ]);

                   $tb="new_bookings";
                   $postData=[

                  'payment_status'=>1,
                  'payment_type'=>1,

                    ];
                $key=$book_id;
  
         $this->database->getReference($tb.'/'.$key)->update($postData); 

                  return response()->json([

                  'message'=>'Fare payment completed successfully.',           
                
                  ],200);
                }

              else
                {
                  return response()->json([

                  'message'=>'Invalid request',           
                
                  ],408);
                }

             
               
            }    
                       
        
    }



       public function journey_rating(Request $req)
        
    {
      $rules = [
              // 'img' => 'required',
            'booking_id' => 'required',
 
          ];
    
      $validator = Validator::make($req->all(), $rules);  

        if ($validator->fails())
        {
          return response()->json(['error_message'=>$validator->errors()],400);
        } 
        else
        {

        $user=Auth::guard('customerapi')->user()->id;
        
       $book_id=$req->booking_id;
        $bookdt=rides_booking::where('id',$book_id)->where('customer_id',$user)->first();

       if($bookdt)
       {
            rides_booking::where('id',$book_id)->update([
                  
                  
                    'star_rating'=>$req->rating,
                    'review'=>$req->review,
                                    

                    ]);
             ride_booking_history::where('bid',$book_id)->update([
                  
                  
                    'star_rating'=>$req->rating,
                    'review'=>$req->review,
                                    

                    ]);
                return response()->json([

                'message'=>'Journey rating submitted successfully.',           
                
                ],200);   
              }
       else
       {
                          
                 return response()->json([

                'message'=>'Invalid request',           
                
                ],408);

               }
              

            }                
        
    }


    public function customer_active_ride($bid)
    
  {

    $user=Auth::guard('customerapi')->user()->id;
          


     if(rides_booking::where('id',$bid)->where('customer_id',$user)->exists())
        {

    // $bookdt=rides_booking::select('id','customer_id','from_location','to_location','distance','fare','tax','service_charge','total_fare','driver_percent','driver_fare','night_ride','payment_status','payment_type','started_at','completed_at','extra_ride_fee','waiting_charge','star_rating','review')->where('id',$bid)->first();

          $bookdt=rides_booking::select('id','driver_id','from_location','to_location','distance','fare','tax','service_charge','time','total_fare','night_ride','payment_status','payment_type','status')->where('id',$bid)->first();

          $driver=driver_registration::select('name','driver_id','mobile','photo')->where('id',$bookdt->driver_id)->first();
    return response()->json([

                'booking_details'=>$bookdt, 
                'driver_details'=>$driver,           
                
                ],200); 

    }
    else
              {
                return response()->json([

                'message'=>'Invalid request',           
                
                ],408);
               }      
          
    
  }

    
   public function customer_ride_history($bid)
    
  {

    $user=Auth::guard('customerapi')->user()->id;
          


     if(ride_booking_history::where('id',$bid)->where('customer_id',$user)->exists())
        {

    $bookdt=ride_booking_history::select('id','booking_id','driver_id','from_location','booked_at','to_location','distance','fare','tax','service_charge','total_fare','driver_percent','driver_fare','night_ride','payment_status','payment_type','started_at','completed_at','extra_ride_fee','waiting_charge','star_rating','review')->where('id',$bid)->first();


          $driver=driver_registration::select('name','driver_id','mobile','photo')->where('id',$bookdt->driver_id)->first();
    return response()->json([

                'booking_details'=>$bookdt, 
                'driver_details'=>$driver,           
                
                ],200); 

    }
    else
              {
                return response()->json([

                'message'=>'Invalid request',           
                
                ],408);
               }      
          
    
  }


  public function customer_completed_rides()
    
  {

    $user=Auth::guard('customerapi')->user()->id;
          


     

    $bookdt=ride_booking_history::select('id','booking_id','from_location','to_location','driver_id','booked_at')->where('customer_id',$user)->latest()->get();

    return response()->json([

                'rides'=>$bookdt, 
                       
                
                ],200); 

    }
  
    
  

  public function customer_running_ride()
    
  {

    $user=Auth::guard('customerapi')->user()->id;
          

     $dt=date('Y-m-d');

  $bookdt=rides_booking::where('customer_id',$user)->where('booked_date',$dt)->where('status',0)->first();

  if($bookdt)
  {
      unfinished_bookings::updateOrCreate([
                        
                              'bid'   => $bookdt->id,
                        
                            ],
                            [ 
                                'bid'=>$bookdt->id,
                                'booking_id'=>"GKB". $bookdt->id,
                        
                                'customer_id'=>$bookdt->customer_id,
                                'booked_at'=>$bookdt->booked_at,
                                'booked_date'=>$bookdt->booked_date,
                        
                                'from_latitude'=>$bookdt->from_latitude,
                                'from_longitude'=>$bookdt->from_longitude,
                                'from_location'=>$bookdt->from_location,
                        
                                'to_latitude'=>$bookdt->to_latitude,
                                'to_longitude'=>$bookdt->to_longitude,
                                'to_location'=>$bookdt->to_location,
                        
                                'vehicle_type'=>$bookdt->vehicle_type,
                                'driver_id'=>$bookdt->driver_id,
                                'franchise'=>$bookdt->franchise,
                        
                                'distance'=>$bookdt->distance,
                                'time'=>$bookdt->time,
                                'fare'=>$bookdt->fare,

                                'night_ride'=>$bookdt->night_ride,
                                'payment_type'=>$bookdt->payment_type,
                                'payment_status'=>$bookdt->payment_status,
                                'payment_date'=>$bookdt->payment_date,
                                'paid_amount'=>$bookdt->total_fare,
                                'reference_id'=>$bookdt->reference_id,
                                'total_fare'=>$bookdt->total_fare,
                                'started_at'=>$bookdt->started_at,
                                'refund_status'=>0,
                        
                                'status'=>3,
                        
                                'reason'=>"Closed Unexpectedly",
                                
                        
                            ]);

                            $tb="new_bookings";
                                 $postData=[
                        
                                  'status'=>3,
                        
                                ];
                                $key=$bookdt->id;
                            
                        
                            $this->database->getReference($tb.'/'.$key)->update($postData); 
                                    
                            rides_booking::where('id',$bookdt->id)->update([
                                           
                            'status'=>3,
                            'reason'=>"Closed Unexpectedly",
                                            
                            ]);
                            active_driver::where('dr_id',$bookdt->driver_id)->update([
                                           
                              'ride_status'=>0,
                              
                              ]);

                            return response()->json([
                'message'=>"No running rides found !",
           

                ],408); 
  }
  else
  {

    $bk=rides_booking::select('id','driver_id','status','from_latitude','from_longitude','from_location','to_location','total_fare','distance','to_latitude','to_longitude','customer_id')
    ->where('customer_id',$user)
    ->where(function($q) {
      $q->where('status', 1)
      ->orWhere('status', 5);
    })
    ->limit(1)
    ->latest()
    ->first();

    if($bk)
    {
      return response()->json([
                'ride_det'=>$bk,
                //'customer'=>$earnings,

                ],200); 

    }
    else
    {
      return response()->json([
                'message'=>"No running rides found !",
           

                ],408); 

    }
   }




}



}
