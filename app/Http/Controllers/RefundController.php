<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB,Auth,Cache;
use App\Models\unfinished_bookings;
use App\Models\driver_registration;
use App\Models\refund;

class RefundController extends Controller
{
    public function refund_requests()
     
    {
      
         $bookings=unfinished_bookings::where('payment_status',1)->where('refund_status',0)->latest()->get();
         return view('admin_ride.refunds.PendingRequests',['bookings'=>$bookings]); 
        }


     public function refund_ride_details($bookid)
     
    {
          $bid=decrypt($bookid);
         
           $bookings=unfinished_bookings::where('bid',$bid)->first();
           
           return view('admin_ride.refunds.RideDetails',['bookings'=>$bookings]); 
 
    }  


    public function reject_refund(Request $req)
     
    {
          $bid=$req->bid;
         
        unfinished_bookings::where('id',$bid)->update([

        	'refund_status'=>2,


        ]);

        $data['success']="success";

        echo json_encode($data);
 
    }

    public function rejected_refunds()
     
    {
      
         $bookings=unfinished_bookings::where('payment_status',1)->where('refund_status',2)->latest()->get();
         return view('admin_ride.refunds.RejectedRefunds',['bookings'=>$bookings]); 
        }


    public function restore_refund(Request $req)
     
    {
          $bid=$req->bid;
         
        unfinished_bookings::where('id',$bid)->update([

        	'refund_status'=>0,


        ]);

        $data['success']="success";

        echo json_encode($data);
 
    }    
   
    
     public function approve_refund($bookid)
     
    {
          $bid=decrypt($bookid);
         
          $bookings=unfinished_bookings::where('bid',$bid)->first();
           
          return view('admin_ride.refunds.ApproveRefund',['b'=>$bookings]); 
 
    }  


    public function pay_refund(Request $req)
     
    {
      
         
        refund::create([

        	'bid'=>$req->bid,
        	'customer_id'=>$req->cid,
        	'driver_id'=>$req->did,
        	'booked_date'=>$req->rdate,
        	'payment_date'=>$req->pdt,
        	'paid_amount'=>$req->pamount,
        	'reference_id'=>$req->refid,
        	'remarks'=>$req->remark,
            'status'=>0,


        ]);


 unfinished_bookings::where('id',$req->uid)->update([

        	'refund_status'=>1,


        ]);

        $data['success']="success";

        echo json_encode($data);
 
    }   


    public function completed_refunds()
     
    {
      
         //$bookings=unfinished_bookings::where('payment_status',1)->where('refund_status',2)->latest()->get();
         return view('admin_ride.refunds.CompletedtedRefunds'); 
        }



    public function all_refund_history(request $req)

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

   // $cnt=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->count();
   //   $ride_fare=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('fare');
   //  $tax=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('tax');
   //  $sr=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('service_charge');
   //  $sum=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('total_fare');

  // $sum1=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',1)->sum('paid_amount');
  // $sum2=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('payment_type',2)->sum('paid_amount');
  // $sp=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->where('night_ride',1)->count();

  // $div_amount=ride_booking_history::where('booked_date','>=',$first_day)->where('booked_date','<=',$last_day)->where('status',6)->sum('franchise_fare');
  
  $refund=refund::where('payment_date','>=',$first_day)->where('payment_date','<=',$last_day)->where('status',0)->latest()->get();
   
           
    return view('admin_ride.refunds.CompletedtedRefundsList',['refund'=>$refund,'first_day'=>$first_day]); 
}

     
       
        

    
}
