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

class FranchiseRideController extends Controller
{
    
    public function online_drivers()
     
    {
        
        $franchise=Auth::guard('franchise')->user()->id;
        $driver=active_driver::where('franchise',$franchise)->where('status',1)->where('availability_status',1)->orderBy('driver_id','ASC')->get();
        return view('franchise.OnlineDrivers',['driver'=>$driver]);

    }

    public function offline_drivers()
     
    {
     
        $franchise=Auth::guard('franchise')->user()->id;
        $driver=active_driver::where('franchise',$franchise)->where('status',1)->where('availability_status',0)->orderBy('driver_id','ASC')->get();
        return view('franchise.OfflineDrivers',['driver'=>$driver]);

    }

     public function todays_rides($type)
     
    {
           $dt=date('Y-m-d');
        $franchise=Auth::guard('franchise')->user()->id;
        if($type=='All')
        {
            
           $bookings=rides_booking::where('franchise',$franchise)->where('booked_date',$dt)->latest()->get();
           $cnt=rides_booking::where('franchise',$franchise)->where('booked_date',$dt)->where('status',6)->count();
           $cnt1=rides_booking::where('franchise',$franchise)
           ->where('booked_date',$dt)
           ->where(function($q) {
              $q->where('status', 1)
              ->orWhere('status', 5);
          })
          
           ->count();

           $cnt2=rides_booking::where('franchise',$franchise)
           ->where('booked_date',$dt)
           ->where(function($q) {
              $q->where('status', 2)
              ->orWhere('status', 3);
          })

           ->count();

           $cnt3=rides_booking::where('franchise',$franchise)->where('booked_date',$dt)->where('status',4)->count();

           $sum=rides_booking::where('franchise',$franchise)->where('booked_date',$dt)->where('status',6)->sum('total_fare');
           $sum1=rides_booking::where('franchise',$franchise)->where('booked_date',$dt)->where('status',6)->where('payment_type',1)->sum('paid_amount');
           $sum2=rides_booking::where('franchise',$franchise)->where('booked_date',$dt)->where('status',6)->where('payment_type',2)->sum('paid_amount');
           $sp=rides_booking::where('franchise',$franchise)->where('booked_date',$dt)->where('status',6)->where('night_ride',1)->count();

           return view('franchise_ride.TodaysAllRides',['bookings'=>$bookings,'cnt'=>$cnt,'cnt1'=>$cnt1,'cnt2'=>$cnt2,'cnt3'=>$cnt3,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp]); 
        }
        if($type=='Completed')
        {
            $btype="Completed Rides";
           $bookings=rides_booking::where('franchise',$franchise)->where('booked_date',$dt)->where('status',6)->latest()->get();
           return view('franchise_ride.TodaysRides',['bookings'=>$bookings,'btype'=>$btype]); 
        }
        if($type=='Running')
        {
            $btype="Running Rides";
           $bookings=rides_booking::where('franchise',$franchise)
           ->where('booked_date',$dt)
           ->where(function($q) {
              $q->where('status', 1)
              ->orWhere('status', 5);
          })

           ->latest()->get();
           return view('franchise_ride.TodaysRides',['bookings'=>$bookings,'btype'=>$btype]); 
        }
        if($type=='Unfinished')
        {
            $btype="Unfinished Rides";
           $bookings=rides_booking::where('franchise',$franchise)
           ->where('booked_date',$dt)
           ->where(function($q) {
              $q->where('status', 2)
              ->orwhere('status', 3)
              ->orWhere('status', 4);
          })
        
           ->latest()
           ->get();
           return view('franchise_ride.TodaysRide',['bookings'=>$bookings,'btype'=>$btype]); 
        }
        

    }

     public function all_bookings_filter()
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');

      $franchise=Auth::guard('franchise')->user()->id;

 $com=ride_booking_history::where('franchise',$franchise)->where('status',6)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->count();

$rej=unfinished_bookings::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',2)->count();
$can=unfinished_bookings::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',3)->count();
$time=unfinished_bookings::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',4)->count();


  return view('franchise_ride.BookingsFilter',['com'=>$com,'rej'=>$rej,'can'=>$can,'time'=>$time]); 
    }

   
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

  $franchise=Auth::guard('franchise')->user()->id;
  


 if($req->btype==2)
{

  
  $sum=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->sum('total_fare');

  $sum1=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('payment_type',1)->sum('paid_amount');
  $sum2=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('payment_type',2)->sum('paid_amount');
  $sp=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('night_ride',1)->count();
  $bookings=ride_booking_history::where('franchise',$franchise)->where('status',6)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','DESC')->get();

   $star1=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',1)->count();
  $star2=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',2)->count();
  $star3=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',3)->count();
  $star4=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',4)->count();
   $star5=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',5)->count();


   return view('franchise_ride.CompletedRideHistory',['bookings'=>$bookings,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'dfrom'=>$req->dfrom,'dto'=>$req->dto,'star1'=>$star1,'star2'=>$star2,'star3'=>$star3,'star4'=>$star4,'star5'=>$star5]);
}

