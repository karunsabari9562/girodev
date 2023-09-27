<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB,Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\customer_registration;
use App\Models\disability_document;
use App\Models\vehicle_category;

class CustomerRegApiController extends Controller
{
    public function customer_registration(Request $req)
		
	{
		
	       
	       $rules = [
    				'name'       => 'required',
    				'mobile' => 'required',
					];
				
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails()) 
			    {
  			       return response()->json(['message'=>"Validation error"],400);
				} 
			else 
				{
					if (customer_registration::where('mobile', $req->mobile)->exists()) 
					{
						return response()->json(['message'=>"Mobile number already exists"],400);
					}
					else
					{
						$otp=rand(100001,999990);
						//$otp="111111";
						$date = date("Y-m-d H:i:s");
						$currentDate = strtotime($date);
						$futureDate = $currentDate+(60*5);
						$formatDate = date("Y-m-d H:i:s", $futureDate);	
						
						customer_registration::create([
							
						'name'=>$req->name,
						'mobile'=>$req->mobile,
						'login_otp'=>$otp,
						'otp_expiry'=>$formatDate,
						'email'=>'',
						
						]);

						$response=Http::get('http://sms.firstdial.info/sendsms?uname=girokab&pwd=girokab2023&senderid=GIROKB&to='.$req->mobile.'&msg=Dear%20User,'.$otp.'%20is%20your%20OTP%20for%20GiroKab%20app%20login.%20Do%20not%20share%20with%20others.%20Thank%20You&route=T&peid=1701167429639010331&tempid=1707167454240943316');

						$customer_det=customer_registration::select('id','mobile','login_otp','status')->where('mobile',$req->mobile)->first();
						if($customer_det)
							{						

								
								return response()->json([
									
							
							'status'=>$customer_det->status,
							'message'=>'Otp sent successfully.Please verify mobile number',
							],200);
							}
							else
							{
								return response()->json(['message'=>'Invalid.'],401);
							}

			    	}
				}

	}

	public function customer_login(Request $req)
		
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

			
				 
				$customer_det=customer_registration::select('id','mobile','login_otp','status')->where('mobile',$req->mobile)->first();
						if($customer_det)
							{

								if($customer_det->status!=1)
								{

								return response()->json(['message'=>'Invalid mobile number'],400);
									
								}
								else
								{

					$otp=rand(100001,999990);
					//$otp="111111";
					$date = date("Y-m-d H:i:s");
						$currentDate = strtotime($date);
						$futureDate = $currentDate+(60*5);
						$formatDate = date("Y-m-d H:i:s", $futureDate);			
			
				customer_registration::where('mobile',$req->mobile)->update([
				'login_otp'=>$otp,
				'otp_expiry'=>$formatDate
					
				]);

					$response=Http::get('http://sms.firstdial.info/sendsms?uname=girokab&pwd=girokab2023&senderid=GIROKB&to='.$req->mobile.'&msg=Dear%20User,'.$otp.'%20is%20your%20OTP%20for%20GiroKab%20app%20login.%20Do%20not%20share%20with%20others.%20Thank%20You&route=T&peid=1701167429639010331&tempid=1707167454240943316');
			
				return response()->json([	
		
				'message'=>'Otp sent successfully.'	

				],200);
				}
			}
				else
				{
					return response()->json(['message'=>'Invalid mobile number'],400);
				}
				
				

				
		}
	}


	//////////////////////////////////////////

