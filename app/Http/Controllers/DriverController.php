<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\vehicle_model;
use App\Models\driver_registration;
use App\Models\driver_primary_document;
use App\Models\driver_secondary_document;
use App\Models\driver_profile_rejection;
use App\Models\active_driver;
use App\Models\driver_docs_reupload;
use App\Models\driver_document_history;
use App\Models\driver_account_renewal;
use App\Models\driver_renewal_history;

class DriverController extends Controller
{

   // public function new_driverslist()
  //   {

  //        $driver=driver_registration::where('status',0)->where('profile_submission',1)->where('admin_approval_status',0)->orderBy('id','ASC')->get();
  //       return view('driver.NewDrivers',['driver'=>$driver]);
       
  //   }


  //      public function rejected_driverslist()
  //   {
        
  //        $driver=driver_registration::where('status',2)->orderBy('id','ASC')->get();
  //       return view('driver.RejectedDrivers',['driver'=>$driver]);
       
  //   }


    public function drivers_final_approval()
    {
        
        $driver=driver_registration::where('status',0)->where('profile_submission',1)->where('admin_approval_status',1)->orderBy('id','ASC')->get();
        return view('driver.DriverApprovalPending',['driver'=>$driver]);
       // print_r(bcrypt("admin"));
    }

      public function driver_final_approval($did)
    {
      $drid=decrypt($did);

       $driver_det=driver_registration::select('id','name','mobile','created_at','profile_approval_status','vehicle_approval_status','photo','blood_group','house_name','location','pin','district','state','vehicle_type','vehicle_category','added_by')->where('id',$drid)->first();
      $driver_rej=driver_profile_rejection::where('driver_id',$drid)->latest()->get();

        return view('driver.DriverApproval',['driver_det'=>$driver_det,'driver_rej'=>$driver_rej]);
 
    }



       public function reject_driver_profile(Request $req)
    {
        $drid=$req->driverid;


        driver_registration::where('id',$drid)->update([
          'admin_approval_status'=>3,
            'admin_reject_reason'=>$req->reason,
            'admin_rejected_date'=>date('Y-m-d')
            ]);

        driver_profile_rejection::create([
            'driver_id'=>$drid,
            'profile_type'=>7,
            'rejected_by'=>2,
            'rejection_reason'=>$req->reason,
            'status'=>1,
            'rejected_date'=>date('Y-m-d')
            ]);



            $data['success']="success";
            echo json_encode($data);

      }



      public function approve_driver_profile(Request $req)
    {
        $drid=$req->body;
$d_det=driver_registration::where('id',$drid)->first();
$cnt=active_driver::count();
if($cnt==0)
{
  $driver_num=1001;
}
else
{
  $dr_det=active_driver::orderBy('dr_code','DESC')->limit(1)->first();
  $driver_num=$dr_det->dr_code+1;
}
$validity = date("Y-m-d", strtotime(date('Y-m-d') . " + 365 day"));


           active_driver::updateOrCreate([
                    
                          'dr_id'   => $drid,
                    
                        ],
                        [ 

          'dr_id'=>$drid,
          'dr_code'=>$driver_num,
          'driver_id'=>"GK" . $driver_num,
          'vehicle_category'=>$d_det->vehicle_category,
          'vehicle_type'=>$d_det->vehicle_type,
          'vehicle_model'=>$d_det->vehicle_model,
          'franchise'=>$d_det->franchise,
          'availability_status'=>0,
          'offlined_at'=>date('Y-m-d H:i:s'),
          'status'=>1 
            
             ]);


        driver_registration::where('id',$drid)->update([
          'driver_id'=>"GK" . $driver_num,
          'admin_approval_status'=>2,
          'approved_date'=>date('Y-m-d'),
          'valid_from'=>date('Y-m-d'),
          'valid_to'=>$validity,
            'status'=>1
            ]);

          driver_primary_document::where('driver_id',$drid)->update([
            'status'=>1
            ]);
           driver_secondary_document::where('driver_id',$drid)->update([
            'status'=>1
            ]);
            $mob=driver_registration::select('mobile')->where('id',$drid)->first();
            $amt=driver_secondary_document::select('amount')->where('driver_id',$drid)->first();
            
            $response=Http::get('http://sms.firstdial.info/sendsms?uname=girokab&pwd=girokab2023&senderid=GIROKB&to='.$mob->mobile.'&msg=Dear User, Your registration process is successful. Your Driver ID for login is GK'.$driver_num.'. Your payment of Rs.'.$amt->amount.' is successful.Thank You -GiroKab&route=T&peid=1701167429639010331&tempid=1707167661820616231');

            $data['success']="success";
            echo json_encode($data);

      }