else if($req->btype==3)
{
  $type="Rejected";
   $bookings=unfinished_bookings::where('franchise',$franchise)->where('status',2)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','DESC')->get();
   return view('franchise_ride.UnfinishedRideHistory',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto]);
}
else if($req->btype==4)
{
  $type="Cancelled";
   $bookings=unfinished_bookings::where('franchise',$franchise)->where('status',3)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','DESC')->get();
   return view('franchise_ride.UnfinishedRideHistory',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto]);
}
else if($req->btype==5)
{
  $type="Timeout ";
   $bookings=unfinished_bookings::where('franchise',$franchise)->where('status',4)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','DESC')->get();
   return view('franchise_ride.UnfinishedRideHistory',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto]);
}

   
}


    public function ride_details($bookid)
     
    {
          $bid=decrypt($bookid);
          $franchise=Auth::guard('franchise')->user()->id;
    
           $bookings=ride_booking_history::where('franchise',$franchise)->where('id',$bid)->first();
           
           return view('franchise_ride.RideDetails',['bookings'=>$bookings]); 
 
    }

     public function rides_details($bookid)
     
    {
          $bid=decrypt($bookid);
          $franchise=Auth::guard('franchise')->user()->id;
    
           $bookings=rides_booking::where('franchise',$franchise)->where('id',$bid)->first();
           
           return view('franchise_ride.TodayRideDetails',['bookings'=>$bookings]); 
 
    }

  public function completed_mrides()
     
    {
             $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');

      $franchise=Auth::guard('franchise')->user()->id;

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
           
           return view('franchise_ride.MonthlyCompletedRides',['bookings'=>$bookings,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'star1'=>$star1,'star2'=>$star2,'star3'=>$star3,'star4'=>$star4,'star5'=>$star5]); 
 
    }

      public function rejected_mrides()
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');

      $franchise=Auth::guard('franchise')->user()->id;
         
    $bookings=unfinished_bookings::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',2)->get();
           
           return view('franchise_ride.MonthlyRejectedRides',['bookings'=>$bookings]); 
 
    }

    public function cancelled_mrides()
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');

      $franchise=Auth::guard('franchise')->user()->id;
        
