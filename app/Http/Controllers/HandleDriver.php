<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth,Cache;
use App\Models\state;
use App\Models\district;
use App\Models\franchise_detail;
use App\Models\franchise_renewal;
use App\Models\driver_registration;
use App\Models\driver_primary_document;
use App\Models\driver_secondary_document;
use App\Models\driver_profile_rejection;
use App\Models\active_driver;
use App\Models\driver_docs_reupload;
use App\Models\driver_document_history;
use App\Models\driver_renewal_history;
use App\Models\advertisement;
use App\Models\driver_deactivate_history;
use App\Models\driver_reactivate_request;

class HandleDriver extends Controller
{
    

    public function driver_area()
    {
       
       $driver=driver_registration::select('id','driver_id','photo','name')->where('status',1)->orderBy('driver_id','DESC')->limit(4)->get();
       
        return view('handledriver.FranchiseDriverArea',['driver'=>$driver]);
     } 


     public function active_drivers()
    {
        

       $driver=driver_registration::select('id','driver_id','franchise','name','mobile','approved_date','valid_to')->where('status',1)->orderBy('driver_id','DESC')->get();

        return view('handledriver.ActiveDrivers',['driver'=>$driver]);
       
    } 

     public function expired_drivers()
     
    {
        $dt=date('Y-m-d');
         
        $driver=driver_registration::select('id','driver_id','franchise','name','mobile','valid_to')->where('status',1)->where('valid_to','<',$dt)->orderBy('valid_to','ASC')->get();
          
        return view('handledriver.ExpiredDrivers',['driver'=>$driver]);

    }

      public function blocked_drivers()
     
    {
         
        $driver=driver_registration::select('id','driver_id','franchise','name','mobile','account_reject_reason','account_rejected_date',)->where('status',3)->orderBy('driver_id','ASC')->get();
        
        return view('handledriver.BlockedDrivers',['driver'=>$driver]);

    }

    public function deactivated_drivers()
     
    {
      
        $driver=driver_registration::select('id','driver_id','franchise','name','mobile','status','account_rejected_date','account_reject_reason')->where('status',4)->orderBy('driver_id','ASC')->get();
     
        return view('handledriver.DeactivatedDrivers',['driver'=>$driver]);
       
    }

      public function self_deactivated_drivers()
     
    {
      
        $driver=driver_registration::select('id','driver_id','franchise','name','mobile','status','account_rejected_date','account_reject_reason')->where('status',5)->orderBy('driver_id','ASC')->get();
        
        return view('handledriver.SelfDeactivatedDrivers',['driver'=>$driver]);
       
    }

     public function admin_deactivated_drivers()
     
    {
      
        $driver=driver_registration::select('id','driver_id','franchise','name','mobile','status','account_rejected_date','account_reject_reason')->where('status',6)->orderBy('driver_id','ASC')->get();
          
        return view('handledriver.AdminDeactivatedDrivers',['driver'=>$driver]);
       
    }

     public function reactivation_drivers_list()
     
    {
         
        $driver=driver_registration::select('id','driver_id','franchise','name','mobile','status')->where('status',7)->orderBy('driver_id','ASC')->get();
        
        return view('handledriver.ReactivationDriversList',['driver'=>$driver]);
       
    }




     public function rc_expiring_drivers()

    {
      $dt=date('Y-m-d');
      $time = strtotime(date('Y-m-d'));
      $final = date("Y-m-d", strtotime("+1 month", $time));
      
    
       $driver=driver_primary_document::where('rc_expiry','>=',$dt)->where('rc_expiry','<=',$final)->orderBy('rc_expiry','ASC')->get();
        
        return view('handledriver.RCExpiringDrivers',['driver'=>$driver]);
       
    } 

     public function license_expiring_drivers()
     
    {
      $dt=date('Y-m-d');
      $time = strtotime(date('Y-m-d'));
      $final = date("Y-m-d", strtotime("+1 month", $time));

       $driver=driver_primary_document::where('license_expiry','>=',$dt)->where('rc_expiry','<=',$final)->orderBy('license_expiry','ASC')->get();
       
        return view('handledriver.LicenseExpiringDrivers',['driver'=>$driver]);
       
    } 

     public function insurance_expiring_drivers()
     
    {
      $dt=date('Y-m-d');
      $time = strtotime(date('Y-m-d'));
      $final = date("Y-m-d", strtotime("+1 month", $time));

       $driver=driver_primary_document::where('insurance_expiry','>=',$dt)->where('insurance_expiry','<=',$final)->orderBy('insurance_expiry','ASC')->get();
        
        return view('handledriver.InsuranceExpiringDrivers',['driver'=>$driver]);
       
    } 

     public function pollution_expiring_drivers()
     
    {
      $dt=date('Y-m-d');
      $time = strtotime(date('Y-m-d'));
      $final = date("Y-m-d", strtotime("+1 month", $time));
      $driver=driver_secondary_document::where('pollution_expiry','>=',$dt)->where('pollution_expiry','<=',$final)->orderBy('pollution_expiry','ASC')->get();
     
        return view('handledriver.PollutionExpiringDrivers',['driver'=>$driver]);
       
    } 

    public function permit_expiring_drivers()
     
    {
      $dt=date('Y-m-d');
      $time = strtotime(date('Y-m-d'));
      $final = date("Y-m-d", strtotime("+1 month", $time));
   
       $driver=driver_secondary_document::where('permit_expiry','>=',$dt)->where('permit_expiry','<=',$final)->orderBy('permit_expiry','ASC')->get();
        
        return view('handledriver.PermitExpiringDrivers',['driver'=>$driver]);
      
    } 

    //////////////

         public function rc_expired_drivers()

    {
      $dt=date('Y-m-d');

       $driver=driver_primary_document::where('rc_expiry','<',$dt)->orderBy('rc_expiry','ASC')->get();
      
        return view('handledriver.RCExpiredDrivers',['driver'=>$driver]);
      
    } 

     public function license_expired_drivers()
     
    {
      $dt=date('Y-m-d');

       $driver=driver_primary_document::where('license_expiry','<',$dt)->orderBy('license_expiry','ASC')->get();
               
        return view('handledriver.LicenseExpiredDrivers',['driver'=>$driver]);
       
    } 

     public function insurance_expired_drivers()
     
    {
      $dt=date('Y-m-d');

       $driver=driver_primary_document::where('insurance_expiry','<',$dt)->orderBy('insurance_expiry','ASC')->get();
              
        return view('handledriver.InsuranceExpiredDrivers',['driver'=>$driver]);
       
    } 

     public function pollution_expired_drivers()
     
    {
      $dt=date('Y-m-d'); 

       $driver=driver_secondary_document::where('pollution_expiry','<',$dt)->orderBy('pollution_expiry','ASC')->get();
               
        return view('handledriver.PollutionExpiredDrivers',['driver'=>$driver]);
       
    } 

    public function permit_expired_drivers()
     
    {
      $dt=date('Y-m-d'); 
 
       $driver=driver_secondary_document::where('pollution_expiry','<',$dt)->orderBy('pollution_expiry','ASC')->get();
               
        return view('handledriver.PermitExpiredDrivers',['driver'=>$driver]);
       
    } 



    
    
}
