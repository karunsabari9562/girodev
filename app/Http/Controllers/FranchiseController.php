<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth,Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\vehicle_type;
use App\Models\vehicle_category;
use App\Models\vehicle_model;
use App\Models\state;
use App\Models\district;
use App\Models\driver_reg_fee;
use App\Models\driver_registration;
use App\Models\driver_primary_document;
use App\Models\driver_secondary_document;
use App\Models\driver_profile_rejection;
use App\Models\franchise_detail;
use App\Models\active_driver;
use App\Models\driver_docs_reupload;
use App\Models\driver_document_history;
use App\Models\driver_renewal_history;
use App\Models\advertisement;
use App\Models\driver_deactivate_history;
use App\Models\driver_reactivate_request;
use App\Models\rides_booking;
use App\Models\ride_booking_history;
use Illuminate\Support\Str;
 use Mail;
 use App\Mail\DivForgotPasswordMail;
  use Carbon\Carbon;
class FranchiseController extends Controller
{
    public function home()
    {
        return view('franchise.LoginPage');
       // print_r(bcrypt("admin"));
    }

    

    public function unauthorized_access()
    {
        return view('franchise.UnauthorizedAccess');
       // print_r(bcrypt("admin"));
    }

    public function forgot_password()
    {
        return view('franchise.forgot_password.ForgotPassword');
       // print_r(bcrypt("admin"));
    }

     public function division_mail_chk(Request $req)
    {
   
        $email=$req->email;
       
      $cnt=franchise_detail::where('mail_id',$email)->count();
      if($cnt==0)
      {
        $data['err']='Invalid Mail Id';
      }
       else
      {
        $token=Str::random(64);

        $pswcnt=DB::table('password_resets')->where('email',$email)->count();
        if($pswcnt==0)
        {

             DB::table('password_resets')->insert([

            'email'=>$email,
            'token'=>$token,
            'created_at'=>date('Y-m-d H:i:s'),

            ]);
        }
        else
        {
            DB::table('password_resets')->where('email',$email)->update([

            'token'=>$token,
            'created_at'=>date('Y-m-d H:i:s'),

            ]); 
        }

        $details=[
            'email'=>$email,
            'token'=>$token
        ];

        Mail::to($email)->send(new DivForgotPasswordMail($details));
       $data['success']='We have sent a password reset link to your email.';
        
      }
      

        echo json_encode($data);
    }


    public function division_password_reset($tok,$em)
    {
        

        $cnt=DB::table('password_resets')->where('email',$em)->where('token',$tok)->count();
        if($cnt==0)
        {
            return view('franchise.forgot_password.DivisionResetPasswordExpired');
        }
        else
        {
           $psw=DB::table('password_resets')->where('email',$em)->where('token',$tok)->first();
          
            $dt = date('Y-m-d H:i:s');
            $date = $psw->created_at;
            $currentDate = strtotime($date);
            $futureDate = $currentDate+(60*5);
            $formatDate = date("Y-m-d H:i:s", $futureDate);
            if($dt<=$formatDate)
            {
              return view('franchise.forgot_password.DivisionResetPassword',['token'=>$tok,'email'=>$em]);
             
            }
            else
            {
                 return view('franchise.forgot_password.DivisionResetPasswordExpired'); 
            }
           

    
         }
       
    }

    public function divisionpsw_reset(Request $req)
    {
//$currentpass=auth()->guard('admin')->user()->password;
       // $oldpass=$req->oldpass;
        $newpass=$req->newpass;

        // if(Hash::check($oldpass, $currentpass))
        // {
            franchise_detail::where('mail_id',$req->email)->update([
                'password'=>bcrypt($newpass)
            ]);
            $data['success']="success";
        // }
        // else{
        //     $data['err']="err";
        // }
        echo json_encode($data);
       
    }


    public function login(Request $req)
    {
        $dt=date('Y-m-d');
        $rememberStatus=$req->rememberStatus;
        $uname=$req->username;
        $psw=$req->password;
        if($rememberStatus==0)
        {
            if(Auth::guard('franchise')->attempt(['franchise_id' => $uname, 'password' => $psw]))
                {
                    if(Auth::guard('franchise')->user()->status==1)
                    {
                         if(Auth::guard('franchise')->user()->valid_to>=$dt)
                         {
                            $data['success']='Login success.Please wait...';
                         }
                         else
                         {
                           $data['exp']='Account is expired.<br>Please contact Administrator';   
                         }
                        
                    }
                    elseif(Auth::guard('franchise')->user()->status==2)
                    {
                      $data['blk']='Account is blocked.<br>Please contact Administrator';  
                    }
                    
                }
            else
                {
                    $data['err']='Invalid user !';
                }    
        }
        else if($rememberStatus==1)
        {
            
            if(Auth::guard('franchise')->attempt(['franchise_id' => $req->username, 'password' => $req->password],true))
                {
                    if(Auth::guard('franchise')->user()->status==1)
                    {
                         if(Auth::guard('franchise')->user()->valid_to>=$dt)
                         {
                            $data['success']='Login success.Please wait...';
                         }
                         else
                         {
                           $data['exp']='Account is expired.<br>Please contact Administrator';   
                         }
                        
                    }
                    elseif(Auth::guard('franchise')->user()->status==2)
                    {
                      $data['blk']='Account is blocked.<br>Please contact Administrator';  
                    }
                }
            else
                {
                    $data['err']='Invalid user !';
                }

        }

        echo json_encode($data);
    }

    public function logout()
    {
        Auth::guard('franchise')->logout();
        return redirect()->route('franchise.home');
    }

    public function dashboard()
    {
         $dt=date('Y-m-d');
          $fr_id=auth()->guard('franchise')->user()->id;
        $types=vehicle_type::where('status',1)->orderBy('category','ASC')->get();
        $ads=advertisement::where('visibleto_franchise',1)->where('valid_from','<=',$dt)->where('valid_to','>=',$dt)->where('status',1)->latest()->get();

        $bookings=rides_booking::where('franchise',$fr_id)->where('booked_date',$dt)->latest()->get();
        
        return view('franchise.Dashboard',['types'=>$types,'ads'=>$ads,'bookings'=>$bookings]);
    }

    public function franchise_profile()
    {
        $fr_id=auth()->guard('franchise')->user()->id;
        $fr_det=franchise_detail::where('id',$fr_id)->first();
        return view('franchise.Profile',['fr_det'=>$fr_det]);
       
    }
     public function edit_franchise_profile()
    {
        $fr_id=auth()->guard('franchise')->user()->id;
        $fr_det=franchise_detail::where('id',$fr_id)->first();
        return view('franchise.ProfileEdit',['fr_det'=>$fr_det]);
       
    }

