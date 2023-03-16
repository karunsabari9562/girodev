<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
 use Illuminate\Support\Facades\Hash;
use App\Models\franchise_detail;
use App\Models\franchise_renewal;
use App\Models\driver_registration;
use App\Models\driver_primary_document;
use App\Models\driver_secondary_document;
use App\Models\state;
use App\Models\district;
use App\Models\vehicle_category;
use App\Models\vehicle_type;
use App\Models\vehicle_model;
use App\Models\driver_reg_fee;
use App\Models\driver_docs_reupload;


class DriverApiController extends Controller
{
	public function all_franchise()
    {
       $franchise=franchise_detail::select('id','franchise_name','franchise_type')->where('status',1)->get();
       return response()->json([

			
				'franchise'=>$franchise

				])->header('status_code', 200)


       ;
    }


    public function driver_mobile_verify(Request $req)
		
	{

		 $rules = [
    				'mobile' => 'required',
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails()) 
			 {
  				return response()->json(['error_message'=>$validator->errors()],400);
			 }

			else 
			 {

				if (driver_registration::where('mobile', $req->mobile)->exists()) 
					{
						$otp=rand(100001,999999);
						$date = date("Y-m-d H:i:s");
						$currentDate = strtotime($date);
						$futureDate = $currentDate+(60*5);
						$formatDate = date("Y-m-d H:i:s", $futureDate);
						
						driver_registration::where('mobile',$req->mobile)->update([

						'login_otp'=>$otp,
						//'login_otp'=>"111111",
						'otp_expiry'=>$formatDate

						]);
			$response=Http::get('http://sms.firstdial.info/sendsms?uname=girokab&pwd=girokab2023&senderid=GIROKB&to='.$req->mobile.'&msg=Dear%20User,'.$otp.'%20is%20your%20OTP%20for%20GiroKab%20app%20login.%20Do%20not%20share%20with%20others.%20Thank%20You&route=T&peid=1701167429639010331&tempid=1707167454240943316');

					return response()->json(['reg_status'=>1,'message'=>'Otp sent successfully'],200);
			 		}
			
				else
					{
		  			return response()->json(['reg_status'=>0,'message'=>'Unregistered mobile Number !'],400);

					}
			}
		
	}

    public function driver_registration(Request $req)
		
	{
	       
	       $rules = [
    				'name' => 'required',
    				'mobile' => 'required',
    				'franchise_id' => 'required',
    				'password'=>'required'
					];
				
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails()) 
			    {
  			       return response()->json(['message'=>"Validation error"],400);
				} 
			else 
				{
					if (driver_registration::where('mobile', $req->mobile)->exists()) 
					{
						return response()->json(['message'=>"Mobile number already exists"],400);
					}
					else
					{
						$dr_id=rand(10001,99999);
						$otp=rand(100001,999999);
						//$otp="111111";

						$date = date("Y-m-d H:i:s");
						$currentDate = strtotime($date);
						$futureDate = $currentDate+(60*5);
						$formatDate = date("Y-m-d H:i:s", $futureDate);

						driver_registration::create([
						'driver_id'=>$dr_id,	
						'name'=>$req->name,
						'mobile'=>$req->mobile,
						'franchise'=>$req->franchise_id,
						'password'=>bcrypt($req->password),
						'login_otp'=>$otp,
						'otp_expiry'=>$formatDate,
						'profile_submission'=>0,
						'admin_approval_status'=>0,
						

						]);
						
						//$user=driver_registration::select('id','status','profile_submission','login_otp','mobile')->where('mobile',$req->mobile)->first();
						//$token=$user->createToken('driver-app',['driver']);

						$dr_det=driver_registration::select('id','franchise','driver_id','status','profile_submission')->where('driver_id',$dr_id)->first();
						if($dr_det)
							{
						driver_primary_document::create([
								'driver_id'=>$dr_det->id,
								'franchise'=>$dr_det->franchise,	
						
						        ]);
						driver_secondary_document::create([
								'driver_id'=>$dr_det->id,
								'franchise'=>$dr_det->franchise,	
						
						        ]);

						  $response=Http::get('http://sms.firstdial.info/sendsms?uname=girokab&pwd=girokab2023&senderid=GIROKB&to='.$req->mobile.'&msg=Dear%20User,'.$otp.'%20is%20your%20OTP%20for%20GiroKab%20app%20login.%20Do%20not%20share%20with%20others.%20Thank%20You&route=T&peid=1701167429639010331&tempid=1707167454240943316');

								//$token=$dr_det->createToken('driver-app',['driver']);
								return response()->json([
									
								//'token'=>$token->accessToken,
								//'driver_id'=>$dr_det->driver_id,
							//'status'=>$dr_det->status,
							//'profile_submission_status'=>$dr_det->profile_submission,
							'message'=>'Registration completed successfully.Otp sent successfully.',
							],200);
							}
							else
							{
								return response()->json(['message'=>'Invalid.'],401);
							}

			    	}
				}

	}