    //   public function approve_driver()
    // {
        
        
    //   return view('driver.DriverIdCard');
      
    // }

    public function driver_profile_updates()
     
    {
      // $dt=date('Y-m-d'); 
       
        $driver=driver_docs_reupload::where('franchise_approval',1)->where('status',0)->orderBy('id','ASC')->get();
        return view('driver.DriverProfileUpdates',['driver'=>$driver]);
       // print_r(bcrypt("admin"));
    }

     public function driver_document_verify($pid)
     
    {
       $profid=decrypt($pid); 
       $docs=driver_docs_reupload::where('id',$profid)->first();
        //$franchise=Auth::guard('franchise')->user();
          $driver_rej=driver_profile_rejection::where('driver_id',$docs->driver_id)->orderBy('rejected_date','DESC')->orderBy('id','DESC')->get();
      $driver_rejcnt=driver_profile_rejection::where('driver_id',$docs->driver_id)->count();

      if($docs->doc_type==1)
      {
        return view('driver.DriverRCReVerify',['docs'=>$docs,'driver_rej'=>$driver_rej,'driver_rejcnt'=>$driver_rejcnt]);
      }
      
      if($docs->doc_type==3)
      {
        return view('driver.DriverInsuranceReVerify',['docs'=>$docs,'driver_rej'=>$driver_rej,'driver_rejcnt'=>$driver_rejcnt]);
      }
      if($docs->doc_type==4)
      {
        return view('driver.DriverPollutionReVerify',['docs'=>$docs,'driver_rej'=>$driver_rej,'driver_rejcnt'=>$driver_rejcnt]);
      }

      if($docs->doc_type==5)
      {
        return view('driver.DriverPermitReVerify',['docs'=>$docs,'driver_rej'=>$driver_rej,'driver_rejcnt'=>$driver_rejcnt]);
      }
      if($docs->doc_type==20)
      {
        return view('driver.DriverLicenseFrontReVerify',['docs'=>$docs,'driver_rej'=>$driver_rej,'driver_rejcnt'=>$driver_rejcnt]);
      }

      if($docs->doc_type==21)
      {
        return view('driver.DriverLicenseBackReVerify',['docs'=>$docs,'driver_rej'=>$driver_rej,'driver_rejcnt'=>$driver_rejcnt]);
      }
        
        
       
    }


     public function reject_driverdoc(Request $req)
    {
        $docid=$req->docid;



        driver_docs_reupload::where('id',$docid)->update([

            'admin_approval'=>2,
            'franchise_approval'=>2,
            'admin_reject_reason'=>$req->reason,
            ]);

        driver_profile_rejection::create([
            'driver_id'=>$req->drid,
            'profile_type'=>0,
            'rejected_by'=>2,
            'rejection_reason'=>$req->reason,
            'status'=>1,
            'rejected_date'=>date('Y-m-d')
            ]);



            $data['success']="success";
            echo json_encode($data);

      }