    public function franchise_change_password()
    {
        return view('franchise.ChangePassword');
       
    }
    public function franchise_password_update(Request $req)
    {
        $currentpass=auth()->guard('franchise')->user()->password;
        $fid=auth()->guard('franchise')->user()->id;
        $oldpass=$req->oldpass;
        $newpass=$req->newpass;

        if(Hash::check($oldpass, $currentpass))
        {
            franchise_detail::where('id',$fid)->update([
                'password'=>bcrypt($newpass)
            ]) ;
            $data['success']="success";
        }
        else{
            $data['err']="err";
        }
        echo json_encode($data);
       
    }

/////////////////////////////////////////////////////////////////////////////////////////////////


     public function new_drivers()
    {
        $franchise=Auth::guard('franchise')->user()->id;
         $driver=driver_registration::select('id','name','mobile','created_at')->where('franchise',$franchise)->where('status',0)->where('profile_submission',0)->orderBy('id','ASC')->get();
         $cnt=driver_registration::where('franchise',$franchise)->where('status',0)->where('profile_submission',1)->count();
        $cnt1=driver_registration::where('franchise',$franchise)->where('status',0)->where('profile_submission',0)->count();
        $cnt2=driver_registration::where('franchise',$franchise)->where('status',2)->count();
        return view('franchise.NewDrivers',['driver'=>$driver,'cnt'=>$cnt,'cnt1'=>$cnt1,'cnt2'=>$cnt2]);
    
    }

    public function driver_profile_status($did)
    {
      $drid=decrypt($did);
        $franchise=Auth::guard('franchise')->user()->id;
         $driver=driver_registration::select('id','name','mobile','profile_upload_status','vehicle_upload_status','created_at')->where('id',$drid)->first();
        return view('franchise.DriverProfileStatus',['driver'=>$driver]);
       
    }


  public function reject_driver(Request $req)
    {
        $fid=$req->driverid;

        driver_registration::where('id',$fid)->update([
            'status'=>2,
            'account_reject_reason'=>$req->reason,
            'account_rejected_date'=>date('Y-m-d'),
            ]);
        driver_primary_document::where('driver_id',$fid)->update([
            'status'=>2,
            ]);
        driver_secondary_document::where('driver_id',$fid)->update([
            'status'=>2,
            ]);


            $data['success']="success";
            echo json_encode($data);

      }

       public function rejected_drivers()
    {
        $franchise=Auth::guard('franchise')->user()->id;
         $driver=driver_registration::select('id','name','mobile','created_at','account_rejected_date','account_reject_reason')->where('franchise',$franchise)->where('status',2)->latest()->get();
        return view('franchise.RejectedDrivers',['driver'=>$driver]);
       // print_r(bcrypt("admin"));
    }


    public function driver_approval_pending()
    {
        $franchise=Auth::guard('franchise')->user()->id;
        $driver=driver_registration::select('id','name','mobile','created_at','admin_approval_status')->where('franchise',$franchise)->where('status',0)->where('profile_submission',1)->orderBy('id','ASC')->get();

        $cnt=driver_registration::where('franchise',$franchise)->where('status',0)->where('profile_submission',1)->count();
        $cnt1=driver_registration::where('franchise',$franchise)->where('status',0)->where('profile_submission',0)->count();
        $cnt2=driver_registration::where('franchise',$franchise)->where('status',2)->count();

        return view('franchise.DriverApprovalPending',['driver'=>$driver,'cnt'=>$cnt,'cnt1'=>$cnt1,'cnt2'=>$cnt2]);
       // print_r(bcrypt("admin"));
    }

      public function driver_approval($did)
    {
      $drid=decrypt($did);

      $driver_det=driver_registration::select('id','name','mobile','created_at','profile_approval_status','vehicle_approval_status','photo','blood_group','house_name','location','pin','district','state','vehicle_type','vehicle_category')->where('id',$drid)->first();
      $driver_rej=driver_profile_rejection::where('driver_id',$drid)->latest()->get();
  
      
        return view('franchise.DriverApproval',['driver_det'=>$driver_det,'driver_rej'=>$driver_rej]);
       // print_r(bcrypt("admin"));
    }


  public function approve_pdet(Request $req)
    {
        $drid=$req->body;

        driver_registration::where('id',$drid)->update([
            'profile_approval_status'=>1,
            'profile_upload_status'=>1,
            'profile_reject_reason'=>''
            ]);


            $data['success']="success";
            echo json_encode($data);

      }


  public function approve_vdet(Request $req)
    {
        $drid=$req->body;

        driver_registration::where('id',$drid)->update([
            'vehicle_approval_status'=>1,
            'vehicle_upload_status'=>1,
            'vehicle_reject_reason'=>''
            ]);


            $data['success']="success";
            echo json_encode($data);

      }

        public function approve_dldet(Request $req)
    {
        $drid=$req->body;

        driver_primary_document::where('driver_id',$drid)->update([
            'licensefront_approval_status'=>1,
            'licensefront_upload_status'=>1,
            'license_number'=>$req->dlnum,
            'license_expiry'=>$req->dlexpiry,
            'licensefront_rejection_reason'=>''
            ]);


            $data['success']="success";
            echo json_encode($data);

      }

       public function approve_dldetback(Request $req)
    {
        $drid=$req->body;

        driver_primary_document::where('driver_id',$drid)->update([
            'licenseback_approval_status'=>1,
            'licenseback_upload_status'=>1,
            'licenseback_rejection_reason'=>''
            ]);


            $data['success']="success";
            echo json_encode($data);

      }

       public function approve_rcdet(Request $req)
    {
        $drid=$req->body;

        driver_primary_document::where('driver_id',$drid)->update([
            'rc_approval_status'=>1,
            'rc_upload_status'=>1,
            'rc_number'=>$req->rcnum,
            'rc_expiry'=>$req->rcexpiry,
            'rc_rejection_reason'=>''
            ]);


            $data['success']="success";
            echo json_encode($data);

      }

        public function approve_insdet(Request $req)
    {
        $drid=$req->body;

        driver_primary_document::where('driver_id',$drid)->update([
            'insurance_approval_status'=>1,
            'insurance_upload_status'=>1,
            'insurance_expiry'=>$req->inexpiry,
            'insurance_rejection_reason'=>''
            ]);


            $data['success']="success";
            echo json_encode($data);

      }


        public function approve_pldet(Request $req)
    {
        $drid=$req->body;

        driver_secondary_document::where('driver_id',$drid)->update([
            'pollution_approval_status'=>1,
            'pollution_upload_status'=>1,
            'pollution_expiry'=>$req->plexpiry,
            'pollution_rejection_reason'=>''
            ]);


            $data['success']="success";
            echo json_encode($data);

      }

