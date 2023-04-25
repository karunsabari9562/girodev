<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth,Cache;
use App\Models\admin_detail;
use App\Models\vehicle_category;
use App\Models\vehicle_type;
use App\Models\vehicle_model;
use App\Models\fare_history;
use App\Models\driver_registration;
use App\Models\driver_reg_fee;
use App\Models\franchise_detail;
use Illuminate\Support\Facades\File;
 use Carbon\Carbon;
 use Illuminate\Support\Str;
 use Mail;
 use App\Mail\ForgotPasswordMail;
 use Illuminate\Support\Facades\Hash;
// use Barryvdh\DomPDF\Facade\Pdf;
// use App\Models\renew_request;

class AdminController extends Controller
{
    public function home()
    {
        return view('admin.LoginPage');
       // print_r(bcrypt("admin"));
    }

    public function forgot_password()
    {
        return view('admin.forgot_password.ForgotPassword');
       // print_r(bcrypt("admin"));
    }

     public function admin_mail_chk(Request $req)
    {
   
        $email=$req->email;
       
      $cnt=admin_detail::where('mail_id',$email)->count();
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

        Mail::to($email)->send(new ForgotPasswordMail($details));
        $data['success']='We have sent a password reset link to your email.';
        
      }
      

        echo json_encode($data);
    }


    public function admin_password_reset($tok,$em)
    {
        $cnt=DB::table('password_resets')->where('email',$em)->where('token',$tok)->count();
        if($cnt==0)
        {
            return view('admin.forgot_password.AdminResetPasswordExpired');
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
            return view('admin.forgot_password.AdminResetPassword',['token'=>$tok,'email'=>$em]);
            }
            else
            {
               return view('admin.forgot_password.AdminResetPasswordExpired'); 
            }
         }
       // print_r(bcrypt("admin"));
    }

    public function adminpsw_reset(Request $req)
    {
//$currentpass=auth()->guard('admin')->user()->password;
       // $oldpass=$req->oldpass;
        $newpass=$req->newpass;

        // if(Hash::check($oldpass, $currentpass))
        // {
            admin_detail::where('id',1)->update([
                'password'=>bcrypt($newpass)
            ]) ;
            $data['success']="success";
        // }
        // else{
        //     $data['err']="err";
        // }
        echo json_encode($data);
       
    }

    public function login(Request $req)
    {
        $rememberStatus=$req->rememberStatus;
        $uname=$req->username;
        $psw=$req->password;
        if($rememberStatus==0)
        {
            if(Auth::guard('admin')->attempt(['username' => $uname, 'password' => $psw]))
                {
                    $data['success']='Login success.Please wait...';
                }
            else
                {
                    $data['err']='Invalid user !';
                }    
        }
        else if($rememberStatus==1)
        {
            
            if(Auth::guard('admin')->attempt(['username' => $req->username, 'password' => $req->password],true))
                {
                    $data['success']='Login success.Please wait...';
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
        Auth::guard('admin')->logout();
        return redirect()->route('admin.home');
    }

    public function dashboard()
    {
        $cat=vehicle_category::where('status',1)->orderBy('category','ASC')->get();
        $franchise=franchise_detail::where('status',1)->orderBy('franchise_id','ASC')->get();
        return view('admin.Dashboard',['cat'=>$cat,'franchise'=>$franchise]);
    }

    public function admin_profile()
    {
        $adm=admin_detail::where('id',1)->first();
        return view('admin.AdminProfile',['adm'=>$adm]);
    }
    public function edit_admin_profile()
    {
        $adm=admin_detail::where('id',1)->first();
        return view('admin.AdminProfileEdit',['adm'=>$adm]);
    }

     public function admin_profile_update(Request $req)
    {
       
           $adm=admin_detail::where('id',1)->first();
         $img = $req->file('img');
        if($img=='')
        {
            $new_name=$adm->profile_image;
        }
        else{
             $imgWillDelete = public_path() . '/admin/img/' . $adm->profile_image;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admin/img'), $new_name);
            //$ins['Photo']=$new_name;
        }
        
            admin_detail::where('id',1)->update([
                'name'=>$req->cname,
                'mobile'=>$req->cmobile,
                'mail_id'=>$req->cmail,
                'profile_image'=>$new_name,
                'facebook'=>$req->cfb,
                'instagram'=>$req->cins,
                'twitter'=>$req->ctwitter,
            ]) ;
            $data['success']="success";
        
        echo json_encode($data);
       
    }

    public function change_password()
    {
        return view('admin.ChangePassword');
       
    }
    public function password_update(Request $req)
    {
        $currentpass=auth()->guard('admin')->user()->password;
        $oldpass=$req->oldpass;
        $newpass=$req->newpass;

        if(Hash::check($oldpass, $currentpass))
        {
            admin_detail::where('id',1)->update([
                'password'=>bcrypt($newpass)
            ]) ;
            $data['success']="success";
        }
        else{
            $data['err']="err";
        }
        echo json_encode($data);
       
    }

/////////////////////////////////////////////////

    public function fee_details()
    {
    
       $regfee=driver_reg_fee::where('id',1)->first();
       $renewfee=driver_reg_fee::where('id',2)->first();
       // $drper=driver_reg_fee::where('id',3)->first();
       // $tax=driver_reg_fee::where('id',4)->first();
       // $nightride=driver_reg_fee::where('id',5)->first();
       // $frper=driver_reg_fee::where('id',6)->first();

       print_r($regfee->fee);
       die;
       
        return view('admin.FeeDetails',['regfee'=>$regfee,'renewfee'=>$renewfee]);   
       
    }

    public function driver_regfee_edit(Request $req)
    {
       
     
        driver_reg_fee::where('id',1)->update([

            'fee'=>$req->charge,
          
            ]);

            $data['success']="success";
            echo json_encode($data);

      }

      public function driver_renewfee_edit(Request $req)
    {
       
     
        driver_reg_fee::where('id',2)->update([

            'fee'=>$req->charge1,
          
            ]);

            $data['success']="success";
            echo json_encode($data);

      }

      public function driver_per_edit(Request $req)
    {
       
     
        driver_reg_fee::where('id',3)->update([

            'fee'=>$req->per1,
          
            ]);

            $data['success']="success";
            echo json_encode($data);

      }

      public function tax_edit(Request $req)
    {
       
     
        driver_reg_fee::where('id',4)->update([

            'fee'=>$req->per2,
          
            ]);

            $data['success']="success";
            echo json_encode($data);

      }

       public function frpr_edit(Request $req)
    {
       
     
        driver_reg_fee::where('id',6)->update([

            'fee'=>$req->per3,
          
            ]);

            $data['success']="success";
            echo json_encode($data);

      }


       public function nightride_edit(Request $req)
    {
       
     
        driver_reg_fee::where('id',5)->update([

            'status'=>$req->nstat,
            'timefrom'=>$req->tfrom,
            'timeto'=>$req->tto,
            'sp_charge'=>$req->mulnum,
          
            ]);

            $data['success']="success";
            echo json_encode($data);

      }


    ///////////////////////////////////////////////////////////////////////////////////



 public function vehicle_categories()
    {
    
       $vtypes=vehicle_category::get();
       
        return view('admin.VehicleCategories',['vtypes'=>$vtypes]);   
       
    }

    public function add_vehicle_category()
    {   
        return view('admin.AddVehicleCategory');   
      
    }

    public function vehicle_category_add(Request $req)
    {
        $img = $req->file('img');
        if($img=='')
        {
            $new_name="0";
        }
        else{
          $image = $req->file('img');
             $new_name = "vehicle_categories/" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('vehicle_categories'), $new_name);
            //$ins['Photo']=$new_name;
        }
     
        vehicle_category::create([

            'category'=>$req->type,
            'category_type'=>$req->ctype,
            'icon'=>$new_name,
            'status'=>1

            ]);

            $data['success']="success";
            echo json_encode($data);

      } 

      public function edit_vehicle_category($vid)
    {   
        $vtype=decrypt($vid);
        $type=vehicle_category::where('id',$vtype)->first();
        return view('admin.EditVehicleCategory',['type'=>$type]);   
      
    } 

      

    public function vehicle_category_edit(Request $req)
    {

        $vid=$req->vid;
        $vtype_det=vehicle_category::where('id',$vid)->first();
        $img = $req->file('img');
        if($img=='')
        {
            $new_name=$vtype_det->icon;
        }
        else{
              $imgWillDelete = public_path() . $vtype_det->icon;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = "vehicle_categories/" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('vehicle_categories'), $new_name);
            //$ins['Photo']=$new_name;
        }

      
        vehicle_category::where('id',$vid)->update([

            'category'=>$req->type,
            'category_type'=>$req->ctype,
            'icon'=>$new_name,
            ]);

            $data['success']="success";
            echo json_encode($data);

      } 

      public function block_category(Request $req)
    {

        $vid=$req->body;
        vehicle_category::where('id',$vid)->update([

            'status'=>2

            ]);

$data['success']="success";
echo json_encode($data);

      }


      public function activate_category(Request $req)
    {

        $nid=$req->body;
        

        vehicle_category::where('id',$nid)->update([

            'status'=>1

            ]);

            $data['success']="success";
            echo json_encode($data);

      } 

    //      public function delete_ads(Request $req)
    // {

    //     $nid=$req->body;
        

    //     ad::where('id',$nid)->delete();

    //     $data['success']="success";
    //     echo json_encode($data);

    //   }     

