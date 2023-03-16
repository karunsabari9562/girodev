<?php

namespace App\Http\Controllers\rides;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB,Auth,Cache;
use App\Models\ride_booking_history;
use App\Models\driver_registration;
use App\Models\franchise_detail;
use App\Models\driver_salary;

class DriverSalaryController extends Controller
{
     public function driver_salary_pay(Request $req)
     
    {
     

      driver_salary::create([

      	'driver_id'=>$req->drid,
        'driver_code'=>$req->drid,
      	'franchise'=>$req->frid,
      	'ride_from'=>$req->ride_dt,
      	'ride_to'=>$req->ride_dt,
      	'total_ride_fare'=>$req->tot_amount,
      	'paid_amount'=>$req->pamount,
      	'payment_date'=>date('Y-m-d H:i:s'),
      	'reference_id'=>$req->refid,
      	'remarks'=>$req->remark,
        'status'=>1,
        'submitted_at'=>date('Y-m-d'),

      ]);

      $data['success']="success";

      echo json_encode($data);
    

    }

    public function payments()
     
    {
      
    $franchise=franchise_detail::select('id','franchise_name')->orderBy('franchise_name','ASC')->get();

      return view('admin_ride.salary.Payments',['franchise'=>$franchise]); 
    }




    public function driver_payments(request $req)

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

 
      $pay=driver_salary::where('status',1)->where('submitted_at','>=',$req->dfrom)->where('submitted_at','<=',$req->dto)->orderBy('submitted_at','ASC')->get();
           return view('admin_ride.salary.DriverCollection',['pay'=>$pay]);

}

public function driver_rides_list($pid)
     
    {

           $payid=decrypt($pid);
           $paydt=driver_salary::where('id',$payid)->first();

          $ride_fare=ride_booking_history::where('driver_id',$paydt->driver_id)->where('booked_date',$paydt->ride_from)->where('status',6)->sum('driver_fare');

          $dt=$paydt->ride_from;

        $driver=driver_registration::select('name','mobile','driver_id','franchise','id')->where('id',$paydt->driver_id)->first();

      $booking=ride_booking_history::select('driver_id','from_location','to_location','distance','fare','id','driver_fare','driver_percent','booking_id')->where('status',6)->where('driver_id',$paydt->driver_id)->where('booked_date',$paydt->ride_from)->oldest()->get();
      return view('admin_ride.salary.DriverRidesList',['booking'=>$booking,'driver'=>$driver,'ride_fare'=>$ride_fare,'dt'=>$dt]);

    }



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
           return view('admin_ride.salary.DriversCollections',['pay'=>$pay,'driver'=>$driver]);

}








}