        public function approve_prdet(Request $req)
    {
        $drid=$req->body;

        driver_secondary_document::where('driver_id',$drid)->update([
            'permit_approval_status'=>1,
            'permit_upload_status'=>1,
            'permit_expiry'=>$req->prexpiry,
            'permit_rejection_reason'=>''
            ]);


            $data['success']="success";
            echo json_encode($data);

      }

/////////////////////////////////////////


       public function reject_pdet(Request $req)
    {
        $drid=$req->did;


if ($req->err1!=0) {
    $m1=$req->err1 . '.';
}
else
{
  $m1='';
}

if ($req->err2!=0) {
   $m2=$req->err2 . '.';
}
else
{
  $m2='';
}

if ($req->err3!=0) {
    $m3=$req->err3 . '.';
}
else
{
  $m3='';
}

if ($req->err4!=0) {
   $m4=$req->err4;
}
else
{
  $m4='';
}

$msg=$m1.$m2.$m3.$m4;

        driver_registration::where('id',$drid)->update([
          'profile_upload_status'=>0,
            'profile_approval_status'=>2,
            'profile_reject_reason'=>$msg
            ]);

        driver_profile_rejection::create([
            'driver_id'=>$drid,
            'profile_type'=>1,
            'rejected_by'=>1,
            'rejection_reason'=>$msg,
            'status'=>1,
            'rejected_date'=>date('Y-m-d')
            ]);



            $data['success']="success";
            echo json_encode($data);

      }


      public function reject_vdet(Request $req)
    {
        $drid=$req->did;


if ($req->err1!=0) {
    $m1=$req->err1 . '.';
}
else
{
  $m1='';
}

if ($req->err2!=0) {
   $m2=$req->err2 . '.';
}
else
{
  $m2='';
}

if ($req->err3!=0) {
    $m3=$req->err3;
}
else
{
  $m3='';
}


$msg=$m1.$m2.$m3;

        driver_registration::where('id',$drid)->update([
          'vehicle_upload_status'=>0,
            'vehicle_approval_status'=>2,
            'vehicle_reject_reason'=>$msg
            ]);

        driver_profile_rejection::create([
            'driver_id'=>$drid,
            'profile_type'=>2,
            'rejected_by'=>1,
            'rejection_reason'=>$msg,
            'status'=>1,
            'rejected_date'=>date('Y-m-d')
            ]);



            $data['success']="success";
            echo json_encode($data);

      }


       public function reject_lsdet(Request $req)
    {
        $drid=$req->did;


if ($req->err1!=0) {
    $m1=$req->err1;
}
else
{
  $m1='';
}

$msg=$m1;

        driver_primary_document::where('driver_id',$drid)->update([
          'licensefront_upload_status'=>0,
            'licensefront_approval_status'=>2,
            'licensefront_rejection_reason'=>$msg
            ]);

        driver_profile_rejection::create([
            'driver_id'=>$drid,
            'profile_type'=>3,
            'rejected_by'=>1,
            'rejection_reason'=>$msg,
            'status'=>1,
            'rejected_date'=>date('Y-m-d')
            ]);



            $data['success']="success";
            echo json_encode($data);

      }

       public function reject_lsdetback(Request $req)
    {
        $drid=$req->did;


if ($req->err1!=0) {
    $m1=$req->err1;
}
else
{
  $m1='';
}

$msg=$m1;

        driver_primary_document::where('driver_id',$drid)->update([
          'licenseback_upload_status'=>0,
            'licenseback_approval_status'=>2,
            'licenseback_rejection_reason'=>$msg
            ]);

        driver_profile_rejection::create([
            'driver_id'=>$drid,
            'profile_type'=>3,
            'rejected_by'=>1,
            'rejection_reason'=>$msg,
            'status'=>1,
            'rejected_date'=>date('Y-m-d')
            ]);



            $data['success']="success";
            echo json_encode($data);

      }

   public function reject_rcdet(Request $req)
    {
        $drid=$req->did;


if ($req->err1!=0) {
    $m1=$req->err1;
}
else
{
  $m1='';
}

$msg=$m1;

        driver_primary_document::where('driver_id',$drid)->update([
          'rc_upload_status'=>0,
            'rc_approval_status'=>2,
            'rc_rejection_reason'=>$msg
            ]);

        driver_profile_rejection::create([
            'driver_id'=>$drid,
            'profile_type'=>4,
            'rejected_by'=>1,
            'rejection_reason'=>$msg,
            'status'=>1,
            'rejected_date'=>date('Y-m-d')
            ]);



            $data['success']="success";
            echo json_encode($data);

      }

       public function reject_indet(Request $req)
    {
        $drid=$req->did;


if ($req->err1!=0) {
    $m1=$req->err1;
}
else
{
  $m1='';
}

$msg=$m1;

        driver_primary_document::where('driver_id',$drid)->update([
          'insurance_upload_status'=>0,
            'insurance_approval_status'=>2,
            'insurance_rejection_reason'=>$msg
            ]);

        driver_profile_rejection::create([
            'driver_id'=>$drid,
            'profile_type'=>5,
            'rejected_by'=>1,
            'rejection_reason'=>$msg,
            'status'=>1,
            'rejected_date'=>date('Y-m-d')
            ]);



            $data['success']="success";
            echo json_encode($data);

      } 


      public function reject_pldet(Request $req)
    {
        $drid=$req->did;


if ($req->err1!=0) {
    $m1=$req->err1;
}
else
{
  $m1='';
}

$msg=$m1;

        driver_secondary_document::where('driver_id',$drid)->update([
          'pollution_upload_status'=>0,
            'pollution_approval_status'=>2,
            'pollution_rejection_reason'=>$msg
            ]);

        driver_profile_rejection::create([
            'driver_id'=>$drid,
            'profile_type'=>6,
            'rejected_by'=>1,
            'rejection_reason'=>$msg,
            'status'=>1,
            'rejected_date'=>date('Y-m-d')
            ]);



            $data['success']="success";
            echo json_encode($data);

      }   


       public function reject_prdet(Request $req)
    {
        $drid=$req->did;


if ($req->err1!=0) {
    $m1=$req->err1;
}
else
{
  $m1='';
}

$msg=$m1;

        driver_secondary_document::where('driver_id',$drid)->update([
          'permit_upload_status'=>0,
            'permit_approval_status'=>2,
            'permit_rejection_reason'=>$msg
            ]);

        driver_profile_rejection::create([
            'driver_id'=>$drid,
            'profile_type'=>6,
            'rejected_by'=>1,
            'rejection_reason'=>$msg,
            'status'=>1,
            'rejected_date'=>date('Y-m-d')
            ]);



            $data['success']="success";
            echo json_encode($data);

      }   