       public function rc_reapproval(Request $req)
    {
        $drid=$req->did;
        $docid=$req->docid;
$dr_det=driver_primary_document::select('id','driver_id','rc_file','rc_expiry')->where('driver_id',$drid)->first();
$doc_det=driver_docs_reupload::where('id',$docid)->first();

         driver_document_history::create([
          'driver_id'=>$drid,
          'doc_type'=>1,
           'doc_file'=>$dr_det->rc_file,
            'doc_expiry'=>$dr_det->rc_expiry,
           'status'=>1 
            ]);

        driver_primary_document::where('driver_id',$drid)->update([
          'rc_file'=>$doc_det->doc_file,
          'rc_expiry'=>$doc_det->doc_expiry,

            ]);

          driver_docs_reupload::where('id',$docid)->update([
            'status'=>1
            ]);

            $data['success']="success";
            echo json_encode($data);

      }


       public function license_reapproval(Request $req)
    {
        $drid=$req->did;
        $docid=$req->docid;
$dr_det=driver_primary_document::select('id','driver_id','license_frontfile','license_expiry')->where('driver_id',$drid)->first();
$doc_det=driver_docs_reupload::where('id',$docid)->first();

         driver_document_history::create([
          'driver_id'=>$drid,
          'doc_type'=>20,
           'doc_file'=>$dr_det->license_frontfile,
            'doc_expiry'=>$dr_det->license_expiry,
           'status'=>1 
            ]);

        driver_primary_document::where('driver_id',$drid)->update([
          'license_frontfile'=>$doc_det->doc_file,
          'license_expiry'=>$doc_det->doc_expiry,

            ]);

          driver_docs_reupload::where('id',$docid)->update([
            'status'=>1
            ]);

            $data['success']="success";
            echo json_encode($data);

      }


       public function license_reapprovalback(Request $req)
    {
        $drid=$req->did;
        $docid=$req->docid;
$dr_det=driver_primary_document::select('id','driver_id','license_backfile')->where('driver_id',$drid)->first();
$doc_det=driver_docs_reupload::where('id',$docid)->first();

         driver_document_history::create([
          'driver_id'=>$drid,
          'doc_type'=>21,
           'doc_file'=>$dr_det->license_backfile,
            'doc_expiry'=>$dr_det->license_expiry,
           'status'=>1 
            ]);

        driver_primary_document::where('driver_id',$drid)->update([
          'license_backfile'=>$doc_det->doc_file,
        

            ]);

          driver_docs_reupload::where('id',$docid)->update([
            'status'=>1
            ]);

            $data['success']="success";
            echo json_encode($data);

      }


      public function insurance_reapproval(Request $req)
    {
        $drid=$req->did;
        $docid=$req->docid;
$dr_det=driver_primary_document::select('id','driver_id','insurance_file','insurance_expiry')->where('driver_id',$drid)->first();
$doc_det=driver_docs_reupload::where('id',$docid)->first();

         driver_document_history::create([
          'driver_id'=>$drid,
          'doc_type'=>3,
           'doc_file'=>$dr_det->insurance_file,
            'doc_expiry'=>$dr_det->insurance_expiry,
           'status'=>1 
            ]);

        driver_primary_document::where('driver_id',$drid)->update([
          'insurance_file'=>$doc_det->doc_file,
          'insurance_expiry'=>$doc_det->doc_expiry,

            ]);

          driver_docs_reupload::where('id',$docid)->update([
            'status'=>1
            ]);

            $data['success']="success";
            echo json_encode($data);

      }

       public function pollution_reapproval(Request $req)
    {
        $drid=$req->did;
        $docid=$req->docid;
$dr_det=driver_secondary_document::select('id','driver_id','pollution_file','pollution_expiry')->where('driver_id',$drid)->first();
$doc_det=driver_docs_reupload::where('id',$docid)->first();

         driver_document_history::create([
          'driver_id'=>$drid,
          'doc_type'=>4,
           'doc_file'=>$dr_det->pollution_file,
            'doc_expiry'=>$dr_det->pollution_expiry,
           'status'=>1 
            ]);

        driver_secondary_document::where('driver_id',$drid)->update([
          'pollution_file'=>$doc_det->doc_file,
          'pollution_expiry'=>$doc_det->doc_expiry,

            ]);

          driver_docs_reupload::where('id',$docid)->update([
            'status'=>1
            ]);

            $data['success']="success";
            echo json_encode($data);

      }