// $time=unfinished_bookings::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',4)->count();    
    $bookings=unfinished_bookings::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',3)->get();
           
           return view('franchise_ride.MonthlyCancelledRides',['bookings'=>$bookings]); 
 
    }
     public function timeout_mrides()
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');

      $franchise=Auth::guard('franchise')->user()->id;
   
    $bookings=unfinished_bookings::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',4)->get();
           
           return view('franchise_ride.MonthlyTimeoutRides',['bookings'=>$bookings]); 
 
    }




     public function todays_collection()
     
    {
           $dt=date('Y-m-d');
        $franchise=Auth::guard('franchise')->user()->id;

          $cnt=rides_booking::where('franchise',$franchise)->where('booked_date',$dt)->where('status',6)->count();
          $ride_fare=rides_booking::where('franchise',$franchise)->where('booked_date',$dt)->where('status',6)->sum('fare');
          $tax=rides_booking::where('franchise',$franchise)->where('booked_date',$dt)->where('status',6)->sum('tax');
           $sr=rides_booking::where('franchise',$franchise)->where('booked_date',$dt)->where('status',6)->sum('service_charge');
           $sum=rides_booking::where('franchise',$franchise)->where('booked_date',$dt)->where('status',6)->sum('total_fare');

           $sum1=rides_booking::where('franchise',$franchise)->where('booked_date',$dt)->where('status',6)->where('payment_type',1)->sum('paid_amount');
           $sum2=rides_booking::where('franchise',$franchise)->where('booked_date',$dt)->where('status',6)->where('payment_type',2)->sum('paid_amount');
           $sp=rides_booking::where('franchise',$franchise)->where('booked_date',$dt)->where('status',6)->where('night_ride',1)->count();

      $driver=rides_booking::select('driver_id')->where('franchise',$franchise)->where('status',6)->where('booked_date',$dt)->groupBy('driver_id')->get();
           return view('franchise_ride.TodaysCollection',['driver'=>$driver,'cnt'=>$cnt,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'ride_fare'=>$ride_fare,'tax'=>$tax,'sr'=>$sr]);  

    }

       public function driver_rides($did)
     
    {

           $dt=date('Y-m-d');
           $drid=decrypt($did);
           $franchise=Auth::guard('franchise')->user()->id;
    $ride_fare=rides_booking::where('driver_id',$drid)->where('booked_date',$dt)->where('status',6)->sum('driver_fare');


  $driver=driver_registration::select('name','mobile','driver_id')->where('id',$drid)->first();

      $booking=rides_booking::select('driver_id','from_location','to_location','distance','fare','id','driver_fare','driver_percent','total_fare')->where('franchise',$franchise)->where('status',6)->where('driver_id',$drid)->where('booked_date',$dt)->latest()->get();
      return view('franchise_ride.DriverRides',['booking'=>$booking,'driver'=>$driver,'ride_fare'=>$ride_fare]);

    }

    public function all_collection_filter()
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');

      $franchise=Auth::guard('franchise')->user()->id;

 $com=ride_booking_history::where('franchise',$franchise)->where('status',6)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->count();

  return view('franchise_ride.CollectionFilter',['com'=>$com]); 
    }

    public function division_collection()
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');

      $franchise=Auth::guard('franchise')->user()->id;


    $cnt=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->count();
     $ride_fare=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('fare');
    $tax=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('tax');
    $sr=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('service_charge');
    $sum=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('total_fare');

  $sum1=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',1)->sum('paid_amount');
  $sum2=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',2)->sum('paid_amount');
  $sp=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('night_ride',1)->count();

  $div_amount=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('franchise_fare');
   
    //$bookings=ride_booking_history::where('franchise',$franchise)->where('status',6)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->oldest()->get();
           
           return view('franchise_ride.MonthlyCollection',['sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'ride_fare'=>$ride_fare,'tax'=>$tax,'sr'=>$sr,'cnt'=>$cnt,'div_amount'=>$div_amount]); 
 
    }


      

     public function driver_collection_history(request $req)

    {
      $req->validate([
            'dfrom'=>'required',
            'dto'=>'required',
            'drid'=>'required',
           
            ],
            [
              'dfrom.required' => 'This field is required',
              'dto.required' => 'This field is required',
              'drid.required' => 'This field is required',
            ]


          );

  $franchise=Auth::guard('franchise')->user()->id;
  

    // $cnt=ride_booking_history::where('driver_id',$req->drid)->where('booked_at','>=',$req->dfrom)->where('booked_at','<=',$req->dto)->where('status',6)->count();
  $driver=driver_registration::select('name','driver_id','mobile','id')->where('driver_id',$req->drid)->first();
  if($driver)
  {

    $sum=ride_booking_history::where('driver_id',$driver->id)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('status',6)->sum('driver_fare');

    $booking=ride_booking_history::select('driver_id','from_location','to_location','distance','fare','id','booked_at','driver_fare','driver_percent','booking_id','total_fare')->where('driver_id',$driver->id)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->latest()->get();


     return view('franchise_ride.DriverCollectionHistory',['booking'=>$booking,'sum'=>$sum,'dfrom'=>$req->dfrom,'dto'=>$req->dto,'driver'=>$driver]);
   
    }
    else
    {
       return redirect('/unauthorized-access');
    }
}



public function division_collection_history(request $req)

    {
      $req->validate([
            'year'=>'required',
            'month'=>'required',
            
           
            ],
            [
              'year.required' => 'This field is required',
              'month.required' => 'This field is required',
              
            ]


          );

      $first_day= date($req->year.'-'.$req->month.'-01');
      $last_day  = date('Y-m-t',strtotime($first_day));


  $franchise=Auth::guard('franchise')->user()->id;
  

   $cnt=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->count();
     $ride_fare=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('fare');
    $tax=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('tax');
    $sr=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('service_charge');
    $sum=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('total_fare');

  $sum1=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',1)->sum('paid_amount');
  $sum2=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',2)->sum('paid_amount');
  $sp=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('night_ride',1)->count();

  $div_amount=ride_booking_history::where('franchise',$franchise)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('franchise_fare');
   
           
    return view('franchise_ride.AllMonthlyCollection',['sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'ride_fare'=>$ride_fare,'tax'=>$tax,'sr'=>$sr,'cnt'=>$cnt,'div_amount'=>$div_amount,'first_day'=>$first_day]); 
}


public function completed_colrides($fdt)
     
    {
      $first_day= $fdt;
      $last_day  = date('Y-m-t',strtotime($first_day));

      $franchise=Auth::guard('franchise')->user()->id;

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
           
           return view('franchise_ride.MonthlyCompletedRideslist',['bookings'=>$bookings,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'star1'=>$star1,'star2'=>$star2,'star3'=>$star3,'star4'=>$star4,'star5'=>$star5,'first_day'=>$first_day]); 
 
    }

    public function offline_payments()
     
    {
      $franchise=Auth::guard('franchise')->user()->id;
        $bookings=ride_booking_history::where('franchise',$franchise)->where('status',6)->where('payment_type',2)->where('offline_pay_admin',0)->latest()->get();
         return view('franchise_ride.OfflinePayments',['bookings'=>$bookings]);
    }

    public function offline_pay_approve(Request $req)
     
    {
       $franchise=Auth::guard('franchise')->user()->id;
      $bid=$req->bid;
     
     ride_booking_history::where('bid',$bid)->update([

      'offline_pay_franchise'=>1,
      'offline_pay_franchisedt'=>date('Y-m-d'),

     ]);

     rides_booking::where('id',$bid)->update([

      'offline_pay_franchise'=>1,
      'offline_pay_franchisedt'=>date('Y-m-d'),

     ]);

     $data['success']='success';
     echo json_encode($data);

    }



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

  $franchise=Auth::guard('franchise')->user()->id;
  


 if($req->btype==2)
{

  
  $sum=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->sum('total_fare');

  $sum1=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('payment_type',1)->sum('paid_amount');
  $sum2=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('payment_type',2)->sum('paid_amount');
  $sp=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('night_ride',1)->count();
  $bookings=ride_booking_history::where('driver_id',$req->drid)->where('status',6)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','DESC')->get();

   $star1=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',1)->count();
  $star2=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',2)->count();
  $star3=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',3)->count();
  $star4=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',4)->count();
   $star5=ride_booking_history::where('driver_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',5)->count();

  

   return view('franchise_ride.DriverCompletedRides',['bookings'=>$bookings,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'dfrom'=>$req->dfrom,'dto'=>$req->dto,'star1'=>$star1,'star2'=>$star2,'star3'=>$star3,'star4'=>$star4,'star5'=>$star5,'driver'=>$req->did]);
}

else if($req->btype==3)
{
  $type="Rejected";
   $bookings=unfinished_bookings::where('franchise',$franchise)->where('status',2)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','DESC')->get();
   return view('franchise_ride.DriverUnfinishedRide',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto,'driver'=>$req->did]);
}
else if($req->btype==4)
{
  $type="Cancelled";
   $bookings=unfinished_bookings::where('franchise',$franchise)->where('status',3)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','DESC')->get();
   return view('franchise_ride.DriverUnfinishedRide',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto,'driver'=>$req->did]);
}
else if($req->btype==5)
{
  $type="Timeout ";
   $bookings=unfinished_bookings::where('franchise',$franchise)->where('status',4)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','DESC')->get();
   return view('franchise_ride.DriverUnfinishedRide',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto,'driver'=>$req->did]);
}

   
}