      ///////////////////////////////////////

       public function reject_for_resubmission(Request $req)
    {
        $drid=$req->did;



        driver_registration::where('id',$drid)->update([
          'profile_submission'=>0,

            ]);

            $data['success']="success";
            echo json_encode($data);

      }    

  public function send_for_approval(Request $req)
    {
        $drid=$req->did;



        driver_registration::where('id',$drid)->update([
          'admin_approval_status'=>1,

            ]);

            $data['success']="success";
            echo json_encode($data);

      } 

///////////////////////////////////
  public function driver_area()
    {
        $franchise=Auth::guard('franchise')->user()->id;
       $driver=driver_registration::select('id','driver_id','photo','name')->where('franchise',$franchise)->where('status',1)->latest()->limit(4)->get();
        return view('franchise.DriverArea',['driver'=>$driver]);
       
    } 

    public function active_drivers()
    {
        $franchise=Auth::guard('franchise')->user()->id;
       $driver=driver_registration::select('id','driver_id','name','mobile','approved_date','valid_to')->where('franchise',$franchise)->where('status',1)->latest()->get();
        return view('franchise.ActiveDrivers',['driver'=>$driver]);
       
    } 

      public function active_driver_profile($did)
    {
      $drid=decrypt($did);
      $driver_det=driver_registration::where('id',$drid)->first();
       $franchise=Auth::guard('franchise')->user()->id;
      if($driver_det->franchise==$franchise)

        {
           $com=ride_booking_history::where('driver_id',$driver_det->id)->where('status',6)->count();
          $rej=ride_booking_history::where('driver_id',$driver_det->id)->where('status',2)->count();
          $timeout=ride_booking_history::where('driver_id',$driver_det->id)->where('status',4)->count();
         
          return view('franchise.ActiveDriverProfile',['driver_det'=>$driver_det,'com'=>$com,'rej'=>$rej,'timeout'=>$timeout]);  
        }
        else
        {
          return redirect('/unauthorized-access');
        }
    
      
      
    }  


     public function rc_expiring_drivers()

    {
      $dt=date('Y-m-d');
      $time = strtotime(date('Y-m-d'));
      $final = date("Y-m-d", strtotime("+1 month", $time));

        $franchise=Auth::guard('franchise')->user()->id;
       $driver=driver_primary_document::where('franchise',$franchise)->where('rc_expiry','>=',$dt)->where('rc_expiry','<=',$final)->orderBy('rc_expiry','ASC')->get();
        return view('franchise.RCExpiringDrivers',['driver'=>$driver]);
       
    } 

     public function license_expiring_drivers()
     
    {
      $dt=date('Y-m-d');
      $time = strtotime(date('Y-m-d'));
      $final = date("Y-m-d", strtotime("+1 month", $time));

        $franchise=Auth::guard('franchise')->user()->id;
       $driver=driver_primary_document::where('franchise',$franchise)->where('license_expiry','>=',$dt)->where('rc_expiry','<=',$final)->orderBy('license_expiry','ASC')->get();
        return view('franchise.LicenseExpiringDrivers',['driver'=>$driver]);
       
    } 

     public function insurance_expiring_drivers()
     
    {
      $dt=date('Y-m-d');
      $time = strtotime(date('Y-m-d'));
      $final = date("Y-m-d", strtotime("+1 month", $time));

        $franchise=Auth::guard('franchise')->user()->id;
       $driver=driver_primary_document::where('franchise',$franchise)->where('insurance_expiry','>=',$dt)->where('insurance_expiry','<=',$final)->orderBy('insurance_expiry','ASC')->get();
        return view('franchise.InsuranceExpiringDrivers',['driver'=>$driver]);
       
    } 

     public function pollution_expiring_drivers()
     
    {
      $dt=date('Y-m-d');
      $time = strtotime(date('Y-m-d'));
      $final = date("Y-m-d", strtotime("+1 month", $time));

        $franchise=Auth::guard('franchise')->user()->id;
       $driver=driver_secondary_document::where('franchise',$franchise)->where('pollution_expiry','>=',$dt)->where('pollution_expiry','<=',$final)->orderBy('pollution_expiry','ASC')->get();
        return view('franchise.PollutionExpiringDrivers',['driver'=>$driver]);
       
    } 

    public function permit_expiring_drivers()
     
    {
      $dt=date('Y-m-d');
      $time = strtotime(date('Y-m-d'));
      $final = date("Y-m-d", strtotime("+1 month", $time));

        $franchise=Auth::guard('franchise')->user()->id;
       $driver=driver_secondary_document::where('franchise',$franchise)->where('permit_expiry','>=',$dt)->where('permit_expiry','<=',$final)->orderBy('permit_expiry','ASC')->get();
        return view('franchise.PermitExpiringDrivers',['driver'=>$driver]);
       // print_r(bcrypt("admin"));
    } 

    //////////////

         public function rc_expired_drivers()

    {
      $dt=date('Y-m-d');
        $franchise=Auth::guard('franchise')->user()->id;
       $driver=driver_primary_document::where('franchise',$franchise)->where('rc_expiry','<',$dt)->orderBy('rc_expiry','ASC')->get();
        return view('franchise.RCExpiredDrivers',['driver'=>$driver]);
       // print_r(bcrypt("admin"));
    } 

     public function license_expired_drivers()
     
    {
      $dt=date('Y-m-d');

        $franchise=Auth::guard('franchise')->user();
       $driver=driver_primary_document::where('franchise',$franchise->id)->where('license_expiry','<',$dt)->orderBy('license_expiry','ASC')->get();
        return view('franchise.LicenseExpiredDrivers',['driver'=>$driver]);
       // print_r(bcrypt("admin"));
    } 

     public function insurance_expired_drivers()
     
    {
      $dt=date('Y-m-d');
        $franchise=Auth::guard('franchise')->user();
       $driver=driver_primary_document::where('franchise',$franchise->id)->where('insurance_expiry','<',$dt)->orderBy('insurance_expiry','ASC')->get();
        return view('franchise.InsuranceExpiredDrivers',['driver'=>$driver]);
       // print_r(bcrypt("admin"));
    } 

     public function pollution_expired_drivers()
     
    {
      $dt=date('Y-m-d'); 
       $franchise=Auth::guard('franchise')->user();
       $driver=driver_secondary_document::where('franchise',$franchise->id)->where('pollution_expiry','<',$dt)->orderBy('pollution_expiry','ASC')->get();
        return view('franchise.PollutionExpiredDrivers',['driver'=>$driver]);
       // print_r(bcrypt("admin"));
    } 

