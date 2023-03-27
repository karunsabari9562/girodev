<?php

namespace App\Http\Controllers\rides;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB,Auth;
use App\Models\rides_booking;
use App\Models\ride_booking_history;
use App\Models\unfinished_bookings;
use App\Models\customer_registration;
use App\Models\active_driver;
use Illuminate\Support\Facades\Validator;

class DriverRideController extends Controller
{
    private $database;

  public function __construct()
  {
    $this->database = \App\services\FirebaseService::connect();
  }
    
    public function accept_booking(Request $req)
		
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
			$user=Auth::guard('driverapi')->user()->id;
						
			$book_id=$req->booking_id;

			 if(rides_booking::where('id',$book_id)->where('driver_id',$user)->where('status',0)->exists())
	       {
					rides_booking::where('id',$book_id)->update([
			            
			            'status'=>1,			            

			            ]);

			$ride_dt=rides_booking::select('from_latitude','from_longitude')->where('id',$book_id)->first();
			$dr_dt=active_driver::select('latitude','longitude')->where('dr_id',$user)->first();

				$apiKey = 'AIzaSyAV9nmFBGBHAJ8OsNg1XhGNmoftJXBdyqQ';
     			$origin = $dr_dt->latitude.','.$dr_dt->longitude;
         		$destination = $ride_dt->from_latitude.','.$ride_dt->from_longitude;
         $url = 'https://maps.googleapis.com/maps/api/directions/json?origin=' . $origin . '&destination=' . $destination . '&key=' . $apiKey;

    		$ch = curl_init();
    		curl_setopt($ch, CURLOPT_URL, $url);
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    		$response = curl_exec($ch);
    		curl_close($ch);

    		$data = json_decode($response);

    		//$distance = $data->routes[0]->legs[0]->distance->value/1000;
    		//$time = $data->routes[0]->legs[0]->duration->text;
    		$points = $data->routes[0]->overview_polyline->points;
			//$decimals = 2; 
    		//$dist=round($distance,$decimals);	



					 $tb="new_bookings";
         $postData=[

         'start_points'=>$points,
          'status'=>1,

        ];
        $key=$book_id;
    

    $this->database->getReference($tb.'/'.$key)->update($postData); 
					
	$bkdet=rides_booking::select('customer_id')->where('id',$book_id)->first();				

	 $url = "https://fcm.googleapis.com/fcm/send";

$token = $bkdet->GetCustomer->device_key;

$serverKey = 'AAAAbfHrF2w:APA91bH7iXBYzCW6Do-zDqtXq35tjVH8qMat3wczyYcPcwtuPYFHeawoJwYeQz3189BApSkmUPfsxivzUkvvS3pH-OH-sTS3m95hPKzX9nqknx4OHCyqQEfGj2rnPOkVTsd4b5rLpGd6';

$title = "Your booking request accepted";

$body = "Please view booking details";

//$d = $bk->id;

$notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
$data = array('booking_id' =>$book_id, 'type' =>'accept_booking');

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

$response = curl_exec($ch);
//Close request

if ($response === FALSE) {

die('FCM Send Error: ' . curl_error($ch));

}
curl_close($ch);				

return response()->json([

					'message'=>'Booking accepted successfully.',
					 //'res'=>$response, 			
					
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



	public function reject_booking(Request $req)
		
	{

		$user=Auth::guard('driverapi')->user()->id;
					
		$book_id=$req->booking_id;

		if(rides_booking::where('id',$book_id)->where('driver_id',$user)->where('status','!=',6)->exists())
       {

		$bookdt=rides_booking::where('id',$book_id)->first();
		
		 if($bookdt->status==3)
            {
               return response()->json([

                'message'=>'Booking already cancelled by the customer ! ',           
                
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
                                
                                		     'status'=>2,
                                
                                		     'reason'=>$req->rejection_reason,
                                		    
                                
                                		]);
                                
                                				rides_booking::where('id',$book_id)->update([
                                		            
                                
                                		            'status'=>2,
                                		            'reason'=>$req->rejection_reason,
                                		            
                                
                                		            ]);
                                
                                					active_driver::where('dr_id',$bookdt->driver_id)->update([
                                                   
                                						'ride_status'=>0,
                                						
                                						]);			
                                		            
                                		   $tb="new_bookings";
                                         $postData=[
                                
                                          'status'=>2,
                                
                                        ];
                                        $key=$book_id;
                                    
                                
                                    $this->database->getReference($tb.'/'.$key)->update($postData);  
                                
                                
                                    $bkdet=rides_booking::select('customer_id')->where('id',$book_id)->first();				
                                
                                	 $url = "https://fcm.googleapis.com/fcm/send";
                                
                                $token = $bkdet->GetCustomer->device_key;
                                
                                $serverKey = 'AAAAbfHrF2w:APA91bH7iXBYzCW6Do-zDqtXq35tjVH8qMat3wczyYcPcwtuPYFHeawoJwYeQz3189BApSkmUPfsxivzUkvvS3pH-OH-sTS3m95hPKzX9nqknx4OHCyqQEfGj2rnPOkVTsd4b5rLpGd6';
                                
                                $title = "Your booking request is rejected";
                                
                                $body = "Please view booking details";
                                
                                
                                $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
                                $data = array('booking_id' =>$book_id, 'type' =>'reject_booking');
                                
                                $arrayToSend = array('to' => $token, 'notification' => $notification, 'data' => $data, 'priority'=>'high');
                                $json = json_encode($arrayToSend);
                                
                                $headers = array();
                                
                                $headers[] = 'Content-Type: application/json';
                                
                                $headers[] = 'Authorization: key='. $serverKey;
                                
                                $ch = curl_init();
                                
                                curl_setopt($ch, CURLOPT_URL, $url);
                                
                                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                                
                                curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                //Send the request
                                
                                $response = curl_exec($ch);
                                //Close request
                                
                                if ($response === FALSE) {
                                
                                die('FCM Send Error: ' . curl_error($ch));
                                
                                }
                                curl_close($ch);
                                		            
                                				return response()->json([
                                
                                				'message'=>'Booking rejected successfully.',			
                                				
                                				],200);

				}
       }	
		else
              {
                return response()->json([

                'message'=>'Invalid request',           
                
                ],408);
              }	
					
		
	}




	public function start_journey(Request $req)
		
	{

		$user=Auth::guard('driverapi')->user()->id;
					
		$book_id=$req->booking_id;

		if(rides_booking::where('id',$book_id)->where('driver_id',$user)->where('status',1)->exists())
       {

				rides_booking::where('id',$book_id)->update([
		            

		            'status'=>5,
		            'started_at'=>date('Y-m-d H:i:s'),
		            

		            ]);
		            
		                  $tb="new_bookings";
         $postData=[

          'status'=>5,
          'start_points'=>''

        ];
        $key=$book_id;
    

    $this->database->getReference($tb.'/'.$key)->update($postData); 
		            
				return response()->json([

				'message'=>'Journey started successfully.',			
				
				],200);

				}
		else
              {
                return response()->json([

                'message'=>'Invalid request',           
                
                ],408);
              }			
					
		
	}

	// 	public function offline_fare_payment(Request $req)
		
	// {
	// 	$rules = [
 //               'paid_amount' => 'required',
 //            'booking_id' => 'required',
          
 
 //          ];
    
 //      $validator = Validator::make($req->all(), $rules);  

 //        if ($validator->fails())
 //        {
 //          return response()->json(['error_message'=>$validator->errors()],400);
 //        } 
 //        else
 //        {

	// 	$user=Auth::guard('driverapi')->user()->id;
					
	// 	$book_id=$req->booking_id;

	// 	if(rides_booking::where('id',$book_id)->where('driver_id',$user)->exists())
 //       {

	// 			rides_booking::where('id',$book_id)->update([
		            

	// 	            'payment_type'=>2,
 //                   'payment_status'=>1,
 //                    'paid_amount'=>$req->paid_amount,
 //                   'offline_pay_franchise'=>0,
 //                   'offline_pay_admin'=>0,    

	// 	            ]);
	// 			return response()->json([

	// 			'message'=>'Offline payment completed successfully.',			
				
	// 			],200);

	// 		}
	// 	else
 //              {
 //                return response()->json([

 //                'message'=>'Invalid request',           
                
 //                ],403);
 //              }			
	// 	}			
		
	// }

		public function complete_journey(Request $req)
		
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
				$user=Auth::guard('driverapi')->user()->id;
							
				$book_id=$req->booking_id;

				if(rides_booking::where('id',$book_id)->where('driver_id',$user)->where('status',5)->exists())
		       {

				
            $bookdt1=rides_booking::select('total_fare')->where('id',$book_id)->first();

        rides_booking::where('id',$book_id)->update([
                
               'status'=>6,
               'payment_type'=>$req->payment_type,
                   'payment_status'=>1,
                   'paid_amount'=>$bookdt1->total_fare,
                   'completed_at'=>date('Y-m-d H:i:s'),
                   'extra_ride_fee'=>$req->extra_ride_fee,
                'waiting_charge'=>$req->waiting_charge,
                   

                ]);

        $bookdt=rides_booking::where('id',$book_id)->first();

				ride_booking_history::updateOrCreate([

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

		     'fare'=>$bookdt->fare,
          'tax'=>$bookdt->tax,
          'total_fare'=>$bookdt->total_fare,
              'service_charge'=>$bookdt->service_charge,
             'night_ride'=>$bookdt->night_ride,

             'extra_ride_fee'=>$req->extra_ride_fee,
             'waiting_charge'=>$req->waiting_charge,

             'driver_percent'=>$bookdt->driver_percent,
             'driver_fare'=>$bookdt->driver_fare,
             'tax_percent'=>$bookdt->tax_percent,
             'franchise_percent'=>$bookdt->franchise_percent,
             'franchise_fare'=>$bookdt->franchise_fare,
             'admin_fare'=>$bookdt->admin_fare,
             'admin_ride_fare'=>$bookdt->admin_ride_fare,

		     'payment_type'=>$bookdt->payment_type,
		     'payment_status'=>$bookdt->payment_status,
		     'payment_date'=>$bookdt->payment_date,
		     'paid_amount'=>$bookdt->total_fare,
		     'reference_id'=>$bookdt->reference_id,

		     'status'=>6,

		     'reason'=>'',
		     'star_rating'=>$bookdt->star_rating,
		     'review'=>$bookdt->review,
		     'started_at'=>$bookdt->started_at,
		     'completed_at'=>date('Y-m-d H:i:s'),

		     'offline_pay_franchise'=>$bookdt->offline_pay_franchise,
		     'offline_pay_franchisedt'=>$bookdt->offline_pay_franchisedt,
		     'offline_pay_admin'=>$bookdt->offline_pay_admin,
		     'offline_pay_admindt'=>$bookdt->offline_pay_admindt,

		]);


		

		active_driver::where('dr_id',$bookdt->driver_id)->update([
                   
					'ride_status'=>0,
						
						]);			
		            
		                  $tb="new_bookings";
         $postData=[

          'payment_status'=>1,
          'payment_type'=>2,
          'status'=>6,

        ];
        $key=$book_id;
    

   		 $this->database->getReference($tb.'/'.$key)->update($postData); 

    	 $bkdet=rides_booking::select('customer_id')->where('id',$book_id)->first();				
	 	 $url = "https://fcm.googleapis.com/fcm/send";
		 $token = $bkdet->GetCustomer->device_key;
		 $serverKey = 'AAAAbfHrF2w:APA91bH7iXBYzCW6Do-zDqtXq35tjVH8qMat3wczyYcPcwtuPYFHeawoJwYeQz3189BApSkmUPfsxivzUkvvS3pH-OH-sTS3m95hPKzX9nqknx4OHCyqQEfGj2rnPOkVTsd4b5rLpGd6';
		 $title = "Your journey is completed";
		 $body = "Please rate us";
		 $notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
	     $data = array('booking_id' =>$book_id,'type' =>'complete_booking');
		 $arrayToSend = array('to' => $token, 'notification' => $notification, 'data' => $data, 'priority'=>'high');
		 $json = json_encode($arrayToSend);
		 $headers = array();
		 $headers[] = 'Content-Type: application/json';
		 $headers[] = 'Authorization: key='. $serverKey;
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $url);
		 curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
		 curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		 curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
		 $response = curl_exec($ch);
		 if ($response === FALSE) {
		die('FCM Send Error: ' . curl_error($ch));
		}
		curl_close($ch);

				return response()->json([

				'message'=>'Journey completed successfully.',			
				
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



	public function driver_active_ride($bid)
		
	{

		$user=Auth::guard('driverapi')->user()->id;
					


		 if(rides_booking::where('id',$bid)->where('driver_id',$user)->exists())
        {

		// $bookdt=rides_booking::select('id','customer_id','from_location','to_location','distance','fare','tax','service_charge','total_fare','driver_percent','driver_fare','night_ride','payment_status','payment_type','started_at','completed_at','extra_ride_fee','waiting_charge','star_rating','review')->where('id',$bid)->first();

        	$bookdt=rides_booking::select('id','customer_id','from_location','to_location','distance','fare','time','tax','service_charge','total_fare','night_ride','payment_status','payment_type','status')->where('id',$bid)->first();

        	$customer=customer_registration::select('name','mobile')->where('id',$bookdt->customer_id)->first();
		return response()->json([

                'booking_details'=>$bookdt,
                'customer'=>$customer,           
                
                ],200);	

	 	}
	 	else
              {
                return response()->json([

                'message'=>'Invalid request',           
                
                ],408);
               }			
					
		
	}


	public function driver_ride_history($bid)
		
	{

		$user=Auth::guard('driverapi')->user()->id;
					


		 if(ride_booking_history::where('id',$bid)->where('driver_id',$user)->exists())
        {

		// $bookdt=rides_booking::select('id','customer_id','from_location','to_location','distance','fare','tax','service_charge','total_fare','driver_percent','driver_fare','night_ride','payment_status','payment_type','started_at','completed_at','extra_ride_fee','waiting_charge','star_rating','review')->where('id',$bid)->first();

        	$bookdt=ride_booking_history::select('id','booking_id','customer_id','from_location','booked_at','to_location','distance','fare','tax','service_charge','total_fare','driver_percent','driver_fare','night_ride','payment_status','payment_type','started_at','completed_at','extra_ride_fee','waiting_charge','star_rating','review')->where('id',$bid)->first();

        	$customer=customer_registration::select('name','mobile')->where('id',$bookdt->customer_id)->first();
		return response()->json([

                'booking_details'=>$bookdt,
                'customer'=>$customer,           
                
                ],200);	

	 	}
	 	else
              {
                return response()->json([

                'message'=>'Invalid request',           
                
                ],408);
               }			
					
		
	}


		public function driver_todays_rides()
		
	{

		$user=Auth::guard('driverapi')->user()->id;
					

$dt=date('Y-m-d');
		 

        	$bookdt=rides_booking::select('id','customer_id','from_location','booked_at','to_location','status')->where('driver_id',$user)->where('booked_date',$dt)->latest()->get();

        	//$customer=customer_registration::select('name','mobile')->where('id',$bookdt->customer_id)->first();

        	$completed_rides=rides_booking::where('driver_id',$user)->where('booked_date',$dt)->where('status',6)->count();
        	$cancelled_rides=rides_booking::where('driver_id',$user)->where('booked_date',$dt)->where('status',3)->count();
        	$rejected_rides=rides_booking::where('driver_id',$user)->where('booked_date',$dt)->where('status',2)->count();
        	$timeout_rides=rides_booking::where('driver_id',$user)->where('booked_date',$dt)->where('status',4)->count();
        	$earnings=rides_booking::where('driver_id',$user)->where('booked_date',$dt)->where('status',6)->sum('driver_fare');



		return response()->json([

                'rides'=>$bookdt,
                'completed_rides'=>$completed_rides,
                'cancelled_rides'=>$cancelled_rides,
                'rejected_rides'=>$rejected_rides,
                'timeout_rides'=>$timeout_rides,
                'earnings'=>$earnings,

                //'customer'=>$customer,           
                
                ],200);	

	 					
	}


		public function driver_todays_earnings()
		
	{

		$user=Auth::guard('driverapi')->user()->id;
					

$dt=date('Y-m-d');
		 

        	
        	$completed_rides=rides_booking::where('driver_id',$user)->where('booked_date',$dt)->where('status',6)->count();
        	
        	$earnings=rides_booking::where('driver_id',$user)->where('booked_date',$dt)->where('status',6)->sum('driver_fare');



		return response()->json([

               
                'completed_rides'=>$completed_rides,
                'earnings'=>$earnings,

                //'customer'=>$customer,           
                
                ],200);	

	 					
	}


	public function driver_datewise_rides(Request $req)
		
	{

			$rules = [
              // 'img' => 'required',
            'ride_date' => 'required',
          
 
          ];
    
      $validator = Validator::make($req->all(), $rules);  

        if ($validator->fails())
        {
          return response()->json(['error_message'=>$validator->errors()],400);
        } 
        else
        {

		$user=Auth::guard('driverapi')->user()->id;

					

		$dt=$req->ride_date;
		 

        	$completed_rides_list=ride_booking_history::select('id','customer_id','booking_id','from_location','booked_at','to_location','status')->where('driver_id',$user)->where('booked_date',$dt)->latest()->get();
        	$unfinished_rides_list=unfinished_bookings::select('id','customer_id','booking_id','from_location','booked_at','to_location','status')->where('driver_id',$user)->where('booked_date',$dt)->latest()->get();

        	//$customer=customer_registration::select('name','mobile')->where('id',$bookdt->customer_id)->first();

        	$completed_rides=ride_booking_history::where('driver_id',$user)->where('booked_date',$dt)->where('status',6)->count();
        	$cancelled_rides=unfinished_bookings::where('driver_id',$user)->where('booked_date',$dt)->where('status',3)->count();
        	$rejected_rides=unfinished_bookings::where('driver_id',$user)->where('booked_date',$dt)->where('status',2)->count();
        	$timeout_rides=unfinished_bookings::where('driver_id',$user)->where('booked_date',$dt)->where('status',4)->count();
        	$earnings=ride_booking_history::where('driver_id',$user)->where('booked_date',$dt)->where('status',6)->sum('driver_fare');



		return response()->json([

                'completed_rides_list'=>$completed_rides_list,
                'unfinished_rides_list'=>$unfinished_rides_list,
                'completed_rides'=>$completed_rides,
                'cancelled_rides'=>$cancelled_rides,
                'rejected_rides'=>$rejected_rides,
                'timeout_rides'=>$timeout_rides,
                'earnings'=>$earnings,

                //'customer'=>$customer,           
                
                ],200);	

	 		}		
	 	
		
	}
	
	
	
	
	
	public function driver_running_ride()
		
	{

		$user=Auth::guard('driverapi')->user()->id;
					

		$dt=date('Y-m-d');

    //$dt=date('Y-m-d');
    $dt1=date('Y-m-d H:i:s');

  $bookdt=rides_booking::where('driver_id',$user)->where('timeout','<',$dt1)->where('status',0)->first();

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
                        
                                'status'=>4,
                        
                                'reason'=>"",
                                
                        
                            ]);

                            $tb="new_bookings";
                                 $postData=[
                        
                                  'status'=>4,
                        
                                ];
                                $key=$bookdt->id;
                            
                        
                            $this->database->getReference($tb.'/'.$key)->update($postData); 
                                    
                            rides_booking::where('id',$bookdt->id)->update([
                                           
                            'status'=>4,
                            
                                            
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
		->where('driver_id',$user)
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
