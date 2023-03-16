<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\customer_registration;
use App\Models\disability_document;
use App\Models\ride_booking_history;
use App\Models\unfinished_bookings;

class CustomerBasicController extends Controller
{
     public function customer_area()
    {
        $nct=customer_registration::where('status',1)->where('disability_status',0)->count();
        $dct=customer_registration::where('status',1)->where('disability_status',1)->count();
        $bct=customer_registration::where('status',2)->count();
        //$driver=driver_registration::where('status',0)->where('profile_submission',1)->where('admin_approval_status',1)->orderBy('id','ASC')->get();
        return view('customers.customer_area.CustomerArea',['nct'=>$nct,'dct'=>$dct,'bct'=>$bct]);
      
    }
     public function normal_customers()
    {
       
        $customers=customer_registration::where('status',1)->where('disability_status',0)->latest()->get();
        return view('customers.customer_area.NormalCustomers',['customers'=>$customers]);
      
    }
     public function disabled_customers()
    {
       $customers=customer_registration::where('status',1)->where('disability_status',1)->latest()->get();
   	   return view('customers.customer_area.DisabledCustomers',['customers'=>$customers]);
      
    }
     public function blocked_customers()
    {
       $customers=customer_registration::where('status',2)->latest()->get();
        return view('customers.customer_area.BlockedCustomers',['customers'=>$customers]);
      
    }

    public function disability_certificates()
    {
       $docs=disability_document::where('document_approval_status',0)->oldest()->get();
        return view('customers.disability_docs.DisabilityDocApproval',['docs'=>$docs]);
      
    }


       public function reject_disability_doc(Request $req)
    {
        $docid=$req->docid;


        disability_document::where('id',$docid)->update([
          'document_approval_status'=>2,
           'document_upload_status'=>0,
            'document_rejection_reason'=>$req->reason,
            'rejected_date'=>date('Y-m-d'),
            ]);

            $data['success']="success";
            echo json_encode($data);

      }

      public function rejected_disability_certificates()
    {
       $docs=disability_document::where('document_approval_status',2)->latest()->get();
        return view('customers.disability_docs.RejectedDisabilityDoc',['docs'=>$docs]);
      
    }


       public function restore_disability_doc(Request $req)
    {
        $docid=$req->docid;


        disability_document::where('id',$docid)->update([
          'document_approval_status'=>0,
          'document_upload_status'=>1,
            'document_rejection_reason'=>'',
            'rejected_date'=>Null,
            ]);

            $data['success']="success";
            echo json_encode($data);

      }

       public function approve_disability_doc(Request $req)
    {
        $docid=$req->docid;


        disability_document::where('id',$docid)->update([
          'document_approval_status'=>1,
            'document_rejection_reason'=>'',
            'rejected_date'=>Null,
            ]);

        $doc=disability_document::select('customer_id','document')->where('id',$docid)->first();

        customer_registration::where('id',$doc->customer_id)->update([

        	'disability_status'=>1,
        	'disability_document'=>$doc->document

        	  ]);

            $data['success']="success";
            echo json_encode($data);

      }


       public function customer_profile($did)
    {
      $drid=decrypt($did);
      $customer_det=customer_registration::where('id',$drid)->first();
       
          return view('customers.customer_area.CustomerProfile',['customer_det'=>$customer_det]);  
       
      
    }  


       public function block_customer(Request $req)
    {
        
        customer_registration::where('id',$req->custid)->update([

          'status'=>2,
          'block_reason'=>$req->reason

            ]);

            $data['success']="success";
            echo json_encode($data);

      }

        public function activate_customer(Request $req)
    {
        
        customer_registration::where('id',$req->custid)->update([

          'status'=>1,
          'block_reason'=>''

            ]);

            $data['success']="success";
            echo json_encode($data);

      }

      public function customer_rides_history(request $req)
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

  
  $sum=ride_booking_history::where('customer_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->sum('total_fare');

  $sum1=ride_booking_history::where('customer_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('payment_type',1)->sum('paid_amount');
  $sum2=ride_booking_history::where('customer_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('payment_type',2)->sum('paid_amount');
  $sp=ride_booking_history::where('customer_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('night_ride',1)->count();
  $bookings=ride_booking_history::where('customer_id',$req->drid)->where('status',6)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','ASC')->get();

   $star1=ride_booking_history::where('customer_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',1)->count();
  $star2=ride_booking_history::where('customer_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',2)->count();
  $star3=ride_booking_history::where('customer_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',3)->count();
  $star4=ride_booking_history::where('customer_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',4)->count();
   $star5=ride_booking_history::where('customer_id',$req->drid)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->where('status',6)->where('star_rating',5)->count();

  

   return view('customers.customer_area.CompletedRides',['bookings'=>$bookings,'sum'=>$sum,'sum1'=>$sum1,'sum2'=>$sum2,'sp'=>$sp,'dfrom'=>$req->dfrom,'dto'=>$req->dto,'star1'=>$star1,'star2'=>$star2,'star3'=>$star3,'star4'=>$star4,'star5'=>$star5,'driver'=>$req->did]);
}

else if($req->btype==3)
{
  $type="Rejected";
   $bookings=unfinished_bookings::where('status',2)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','ASC')->get();
   return view('customers.customer_area.UnfinishedRide',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto,'driver'=>$req->did]);
}
else if($req->btype==4)
{
  $type="Cancelled";
   $bookings=unfinished_bookings::where('status',3)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','ASC')->get();
   return view('customers.customer_area.UnfinishedRide',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto,'driver'=>$req->did]);
}
else if($req->btype==5)
{
  $type="Timeout ";
   $bookings=unfinished_bookings::where('status',4)->where('booked_date','>=',$req->dfrom)->where('booked_date','<=',$req->dto)->orderBy('booked_at','ASC')->get();
   return view('customers.customer_area.UnfinishedRide',['bookings'=>$bookings,'type'=>$type,'dfrom'=>$req->dfrom,'dto'=>$req->dto,'driver'=>$req->did]);
}

   
}


}