    public function permit_expired_drivers()
     
    {
      $dt=date('Y-m-d'); 
       $franchise=Auth::guard('franchise')->user();
       $driver=driver_secondary_document::where('franchise',$franchise->id)->where('pollution_expiry','<',$dt)->orderBy('pollution_expiry','ASC')->get();
        return view('franchise.PermitExpiredDrivers',['driver'=>$driver]);
       // print_r(bcrypt("admin"));
    } 




      public function block_driver(Request $req)
    {
        $drid=$req->did;

                    if ($req->err1!=0) {
                $m1=$req->err1 . '.';
            }
            else
            {
              $m1='';
            }

            if ($req->err2!=0) {
               $m2=$req->err2 . '.';
            }
            else
            {
              $m2='';
            }

            if ($req->err3!=0) {
                $m3=$req->err3 . '.';
            }
            else
            {
              $m3='';
            }

             if ($req->err4!=0) {
                $m4=$req->err4 . '.';
            }
            else
            {
              $m4='';
            }
             if ($req->err5!=0) {
                $m5=$req->err5 . '.';
            }
            else
            {
              $m5='';
            }
             if ($req->err6!=0) {
                $m6=$req->err6 . '.';
            }
            else
            {
              $m6='';
            }



            $msg=$m1.$m2.$m3.$m4.$m5.$m6;


         active_driver::where('dr_id',$drid)->update([
        
           'status'=>2 
            ]);

        driver_registration::where('id',$drid)->update([
            'status'=>3,
            'account_reject_reason'=>$msg,
             'account_rejected_date'=>date('Y-m-d')
            ]);

          driver_primary_document::where('driver_id',$drid)->update([
            'status'=>2
            ]);
          driver_secondary_document::where('driver_id',$drid)->update([
            'status'=>2
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

        public function reactivate_driver(Request $req)
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


        public function reactivate_driver_req(Request $req)
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
          driver_reactivate_request::where('driver_id',$drid)->update([
            'status'=>1
            ]);

            $data['success']="success";
            echo json_encode($data);

      }


       public function deactivate_driver_req(Request $req)
    {
        $drid=$req->did;



         active_driver::where('dr_id',$drid)->update([
        
           'status'=>3 
            ]);
        driver_registration::where('id',$drid)->update([
            'status'=>4,
            'account_reject_reason'=>$req->reason,
            'account_rejected_date'=>date('Y-m-d'),
            ]);

          driver_primary_document::where('driver_id',$drid)->update([
            'status'=>3
            ]);
          driver_secondary_document::where('driver_id',$drid)->update([
            'status'=>3
            ]);

          driver_deactivate_history::create([
            'driver_id'=>$drid,
            'deactivated_by'=>1,
            'reason'=>$req->reason,
            ]);

            $data['success']="success";
            echo json_encode($data);

      }

        public function deactivate_driver(Request $req)
    {
        $drid=$req->did;

         active_driver::where('dr_id',$drid)->update([
        
           'status'=>3 
            ]);
        driver_registration::where('id',$drid)->update([
            'status'=>4,
            'account_reject_reason'=>$req->reason,
            'account_rejected_date'=>date('Y-m-d'),
            ]);

          driver_primary_document::where('driver_id',$drid)->update([
            'status'=>3
            ]);
          driver_secondary_document::where('driver_id',$drid)->update([
            'status'=>3
            ]);
          driver_reactivate_request::where('driver_id',$drid)->update([
            'status'=>2
            ]);

          driver_deactivate_history::create([
            'driver_id'=>$drid,
            'deactivated_by'=>1,
            'reason'=>$req->reason,
            ]);

            $data['success']="success";
            echo json_encode($data);

      }


       public function blocked_drivers()
     
    {
      // $dt=date('Y-m-d'); 
        $franchise=Auth::guard('franchise')->user()->id;
        $driver=driver_registration::select('id','driver_id','name','mobile','account_reject_reason','account_rejected_date',)->where('franchise',$franchise)->where('status',3)->orderBy('driver_id','ASC')->get();
        return view('franchise.BlockedDrivers',['driver'=>$driver]);
       // print_r(bcrypt("admin"));
    }

     public function deactivated_drivers()
     
    {
      // $dt=date('Y-m-d'); 
        $franchise=Auth::guard('franchise')->user()->id;
        $driver=driver_registration::select('id','driver_id','name','mobile','status','account_rejected_date','account_reject_reason')->where('franchise',$franchise)->where('status',4)->orderBy('driver_id','ASC')->get();
        return view('franchise.DeactivatedDrivers',['driver'=>$driver]);
       
    }

      public function self_deactivated_drivers()
     
    {
      // $dt=date('Y-m-d'); 
        $franchise=Auth::guard('franchise')->user()->id;
        $driver=driver_registration::select('id','driver_id','name','mobile','status','account_rejected_date','account_reject_reason')->where('franchise',$franchise)->where('status',5)->orderBy('driver_id','ASC')->get();
        return view('franchise.SelfDeactivatedDrivers',['driver'=>$driver]);
       
    }

     public function admin_deactivated_drivers()
     
    {
      // $dt=date('Y-m-d'); 
        $franchise=Auth::guard('franchise')->user()->id;
        $driver=driver_registration::select('id','driver_id','name','mobile','status','account_rejected_date','account_reject_reason')->where('franchise',$franchise)->where('status',6)->orderBy('driver_id','ASC')->get();
        return view('franchise.AdminDeactivatedDrivers',['driver'=>$driver]);
       
    }

     public function reactivation_drivers_list()
     
    {
      // $dt=date('Y-m-d'); 
        $franchise=Auth::guard('franchise')->user()->id;
        $driver=driver_registration::select('id','driver_id','name','mobile','status')->where('franchise',$franchise)->where('status',7)->orderBy('driver_id','ASC')->get();
        return view('franchise.ReactivationDriversList',['driver'=>$driver]);
       
    }



    public function driver_profile_updates()
     
    {
      // $dt=date('Y-m-d'); 
        $franchise=Auth::guard('franchise')->user()->id;
        $driver=driver_docs_reupload::where('franchise',$franchise)->where('status',0)->latest()->get();
        return view('franchise.DriverProfileUpdates',['driver'=>$driver]);
       // print_r(bcrypt("admin"));
    }


    public function driver_rejprofile_updates()
     
    {
      // $dt=date('Y-m-d'); 
        $franchise=Auth::guard('franchise')->user()->id;
        $driver=driver_docs_reupload::where('franchise',$franchise)->where('status',2)->latest()->get();
        return view('franchise.DriverRejProfileUpdates',['driver'=>$driver]);
       // print_r(bcrypt("admin"));
    }

    public function driver_document_verify($pid)
     
    {
       $profid=decrypt($pid); 
       $docs=driver_docs_reupload::where('id',$profid)->first();
    
          $driver_rej=driver_profile_rejection::where('driver_id',$docs->driver_id)->latest()->get();
      

      if($docs->doc_type==1)
      {
        return view('franchise.DriverRCReVerify',['docs'=>$docs,'driver_rej'=>$driver_rej]);
      }
      
      if($docs->doc_type==3)
      {
        return view('franchise.DriverInsuranceReVerify',['docs'=>$docs,'driver_rej'=>$driver_rej]);
      }
      if($docs->doc_type==4)
      {
        return view('franchise.DriverPollutionReVerify',['docs'=>$docs,'driver_rej'=>$driver_rej]);
      }
      if($docs->doc_type==5)
      {
        return view('franchise.DriverPermitReVerify',['docs'=>$docs,'driver_rej'=>$driver_rej]);
      }

      if($docs->doc_type==20)
      {
        return view('franchise.DriverLicenseFrontReVerify',['docs'=>$docs,'driver_rej'=>$driver_rej]);
      }

      if($docs->doc_type==21)
      {
        return view('franchise.DriverLicenseBackReVerify',['docs'=>$docs,'driver_rej'=>$driver_rej]);
      }
        
        
       
    }


      public function send_for_docapproval(Request $req)
    {
        $drid=$req->did;
        $docid=$req->docid;

         driver_docs_reupload::where('id',$docid)->update([
        
           'franchise_approval'=>1,
           'admin_approval'=>0,
           'doc_expiry'=>$req->dlexpiry

            ]);

            $data['success']="success";
            echo json_encode($data);

      }


        public function reject_driverdoc(Request $req)
    {
        $docid=$req->docid;


if ($req->err1!=0) {
    $m1=$req->err1;
}
else
{
  $m1='';
}

$msg=$m1;

        driver_docs_reupload::where('id',$docid)->update([
          'doc_upload_status'=>0,
            'doc_approval_status'=>2,
            'franchise_approval'=>2,
            'status'=>2,
            'doc_rejection_reason'=>$msg
            ]);

        driver_profile_rejection::create([
            'driver_id'=>$req->drid,
            'profile_type'=>0,
            'rejected_by'=>1,
            'rejection_reason'=>$msg,
            'status'=>1,
            'rejected_date'=>date('Y-m-d')
            ]);



            $data['success']="success";
            echo json_encode($data);

      }  



      public function driver_documents($did)
     
    {
       $docid=decrypt($did); 
       $docs=driver_document_history::where('driver_id',$docid)->where('status',1)->get();
        
       $driver= driver_registration::select('name','driver_id','id')->where('id',$docid)->first();

        return view('franchise.DriverDocuments',['docs'=>$docs,'driver'=>$driver]);
     
        
       
    } 

      public function driver_profile_rejections($did)
     
    {
       $drid=decrypt($did); 
      $driver_rej=driver_profile_rejection::where('driver_id',$drid)->latest()->get();
       $driver= driver_registration::select('name','driver_id','id')->where('id',$drid)->first();
        return view('franchise.DriverProfileRejections',['driver_rej'=>$driver_rej,'driver'=>$driver]);
           
    } 

    public function driver_account_deactivations($did)
     
    {
       $drid=decrypt($did); 
      $driver_deact=driver_deactivate_history::where('driver_id',$drid)->latest()->get();
       $driver= driver_registration::select('name','driver_id','id')->where('id',$drid)->first();
        return view('franchise.DriverAccountDeactivations',['driver_deact'=>$driver_deact,'driver'=>$driver]);
           
    } 

      public function driver_account_reactivations($did)
     
    {
       $drid=decrypt($did); 
      $driver_react=driver_reactivate_request::where('driver_id',$drid)->latest()->get();
       $driver= driver_registration::select('name','driver_id','id')->where('id',$drid)->first();
        return view('franchise.DriverAccountReactivations',['driver_react'=>$driver_react,'driver'=>$driver]);
           
    } 

    public function driver_renewals_history($did)
     
    {
       $drid=decrypt($did); 
      $renewals=driver_renewal_history::where('driver_id',$drid)->latest()->get();
      $driver= driver_registration::select('name','driver_id','id')->where('id',$drid)->first();
      return view('franchise.DriverRenewalHistory',['renewals'=>$renewals,'driver'=>$driver]);
            
    } 

    public function expired_drivers()
     
    {
        $dt=date('Y-m-d');
        $franchise=Auth::guard('franchise')->user()->id;
        $driver=driver_registration::select('id','driver_id','name','mobile','valid_to')->where('franchise',$franchise)->where('status',1)->where('valid_to','<',$dt)->orderBy('valid_to','ASC')->get();
        return view('franchise.ExpiredDrivers',['driver'=>$driver]);

    }



      public function driver_search($did)
    {
       $franchise=Auth::guard('franchise')->user()->id;
      $driver_det=driver_registration::where('driver_id',$did)->where('franchise',$franchise)->first();
      
      if($driver_det)

        {
          // $com=ride_booking_history::where('driver_id',$driver_det->id)->where('status',6)->count();
          // $rej=ride_booking_history::where('driver_id',$driver_det->id)->where('status',2)->count();
          // $timeout=ride_booking_history::where('driver_id',$driver_det->id)->where('status',4)->count();
          // return view('franchise.ActiveDriverProfile',['driver_det'=>$driver_det,'com'=>$com,'rej'=>$rej,'timeout'=>$timeout]);
          return view('franchise.ActiveDriverProfile',['driver_det'=>$driver_det]);  
        }
        else
        {
          return redirect('/unauthorized-access');
        }
    
      
      
    }

     public function franchise_profile_update(Request $req)
    {
       $franchise=Auth::guard('franchise')->user()->id;
       $frdet=franchise_detail::where('id',$franchise)->first();
        $img = $req->file('img');
        if($img=='')
        {
            $new_name=$frdet->photo;
        }
        else{
             $imgWillDelete = public_path() . $frdet->photo;
             File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = "franchise/" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('franchise'), $new_name);
            //$ins['Photo']=$new_name;
        }
     
     franchise_detail::where('id',$franchise)->update([

        'proprietor_name' => $req->cname,
        'franchise_mobile' => $req->cmobile,
        'mail_id' => $req->cmail,
        'photo' => $new_name,


     ]);

     $data['success']="success";
     echo json_encode($data);
      
    }






    ///////////////


    public function register_driver()

    {
      
        $franchise=Auth::guard('franchise')->user()->id;
       $driver=driver_registration::where('franchise',$franchise)->where('status',0)->where('added_by',1)->orderBy('id','ASC')->get();
        return view('franchise.RegisterDriver',['driver'=>$driver]);
       
    } 

    public function add_driver()

    {
      
        $state=state::get();
        $dist=district::get(); 
        $cat=vehicle_category::where('status',1)->get();    
        return view('franchise.AddDriver',['stat'=>$state,'dist'=>$dist,'cat'=>$cat]);
       
    } 

    public function driver_add(Request $req)

    {
      $franchise=Auth::guard('franchise')->user()->id;

      if (driver_registration::where('mobile', $req->mobile)->exists()) 
                    {
                       $data['err']="error";
                    }
                    else
                    {

       $img = $req->file('img');
                if($img=='')
                    {
                        $new_name='';
                    }
                 else
                    {
                        
                        $image = $req->file('img');
                         $new_name = "/drivers/" . time() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('drivers'), $new_name);  
                    }

        $dr_id=rand(10001,99999);

            driver_registration::create([
            'driver_id'=>$dr_id,    
            'name'=>$req->name,
            'mobile'=>$req->mobile,
            'franchise'=>$franchise,
            'password'=>bcrypt($req->newpass),
            'blood_group'=>$req->bloodgp,
            'house_name'=>$req->hname,
            'location'=>$req->location,
            'district'=>$req->dist,
            'state'=>$req->state,
            'pin'=>$req->pin,
            'photo'=>$new_name,
            'vehicle_category'=>$req->vcat,
            'vehicle_type'=>$req->vtype,
            'profile_submission'=>0,
            'admin_approval_status'=>0,
            'profile_upload_status'=>1,
            'profile_approval_status'=>0,  
            'vehicle_upload_status'=>1,
            'vehicle_approval_status'=>0, 
            'added_by'=>1,
                        

                        ]);
            $data['success']="success";
        }
     echo json_encode($data);
       
    } 


