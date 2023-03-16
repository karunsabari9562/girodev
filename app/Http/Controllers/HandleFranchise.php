<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth,Cache,QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
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
use App\Models\driver_id_regeneration;
 use Mail;
 use App\Mail\DivRegMail;

class HandleFranchise extends Controller
{
    public function add_franchise()
    {
    	 $state=state::get();
    	 $dist=district::get();
    	 $cnt=franchise_detail::count();
    	 if($cnt==0)
    	 {
    	 	$lst_fr="101";
    	 }
    	 else
    	 {
    	 	$last_fr=franchise_detail::orderBy('id','DESC')->limit(1)->first();
    	 	$lst_fr=$last_fr->fid+1;
    	 }
    	 
        return view('handlefranchise.AddFranchise',['stat'=>$state,'dist'=>$dist,'lst_fr'=>$lst_fr]);
       // print_r(bcrypt("admin"));
    }

      public function franchise_add(Request $req)
    {
      if (franchise_detail::where('mail_id', $req->cmail)->exists()) 
      {
          $data['err']="error";
      }
      else
      {


        $img = $req->file('img');
        if($img=='')
        {
            $new_name="franchise/default.png";
        }
        else{
          $image = $req->file('img');
             $new_name = "franchise/" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('franchise'), $new_name);
            //$ins['Photo']=$new_name;
        }
     
     $psw=rand(100001,999999);
        franchise_detail::create([

            'fid'=>$req->fid,
            'franchise_type'=>$req->ftype,
            'franchise_id'=>$req->frid,
            'franchise_name'=>$req->cname,
            'proprietor_name'=>$req->pname,
            'franchise_mobile'=>$req->cmobile,
            'franchise_location'=>$req->clocation,
            'franchise_state'=>$req->cstate,
            'franchise_district'=>$req->cdist,
            'photo'=> $new_name,
            'Landline'=>$req->clandline,
            'mail_id'=>$req->cmail,
            'password'=>bcrypt($psw),
            'valid_from'=>date('Y-m-d'),
            'valid_to'=>$req->valdate,
            'status'=>1,
            'reason'=>"0",
            'blocked_date'=>date('Y-m-d'),
            'profit'=>$req->profit,
            'latitude'=>$req->lat,
            'longitude'=>$req->long,
            'geo_location'=>"Location",

            ]);

          $details=[
            'email'=>$req->cmail,
            'frid'=>$req->frid,
            'password'=>$psw
           
        ];

        Mail::to($req->cmail)->send(new DivRegMail($details));

            $data['success']="success";
            
          }
          echo json_encode($data);

      }


      public function edit_franchise($fid)
    {
      $frid=decrypt($fid); 
       $franchise=franchise_detail::where('id',$frid)->first();
       $state=state::get();
       $dist=district::get();
        return view('handlefranchise.EditFranchise',['franchise'=>$franchise,'stat'=>$state,'dist'=>$dist]);
       // print_r(bcrypt("admin"));
    }

    public function franchise_update(Request $req)
    {
        
     
     
        franchise_detail::where('id',$req->frid)->update([

            'franchise_type'=>$req->ftype,
            'franchise_name'=>$req->cname,
            'proprietor_name'=>$req->pname,
            'franchise_mobile'=>$req->cmobile,
            'franchise_location'=>$req->clocation,
            'franchise_state'=>$req->cstate,
            'franchise_district'=>$req->cdist,            
            'Landline'=>$req->clandline,
            'mail_id'=>$req->cmail,
            'profit'=>$req->profit,
            'latitude'=>$req->lat,
            'longitude'=>$req->long,
            'geo_location'=>"Location",

            ]);

            $data['success']="success";
            echo json_encode($data);

      }


      public function franchise_area()
    {
    	 
        return view('handlefranchise.FranchiseArea');

    }

     public function active_franchise()
    {
    	$dt=date('Y-m-d');
    	 $franchise=franchise_detail::where('status',1)->where('valid_to','>=',$dt)->get();
        return view('handlefranchise.ActiveFranchise',['franchise'=>$franchise]);

    }

    public function franchise_details($ffid)
    {
    	$frid=decrypt($ffid);
    	 $franchise=franchise_detail::where('id',$frid)->first();
         $franchise_history=franchise_renewal::where('fid',$frid)->get();

        return view('handlefranchise.FranchiseDetails',['franchise'=>$franchise,'franchise_history'=>$franchise_history]);

    }

     public function renew_franchise(Request $req)
    {
        $fid=$req->fid;
        $fdet=franchise_detail::where('id',$fid)->first();


        franchise_renewal::create([
            'fid'=>$fdet->id,
            'renew_date'=>date('Y-m-d'),
            'valid_from'=>$fdet->valid_from,
            'valid_to'=>$fdet->valid_to,
            ]);

        franchise_detail::where('id',$fid)->update([
            'valid_from'=>$req->valfrom,
            'valid_to'=>$req->valto,
            ]);



            $data['success']="success";
            echo json_encode($data);

      }

      public function block_franchise(Request $req)
    {
        $fid=$req->fid;

        franchise_detail::where('id',$fid)->update([
            'reason'=>$req->reason,
            'blocked_date'=>date('Y-m-d'),
            'status'=>2,
            ]);



            $data['success']="success";
            echo json_encode($data);

      }

      public function blocked_franchise()
    {
        //$dt=date('Y-m-d');
         $franchise=franchise_detail::where('status',2)->get();
        return view('handlefranchise.BlockedFranchise',['franchise'=>$franchise]);

    }

      public function blockedfranchise_details($ffid)
    {
        $frid=decrypt($ffid);
         $franchise=franchise_detail::where('id',$frid)->first();
         $franchise_history=franchise_renewal::where('fid',$frid)->get();

        return view('handlefranchise.BlockedFranchiseDetails',['franchise'=>$franchise,'franchise_history'=>$franchise_history]);

    }

      public function activate_franchise(Request $req)
    {
        $fid=$req->body;

        franchise_detail::where('id',$fid)->update([
            
            'status'=>1,
            ]);



            $data['success']="success";
            echo json_encode($data);

      }

           public function expired_franchise()
    {
        $dt=date('Y-m-d');
         $franchise=franchise_detail::where('status',1)->where('valid_to','<',$dt)->get();
         //$franchise=franchise_detail::where('status',2)->get();
        return view('handlefranchise.ExpiredFranchise',['franchise'=>$franchise]);

    }

      public function expiredfranchise_details($ffid)
    {
        $frid=decrypt($ffid);
         $franchise=franchise_detail::where('id',$frid)->first();
         $franchise_history=franchise_renewal::where('fid',$frid)->get();

        return view('handlefranchise.ExpiredFranchiseDetails',['franchise'=>$franchise,'franchise_history'=>$franchise_history]);

    }


    /////////////////////////


    public function franchise_drivers($fid)
    {
        $frid=decrypt($fid);

       $driver=driver_registration::select('id','driver_id','photo','name')->where('franchise',$frid)->where('status',1)->latest()->limit(4)->get();
        $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.FranchiseDriverArea',['driver'=>$driver,'franchises'=>$frid,'fr_det'=>$fr_det]);
     } 


     public function active_drivers($fid)
    {
        $frid=decrypt($fid);

       $driver=driver_registration::select('id','driver_id','name','mobile','approved_date','valid_to')->where('franchise',$frid)->where('status',1)->latest()->get();

        $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.ActiveDrivers',['driver'=>$driver,'fr_det'=>$fr_det]);
       
    } 

     public function expired_drivers($fid)
     
    {
        $dt=date('Y-m-d');
         $frid=decrypt($fid);
        $driver=driver_registration::select('id','driver_id','name','mobile','valid_to')->where('franchise',$frid)->where('status',1)->where('valid_to','<',$dt)->orderBy('valid_to','ASC')->get();
           $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.ExpiredDrivers',['driver'=>$driver,'fr_det'=>$fr_det]);

    }

      public function blocked_drivers($fid)
     
    {
         $frid=decrypt($fid);
        $driver=driver_registration::select('id','driver_id','name','mobile','account_reject_reason','account_rejected_date',)->where('franchise',$frid)->where('status',3)->orderBy('driver_id','ASC')->get();
        $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.BlockedDrivers',['driver'=>$driver,'fr_det'=>$fr_det]);

    }

    public function deactivated_drivers($fid)
     
    {
      $frid=decrypt($fid);
        $driver=driver_registration::select('id','driver_id','name','mobile','status','account_rejected_date','account_reject_reason')->where('franchise',$frid)->where('status',4)->orderBy('driver_id','ASC')->get();
           $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.DeactivatedDrivers',['driver'=>$driver,'fr_det'=>$fr_det]);
       
    }

      public function self_deactivated_drivers($fid)
     
    {
      $frid=decrypt($fid);
        $driver=driver_registration::select('id','driver_id','name','mobile','status','account_rejected_date','account_reject_reason')->where('franchise',$frid)->where('status',5)->orderBy('driver_id','ASC')->get();
           $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.SelfDeactivatedDrivers',['driver'=>$driver,'fr_det'=>$fr_det]);
       
    }

     public function admin_deactivated_drivers($fid)
     
    {
      $frid=decrypt($fid);
        $driver=driver_registration::select('id','driver_id','name','mobile','status','account_rejected_date','account_reject_reason')->where('franchise',$frid)->where('status',6)->orderBy('driver_id','ASC')->get();
           $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.AdminDeactivatedDrivers',['driver'=>$driver,'fr_det'=>$fr_det]);
       
    }

     public function reactivation_drivers_list($fid)
     
    {
         $frid=decrypt($fid);
        $driver=driver_registration::select('id','driver_id','name','mobile','status')->where('franchise',$frid)->where('status',7)->orderBy('driver_id','ASC')->get();
        $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.ReactivationDriversList',['driver'=>$driver,'fr_det'=>$fr_det]);
       
    }




     public function rc_expiring_drivers($fid)

    {
      $dt=date('Y-m-d');
      $time = strtotime(date('Y-m-d'));
      $final = date("Y-m-d", strtotime("+1 month", $time));
      $frid=decrypt($fid);
    
       $driver=driver_primary_document::where('franchise',$frid)->where('rc_expiry','>=',$dt)->where('rc_expiry','<=',$final)->orderBy('rc_expiry','ASC')->get();
        $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.RCExpiringDrivers',['driver'=>$driver,'fr_det'=>$fr_det]);
       
    } 

     public function license_expiring_drivers($fid)
     
    {
      $dt=date('Y-m-d');
      $time = strtotime(date('Y-m-d'));
      $final = date("Y-m-d", strtotime("+1 month", $time));
$frid=decrypt($fid);
       $driver=driver_primary_document::where('franchise',$frid)->where('license_expiry','>=',$dt)->where('rc_expiry','<=',$final)->orderBy('license_expiry','ASC')->get();
        $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.LicenseExpiringDrivers',['driver'=>$driver,'fr_det'=>$fr_det]);
       
    } 

     public function insurance_expiring_drivers($fid)
     
    {
      $dt=date('Y-m-d');
      $time = strtotime(date('Y-m-d'));
      $final = date("Y-m-d", strtotime("+1 month", $time));
$frid=decrypt($fid);
       $driver=driver_primary_document::where('franchise',$frid)->where('insurance_expiry','>=',$dt)->where('insurance_expiry','<=',$final)->orderBy('insurance_expiry','ASC')->get();
        $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.InsuranceExpiringDrivers',['driver'=>$driver,'fr_det'=>$fr_det]);
       
    } 

     public function pollution_expiring_drivers($fid)
     
    {
      $dt=date('Y-m-d');
      $time = strtotime(date('Y-m-d'));
      $final = date("Y-m-d", strtotime("+1 month", $time));
      $frid=decrypt($fid);
      $driver=driver_secondary_document::where('franchise',$frid)->where('pollution_expiry','>=',$dt)->where('pollution_expiry','<=',$final)->orderBy('pollution_expiry','ASC')->get();
      $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.PollutionExpiringDrivers',['driver'=>$driver,'fr_det'=>$fr_det]);
       
    } 

    public function permit_expiring_drivers($fid)
     
    {
      $dt=date('Y-m-d');
      $time = strtotime(date('Y-m-d'));
      $final = date("Y-m-d", strtotime("+1 month", $time));
        $frid=decrypt($fid);
       $driver=driver_secondary_document::where('franchise',$frid)->where('permit_expiry','>=',$dt)->where('permit_expiry','<=',$final)->orderBy('permit_expiry','ASC')->get();
        $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.PermitExpiringDrivers',['driver'=>$driver,'fr_det'=>$fr_det]);
      
    } 

    //////////////

         public function rc_expired_drivers($fid)

    {
      $dt=date('Y-m-d');
$frid=decrypt($fid);
       $driver=driver_primary_document::where('franchise',$frid)->where('rc_expiry','<',$dt)->orderBy('rc_expiry','ASC')->get();
               $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.RCExpiredDrivers',['driver'=>$driver,'fr_det'=>$fr_det]);
       // print_r(bcrypt("admin"));
    } 

     public function license_expired_drivers($fid)
     
    {
      $dt=date('Y-m-d');
$frid=decrypt($fid);
       $driver=driver_primary_document::where('franchise',$frid)->where('license_expiry','<',$dt)->orderBy('license_expiry','ASC')->get();
               $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.LicenseExpiredDrivers',['driver'=>$driver,'fr_det'=>$fr_det]);
       // print_r(bcrypt("admin"));
    } 

     public function insurance_expired_drivers($fid)
     
    {
      $dt=date('Y-m-d');
$frid=decrypt($fid);
       $driver=driver_primary_document::where('franchise',$frid)->where('insurance_expiry','<',$dt)->orderBy('insurance_expiry','ASC')->get();
               $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.InsuranceExpiredDrivers',['driver'=>$driver,'fr_det'=>$fr_det]);
       // print_r(bcrypt("admin"));
    } 

     public function pollution_expired_drivers($fid)
     
    {
      $dt=date('Y-m-d'); 
$frid=decrypt($fid);
       $driver=driver_secondary_document::where('franchise',$frid)->where('pollution_expiry','<',$dt)->orderBy('pollution_expiry','ASC')->get();
               $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.PollutionExpiredDrivers',['driver'=>$driver,'fr_det'=>$fr_det]);
       // print_r(bcrypt("admin"));
    } 

    public function permit_expired_drivers($fid)
     
    {
      $dt=date('Y-m-d'); 
   $frid=decrypt($fid);
       $driver=driver_secondary_document::where('franchise',$frid)->where('pollution_expiry','<',$dt)->orderBy('pollution_expiry','ASC')->get();
               $fr_det=franchise_detail::select('id','franchise_id','franchise_name')->where('id',$frid)->first();
        return view('handlefranchise.PermitExpiredDrivers',['driver'=>$driver,'fr_det'=>$fr_det]);
       // print_r(bcrypt("admin"));
    } 











      public function active_driver_profile($did)
    {
      $drid=decrypt($did);
      $driver_det=driver_registration::where('id',$drid)->first();
       
          return view('handlefranchise.ActiveDriverProfile',['driver_det'=>$driver_det]);  
       
      
    }  


    public function deactivate_driver(Request $req)
    {
        $drid=$req->did;



         active_driver::where('dr_id',$drid)->update([
        
           'status'=>5
            ]);
        driver_registration::where('id',$drid)->update([
            'status'=>6,
            'account_reject_reason'=>$req->reason,
            'account_rejected_date'=>date('Y-m-d'),
            ]);

          driver_primary_document::where('driver_id',$drid)->update([
            'status'=>5
            ]);
          driver_secondary_document::where('driver_id',$drid)->update([
            'status'=>5
            ]);

          driver_deactivate_history::create([
            'driver_id'=>$drid,
            'deactivated_by'=>3,
            'reason'=>$req->reason,
            ]);

            $data['success']="success";
            echo json_encode($data);

      }

      public function activate_driver(Request $req)
    {
        $drid=$req->did;



         active_driver::where('dr_id',$drid)->update([
        
           'status'=>1 
            ]);

        driver_registration::where('id',$drid)->update([
            'status'=>1,
            'account_reject_reason'=>''
            ]);

          driver_primary_document::where('driver_id',$drid)->update([
            'status'=>1
            ]);
          driver_secondary_document::where('driver_id',$drid)->update([
            'status'=>1
            ]);

            $data['success']="success";
            echo json_encode($data);

      }


       public function driver_documents($did)
     
    {
       $docid=decrypt($did); 
       $docs=driver_document_history::where('driver_id',$docid)->where('status',1)->get();
        
       $driver= driver_registration::select('name','driver_id','id')->where('id',$docid)->first();

        return view('handlefranchise.DriverDocuments',['docs'=>$docs,'driver'=>$driver]);
     
        
       
    } 

      public function driver_profile_rejections($did)
     
    {
       $drid=decrypt($did); 
      $driver_rej=driver_profile_rejection::where('driver_id',$drid)->latest()->get();
       $driver= driver_registration::select('name','driver_id','id')->where('id',$drid)->first();
        return view('handlefranchise.DriverProfileRejections',['driver_rej'=>$driver_rej,'driver'=>$driver]);
           
    } 

    public function driver_account_deactivations($did)
     
    {
       $drid=decrypt($did); 
      $driver_deact=driver_deactivate_history::where('driver_id',$drid)->latest()->get();
       $driver= driver_registration::select('name','driver_id','id')->where('id',$drid)->first();
        return view('handlefranchise.DriverAccountDeactivations',['driver_deact'=>$driver_deact,'driver'=>$driver]);
           
    } 

      public function driver_account_reactivations($did)
     
    {
       $drid=decrypt($did); 
      $driver_react=driver_reactivate_request::where('driver_id',$drid)->latest()->get();
       $driver= driver_registration::select('name','driver_id','id')->where('id',$drid)->first();
        return view('handlefranchise.DriverAccountReactivations',['driver_react'=>$driver_react,'driver'=>$driver]);
           
    } 

    public function driver_renewals_history($did)
     
    {
       $drid=decrypt($did); 
      $renewals=driver_renewal_history::where('driver_id',$drid)->latest()->get();
      $driver= driver_registration::select('name','driver_id','id')->where('id',$drid)->first();
      return view('handlefranchise.DriverRenewalHistory',['renewals'=>$renewals,'driver'=>$driver]);
            
    } 

     public function driver_idcard_regenerations($did)
     
    {
       $drid=decrypt($did); 
      $idcardreg=driver_id_regeneration::where('driver_id',$drid)->latest()->get();
      $dr_cnt=driver_id_regeneration::where('driver_id',$drid)->count();
      $driver= driver_registration::select('name','driver_id','id')->where('id',$drid)->first();

      return view('handlefranchise.DriverIdcardRegenerations',['idcardreg'=>$idcardreg,'driver'=>$driver,'dr_cnt'=>$dr_cnt]);
            
    } 


    public function driver_idcard_regenerate($did,$reason)
    {
      $drid=decrypt($did);
     
        $driver= driver_registration::select('name','driver_id','id','mobile','approved_date','franchise','house_name','location','district','state','pin','blood_group','vehicle_type','photo')->where('id',$drid)->first();

      //return view('handlefranchise.DriverIdcard',['driver'=>$driver]);

        driver_id_regeneration::create([

            'driver_id'=>$drid,
            'reason'=>$reason,
            'regenerated_at'=>date('Y-m-d'),
            ]);
     

         $pdf = PDF::loadView('handlefranchise.DriverIdcard',['driver'=>$driver]);
       $pdf->getDomPDF()->setHttpContext(
        stream_context_create([
            'ssl' => [
                'allow_self_signed'=> TRUE,
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
            ]
        ])
    );
       
   $pdf_name=$driver->driver_id . '-Idcard.pdf';    
     return $pdf->download($pdf_name); 
}

    public function driver_idcard_generation($did)
    {
      $drid=decrypt($did);
     
        $driver= driver_registration::select('name','driver_id','id','mobile','approved_date','franchise','house_name','location','district','state','pin','blood_group','vehicle_type','photo')->where('id',$drid)->first();

      //return view('handlefranchise.DriverIdcard',['driver'=>$driver]);

        driver_id_regeneration::create([

            'driver_id'=>$drid,
            'reason'=>"First time creation.",
            'regenerated_at'=>date('Y-m-d'),
            ]);
     

         $pdf = PDF::loadView('handlefranchise.DriverIdcard',['driver'=>$driver]);
       $pdf->getDomPDF()->setHttpContext(
        stream_context_create([
            'ssl' => [
                'allow_self_signed'=> TRUE,
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
            ]
        ])
    );
       
   $pdf_name=$driver->driver_id . '-Idcard.pdf';    
     return $pdf->download($pdf_name); 
}


public function qrcode_generate($did)
    {
      $drid=decrypt($did);
     
      $driver= driver_registration::select('name','driver_id','id','mobile','approved_date','franchise')->where('id',$drid)->first();

      //return view('handlefranchise.Idcard',['driver'=>$driver]);

         $pdf = PDF::loadView('handlefranchise.QRCode',['driver'=>$driver]);
       $pdf->getDomPDF()->setHttpContext(
        stream_context_create([
            'ssl' => [
                'allow_self_signed'=> TRUE,
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
            ]
        ])
    );
       
   $pdf_name=$driver->driver_id . '-QRCode.pdf';    
     return $pdf->download($pdf_name); 
}


    

  
       
    
}
