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
use App\Models\franchise_salary;

class AdminRideController extends Controller
{
   public function driver_ride_history(request $req)
{
  $req->validate([
            'dfrom'=>'required',
            'dto'=>'required',
            'btype'=>'required',

           
            ],
            [
              'dfrom.required' => 'This field is required',
              'dto.required' => 'This field is required',
              'btype.required' => 'This field is required',
            ]


          );

 

 if($req->btype==2)
{

  
  $sum=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->sum('total_fare');

  $sum1=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('payment_type',1)->sum('paid_amount');
  $sum2=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('payment_type',2)->sum('paid_amount');
  $sp=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('night_ride',1)->count();
  $bookings=ride_booking_history::where('driver_id',$req->drid)->where('status',6)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','ASC')->get();

   $star1=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',1)->count();
  $star2=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',2)->count();
  $star3=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',3)->count();
  $star4=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',4)->count();
   $star5=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',5)->count();

  

   return view('admin_ride.rides.DriverCompletedRides',['bookings'=>$bookings,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'dfrom'=>$req->dfrom,'dto'=>$req->dto,'star1'=>$star1,'star2'=>$star2,'star3'=>$star3,'star4'=>$star4,'star5'=>$star5,'driver'=>$req->did]);
}

else if($req->btype==3)
{
  $type="Rejected";
   $bookings=unfinished_bookings::where('status',2)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','ASC')->get();
   return view('admin_ride.rides.DriverUnfinishedRide',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto,'driver'=>$req->did]);
}
else if($req->btype==4)
{
  $type="Cancelled";
   $bookings=unfinished_bookings::where('status',3)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','ASC')->get();
   return view('admin_ride.rides.DriverUnfinishedRide',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto,'driver'=>$req->did]);
}
else if($req->btype==5)
{
  $type="Timeout ";
   $bookings=unfinished_bookings::where('status',4)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','ASC')->get();
   return view('admin_ride.rides.DriverUnfinishedRide',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto,'driver'=>$req->did]);
}

   
}

public function rides_details($bookid)
     
    {
          $bid=decrypt($bookid);
         
           $bookings=ride_booking_history::where('bid',$bid)->first();
           
           return view('admin_ride.rides.RideDetails',['bookings'=>$bookings]); 
 
    }