     public function driver_profile_add($drid)

    {
      
        $did=decrypt($drid); 
        $state=state::get();
        $dist=district::get();
        $cat=vehicle_category::where('status',1)->get();
        $regfee=driver_reg_fee::where('id',1)->first();

        $driver=driver_registration::where('id',$did)->first();  
        $types=vehicle_type::where('status',1)->where('category',$driver->vehicle_category)->get();

        if (driver_primary_document::where('driver_id', $did)->doesntExist())
                            {
                                driver_primary_document::create([
                                'driver_id'=>$did,
                                'franchise'=>$driver->franchise,  
                        
                                ]);
                            } 

                            if (driver_secondary_document::where('driver_id', $did)->doesntExist())
                            {
                                driver_secondary_document::create([
                                'driver_id'=>$did,
                                'franchise'=>$driver->franchise,  
                        
                                ]);
                            }  
        return view('franchise.DriverProfileAdd',['driver'=>$driver,'stat'=>$state,'dist'=>$dist,'cat'=>$cat,'types'=>$types,'regfee'=>$regfee]);
       
    } 

     public function get_type(Request $req)
  {
    $did=$req->uid;
    $data=vehicle_type::where('category',$did)->get();

    $v=0;
    $val="Choose..";
    
    echo "<option value=".$v.">".$val."</option>";
      
        foreach($data as $dt){
           echo "<option value=".$dt->id.">".$dt->type."</option>";
        }
  }