/////////////////////////////


		public function driver_otp_login(Request $req)
		
	{
		$rules = [
					'mobile'=> 'required',
    				'otp' => 'required',
    				'device_key' => 'required',
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails()) 
			 {
  				return response()->json(['error_message'=>$validator->errors()],400);
			 }

			 else 
			 {

				$user=driver_registration::select('id','status','profile_submission','login_otp','otp_expiry','mobile')->where('mobile',$req->mobile)->first();
				if($user)
					{
						if($req->otp==$user->login_otp)
							{

								$otdt=date("Y-m-d H:i:s");
								if($user->otp_expiry<$otdt)
								{
									driver_registration::where('id',$user->id)->update([
									
									'login_otp'=>'',
							
							        ]);
									return response()->json(['message'=>'Otp Expired !'],400);
								}
								else
								{


								$token=$user->createToken('driver-app',['driver']);

								driver_registration::where('id',$user->id)->update([
									'device_key'=>$req->device_key,
									'login_otp'=>'',
							
							        ]);


									if (driver_primary_document::where('driver_id', $user->id)->doesntExist())
								{
									driver_primary_document::create([
									'driver_id'=>$user->id,
									'franchise'=>$user->franchise,	
							
							        ]);
								} 

								if (driver_secondary_document::where('driver_id', $user->id)->doesntExist())
								{
									driver_secondary_document::create([
									'driver_id'=>$user->id,
									'franchise'=>$user->franchise,	
							
							        ]);
								} 
								return response()->json([

								'token'=>$token->accessToken,
								'status'=>$user->status,
								'profile_submission_status'=>$user->profile_submission,
								'message'=>'Login success.'

								],200);
							}
						}

						else
							{
								return response()->json(['message'=>'Incorrect otp !'],400);

							}



					}
				else
					{
		   				return response()->json(['message'=>'Invalid Driver !'],400); 
					}
			}
	}

////////////////////////////////////////////////////////////



	public function driver_password_login(Request $req)
		
	{
		 $rules = [
	       			//'photo' => 'required',
    				'driver_id' => 'required',
    				'password' => 'required',
    				'device_key' => 'required',
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails()) 
			 {
  				return response()->json(['error_message'=>$validator->errors()],400);
			 }

			else 
			 {

				$user=driver_registration::select('id','driver_id','status','profile_submission','password')->where('driver_id',$req->driver_id)->first();
				if($user)
					{
						if(Hash::check($req->password,$user->password))
						{
							$token=$user->createToken('driver-app',['driver']);

							driver_registration::where('id',$user->id)->update([
									'device_key'=>$req->device_key,
									'login_otp'=>'',
							
							        ]);

							if (driver_primary_document::where('driver_id', $user->id)->doesntExist())
							{
								driver_primary_document::create([
								'driver_id'=>$user->id,
								'franchise'=>$user->franchise,	
						
						        ]);
							} 

							if (driver_secondary_document::where('driver_id', $user->id)->doesntExist())
							{
								driver_secondary_document::create([
								'driver_id'=>$user->id,
								'franchise'=>$user->franchise,	
						
						        ]);
							} 

							return response()->json([

							'token'=>$token->accessToken,
							'status'=>$user->status,
							'profile_submission_status'=>$user->profile_submission,
							'message'=>'Login success.'
							],200);
						}
						else
						{
						return response()->json(['message'=>'Invalid Driver !'],400);

						}
			 		}
				else
					{
		   			return response()->json(['message'=>'Invalid Driver !'],400); 
					}
			 }	
	}


/////////////////////////////////	

	public function driver_personal_details_view()
		
	{
		$user=Auth::guard('driverapi')->user();
		return response()->json([

				'name'=>$user->name,
				'mobile'=>$user->mobile,
				'franchise'=>$user->GetFranchise->franchise_name,
				// 'photo'=>$user->photo,
				'blood_group'=>$user->blood_group,
				'house_name'=>$user->house_name,
				'location'=>$user->location,
				'district'=>$user->district,
				'state'=>$user->state,
				'pin'=>$user->pin,
				'profile_upload_status'=>$user->profile_upload_status,
				'profile_approval_status'=>$user->profile_approval_status,
				'profile_reject_reason'=>$user->profile_reject_reason,			

				],200);
		
	}

	public function all_states()
    {
       $state=state::get();
       return response()->json([

			
				'state'=>$state

				],200);


       ;
    }

	public function all_districts($sid)
    {
       $districts=district::where('state_id',$sid)->where('status',1)->get();
       return response()->json([

			
				'districts'=>$districts

				],200);


       ;
    }



	public function driver_personal_details_update(Request $req)
		
	{
		 $rules = [
	       			// 'img' => 'required',
    				'blood_group' => 'required',
    				'house_name' => 'required',
    				'location' => 'required',
    				'district'=>'required',
    				'state' => 'required',
    				'pin' => 'required',
    				
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user();
				 
				driver_registration::where('id',$user->id)->update([
				// 'photo'=>$new_name,
				'blood_group'=>$req->blood_group,
				'house_name'=>$req->house_name,
				'location'=>$req->location,
				'district'=>$req->district,
				'state'=>$req->state,
				'pin'=>$req->pin,
				'profile_upload_status'=>1,
				'profile_approval_status'=>0,	
				]);

				return response()->json([	

				'message'=>'Personal details updated successfully !'	

				],200);
		}
	}

/////////////////////////////////////////////////////

	/////////////////////////////////////////////////////

	public function driver_profile_photo_view()
		
	{
		$user=Auth::guard('driverapi')->user();
		return response()->json([

				
				 'photo'=>$user->photo,
			
				],200);
		
	}

		public function driver_profile_photo_update(Request $req)
		
	{
		 $rules = [
	       			 'img' => 'required',
    				
    				
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user();
				 $img = $req->file('img');
        		if($img=='')
        			{
            			$new_name=$user->photo;
        			}
       			 else
       			 	{
	              		$imgWillDelete = public_path() . $user->photo;
	              		
	            		File::delete($imgWillDelete);
	          			$image = $req->file('img');
	            		 $new_name = "/drivers/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('drivers'), $new_name);  
        		 	}
		

				driver_registration::where('id',$user->id)->update([
				 'photo'=>$new_name,
				
				]);

				return response()->json([	

				'message'=>'Profile photo updated successfully !'	

				],200);
		}
	}

