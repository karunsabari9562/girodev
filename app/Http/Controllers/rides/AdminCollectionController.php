<?php

namespace App\Http\Controllers\rides;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB,Auth,Cache;
use Illuminate\Support\Facades\Hash;
use App\Models\active_driver;
use App\Models\rides_booking;
use App\Models\ride_booking_history;
use App\Models\unfinished_bookings;
use App\Models\driver_registration;
use App\Models\franchise_detail;
use App\Models\driver_salary;

class AdminCollectionController extends Controller
{
    public function todays_rides($type)
     
    {
           $dt=date('Y-m-d');
    
        if($type=='All')
        {
            
           $bookings=rides_booking::where('booked_date',$dt)->latest()->get();
           $cnt=rides_booking::where('booked_date',$dt)->where('status',6)->count();
           $cnt1=rides_booking::where('booked_date',$dt)->where('status',1)->orwhere('status',5)->count();

           $cnt2=DB::table('rides_bookings')->where('booked_date',$dt)
           ->where(function($q) {
              $q->where('status', 2)
              ->orWhere('status', 3);
          })
           
           ->count();
            
            
           

           $cnt3=rides_booking::where('booked_date',$dt)->where('status',4)->count();

           $sum=rides_booking::where('booked_date',$dt)->where('status',6)->sum('total_fare');
           $sum1=rides_booking::where('booked_date',$dt)->where('status',6)->where('payment_type',1)->sum('paid_amount');
           $sum2=rides_booking::where('booked_date',$dt)->where('status',6)->where('payment_type',2)->sum('paid_amount');
           $sp=rides_booking::where('booked_date',$dt)->where('status',6)->where('night_ride',1)->count();

           return view('admin_ride.collection.TodaysAllRides',['bookings'=>$bookings,'cnt'=>$cnt,'cnt1'=>$cnt1,'cnt2'=>$cnt2,'cnt3'=>$cnt3,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp]); 
        }
        if($type=='Completed')
        {
            $btype="Completed Bookings";
           $bookings=rides_booking::where('booked_date',$dt)->where('status',6)->latest()->get();
           return view('admin_ride.collection.TodaysRides',['bookings'=>$bookings,'btype'=>$btype]); 
        }
        if($type=='Running')
        {
            $btype="Running Bookings";
           $bookings=rides_booking::where('booked_date',$dt)
           ->where(function($q) {
              $q->where('status', 1)
              ->orWhere('status', 5);
          })
         
           ->latest()->get();
           return view('admin_ride.collection.TodaysRides',['bookings'=>$bookings,'btype'=>$btype]); 
        }
        if($type=='Unfinished')
        {
            $btype="Unfinished Bookings";
           $bookings=rides_booking::where('booked_date',$dt)
           ->where(function($q) {
              $q->where('status', 2)
              ->orwhere('status', 4)
              ->orWhere('status', 3);
          })
           
           ->latest()
           ->get();
           return view('admin_ride.collection.TodaysRides',['bookings'=>$bookings,'btype'=>$btype]); 
        }
        

    }


    public function all_bookings_filter()
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');



 $com=ride_booking_history::where('status',6)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->count();

$rej=unfinished_bookings::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',2)->count();
$can=unfinished_bookings::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',3)->count();
$time=unfinished_bookings::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',4)->count();


  return view('admin_ride.collection.BookingsFilter',['com'=>$com,'rej'=>$rej,'can'=>$can,'time'=>$time]); 
    }

    public function allride_history(request $req)
{
  $req->validate([
            'dfrom'=>'required',
            'dto'=>'required',
           
            ],
            [
              'dfrom.required' => 'This field is required',
              'dto.required' => 'This field is required',
            ]


          );

  
////

 if($req->btype==2)
{

  
  $sum=ride_booking_history::where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->sum('total_fare');

  $sum1=ride_booking_history::where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('payment_type',1)->sum('paid_amount');
  $sum2=ride_booking_history::where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('payment_type',2)->sum('paid_amount');
  $sp=ride_booking_history::where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('night_ride',1)->count();
  $bookings=ride_booking_history::where('status',6)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','ASC')->get();

   $star1=ride_booking_history::where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',1)->count();
  $star2=ride_booking_history::where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',2)->count();
  $star3=ride_booking_history::where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',3)->count();
  $star4=ride_booking_history::where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',4)->count();
   $star5=ride_booking_history::where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',5)->count();


   return view('admin_ride.collection.CompletedRideHistory',['bookings'=>$bookings,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'dfrom'=>$req->dfrom,'dto'=>$req->dto,'star1'=>$star1,'star2'=>$star2,'star3'=>$star3,'star4'=>$star4,'star5'=>$star5]);
}

else if($req->btype==3)
{
  $type="Rejected";
   $bookings=unfinished_bookings::where('status',2)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','ASC')->get();
   return view('admin_ride.collection.UnfinishedRideHistory',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto]);
}
else if($req->btype==4)
{
  $type="Cancelled";
   $bookings=unfinished_bookings::where('status',3)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','ASC')->get();
   return view('admin_ride.collection.UnfinishedRideHistory',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto]);
}
else if($req->btype==5)
{
  $type="Timeout ";
   $bookings=unfinished_bookings::where('status',4)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','ASC')->get();
   return view('admin_ride.collection.UnfinishedRideHistory',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto]);
}

   
}