  public function add_driver_pdetails(Request $req)

    {
      $franchise=Auth::guard('franchise')->user()->id;

     $driver=driver_registration::select('photo')->where('id',$req->drid)->first();

     // $driver_pr=driver_primary_document::select('license_frontfile','license_backfile','rc_file','insurance_file')->where('driver_id',$req->drid)->first();
     //  $driver_sec=driver_secondary_document::select('pollution_file','permit_file')->where('driver_id',$req->drid)->first();

      if (driver_registration::where('mobile', $req->mobile)->where('id','!=', $req->drid)->exists()) 
                    {
                       $data['err']="error";
                    }
                    else
                    {


                $img = $req->file('img');
                if($img=='')
                    {
                       $new_name=$driver->photo;
                    }
                 else
                    {
                        $imgWillDelete = public_path() . $driver->photo;
                        
                        File::delete($imgWillDelete);
                        $image = $req->file('img');
                         $new_name = "/drivers/" . time() . '.' . $image->getClientOriginalExtension();
                        $image->move(public_path('drivers'), $new_name);  
                    }

   

            driver_registration::where('id',$req->drid)->update([
               
            'name'=>$req->name,
            'mobile'=>$req->mobile,
            'franchise'=>$franchise,
            'blood_group'=>$req->bloodgp,
            'house_name'=>$req->hname,
            'location'=>$req->location,
            'district'=>$req->dist,
            'state'=>$req->state,
            'pin'=>$req->pin,
            'photo'=>$new_name,
            'profile_upload_status'=>1,
            'profile_approval_status'=>0,  
           
            // 'profile_submission'=>1,
            // 'admin_approval_status'=>0,
           
                        

                        ]);
            $data['success']="success";
        }
     echo json_encode($data);
       
    } 



public function add_driver_vdetails(Request $req)

    {
      $franchise=Auth::guard('franchise')->user()->id;

     //$driver=driver_registration::where('id',$req->drid)->first();
    

            driver_registration::where('id',$req->drid)->update([
               
            'vehicle_category'=>$req->vcat,
            'vehicle_type'=>$req->vtype,
             'vehicle_upload_status'=>1,
            'vehicle_approval_status'=>0,        

                        ]);
            $data['success']="success";
        
     echo json_encode($data);
       
    }



public function add_driver_docs(Request $req)