/////////////////////////////////////////////////////


public function vehicle_categories()
    {
       $categories=vehicle_category::where('status',1)->get();
       return response()->json([

			
				'categories'=>$categories

				],200);


       ;
    }

    public function vehicle_types($catid)
    {
       $types=vehicle_type::where('category',$catid)->where('status',1)->get();
       return response()->json([

			
				'types'=>$types

				],200);


       ;
    }

    // public function vehicle_models($typeid)
    // {
    //    $models=vehicle_model::where('type',$typeid)->where('status',1)->get();
    //    return response()->json([

			
				// 'models'=>$models

				// ],200);


    //    ;
    // }

public function driver_vehicle_details_view()
		
	{
		$user=Auth::guard('driverapi')->user();
		return response()->json([

				'vehicle_category'=>$user->vehicle_category,
				'vehicle_type'=>$user->vehicle_type,
				// 'vehicle_model'=>$user->vehicle_model,
				'vehicle_upload_status'=>$user->vehicle_upload_status,
				'vehicle_approval_status'=>$user->vehicle_approval_status,
				'vehicle_reject_reason'=>$user->vehicle_reject_reason,			

				],200);
		
	}


	public function driver_vehicle_details_update(Request $req)
		
	{
		 $rules = [
	       			//'photo' => 'required',
    				'vehicle_category' => 'required',
    				'vehicle_type' => 'required',
    				// 'vehicle_model' => 'required',
    				
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user();
			
				driver_registration::where('id',$user->id)->update([
				'vehicle_category'=>$req->vehicle_category,
				'vehicle_type'=>$req->vehicle_type,
				'vehicle_model'=>0,
				'vehicle_upload_status'=>1,
				'vehicle_approval_status'=>0,	
				]);

				return response()->json([	

				'message'=>'Vehicle details updated successfully !'	

				],200);
		}
	}


	/////////////////////////////////////////////////


	public function driver_licensefront(Request $req)
		
	{
		 $rules = [
	       			'license_frontfile' => 'required',
	       			//'license_backfile' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user()->id;
				$docs=driver_primary_document::select('id','driver_id','license_frontfile')->where('driver_id',$user)->first();

				 $img = $req->file('license_frontfile');
        		if($img=='')
        			{
            			$new_name=$docs->license_frontfile;
        			}
       			 else
       			 	{
	              		$imgWillDelete = public_path() . $docs->license_frontfile;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('license_frontfile');
	            		 $new_name = "/driver_license/front" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('driver_license'), $new_name);  
        		 	}


				driver_primary_document::where('driver_id',$user)->update([
				'license_frontfile'=>$new_name,
				// 'license_backfile'=>$new_name1,
				'licensefront_upload_status'=>1,
				'licensefront_approval_status'=>0,	
				]);

				return response()->json([	

				'message'=>'Driving license front side uploaded successfully !'	

				],200);
		}
	}


	public function driver_licensefront_view()
		
	{
		$user=Auth::guard('driverapi')->user()->id;
		$documents=driver_primary_document::select('id','driver_id','license_frontfile','licensefront_upload_status','licensefront_approval_status','licensefront_rejection_reason')->where('driver_id',$user)->first();
		return response()->json([

				'license_frontfile'=>$documents->license_frontfile,
				'licensefront_upload_status'=>$documents->licensefront_upload_status,
				'licensefront_approval_status'=>$documents->licensefront_approval_status,
				'licensefront_rejection_reason'=>$documents->licensefront_rejection_reason,
				

				],200);
		
	}


	/////////////////////////////

	/////////////////////////////////////////////////


	public function driver_licenseback(Request $req)
		
	{
		 $rules = [
	       			'license_backfile' => 'required',
	       			//'license_backfile' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user()->id;
				$docs=driver_primary_document::select('id','driver_id','license_backfile')->where('driver_id',$user)->first();

				 $img = $req->file('license_backfile');
        		if($img=='')
        			{
            			$new_name=$docs->license_backfile;
        			}
       			 else
       			 	{
	              		$imgWillDelete = public_path() . $docs->license_backfile;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('license_backfile');
	            		 $new_name = "/driver_license/back" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('driver_license'), $new_name);  
        		 	}


				driver_primary_document::where('driver_id',$user)->update([
				'license_backfile'=>$new_name,
				// 'license_backfile'=>$new_name1,
				'licenseback_upload_status'=>1,
				'licenseback_approval_status'=>0,	
				]);

				return response()->json([	

				'message'=>'Driving license back side uploaded successfully !'	

				],200);
		}
	}


	public function driver_licenseback_view()
		
	{
		$user=Auth::guard('driverapi')->user()->id;
		$documents=driver_primary_document::select('id','driver_id','license_backfile','licenseback_upload_status','licenseback_approval_status','licenseback_rejection_reason')->where('driver_id',$user)->first();
		return response()->json([

				'license_backfile'=>$documents->license_backfile,
				'licenseback_upload_status'=>$documents->licenseback_upload_status,
				'licenseback_approval_status'=>$documents->licenseback_approval_status,
				'licenseback_rejection_reason'=>$documents->licenseback_rejection_reason,
				

				],200);
		
	}


	/////////////////////////////

	public function vehicle_rc(Request $req)
		
	{
		 $rules = [
	       			'vehicle_rc' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user()->id;
				$docs=driver_primary_document::select('id','driver_id','rc_file')->where('driver_id',$user)->first();
				 $img = $req->file('vehicle_rc');
        		if($img=='')
        			{
            			$new_name=$docs->rc_file;
        			}
       			 else
       			 	{
	              		$imgWillDelete = public_path() . $docs->rc_file;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('vehicle_rc');
	            		 $new_name = "/vehicle_rc/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('vehicle_rc'), $new_name);  
        		 	}
		
				driver_primary_document::where('driver_id',$user)->update([
				'rc_file'=>$new_name,
				'rc_upload_status'=>1,	
				'rc_approval_status'=>0,	
				]);

				return response()->json([	

				'message'=>'Vehicle RC uploaded successfully !'	

				],200);
		}
	}


	public function vehicle_rc_view()
		
	{
		$user=Auth::guard('driverapi')->user()->id;
		$documents=driver_primary_document::select('id','driver_id','rc_file','rc_upload_status','rc_approval_status','rc_rejection_reason','rc_expiry')->where('driver_id',$user)->first();
		return response()->json([

				'rc_file'=>$documents->rc_file,
				'rc_upload_status'=>$documents->rc_upload_status,
				'rc_approval_status'=>$documents->rc_approval_status,
				'rc_rejection_reason'=>$documents->rc_rejection_reason,
				'rc_expiry_date'=>$documents->rc_expiry,

				],200);
		
	}