        public function permit_reapproval(Request $req)
    {
        $drid=$req->did;
        $docid=$req->docid;
$dr_det=driver_secondary_document::select('id','driver_id','permit_file','permit_expiry')->where('driver_id',$drid)->first();
$doc_det=driver_docs_reupload::where('id',$docid)->first();

         driver_document_history::create([
          'driver_id'=>$drid,
          'doc_type'=>5,
           'doc_file'=>$dr_det->permit_file,
            'doc_expiry'=>$dr_det->permit_expiry,
           'status'=>1 
            ]);

        driver_secondary_document::where('driver_id',$drid)->update([
          'permit_file'=>$doc_det->doc_file,
          'permit_expiry'=>$doc_det->doc_expiry,

            ]);

          driver_docs_reupload::where('id',$docid)->update([
            'status'=>1
            ]);

            $data['success']="success";
            echo json_encode($data);

      }


   public function driver_account_renewal()
     
    {
       
        $driver=driver_account_renewal::where('approval_status',0)->latest()->get();
        return view('driver.DriverAccountRenewal',['driver'=>$driver]);

    }

     public function reject_renewal_req(Request $req)
    {
        $payid=$req->payid;


        driver_account_renewal::where('id',$payid)->update([
          'approval_status'=>2,
          'rejection_reason'=>$req->reason,
          'rejected_date'=>date('Y-m-d'),
            
            ]);

            $data['success']="success";
            echo json_encode($data);

      }


   public function rejected_renewals()
     
    {
       
        $driver=driver_account_renewal::where('approval_status',2)->latest()->get();
        return view('driver.DriverRejectedRenewals',['driver'=>$driver]);

    }
    public function restore_renewal(Request $req)
    {
        $payid=$req->payid;


        driver_account_renewal::where('id',$payid)->update([
          'approval_status'=>0,
          'rejection_reason'=>'',
          'rejected_date'=>NULL,
            
            ]);

            $data['success']="success";
            echo json_encode($data);

      }

        public function approve_renewal(Request $req)
    {
        $payid=$req->payid;
        $pay_det=driver_account_renewal::select('driver_id','payment_date','amount','reference_id')->where('id', $payid)->first();

          $dr_det=driver_registration::select('id','franchise','valid_from','valid_to')->where('id', $pay_det->driver_id)->first();
        $dr_sdet=driver_secondary_document::select('payment_date','amount','reference_id')->where('driver_id', $pay_det->driver_id)->first();

        $dt=date('Y-m-d');

        if($dr_det->valid_to>=$dt)
        {
          $valfrom=date("Y-m-d", strtotime($dr_det->valid_to . " + 1 day"));
          $valto=date("Y-m-d", strtotime($valfrom . " + 365 day"));
        }
        else if ($dr_det->valid_to<$dt)
         {
          $valfrom=date('Y-m-d');
          $valto=date("Y-m-d", strtotime(date('Y-m-d') . " + 365 day"));
          }

         driver_renewal_history::create([
          'driver_id'=>$dr_det->id,
          'franchise'=>$dr_det->franchise,
          'payment_date'=>$dr_sdet->payment_date,
           'amount'=>$dr_sdet->amount,
          'reference_id'=>$dr_sdet->reference_id,
          'valid_from'=>$dr_det->valid_from,
          'valid_to'=>$dr_det->valid_to,
            
            ]);

        driver_account_renewal::where('id',$payid)->update([
          'approval_status'=>1,
          'rejection_reason'=>'',
          'rejected_date'=>NULL,
            
            ]);

        driver_registration::where('id',$pay_det->driver_id)->update([
          'valid_from'=>$valfrom,
          'valid_to'=>$valto,
           ]);

           driver_secondary_document::where('id',$pay_det->driver_id)->update([
          'payment_date'=>$pay_det->payment_date,
          'amount'=>$pay_det->amount,
          'reference_id'=>$pay_det->reference_id,

            
            ]);

            $data['success']="success";
            echo json_encode($data);

      }

   
}