    {
      $franchise=Auth::guard('franchise')->user()->id;

     $driver=driver_registration::where('id',$req->drid)->first();
 
     $driver_pr=driver_primary_document::select('license_frontfile','license_backfile','rc_file','insurance_file','licensefront_upload_status','licensefront_approval_status','licenseback_upload_status','licenseback_approval_status','insurance_upload_status','insurance_approval_status','rc_upload_status','rc_approval_status')->where('driver_id',$req->drid)->first();

      $driver_sec=driver_secondary_document::select('pollution_file','permit_file','pollution_upload_status','pollution_approval_status','permit_upload_status','permit_approval_status')->where('driver_id',$req->drid)->first();

     

                $pdf1 = $req->file('pdf1');
                if($pdf1=='')
                    {
                       $new_name1=$driver_pr->license_frontfile;
                       $su1=$driver_pr->licensefront_upload_status;
                       $sa1=$driver_pr->licensefront_approval_status;

                    }
                 else
                    {
                        $imgWillDelete1 = public_path() . $driver_pr->license_frontfile;
                        
                        File::delete($imgWillDelete1);
                        $image1 = $req->file('pdf1');
                         $new_name1 = "/driver_license/front" . time() . '.' . $image1->getClientOriginalExtension();
                        $image1->move(public_path('driver_license'), $new_name1);

                         $su1=1;
                         $sa1=0;  
                    }

                    $pdf2 = $req->file('pdf2');
                if($pdf2=='')
                    {
                       $new_name2=$driver_pr->license_backfile;
                        $su2=$driver_pr->licenseback_upload_status;
                       $sa2=$driver_pr->licenseback_approval_status;
                    }
                 else
                    {
                        $imgWillDelete2 = public_path() . $driver_pr->license_backfile;
                        
                        File::delete($imgWillDelete2);
                        $image2 = $req->file('pdf2');
                         $new_name2 = "/driver_license/back" . time() . '.' . $image2->getClientOriginalExtension();
                        $image2->move(public_path('driver_license'), $new_name2); 
                          $su2=1;
                         $sa2=0; 
                    }
                    ///
                     $pdf3 = $req->file('pdf3');
                if($pdf3=='')
                    {
                       $new_name3=$driver_pr->rc_file;
                        $su3=$driver_pr->rc_upload_status;
                       $sa3=$driver_pr->rc_approval_status;
                    }
                 else
                    {
                        $imgWillDelete3 = public_path() . $driver_pr->rc_file;
                        
                        File::delete($imgWillDelete3);
                        $image3 = $req->file('pdf3');
                         $new_name3 = "/vehicle_rc/" . time() . '.' . $image3->getClientOriginalExtension();
                        $image3->move(public_path('vehicle_rc'), $new_name3);
                        $su3=1;
                         $sa3=0;  
                    }

                    //////

                     $pdf4 = $req->file('pdf4');
                if($pdf4=='')
                    {
                       $new_name4=$driver_pr->insurance_file;
                        $su4=$driver_pr->insurance_upload_status;
                       $sa4=$driver_pr->insurance_approval_status;
                    }
                 else
                    {
                        $imgWillDelete4 = public_path() . $driver_pr->insurance_file;
                        
                        File::delete($imgWillDelete4);
                        $image4 = $req->file('pdf4');
                         $new_name4 = "/vehicle_insurance/" . time() . '.' . $image4->getClientOriginalExtension();
                        $image4->move(public_path('vehicle_insurance'), $new_name4);
                        $su4=1;
                         $sa4=0;  
                    }

                    /////

                      $pdf5 = $req->file('pdf5');
                if($pdf5=='')
                    {
                       $new_name5=$driver_sec->pollution_file;
                         $su5=$driver_sec->pollution_upload_status;
                       $sa5=$driver_sec->pollution_approval_status;
                    }
                 else
                    {
                        $imgWillDelete5 = public_path() . $driver_sec->pollution_file;
                        
                        File::delete($imgWillDelete5);
                        $image5 = $req->file('pdf5');
                         $new_name5 = "/pollution_certificate/" . time() . '.' . $image5->getClientOriginalExtension();
                        $image5->move(public_path('pollution_certificate'), $new_name5);
                        $su5=1;
                         $sa5=0;  
                    }


                      $pdf6 = $req->file('pdf6');
                if($pdf6=='')
                    {
                       $new_name6=$driver_sec->pollution_file;
                       $su6=$driver_sec->permit_upload_status;
                       $sa6=$driver_sec->permit_approval_status;
                    }
                 else
                    {
                        $imgWillDelete6 = public_path() . $driver_sec->pollution_file;
                        
                        File::delete($imgWillDelete6);
                        $image6 = $req->file('pdf6');
                         $new_name6 = "/vehicle_permit/" . time() . '.' . $image6->getClientOriginalExtension();
                        $image6->move(public_path('vehicle_permit'), $new_name6);
                         $su6=1;
                         $sa6=0;  
                    }



                

            driver_primary_document::where('driver_id',$req->drid)->update([
               
            'license_frontfile'=>$new_name1,
            'licensefront_upload_status'=>$su1,
            'licensefront_approval_status'=>$sa1,
            'license_backfile'=>$new_name2,
            'licenseback_upload_status'=>$su2,
            'licenseback_approval_status'=>$sa2,
            'rc_file'=>$new_name3,
            'rc_upload_status'=>$su3,  
            'rc_approval_status'=>$sa3,
            'insurance_file'=>$new_name4,
            'insurance_upload_status'=>$su4,
            'insurance_approval_status'=>$sa4,
           
            
                        ]);

            driver_secondary_document::where('driver_id',$req->drid)->update([
               
            'pollution_file'=>$new_name5,
            'pollution_upload_status'=>$su5,
            'pollution_approval_status'=>$sa5,
            'permit_file'=>$new_name6,
            'permit_upload_status'=>$su6,
            'permit_approval_status'=>$sa6,
                   
            
                        ]);



            $data['success']="success";
        
     echo json_encode($data);
       
    } 


    public function driver_profile_submit(Request $req)

    {
      $franchise=Auth::guard('franchise')->user()->id;

$user=driver_registration::select('profile_upload_status','vehicle_upload_status')->where('id',$req->drid)->first();
    
    driver_secondary_document::where('driver_id',$req->drid)->update([
                'payment_status'=>1, 
                'amount'=>$req->fee,
                'payment_date'=>$req->pdt,  
                ]);

    $pdocs=driver_primary_document::select('licensefront_upload_status','licenseback_upload_status','rc_upload_status','insurance_upload_status')->where('driver_id',$req->drid)->first();
    $sdocs=driver_secondary_document::select('pollution_upload_status','permit_upload_status','payment_status')->where('driver_id',$req->drid)->first();

        if($user->profile_upload_status==1 && $user->vehicle_upload_status==1 && $pdocs->licensefront_upload_status==1 && $pdocs->licenseback_upload_status==1 && $pdocs->rc_upload_status==1 && $pdocs->insurance_upload_status==1 && $sdocs->pollution_upload_status==1 && $sdocs->permit_upload_status==1 && $sdocs->payment_status==1 )
        {
            driver_registration::where('id',$req->drid)->update([
                'profile_submission'=>1,
                'admin_approval_status'=>0,

                ]);
            $data['success']="success";
         }   
         else
         {
            $data['err']="error";
         }
        
     echo json_encode($data);
       
    }


}