public function completed_mrides()
     
    {
             $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');


  $sum=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('total_fare');

  $sum1=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',1)->sum('paid_amount');
  $sum2=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',2)->sum('paid_amount');
  $sp=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('night_ride',1)->count();

   $star1=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',1)->count();
  $star2=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',2)->count();
  $star3=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',3)->count();
  $star4=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',4)->count();
   $star5=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',5)->count();

   
    $bookings=ride_booking_history::where('status',6)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->latest()->get();
           
           return view('admin_ride.collection.MonthlyCompletedRides',['bookings'=>$bookings,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'star1'=>$star1,'star2'=>$star2,'star3'=>$star3,'star4'=>$star4,'star5'=>$star5]); 
 
    }

      public function rejected_mrides()
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');
         
    $bookings=unfinished_bookings::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',2)->get();
           
           return view('admin_ride.collection.MonthlyRejectedRides',['bookings'=>$bookings]); 
 
    }

    public function cancelled_mrides()
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');
    
    $bookings=unfinished_bookings::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',3)->get();
           
           return view('admin_ride.collection.MonthlyCancelledRides',['bookings'=>$bookings]); 
 
    }
     public function timeout_mrides()
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');
   
    $bookings=unfinished_bookings::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',4)->get();
           
           return view('admin_ride.collection.MonthlyTimeoutRides',['bookings'=>$bookings]); 
 
    }



    ///////////////////////


    public function todays_collection()
     
    {
           $dt=date('Y-m-d');

          $cnt=rides_booking::where('booked_date',$dt)->where('status',6)->count();
          $ride_fare=rides_booking::where('booked_date',$dt)->where('status',6)->sum('fare');
          $tax=rides_booking::where('booked_date',$dt)->where('status',6)->sum('tax');
           $sr=rides_booking::where('booked_date',$dt)->where('status',6)->sum('service_charge');
           $sum=rides_booking::where('booked_date',$dt)->where('status',6)->sum('total_fare');

           $sum1=rides_booking::where('booked_date',$dt)->where('status',6)->where('payment_type',1)->sum('paid_amount');
           $sum2=rides_booking::where('booked_date',$dt)->where('status',6)->where('payment_type',2)->sum('paid_amount');
           $sp=rides_booking::where('booked_date',$dt)->where('status',6)->where('night_ride',1)->count();

      $driver=rides_booking::select('driver_id','franchise')->where('status',6)->where('booked_date',$dt)->groupBy('driver_id')->get();
           return view('admin_ride.collection.TodaysCollection',['driver'=>$driver,'cnt'=>$cnt,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'ride_fare'=>$ride_fare,'tax'=>$tax,'sr'=>$sr]);  

    }

       public function driver_rides($did)
     
    {

           $dt=date('Y-m-d');
           $drid=decrypt($did);
          $ride_fare=rides_booking::where('driver_id',$drid)->where('booked_date',$dt)->where('status',6)->sum('driver_fare');

  $driver=driver_registration::select('name','mobile','driver_id','franchise','id')->where('id',$drid)->first();

      $booking=rides_booking::select('driver_id','from_location','to_location','distance','fare','id','driver_fare','driver_percent','total_fare')->where('status',6)->where('driver_id',$drid)->where('booked_date',$dt)->latest()->get();
      return view('admin_ride.collection.DriverRides',['booking'=>$booking,'driver'=>$driver,'ride_fare'=>$ride_fare]);

    }


// sss
    public function all_collection_filter()
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');

 $com=ride_booking_history::where('status',6)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->count();

