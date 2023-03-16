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
use App\Models\driver_salary;
use App\Models\franchise_salary;

class FranchiseSalaryController extends Controller
{
      public function drivers_payment(request $req)

    {
      $req->validate([
            'dfrom'=>'required',
             'dto'=>'required',
             //'drid'=>'required',
           
            ],
            [
              'dfrom.required' => 'This field is required',
               'dto.required' => 'This field is required',
               //'drid.required' => 'This field is required',
            ]


          );

 $driver=driver_registration::select('driver_id')->where('id',$req->drid)->first();
      $pay=driver_salary::where('status',1)->where('driver_id',$req->drid)->where('submitted_at','>=',$req->dfrom)->where('submitted_at','<=',$req->dto)->orderBy('submitted_at','ASC')->get();
           return view('franchise_ride.salary.DriversCollections',['pay'=>$pay,'driver'=>$driver]);

}

public function driver_rides_list($pid)
     
    {

           $payid=decrypt($pid);
           $paydt=driver_salary::where('id',$payid)->first();

          $ride_fare=ride_booking_history::where('driver_id',$paydt->driver_id)->where('booked_date',$paydt->ride_from)->where('status',6)->sum('driver_fare');

          $dt=$paydt->ride_from;

        $driver=driver_registration::select('name','mobile','driver_id','franchise','id')->where('id',$paydt->driver_id)->first();

      $booking=ride_booking_history::select('driver_id','from_location','to_location','distance','fare','id','driver_fare','driver_percent','booking_id')->where('status',6)->where('driver_id',$paydt->driver_id)->where('booked_date',$paydt->ride_from)->oldest()->get();
      return view('franchise_ride.salary.DriverRidesList',['booking'=>$booking,'driver'=>$driver,'ride_fare'=>$ride_fare,'dt'=>$dt]);

    }

    public function payments()
     
    {
        
        $franchise=Auth::guard('franchise')->user()->id;
        $pay=franchise_salary::where('franchise',$franchise)->where('status',1)->orderBy('ride_from','DESC')->get();
        return view('franchise_ride.salary.Salary',['pay'=>$pay]);

    }



}