/////////////////////////////

	public function vehicle_insurance(Request $req)
		
	{
		 $rules = [
	       			'vehicle_insurance' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user()->id;
				$docs=driver_primary_document::select('id','driver_id','insurance_file')->where('driver_id',$user)->first();
				 $img = $req->file('vehicle_insurance');
        		if($img=='')
        			{
            			$new_name=$docs->insurance_file;
        			}
       			 else
       			 	{
	              		$imgWillDelete = public_path() . $docs->insurance_file;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('vehicle_insurance');
	            		 $new_name = "/vehicle_insurance/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('vehicle_insurance'), $new_name);  
        		 	}
		
				driver_primary_document::where('driver_id',$user)->update([
				'insurance_file'=>$new_name,
				'insurance_upload_status'=>1,
				'insurance_approval_status'=>0,	
				]);

				return response()->json([	

				'message'=>'Vehicle Insurance uploaded successfully !'	

				],200);
		}
	}


	public function vehicle_insurance_view()
		
	{
		$user=Auth::guard('driverapi')->user()->id;
		$documents=driver_primary_document::select('id','driver_id','insurance_file','insurance_upload_status','insurance_approval_status','insurance_rejection_reason','insurance_expiry')->where('driver_id',$user)->first();
		return response()->json([

				'insurance_file'=>$documents->insurance_file,
				'insurance_upload_status'=>$documents->insurance_upload_status,
				'insurance_approval_status'=>$documents->insurance_approval_status,
				'insurance_rejection_reason'=>$documents->insurance_rejection_reason,
				'insurance_expiry_date'=>$documents->insurance_expiry,

				],200);
		
	}



	/////////////////////////////

	public function pollution_certificate(Request $req)
		
	{
		 $rules = [
	       			'pollution_certificate' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user()->id;
				$docs=driver_secondary_document::select('id','driver_id','pollution_file')->where('driver_id',$user)->first();
				 $img = $req->file('pollution_certificate');
        		if($img=='')
        			{
            			$new_name=$docs->pollution_file;
        			}
       			 else
       			 	{
	              		$imgWillDelete = public_path() . $docs->pollution_file;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('pollution_certificate');
	            		 $new_name = "/pollution_certificate/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('pollution_certificate'), $new_name);  
        		 	}
		
				driver_secondary_document::where('driver_id',$user)->update([
				'pollution_file'=>$new_name,
				'pollution_upload_status'=>1,
				'pollution_approval_status'=>0,	
				]);

				return response()->json([	

				'message'=>'Pollution certificate uploaded successfully !'	

				],200);
		}
	}


	public function pollution_certificate_view()
		
	{
		$user=Auth::guard('driverapi')->user()->id;
		$documents=driver_secondary_document::select('id','driver_id','pollution_file','pollution_upload_status','pollution_approval_status','pollution_rejection_reason','pollution_expiry')->where('driver_id',$user)->first();
		return response()->json([

				'pollution_file'=>$documents->pollution_file,
				'pollution_upload_status'=>$documents->pollution_upload_status,
				'pollution_approval_status'=>$documents->pollution_approval_status,
				'pollution_rejection_reason'=>$documents->pollution_rejection_reason,
				'pollution_expiry_date'=>$documents->pollution_expiry,

				],200);
		
	}


	/////////////////////////////

	/////////////////////////////

	public function vehicle_permit(Request $req)
		
	{
		 $rules = [
	       			'vehicle_permit' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user()->id;
				$docs=driver_secondary_document::select('id','driver_id','permit_file')->where('driver_id',$user)->first();
				 $img = $req->file('vehicle_permit');
        		if($img=='')
        			{
            			$new_name=$docs->permit_file;
        			}
       			 else
       			 	{
	              		$imgWillDelete = public_path() . $docs->permit_file;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('vehicle_permit');
	            		 $new_name = "/vehicle_permit/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('vehicle_permit'), $new_name);  
        		 	}
		
				driver_secondary_document::where('driver_id',$user)->update([
				'permit_file'=>$new_name,
				'permit_upload_status'=>1,
				'permit_approval_status'=>0,	
				]);

				return response()->json([	

				'message'=>'Vehicle Permit uploaded successfully !'	

				],200);
		}
	}


	public function vehicle_permit_view()
		
	{
		$user=Auth::guard('driverapi')->user()->id;
		$documents=driver_secondary_document::select('id','driver_id','permit_file','permit_upload_status','permit_approval_status','permit_rejection_reason','permit_expiry')->where('driver_id',$user)->first();
		return response()->json([

				'permit_file'=>$documents->permit_file,
				'permit_upload_status'=>$documents->permit_upload_status,
				'permit_approval_status'=>$documents->permit_approval_status,
				'permit_rejection_reason'=>$documents->permit_rejection_reason,
				'permit_expiry_date'=>$documents->permit_expiry,

				],200);
		
	}


	/////////////////////////////


	public function driver_registration_fee()
		
	{
		$user=Auth::guard('driverapi')->user();
		$fee=driver_reg_fee::where('id',1)->first();
		return response()->json([

				'registration_fee'=>$fee->fee,
				],200);
		
	}

	public function driver_fee_payment(Request $req)
		
	{
		$rules = [
	       			'payment_date' => 'required',
	       			'amount' => 'required',
	       			'reference_id' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {
		
				$user=Auth::guard('driverapi')->user()->id;
				
				// $fee=driver_reg_fee::where('id',1)->first();

				driver_secondary_document::where('driver_id',$user)->update([
				'payment_status'=>1,
				'payment_date'=>$req->payment_date,	
				'amount'=>$req->amount,	
				'reference_id'=>$req->reference_id,	
				]);

				

				return response()->json([	

				'message'=>'Fee payment completed successfully.'	

				],200);
		}
		
			
		
	}


/////////////////////////////

public function driver_profile_submission()
		
	{
		$user=Auth::guard('driverapi')->user();
		$pdocs=driver_primary_document::select('licensefront_upload_status','licenseback_upload_status','rc_upload_status','insurance_upload_status')->where('driver_id',$user->id)->first();
		$sdocs=driver_secondary_document::select('pollution_upload_status','permit_upload_status','payment_status')->where('driver_id',$user->id)->first();

		if($user->profile_upload_status==1 && $user->vehicle_upload_status==1 && $pdocs->licensefront_upload_status==1 && $pdocs->licenseback_upload_status==1 && $pdocs->rc_upload_status==1 && $pdocs->insurance_upload_status==1 && $sdocs->pollution_upload_status==1 && $sdocs->permit_upload_status==1 && $sdocs->payment_status==1 )
		{
			driver_registration::where('id',$user->id)->update([
				'profile_submission'=>1,
				'admin_approval_status'=>0,

				]);	

			return response()->json([	

				'message'=>'Profile submitted for approval successfully.'	

				],200);
		}
		else
		{
			return response()->json([	

				'message'=>'Please complete all sections.'	

				],400);

				
		}
		
		
	}	


	/////////////////////////////

	public function vehicle_rc_reupload(Request $req)
		
	{
		 $rules = [
	       			'vehicle_rc' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user();
				$docs=driver_docs_reupload::where('driver_id',$user->id)->where('status','!=',1)->where('doc_type',1)->first();

				if($docs)
				{
				 $img = $req->file('vehicle_rc');
				
        		if($img=='')
        			{
            			$new_name=$docs->doc_file;
        			}
       			 else
       			 	{
	              		$imgWillDelete = public_path() . $docs->doc_file;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('vehicle_rc');
	            		 $new_name = "/vehicle_rc/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('vehicle_rc'), $new_name);  
        		 	}
		
				driver_docs_reupload::where('driver_id',$user->id)->where('status','!=',1)->where('doc_type',1)->update([
				'doc_file'=>$new_name,
				'doc_upload_status'=>1,	
				'doc_approval_status'=>0,
				'franchise_approval'=>0,
				'status'=>0,	
				'doc_rejection_reason'=>'',	
				'admin_approval'=>0,
				'admin_reject_reason'=>'',
				'doc_expiry'=>NULL,
				 ]);
				}
				else
				{
					 $img = $req->file('vehicle_rc');
				
        		if($img=='')
        			{
            			$new_name=$docs->doc_file;
        			}
       			 else
       			 	{
	              		
	          			$image = $req->file('vehicle_rc');
	            		 $new_name = "/vehicle_rc/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('vehicle_rc'), $new_name);  
        		 	}
					driver_docs_reupload::create([
				'driver_id'=>$user->id,
				'franchise'=>$user->franchise,
				'doc_type'=>1,			
				'doc_file'=>$new_name,
				'doc_upload_status'=>1,	
				'doc_approval_status'=>0,
				'franchise_approval'=>0,
				'status'=>0,
				'doc_rejection_reason'=>'',	
				'admin_approval'=>0,
				'admin_reject_reason'=>'',
				'doc_expiry'=>NULL,	
				 ]);
				}

				return response()->json([	

				'message'=>'Vehicle RC uploaded successfully !'	

				],200);
		}
	}


	public function vehicle_rc_review()
		
	{
		$user=Auth::guard('driverapi')->user();
		$documents=driver_docs_reupload::where('driver_id',$user->id)->where('doc_type',1)->where('status','!=',1)->first();
		if($documents)
		{
		return response()->json([

				'rc_file'=>$documents->doc_file,
				'rc_upload_status'=>$documents->doc_upload_status,
				'rc_approval_status'=>$documents->doc_approval_status,
				'rc_rejection_reason'=>$documents->doc_rejection_reason,
				

				],200);
		}
		else
		{
			return response()->json([

				'message'=>'No upload found !',
				

				],200);
		}
		
	}

/////////////////////////////



	/////////////////////////////

	public function driver_licensefront_reupload(Request $req)
		
	{
		 $rules = [
	       			'license_frontfile' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user();
				$docs=driver_docs_reupload::where('driver_id',$user->id)->where('status','!=',1)->where('doc_type',20)->first();

				if($docs)
				{
				 $img = $req->file('license_frontfile');
				
        		if($img=='')
        			{
            			$new_name=$docs->doc_file;
        			}
       			 else
       			 	{
	              		$imgWillDelete = public_path() . $docs->doc_file;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('license_frontfile');
	            		 $new_name = "/driver_license/front" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('driver_license'), $new_name);  
        		 	}
		
				driver_docs_reupload::where('driver_id',$user->id)->where('status','!=',1)->where('doc_type',20)->update([
				'doc_file'=>$new_name,
				'doc_upload_status'=>1,	
				'doc_approval_status'=>0,
				'franchise_approval'=>0,
				'status'=>0,	
				'doc_rejection_reason'=>'',	
				'admin_approval'=>0,
				'admin_reject_reason'=>'',
				'doc_expiry'=>NULL,	
				 ]);
				}
				else
				{
					 $img = $req->file('license_frontfile');
				
        		if($img=='')
        			{
            			$new_name=$docs->doc_file;
        			}
       			 else
       			 	{
	              		
	          			$image = $req->file('license_frontfile');
	            		 $new_name = "/driver_license/front" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('driver_license'), $new_name);  
        		 	}
					driver_docs_reupload::create([
				'driver_id'=>$user->id,
				'franchise'=>$user->franchise,
				'doc_type'=>20,			
				'doc_file'=>$new_name,
				'doc_upload_status'=>1,	
				'doc_approval_status'=>0,
				'franchise_approval'=>0,
				'status'=>0,
				'doc_rejection_reason'=>'',	
				'admin_approval'=>0,
				'admin_reject_reason'=>'',
				'doc_expiry'=>NULL,	
				 ]);
				}

				return response()->json([	

				'message'=>'Driving License front side uploaded successfully !'	

				],200);
		}
	}


	public function driver_licensefront_review()
		
	{
		$user=Auth::guard('driverapi')->user();
		$documents=driver_docs_reupload::where('driver_id',$user->id)->where('doc_type',20)->where('status','!=',1)->first();
		if($documents)
		{
		return response()->json([

				'licensefront_file'=>$documents->doc_file,
				'licensefront_upload_status'=>$documents->doc_upload_status,
				'licensefront_approval_status'=>$documents->doc_approval_status,
				'licensefront_rejection_reason'=>$documents->doc_rejection_reason,
				

				],200);
		}
		else
		{
			return response()->json([

				'message'=>'No upload found !',
				

				],200);
		}
	}




	public function driver_licenseback_reupload(Request $req)
		
	{
		 $rules = [
	       			'license_backfile' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user();
				$docs=driver_docs_reupload::where('driver_id',$user->id)->where('status','!=',1)->where('doc_type',21)->first();

				if($docs)
				{
				 $img = $req->file('license_backfile');
				
        		if($img=='')
        			{
            			$new_name=$docs->doc_file;
        			}
       			 else
       			 	{
	              		$imgWillDelete = public_path() . $docs->doc_file;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('license_backfile');
	            		 $new_name = "/driver_license/back" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('driver_license'), $new_name);  
        		 	}
		
				driver_docs_reupload::where('driver_id',$user->id)->where('status','!=',1)->where('doc_type',21)->update([
				'doc_file'=>$new_name,
				'doc_upload_status'=>1,	
				'doc_approval_status'=>0,
				'franchise_approval'=>0,
				'status'=>0,	
				'doc_rejection_reason'=>'',	
				'admin_approval'=>0,
				'admin_reject_reason'=>'',
				'doc_expiry'=>NULL,	
				 ]);
				}
				else
				{
					 $img = $req->file('license_backfile');
				
        		if($img=='')
        			{
            			$new_name=$docs->doc_file;
        			}
       			 else
       			 	{
	              		
	          			$image = $req->file('license_backfile');
	            		 $new_name = "/driver_license/back" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('driver_license'), $new_name);  
        		 	}
					driver_docs_reupload::create([
				'driver_id'=>$user->id,
				'franchise'=>$user->franchise,
				'doc_type'=>21,			
				'doc_file'=>$new_name,
				'doc_upload_status'=>1,	
				'doc_approval_status'=>0,
				'franchise_approval'=>0,
				'status'=>0,
				'doc_rejection_reason'=>'',	
				'admin_approval'=>0,
				'admin_reject_reason'=>'',
				'doc_expiry'=>NULL,	
				 ]);
				}

				return response()->json([	

				'message'=>'Driving License back side uploaded successfully !'	

				],200);
		}
	}


	public function driver_licenseback_review()
		
	{
		$user=Auth::guard('driverapi')->user();
		$documents=driver_docs_reupload::where('driver_id',$user->id)->where('doc_type',21)->where('status','!=',1)->first();
		if($documents)
		{
		return response()->json([

				'licenseback_file'=>$documents->doc_file,
				'licenseback_upload_status'=>$documents->doc_upload_status,
				'licenseback_approval_status'=>$documents->doc_approval_status,
				'licenseback_rejection_reason'=>$documents->doc_rejection_reason,
				

				],200);
		}
		else
		{
			return response()->json([

				'message'=>'No upload found !',
				

				],200);
		}
	}