public function ride_details($bookid)
     
    {
          $bid=decrypt($bookid);
         
           $bookings=ride_booking_history::where('id',$bid)->first();
           
           return view('admin_ride.rides.RideDetails',['bookings'=>$bookings]); 
 
    }

    public function completed_driver_rides($did)
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');
      $drid=decrypt($did);


  $sum=ride_booking_history::where('driver_id',$drid)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('total_fare');

  $sum1=ride_booking_history::where('driver_id',$drid)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',1)->sum('paid_amount');
  $sum2=ride_booking_history::where('driver_id',$drid)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',2)->sum('paid_amount');
  $sp=ride_booking_history::where('driver_id',$drid)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('night_ride',1)->count();

   $star1=ride_booking_history::where('driver_id',$drid)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',1)->count();
  $star2=ride_booking_history::where('driver_id',$drid)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',2)->count();
  $star3=ride_booking_history::where('driver_id',$drid)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',3)->count();
  $star4=ride_booking_history::where('driver_id',$drid)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',4)->count();
   $star5=ride_booking_history::where('driver_id',$drid)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',5)->count();

   
    $bookings=ride_booking_history::where('driver_id',$drid)->where('status',6)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->latest()->get();
    $driver=driver_registration::select('driver_id','name')->where('id',$drid)->first();
           
    return view('admin_ride.rides.DrMonthlyCompletedRides',['bookings'=>$bookings,'driver'=>$driver,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'star1'=>$star1,'star2'=>$star2,'star3'=>$star3,'star4'=>$star4,'star5'=>$star5]); 
 
    }

      public function rejected_driver_rides($did)
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');
  $drid=decrypt($did);
     
         
        $driver=driver_registration::select('driver_id','name')->where('id',$drid)->first();     
    $bookings=unfinished_bookings::where('driver_id',$drid)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',2)->get();
           
           return view('admin_ride.rides.DrMonthlyRejectedRides',['bookings'=>$bookings,'driver'=>$driver]); 
 
    }

  
     public function timeout_driver_rides($did)
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');
  $drid=decrypt($did);
       $driver=driver_registration::select('driver_id','name')->where('id',$drid)->first();
    $bookings=unfinished_bookings::where('driver_id',$drid)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',4)->get();
           
           return view('admin_ride.rides.DrMonthlyTimeoutRides',['bookings'=>$bookings,'driver'=>$driver]); 
 
    }


    //////////////////////////////////////////////


    public function ride_history(request $req)
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

  
  


 if($req->btype==2)
{

  
  $sum=ride_booking_history::where('franchise',$req->fid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->sum('total_fare');

  $sum1=ride_booking_history::where('franchise',$req->fid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('payment_type',1)->sum('paid_amount');
  $sum2=ride_booking_history::where('franchise',$req->fid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('payment_type',2)->sum('paid_amount');
  $sp=ride_booking_history::where('franchise',$req->fid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('night_ride',1)->count();
  $bookings=ride_booking_history::where('franchise',$req->fid)->where('status',6)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','ASC')->get();

   $star1=ride_booking_history::where('franchise',$req->fid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',1)->count();
  $star2=ride_booking_history::where('franchise',$req->fid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',2)->count();
  $star3=ride_booking_history::where('franchise',$req->fid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',3)->count();
  $star4=ride_booking_history::where('franchise',$req->fid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',4)->count();
   $star5=ride_booking_history::where('franchise',$req->fid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',5)->count();


   return view('admin_ride.rides.CompletedRideHistory',['bookings'=>$bookings,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'dfrom'=>$req->dfrom,'dto'=>$req->dto,'star1'=>$star1,'star2'=>$star2,'star3'=>$star3,'star4'=>$star4,'star5'=>$star5]);
}

else if($req->btype==3)
{
  $type="Rejected";
   $bookings=unfinished_bookings::where('franchise',$req->fid)->where('status',2)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','ASC')->get();
   return view('admin_ride.rides.UnfinishedRideHistory',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto]);
}
else if($req->btype==4)
{
  $type="Cancelled";
   $bookings=unfinished_bookings::where('franchise',$req->fid)->where('status',3)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','ASC')->get();
   return view('admin_ride.rides.UnfinishedRideHistory',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto]);
}
else if($req->btype==5)
{
  $type="Timeout ";
   $bookings=unfinished_bookings::where('franchise',$req->fid)->where('status',4)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','ASC')->get();
   return view('admin_ride.rides.UnfinishedRideHistory',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto]);
}

   
}



public function completed_mrides($fid)
     
    {
             $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');
 $franchise=decrypt($fid);

  $sum=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('total_fare');

  $sum1=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',1)->sum('paid_amount');
  $sum2=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',2)->sum('paid_amount');
  $sp=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('night_ride',1)->count();

   $star1=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',1)->count();
  $star2=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',2)->count();
  $star3=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',3)->count();
  $star4=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',4)->count();
   $star5=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',5)->count();

   
    $bookings=ride_booking_history::where('franchise',$franchise)->where('status',6)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->latest()->get();
           
           return view('admin_ride.rides.MonthlyCompletedRides',['bookings'=>$bookings,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'star1'=>$star1,'star2'=>$star2,'star3'=>$star3,'star4'=>$star4,'star5'=>$star5]); 
 
    }

      public function rejected_mrides($fid)
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');

      $franchise=$fid;
         
    $bookings=unfinished_bookings::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',2)->get();
           
           return view('admin_ride.rides.MonthlyRejectedRides',['bookings'=>$bookings]); 
 
    }

    public function cancelled_mrides($fid)
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');

      $franchise=$fid;
        
// $time=unfinished_bookings::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',4)->count();    
    $bookings=unfinished_bookings::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',3)->get();
           
           return view('admin_ride.rides.MonthlyCancelledRides',['bookings'=>$bookings]); 
 
    }
     public function timeout_mrides($fid)
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');

      $franchise=$fid;
   
    $bookings=unfinished_bookings::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',4)->get();
           
           return view('admin_ride.rides.MonthlyTimeoutRides',['bookings'=>$bookings]); 
 
    }


    public function division_collection_history(request $req)

    {
      $req->validate([
            'year'=>'required',
            'month'=>'required',
            'frid'=>'required',
            
           
            ],
            [
              'year.required' => 'This field is required',
              'month.required' => 'This field is required',
              'frid.required' => 'This field is required',
              
            ]


          );

      $first_day= date($req->year.'-'.$req->month.'-01');
      $last_day  = date('Y-m-t',strtotime($first_day));


  $franchise=$req->frid;
  

   $cnt=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->count();
     $ride_fare=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('fare');
    $tax=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('tax');
    $sr=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('service_charge');
    $sum=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('total_fare');

  $sum1=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',1)->sum('paid_amount');
  $sum2=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',2)->sum('paid_amount');
  $sp=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('night_ride',1)->count();

  $div_amount=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('franchise_fare');

$frdt=franchise_detail::select('franchise_name','id')->where('id',$franchise)->first();
$pay=franchise_salary::where('status',1)->where('franchise',$franchise)->where('ride_from',$first_day)->first();
   
           
    return view('admin_ride.rides.AllMonthlyCollection',['sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'ride_fare'=>$ride_fare,'tax'=>$tax,'sr'=>$sr,'cnt'=>$cnt,'div_amount'=>$div_amount,'first_day'=>$first_day,'franchise'=>$req->frid,'frdt'=>$frdt,'pay'=>$pay]); 
}


public function completed_colrides($fdt,$fid)
     
    {
      $first_day= $fdt;
      $last_day  = date('Y-m-t',strtotime($first_day));

      $franchise=decrypt($fid);

  $sum=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('total_fare');

  $sum1=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',1)->sum('paid_amount');
  $sum2=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',2)->sum('paid_amount');
  $sp=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('night_ride',1)->count();

   $star1=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',1)->count();
  $star2=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',2)->count();
  $star3=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',3)->count();
  $star4=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',4)->count();
   $star5=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('star_rating',5)->count();

   
    $bookings=ride_booking_history::where('franchise',$franchise)->where('status',6)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->latest()->get();
           
           return view('admin_ride.rides.MonthlyCompletedRideslist',['bookings'=>$bookings,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'star1'=>$star1,'star2'=>$star2,'star3'=>$star3,'star4'=>$star4,'star5'=>$star5,'first_day'=>$first_day]); 
 
    }





}