/////////////////////////////

	public function customer_login_otp(Request $req)
		
	{
		 $rules = [
	       			 'mobile' => 'required',
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

			

				$user=customer_registration::select('id','status','mobile','login_otp','otp_expiry')->where('mobile',$req->mobile)->first();
				 
				 if($user)
					{
						if($req->otp==$user->login_otp)
							{

								// $otdt=date("Y-m-d H:i:s");
								// if($user->otp_expiry<$otdt)
								// {
								// 	customer_registration::where('mobile',$req->mobile)->update([
									
								// 	'login_otp'=>'',
							
							 //        ]);
								// 	return response()->json(['message'=>'Otp Expired !'],400);
								// }
								// else
								// {
								$token=$user->createToken('customer-app',['customer']);	

								customer_registration::where('mobile',$req->mobile)->update([
								'login_otp'=>'',
								'device_key'=>$req->device_key,
					
								]);
								return response()->json([

								'token'=>$token->accessToken,	
								'message'=>'Login success.'	

								],200);
							}
						// }
					else
					{
					return response()->json(['message'=>'Incorrect otp !'],400);
					}
				}
				else
					{
					return response()->json(['message'=>'Invalid user !'],400);
					}
				

				
		}
	}

	/////////////////

	


	public function disability_document_upload(Request $req)
		
	{
		 $rules = [
	       			'disability_document' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$customer=Auth::guard('customerapi')->user()->id;
				$docs=disability_document::where('customer_id',$customer)->first();

				if($docs)
				{
				 $img = $req->file('disability_document');
				
        		if($img=='')
        			{
            			$new_name=$docs->document;
        			}
       			 else
       			 	{
	              		$imgWillDelete = public_path() . $docs->document;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('disability_document');
	            		 $new_name = "/disability_document/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('disability_document'), $new_name);  
        		 	}
		
				disability_document::where('customer_id',$customer)->update([
				'document'=>$new_name,
				'document_upload_status'=>1,	
				'document_approval_status'=>0,	
				'document_rejection_reason'=>'',	
				
				 ]);
				}
				else
				{
					 $img = $req->file('disability_document');
				
        		if($img=='')
        			{
            			$new_name=$docs->document;
        			}
       			 else
       			 	{
	              		
	          			$image = $req->file('disability_document');
	            		 $new_name = "/disability_document/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('disability_document'), $new_name);  
        		 	}
					disability_document::create([
				'customer_id'=>$customer,		
				'document'=>$new_name,
				'document_upload_status'=>1,	
				'document_approval_status'=>0,
				'document_rejection_reason'=>'',	
				
				 ]);
				}

				return response()->json([	

				'message'=>'Disability document uploaded successfully !'	

				],200);
		}
	}

	public function disability_document_view()
		
	{
		$customer=Auth::guard('customerapi')->user()->id;
		$documents=disability_document::where('customer_id',$customer)->first();
		if($documents)
		{
		return response()->json([

				'document_file'=>$documents->document,
				'document_upload_status'=>$documents->document_upload_status,
				'document_approval_status'=>$documents->document_approval_status,
				'document_rejection_reason'=>$documents->document_rejection_reason,
				

				],200);
		}
		else
		{
			return response()->json([

				'message'=>'No upload found !',
				

				],200);
		}
	}

	//////////////

	public function customer_profile_photo()
		
	{
		$customer=Auth::guard('customerapi')->user()->id;
		$photo=customer_registration::select('photo')->where('id',$customer)->first();
		if($photo)
		{
		return response()->json([

				'profile_photo'=>$photo->document,
				
			
				],200);
		}
		else
		{
			return response()->json([

				'message'=>'Invalid request !',
				

				],404);
		}
	}

	public function customer_profile_photo_update(Request $req)
		
	{
		 $rules = [
	       			'profile_photo' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$customer=Auth::guard('customerapi')->user()->id;
				$photo=customer_registration::select('photo')->where('id',$customer)->first();

				 $img = $req->file('profile_photo');
				
        		if($img=='')
        			{
            			$new_name=$photo->photo;
        			}
       			 else
       			 	{
	              		$imgWillDelete = public_path() . $photo->photo;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('profile_photo');
	            		 $new_name = "/customers/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('customers'), $new_name);  
        		 	}
		
				customer_registration::where('id',$customer)->update([
				'photo'=>$new_name,
				
				 ]);
				
				return response()->json([	

				'message'=>'Profile photo updated successfully !'	

				],200);
		}
	}

	//////////////

	public function customer_profile_details()
		
	{
		$customer=Auth::guard('customerapi')->user()->id;
		$det=customer_registration::select('name','mobile')->where('id',$customer)->first();
		if($det)
		{
		return response()->json([

				'name'=>$det->name,
				'mobile'=>$det->mobile,
				
			
				],200);
		}
		else
		{
			return response()->json([

				'message'=>'Invalid request !',
				

				],404);
		}
	}

	public function customer_profile_details_update(Request $req)
		
	{
		 $rules = [
	       			'name' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$customer=Auth::guard('customerapi')->user()->id;
				customer_registration::where('id',$customer)->update([
				'name'=>$req->name,
				
				 ]);
				
				return response()->json([	

				'message'=>'Profile details updated successfully !'	

				],200);
		}
	}

	//////////////


	public function customer_logout()
		
	{
		//$user=Auth::guard('driverapi')->user()->tokens()->delete();
	$uid=Auth::guard('customerapi')->user()->token()->user_id;
	$uname=Auth::guard('customerapi')->user()->token()->name;

	DB::table('oauth_access_tokens')->where('user_id',$uid)->where('name',$uname)->delete();

		return response()->json([

				'message'=>"Logged out successfully.",
				

				],200);
		
	}

		//////////////

	public function girokab_categories()
		
	{
		$customer=Auth::guard('customerapi')->user()->id;
		$cat=vehicle_category::where('status',1)->get();

		return response()->json([

				'categories'=>$cat,				
			
				],200);
		
	}



		public function customer_deactivate()
		
	{
		$customer=Auth::guard('customerapi')->user()->id;
		customer_registration::where('id',$customer)->update([

			'status'=>3,

		]);
		
		return response()->json([

				'message'=>'Account detactivated successfully',

				],200);
		
	}


		public function customer_activate()
		
	{
		
		customer_registration::where('status',3)->update([

			'status'=>1,

		]);
		
		return response()->json([

				'message'=>'Account activated successfully',

				],200);
		
	}

}