/////////////////////////////





	/////////////////////////////

	public function vehicle_insurance_reupload(Request $req)
		
	{
		 $rules = [
	       			'vehicle_insurance' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user();
				$docs=driver_docs_reupload::where('driver_id',$user->id)->where('status','!=',1)->where('doc_type',3)->first();

				if($docs)
				{
				 $img = $req->file('vehicle_insurance');
				
        		if($img=='')
        			{
            			$new_name=$docs->doc_file;
        			}
       			 else
       			 	{
	              		$imgWillDelete = public_path() . $docs->doc_file;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('vehicle_insurance');
	            		 $new_name = "/vehicle_insurance/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('vehicle_insurance'), $new_name);  
        		 	}
		
				driver_docs_reupload::where('driver_id',$user->id)->where('status','!=',1)->where('doc_type',3)->update([
				'doc_file'=>$new_name,
				'doc_upload_status'=>1,	
				'doc_approval_status'=>0,
				'franchise_approval'=>0,
				'status'=>0,	
				'doc_rejection_reason'=>'',	
				'admin_approval'=>0,
				'admin_reject_reason'=>'',
				'doc_expiry'=>NULL,	
				 ]);
				}
				else
				{
					 $img = $req->file('vehicle_insurance');
				
        		if($img=='')
        			{
            			$new_name=$docs->doc_file;
        			}
       			 else
       			 	{
	              		
	          			$image = $req->file('vehicle_insurance');
	            		 $new_name = "/vehicle_insurance/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('vehicle_insurance'), $new_name);  
        		 	}
					driver_docs_reupload::create([
				'driver_id'=>$user->id,
				'franchise'=>$user->franchise,
				'doc_type'=>3,			
				'doc_file'=>$new_name,
				'doc_upload_status'=>1,	
				'doc_approval_status'=>0,
				'franchise_approval'=>0,
				'status'=>0,
				'doc_rejection_reason'=>'',	
				'admin_approval'=>0,
				'admin_reject_reason'=>'',
				'doc_expiry'=>NULL,	
				 ]);
				}

				return response()->json([	

				'message'=>'Insurance certificate uploaded successfully !'	

				],200);
		}
	}


	public function vehicle_insurance_review()
		
	{
		$user=Auth::guard('driverapi')->user();
		$documents=driver_docs_reupload::where('driver_id',$user->id)->where('doc_type',3)->where('status','!=',1)->first();
		if($documents)
		{
		return response()->json([

				'insurance_file'=>$documents->doc_file,
				'insurance_upload_status'=>$documents->doc_upload_status,
				'insurance_approval_status'=>$documents->doc_approval_status,
				'insurance_rejection_reason'=>$documents->doc_rejection_reason,
				

				],200);
		}
		else
		{
			return response()->json([

				'message'=>'No upload found !',
				

				],200);
		}
	}