$franchise=franchise_detail::select('id','franchise_name')->orderBy('franchise_name','ASC')->get();

  return view('admin_ride.collection.CollectionFilter',['com'=>$com,'franchise'=>$franchise]); 
    }



    /////////////////////



    public function driver_collection_history(request $req)

    {
      $req->validate([
            'dfrom'=>'required',
            // 'dto'=>'required',
            // 'drid'=>'required',
           
            ],
            [
              'dfrom.required' => 'This field is required',
              // 'dto.required' => 'This field is required',
              // 'drid.required' => 'This field is required',
            ]


          );

 
  $dt=$req->dfrom;

          $cnt=rides_booking::where('booked_date',$dt)->where('status',6)->count();
          $ride_fare=rides_booking::where('booked_date',$dt)->where('status',6)->sum('fare');
          $tax=rides_booking::where('booked_date',$dt)->where('status',6)->sum('tax');
           $sr=rides_booking::where('booked_date',$dt)->where('status',6)->sum('service_charge');
           $sum=rides_booking::where('booked_date',$dt)->where('status',6)->sum('total_fare');

           $sum1=rides_booking::where('booked_date',$dt)->where('status',6)->where('payment_type',1)->sum('paid_amount');
           $sum2=rides_booking::where('booked_date',$dt)->where('status',6)->where('payment_type',2)->sum('paid_amount');
           $sp=rides_booking::where('booked_date',$dt)->where('status',6)->where('night_ride',1)->count();

      $driver=rides_booking::select('driver_id','franchise')->where('status',6)->where('booked_date',$dt)->groupBy('driver_id')->get();
           return view('admin_ride.collection.DriverCollectionHistory',['driver'=>$driver,'cnt'=>$cnt,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'ride_fare'=>$ride_fare,'tax'=>$tax,'sr'=>$sr,'dat'=>$dt]);

}

public function driver_rides_list($did,$dat)
     
    {

           $dt=$dat;
         
           $drid=decrypt($did);
          $ride_fare=ride_booking_history::where('driver_id',$drid)->where('booked_date',$dt)->where('status',6)->sum('driver_fare');

        $driver=driver_registration::select('name','mobile','driver_id','franchise','id')->where('id',$drid)->first();

      $booking=ride_booking_history::select('driver_id','from_location','to_location','distance','fare','id','driver_fare','driver_percent','booking_id','total_fare','payment_type','offline_pay_admin')->where('status',6)->where('driver_id',$drid)->where('booked_date',$dt)->latest()->get();
      $cnt=driver_salary::where('status',1)->where('driver_id',$drid)->where('ride_from',$dt)->first();
      return view('admin_ride.collection.DriverRidesList',['booking'=>$booking,'driver'=>$driver,'ride_fare'=>$ride_fare,'dt'=>$dt,'cnt'=>$cnt]);

    }


    public function all_collection()
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');


    $cnt=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->count();
     $ride_fare=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('fare');
    $tax=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('tax');
    $sr=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('service_charge');
    $sum=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('total_fare');

     $drsum=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('driver_fare');
    
     $adsum=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('admin_fare');
     $adrsum=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('admin_ride_fare');

  $sum1=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',1)->sum('paid_amount');
  $sum2=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',2)->sum('paid_amount');
  $sp=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('night_ride',1)->count();

  $div_amount=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('franchise_fare');
   
    //$bookings=ride_booking_history::where('franchise',$franchise)->where('status',6)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->oldest()->get();
           
           return view('admin_ride.collection.AllMonthlyCollection',['sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'ride_fare'=>$ride_fare,'tax'=>$tax,'sr'=>$sr,'cnt'=>$cnt,'div_amount'=>$div_amount,'drsum'=>$drsum,'adsum'=>$adsum,'adrsum'=>$adrsum]); 
 
    }

    public function all_collection_history(request $req)

    {
      $req->validate([
            'year1'=>'required',
            'month1'=>'required',
            
           
            ],
            [
              'year1.required' => 'This field is required',
              'month1.required' => 'This field is required',
            
              
            ]


          );

      $first_day= date($req->year1.'-'.$req->month1.'-01');
      $last_day  = date('Y-m-t',strtotime($first_day));

   $cnt=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->count();
     $ride_fare=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('fare');
    $tax=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('tax');
    $sr=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('service_charge');
    $sum=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('total_fare');

  $sum1=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',1)->sum('paid_amount');
  $sum2=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',2)->sum('paid_amount');
  $sp=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('night_ride',1)->count();

  $div_amount=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('franchise_fare');
   
           
    return view('admin_ride.collection.AllCollection',['sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'ride_fare'=>$ride_fare,'tax'=>$tax,'sr'=>$sr,'cnt'=>$cnt,'div_amount'=>$div_amount,'first_day'=>$first_day]); 
}





//////////////

public function offline_payments()
     
    {
      
        $bookings=ride_booking_history::where('status',6)->where('payment_type',2)->where('offline_pay_admin',0)->oldest()->get();
         return view('admin_ride.collection.OfflinePayments',['bookings'=>$bookings]);
    }

    public function offline_pay_approve(Request $req)
     
    {
       
      $bid=$req->bid;
     
     ride_booking_history::where('bid',$bid)->update([

      'offline_pay_admin'=>1,
      'offline_pay_admindt'=>date('Y-m-d'),

     ]);

     rides_booking::where('id',$bid)->update([

      'offline_pay_admin'=>1,
      'offline_pay_admindt'=>date('Y-m-d'),

     ]);

     $data['success']='success';
     echo json_encode($data);

    }





}
