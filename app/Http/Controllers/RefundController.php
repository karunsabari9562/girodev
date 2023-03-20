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
       
        

    
}