/////////////////////////////


	/////////////////////////////

	public function pollution_certificate_reupload(Request $req)
		
	{
		 $rules = [
	       			'pollution_certificate' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user();
				$docs=driver_docs_reupload::where('driver_id',$user->id)->where('status','!=',1)->where('doc_type',4)->first();

				if($docs)
				{
				 $img = $req->file('pollution_certificate');
				
        		if($img=='')
        			{
            			$new_name=$docs->doc_file;
        			}
       			 else
       			 	{
	              		$imgWillDelete = public_path() . $docs->doc_file;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('pollution_certificate');
	            		 $new_name = "/pollution_certificate/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('pollution_certificate'), $new_name);  
        		 	}
		
				driver_docs_reupload::where('driver_id',$user->id)->where('status','!=',1)->where('doc_type',4)->update([
				'doc_file'=>$new_name,
				'doc_upload_status'=>1,	
				'doc_approval_status'=>0,
				'franchise_approval'=>0,
				'status'=>0,	
				'doc_rejection_reason'=>'',	
				'admin_approval'=>0,
				'admin_reject_reason'=>'',
				'doc_expiry'=>NULL,	
				 ]);
				}
				else
				{
					 $img = $req->file('pollution_certificate');
				
        		if($img=='')
        			{
            			$new_name=$docs->doc_file;
        			}
       			 else
       			 	{
	              		
	          			$image = $req->file('pollution_certificate');
	            		 $new_name = "/pollution_certificate/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('pollution_certificate'), $new_name);  
        		 	}
					driver_docs_reupload::create([
				'driver_id'=>$user->id,
				'franchise'=>$user->franchise,
				'doc_type'=>4,			
				'doc_file'=>$new_name,
				'doc_upload_status'=>1,	
				'doc_approval_status'=>0,
				'franchise_approval'=>0,
				'status'=>0,
				'doc_rejection_reason'=>'',	
				'admin_approval'=>0,
				'admin_reject_reason'=>'',
				'doc_expiry'=>NULL,	
				 ]);
				}

				return response()->json([	

				'message'=>'Pollution certificate uploaded successfully !'	

				],200);
		}
	}


	public function pollution_certificate_review()
		
	{
		$user=Auth::guard('driverapi')->user();
		$documents=driver_docs_reupload::where('driver_id',$user->id)->where('doc_type',4)->where('status','!=',1)->first();
		if($documents)
		{
		return response()->json([

				'pollution_file'=>$documents->doc_file,
				'pollution_upload_status'=>$documents->doc_upload_status,
				'pollution_approval_status'=>$documents->doc_approval_status,
				'pollution_rejection_reason'=>$documents->doc_rejection_reason,
				

				],200);
		}
		else
		{
			return response()->json([

				'message'=>'No upload found !',
				

				],200);
		}
	}

