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
use App\Models\franchise_salary;

class AdminSalaryController extends Controller
{
     public function franchise_salary_pay(Request $req)
     
    {
     

      franchise_salary::create([

      	'franchise'=>$req->frid,
      	'ride_from'=>$req->ride_from,
      	'ride_to'=>date('Y-m-t',strtotime($req->ride_from)),
      	'total_service_charge'=>$req->tot,
      	'total_commission'=>$req->com,
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


      public function division_payments(request $req)

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
      $pay=franchise_salary::where('status',1)->where('franchise',$req->frid)->where('ride_from',$first_day)->first();
           return view('admin_ride.salary.DivisionCollection',['pay'=>$pay]);

}

}