////////////////////////////////////////////////////////////


      public function vehicle_types($vcat)
    {
       $cat=decrypt($vcat);
       $vtypes=vehicle_type::where('category',$cat)->get();
       $vhcat=vehicle_category::where('id',$cat)->first();
       
        return view('admin.VehicleTypes',['vtypes'=>$vtypes,'vhcat'=>$vhcat]);   
       
    }


      public function vehicle_typesadd($vcat)
    {
       $cat=decrypt($vcat);
       //$vtypes=vehicle_type::where('category',$cat)->get();
       $vhcat=vehicle_category::where('id',$cat)->first();
       
        return view('admin.VehicleTypesAdd',['vhcat'=>$vhcat]);   
       
    }



     public function vehicle_type_add(Request $req)
    {
        $img = $req->file('img');
        if($img=='')
        {
            $new_name="0";
        }
        else{
          $image = $req->file('img');
             $new_name = "vehicle_types/" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('vehicle_types'), $new_name);
            //$ins['Photo']=$new_name;
        }
        vehicle_type::create([

            'category'=>$req->cat,
            'type'=>$req->type,
            'service_charge'=>$req->sr_charge,
            'minimum_fare'=>$req->mincharge,
            'minimum_distance'=>$req->mindist,
            'fare'=>$req->charge,
            'ride_tax'=>$req->ride_tax,
            'driver_profit'=>$req->dr_profit,
            'div_profit'=>0,
            'special_ride'=>$req->spstat,
            'timefrom'=>$req->tfrom,
            'timeto'=>$req->tto,
            'sp_charge'=>$req->mlnum,
            
            'icon'=>$new_name,
            'status'=>1

            ]);

            $data['success']="success";
            echo json_encode($data);

      }


       public function vehicle_typesedit($vtype)
    {
       $type=decrypt($vtype);
       $vtypes=vehicle_type::where('id',$type)->first();
       //$vhcat=vehicle_category::where('id',$cat)->first();
       
        return view('admin.VehicleTypesEdit',['vtypes'=>$vtypes]);   
       
    } 

    public function vehicle_type_edit(Request $req)
    {

        $vid=$req->bid;

        $vtype_det=vehicle_type::where('id',$vid)->first();
        $img = $req->file('img');
        if($img=='')
        {
            $new_name=$vtype_det->icon;
        }
        else{
              $imgWillDelete = public_path() . $vtype_det->icon;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = "vehicle_types/" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('vehicle_types'), $new_name);
            //$ins['Photo']=$new_name;
        }
        
        vehicle_type::where('id',$vid)->update([

          
            'type'=>$req->type,
            'service_charge'=>$req->sr_charge,
            'minimum_fare'=>$req->mincharge,
            'minimum_distance'=>$req->mindist,
            'fare'=>$req->charge,
            'ride_tax'=>$req->ride_tax,
            'driver_profit'=>$req->dr_profit,
            'div_profit'=>0,
            'special_ride'=>$req->spstat,
            'timefrom'=>$req->tfrom,
            'timeto'=>$req->tto, 
            'sp_charge'=>$req->mlnum,          
            'icon'=>$new_name,
          
            ]);

        fare_history::create([

            'category'=>$vtype_det->category,
            'type'=>$vtype_det->id,
            'service_charge'=>$vtype_det->service_charge,
            'minimum_fare'=>$vtype_det->minimum_fare,
            'minimum_distance'=>$vtype_det->minimum_distance,
            'fare'=>$vtype_det->fare,
            'ride_tax'=>$vtype_det->ride_tax,
            'driver_profit'=>$vtype_det->driver_profit,
            'div_profit'=>0,
            'special_ride'=>$vtype_det->special_ride,
            'timefrom'=>$vtype_det->timefrom,
            'timeto'=>$vtype_det->timeto, 
            'sp_charge'=>$vtype_det->sp_charge,  
            'ipaddress'=>'',          
            
          
            ]);

            $data['success']="success";
            echo json_encode($data);

      } 


       public function vehicle_fare_edit(Request $req)
    {

        $vid=$req->bbid;

         $det= vehicle_type::where('id',$vid)->first();         
        
        vehicle_type::where('id',$vid)->update([

            'fare'=>$req->charge1,
            'minimum_fare'=>$req->mincharge1,
            'minimum_distance'=>$req->mindist1,
            ]);

        fare_history::create([

            'category'=>$req->category,
            'type'=>$vid,
            'minimum_fare'=>$req->mincharge1,
            'minimum_distance'=>$req->mindist1,
            'fare'=>$det->fare,
            'ipaddress'=>0
            ]);

            $data['success']="success";
            echo json_encode($data);

      } 

       public function fare_histories($tid)
    {
       $vtype=decrypt($tid);
       $fares=fare_history::where('type',$vtype)->get();
       $type=vehicle_type::where('id',$vtype)->first();
       
        return view('admin.VehicleHistory',['fares'=>$fares,'type'=>$type]);   
       
    }

      public function block_type(Request $req)
    {

        $vid=$req->body;
        vehicle_type::where('id',$vid)->update([

            'status'=>2

            ]);

        $data['success']="success";
        echo json_encode($data);

      }


      public function activate_type(Request $req)
    {

        $nid=$req->body;
        

        vehicle_type::where('id',$nid)->update([

            'status'=>1

            ]);

            $data['success']="success";
            echo json_encode($data);

      } 


      ////////////////////////////////////////////////////////////


      public function vehicle_models($vid)
    {
       $vtid=decrypt($vid);
       $vmodels=vehicle_model::where('type',$vtid)->get();
       $vtype=vehicle_type::where('id',$vtid)->first();
       
        return view('admin.VehicleModels',['vmodels'=>$vmodels,'vtype'=>$vtype]);   
       
    }


     public function vehicle_model_add(Request $req)
    {
        
        vehicle_model::create([

            'category'=>$req->category,
            'type'=>$req->type,
            'model'=>$req->vhmodel,
            'status'=>1

            ]);

            $data['success']="success";
            echo json_encode($data);

      } 


    public function vehicle_model_edit(Request $req)
    {

        $vid=$req->bid;
        
        vehicle_model::where('id',$vid)->update([

            'model'=>$req->vhmodel1,
            ]);

            $data['success']="success";
            echo json_encode($data);

      } 

      public function block_model(Request $req)
    {

        $vid=$req->body;
        vehicle_model::where('id',$vid)->update([

            'status'=>2

            ]);

        $data['success']="success";
        echo json_encode($data);

      }


      public function activate_model(Request $req)
    {

        $nid=$req->body;
        

        vehicle_model::where('id',$nid)->update([

            'status'=>1

            ]);

            $data['success']="success";
            echo json_encode($data);

      }

        public function driver_search($did)
    {
       
      $driver_det=driver_registration::where('driver_id',$did)->first();
      
      if($driver_det)

        {
          return view('handlefranchise.ActiveDriverProfile',['driver_det'=>$driver_det]);  
        }
        else
        {
          return redirect('/girokab-admin/invalid-driver');
        }
    
      
      
    } 

    public function invalid_driver()
    {
        return view('handlefranchise.UnauthorizedAccess');
       // print_r(bcrypt("admin"));
    }


   
    
}