public function completed_driver_rides($did)
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');
      $drid=decrypt($did);

      $franchise=Auth::guard('franchise')->user()->id;

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
           
    return view('franchise_ride.DrMonthlyCompletedRides',['bookings'=>$bookings,'driver'=>$driver,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'star1'=>$star1,'star2'=>$star2,'star3'=>$star3,'star4'=>$star4,'star5'=>$star5]); 
 
    }

      public function rejected_driver_rides($did)
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');
  $drid=decrypt($did);
      $franchise=Auth::guard('franchise')->user()->id;
         
        $driver=driver_registration::select('driver_id','name')->where('id',$drid)->first();     
    $bookings=unfinished_bookings::where('driver_id',$drid)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',2)->get();
           
           return view('franchise_ride.DrMonthlyRejectedRides',['bookings'=>$bookings,'driver'=>$driver]); 
 
    }

  
     public function timeout_driver_rides($did)
     
    {
      $first_day= date('Y-m-01');
      $last_day  = date('Y-m-t');
  $drid=decrypt($did);
      $franchise=Auth::guard('franchise')->user()->id;
       $driver=driver_registration::select('driver_id','name')->where('id',$drid)->first();
    $bookings=unfinished_bookings::where('driver_id',$drid)->where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',4)->get();
           
           return view('franchise_ride.DrMonthlyTimeoutRides',['bookings'=>$bookings,'driver'=>$driver]); 
 
    }



}
