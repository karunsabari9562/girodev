<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth,Cache;
use App\Models\driver_registration;
use Mail;
 use App\Mail\EnquiryMail;

class FrontEndController extends Controller
{

   public function index()
     
    {
       
      return view('frontend.index');
            
    }

    public function about()
     
    {
       
      return view('frontend.about');
            
    } 

    public function services()
     
    {
       
      return view('frontend.services');
            
    }

    public function contact()
     
    {
       
      return view('frontend.contact');
            
    } 
    public function terms()
     
    {
       
      return view('frontend.terms');
            
    } 
    public function privacy_policy()
     
    {
       
      return view('frontend.privacy_policy');
            
    } 
    public function refund_policy()
     
    {
       
      return view('frontend.refund_policy');
            
    }  


      public function driver_details($did)
     
    {
       $drid=decrypt($did); 
         $driver= driver_registration::select('name','driver_id','id','photo','mobile','status','approved_date','franchise','vehicle_type')->where('id',$drid)->first();
      return view('frontend.DriverDetails',['driver'=>$driver]);
            
    } 

     public function enquiry_mail(Request $req)
     
    {

    $details=[
            'name'=>$req->form_name,
            'mobile'=>$req->form_tel,
            'email'=>$req->form_email,
            'msg'=>$req->form_message,
            
        ];

        Mail::to('info@girokab.com')->send(new EnquiryMail($details));
        $data['success']='success';

      }

   
}