/////////////////////////////

	public function vehicle_permit_reupload(Request $req)
		
	{
		 $rules = [
	       			'vehicle_permit' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user();
				$docs=driver_docs_reupload::where('driver_id',$user->id)->where('status','!=',1)->where('doc_type',5)->first();

				if($docs)
				{
				 $img = $req->file('vehicle_permit');
				
        		if($img=='')
        			{
            			$new_name=$docs->doc_file;
        			}
       			 else
       			 	{
	              		$imgWillDelete = public_path() . $docs->doc_file;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('vehicle_permit');
	            		 $new_name = "/vehicle_permit/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('vehicle_permit'), $new_name);  
        		 	}
		
				driver_docs_reupload::where('driver_id',$user->id)->where('status','!=',1)->where('doc_type',5)->update([
				'doc_file'=>$new_name,
				'doc_upload_status'=>1,	
				'doc_approval_status'=>0,
				'franchise_approval'=>0,
				'status'=>0,	
				'doc_rejection_reason'=>'',	
				'admin_approval'=>0,
				'admin_reject_reason'=>'',
				'doc_expiry'=>NULL,	
				 ]);
				}
				else
				{
					 $img = $req->file('vehicle_permit');
				
        		if($img=='')
        			{
            			$new_name=$docs->doc_file;
        			}
       			 else
       			 	{
	              		
	          			$image = $req->file('vehicle_permit');
	            		 $new_name = "/vehicle_permit/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('vehicle_permit'), $new_name);  
        		 	}
					driver_docs_reupload::create([
				'driver_id'=>$user->id,
				'franchise'=>$user->franchise,
				'doc_type'=>5,			
				'doc_file'=>$new_name,
				'doc_upload_status'=>1,	
				'doc_approval_status'=>0,
				'franchise_approval'=>0,
				'status'=>0,
				'doc_rejection_reason'=>'',	
				'admin_approval'=>0,
				'admin_reject_reason'=>'',
				'doc_expiry'=>NULL,	
				 ]);
				}

				return response()->json([	

				'message'=>'Vehicle Permit uploaded successfully !'	

				],200);
		}
	}


	public function vehicle_permit_review()
		
	{
		$user=Auth::guard('driverapi')->user();
		$documents=driver_docs_reupload::where('driver_id',$user->id)->where('doc_type',5)->where('status','!=',1)->first();
		if($documents)
		{
		return response()->json([

				'permit_file'=>$documents->doc_file,
				'permit_upload_status'=>$documents->doc_upload_status,
				'permit_approval_status'=>$documents->doc_approval_status,
				'permit_rejection_reason'=>$documents->doc_rejection_reason,
				

				],200);
		}
		else
		{
			return response()->json([

				'message'=>'No upload found !',
				

				],200);
		}
	}


	///////////////////////

	public function driver_profile_uploads()
		
	{
		$user=Auth::guard('driverapi')->user()->id;

		$basic_doc=driver_registration::select('profile_upload_status','profile_approval_status','vehicle_upload_status','vehicle_approval_status')->where('id',$user)->first();
		$documents=driver_primary_document::select('id','driver_id','insurance_upload_status','insurance_approval_status','licensefront_upload_status','licensefront_approval_status','licenseback_upload_status','licenseback_approval_status','rc_upload_status','rc_approval_status')->where('driver_id',$user)->first();
		$doc=driver_secondary_document::select('id','driver_id','pollution_upload_status','pollution_approval_status','permit_upload_status','permit_approval_status','payment_status')->where('driver_id',$user)->first();
		return response()->json([


				'profile_upload_status'=>$basic_doc->profile_upload_status,
				'profile_approval_status'=>$basic_doc->profile_approval_status,

				'vehicle_upload_status'=>$basic_doc->vehicle_upload_status,
				'vehicle_approval_status'=>$basic_doc->vehicle_approval_status,

				'rc_upload_status'=>$documents->rc_upload_status,
				'rc_approval_status'=>$documents->rc_approval_status,

				'licensefront_upload_status'=>$documents->licensefront_upload_status,
				'licensefront_approval_status'=>$documents->licensefront_approval_status,

				'licenseback_upload_status'=>$documents->licenseback_upload_status,
				'licenseback_approval_status'=>$documents->licenseback_approval_status,

				'insurance_upload_status'=>$documents->insurance_upload_status,
				'insurance_approval_status'=>$documents->insurance_approval_status,

				'pollution_upload_status'=>$doc->pollution_upload_status,
				'pollution_approval_status'=>$doc->pollution_approval_status,

				'permit_upload_status'=>$doc->permit_upload_status,
				'permit_approval_status'=>$doc->permit_approval_status,

				'payment_status'=>$doc->payment_status,
				

				],200);
		
	}




	public function driver_profile_status()
		
	{
		$user=Auth::guard('driverapi')->user()->id;

		$basic_doc=driver_registration::select('profile_submission','status')->where('id',$user)->first();
		
		return response()->json([


				'profile_submission'=>$basic_doc->profile_submission,
				'status'=>$basic_doc->status,

				
				

				],200);
		
	}


}
