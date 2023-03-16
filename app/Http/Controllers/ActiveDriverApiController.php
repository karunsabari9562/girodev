<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB,Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\driver_registration;
use App\Models\driver_account_renewal;
use App\Models\driver_reg_fee;
use App\Models\driver_primary_document;
use App\Models\driver_secondary_document;
use App\Models\active_driver;
use App\Models\driver_deactivate_history;
use App\Models\driver_reactivate_request;

class ActiveDriverApiController extends Controller
{
    public function driver_password_change(Request $req)
		
	{
		 $rules = [
	       			'new_password' => 'required',
 
					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user()->id;
				
				driver_registration::where('id',$user)->update([
				'password'=>bcrypt($req->new_password),

				]);

				return response()->json([	

				'message'=>'Password changed successfully !'	

				],200);
		}
	}


	/////////////////////

	public function driver_profile_details()
		
	{
		$user=Auth::guard('driverapi')->user()->id;
		$profile=driver_registration::select('id','driver_id','name','mobile','photo','franchise')->where('id',$user)->first();
		return response()->json([

				'driver_id'=>$profile->driver_id,
				'name'=>$profile->name,
				'mobile'=>$profile->mobile,
				'photo'=>$profile->photo,
				'franchise'=>$profile->GetFranchise->franchise_name,

				],200);
		
	}

	public function driver_logout()
		
	{
		//$user=Auth::guard('driverapi')->user()->tokens()->delete();
	$uid=Auth::guard('driverapi')->user()->token()->user_id;
	$uname=Auth::guard('driverapi')->user()->token()->name;
$user=Auth::guard('driverapi')->user()->id;
	DB::table('oauth_access_tokens')->where('user_id',$uid)->where('name',$uname)->delete();

	active_driver::where('dr_id',$user)->update([
				'availability_status'=>0,
					
				
				 ]);

		return response()->json([

				'message'=>"Logged out successfully.",
				

				],200);
		
	}

///////////////////////////

	public function driver_account_renewal_fee()
		
	{
		
		$fee=driver_reg_fee::where('id',2)->first();
		return response()->json([

				'renewal_fee'=>$fee->fee,
				],200);
		
	}

		public function driver_account_renewal(Request $req)
		
	{
		 $rules = [
	       			'amount' => 'required',
	       			'payment_date' => 'required',
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
				$docs=driver_account_renewal::where('driver_id',$user)->where('approval_status','!=',1)->first();

				if($docs)
				{
				
				driver_account_renewal::where('driver_id',$user->id)->where('approval_status','!=',1)->update([
				'amount'=>$req->amount,
				'payment_date'=>$req->payment_date,	
				'reference_id'=>$req->reference_id,
				'approval_status'=>0,
				'rejection_reason'=>'',	
				
				 ]);
				}
				else
				{
				$franchise=driver_registration::select('franchise')->where('id',$user)->first();
					
					driver_account_renewal::create([
				'driver_id'=>$user,
				'franchise'=>$franchise->franchise,
				'amount'=>$req->amount,
				'payment_date'=>$req->payment_date,	
				'reference_id'=>$req->reference_id,
				'approval_status'=>0,
				'rejection_reason'=>'',	
				 ]);
				}

				return response()->json([	

				'message'=>'Payment completed successfully !'	

				],200);
		}
	}


	public function driver_account_renewal_status()
		
	{
		$user=Auth::guard('driverapi')->user()->id;
		$doc=driver_account_renewal::where('driver_id',$user)->where('approval_status','!=',1)->first();
		if($doc)
		{
		return response()->json([

				'approval_status'=>$doc->approval_status,
				'rejection_reason'=>$doc->rejection_reason,
				
				],200);
		}
		else
		{
			return response()->json([

				'message'=>'No renewal request found !',
				

				],200);
		}
		
	}



/////////////////////////////

	public function driver_account_deactivate(Request $req)
		
	{
		 $rules = [
	       			'reason' => 'required',

					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {

				$user=Auth::guard('driverapi')->user()->id;
				
				 active_driver::where('dr_id',$user)->update([
        
		           'status'=>4 
		            ]);
		        driver_registration::where('id',$user)->update([
		            'status'=>5,
		            'account_reject_reason'=>$req->reason,
		            'account_rejected_date'=>date('Y-m-d'),
		            ]);

		          driver_primary_document::where('driver_id',$user)->update([
		            'status'=>4
		            ]);
		          driver_secondary_document::where('driver_id',$user)->update([
		            'status'=>4
		            ]);

		          driver_deactivate_history::create([
		            'driver_id'=>$user,
		            'deactivated_by'=>2,
		            'reason'=>$req->reason,
		            ]);

				return response()->json([	

				'message'=>'Account deactivated successfully.'	

				],200);
		}
	}

	/////////////////////////////

	public function driver_account_reactivate(Request $req)
		
	{
		 // $rules = [
	  //      			'reason' => 'required',

			// 		];
		
			// $validator = Validator::make($req->all(), $rules);	

			//  if ($validator->fails())
			//   {
  	// 			return response()->json(['error_message'=>$validator->errors()],400);
			//   } 
			//  else
			//   {

				$user=Auth::guard('driverapi')->user()->id;

				$chk=driver_reactivate_request::where('driver_id',$user)->where('status',0)->first();
				
				if($chk)
				{

				return response()->json([	

				'message'=>'Re-activation request already sent.'	

				],200);
				}
				else
				{
		        driver_registration::where('id',$user)->update([
		            'status'=>7,
		            ]);

		          driver_reactivate_request::create([
		            'driver_id'=>$user,
		            'requested_date'=>date('Y-m-d'),
		            'status'=>0,
		            ]);

				return response()->json([	

				'message'=>'Account re-activation request sent successfully.'	

				],200);
			}
	// 	}
	}



	public function driver_availability()
		
	{
		$user=Auth::guard('driverapi')->user()->id;
		$drstatus=active_driver::where('dr_id',$user)->where('status',1)->first();
		if($drstatus)
		{
		return response()->json([

				'status'=>$drstatus->availability_status,			
				
				],200);
		}
		else
		{
			return response()->json([

				'message'=>'Invalid request !',
				

				],200);
		}
		
	}

	public function driver_availability_on(Request $req)
		
	{

		$rules = [
	       			'latitude' => 'required',
	       			'longitude' => 'required',

					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {
		$user=Auth::guard('driverapi')->user()->id;

				active_driver::where('dr_id',$user)->update([
		            'availability_status'=>1,
		            'latitude'=>$req->latitude,
		            'longitude'=>$req->longitude,
		            ]);
				return response()->json([

				'message'=>'Status changed as online successfully.',			
				
				],200);
			}
			
			
		
		
	}

	public function driver_availability_off(Request $req)
		
	{

		$rules = [
	       			'latitude' => 'required',
	       			'longitude' => 'required',

					];
		
			$validator = Validator::make($req->all(), $rules);	

			 if ($validator->fails())
			  {
  				return response()->json(['error_message'=>$validator->errors()],400);
			  } 
			 else
			  {
		$user=Auth::guard('driverapi')->user()->id;

				active_driver::where('dr_id',$user)->update([
		            'availability_status'=>0,
		            'latitude'=>$req->latitude,
		            'longitude'=>$req->longitude,
		            ]);
				return response()->json([

				'message'=>'Status changed as offline successfully.',			
				
				],200);
			}
			
			
		
		
	}
		
	






	public function driver_location_updates(Request $req)
		
	{

		$user=Auth::guard('driverapi')->user()->id;
		$drstatus=active_driver::where('dr_id',$user)->where('status',1)->first();
		if($drstatus)
		{
		if($drstatus->availability_status==1)
		{
			
				active_driver::where('dr_id',$user)->update([
		            
		            'latitude'=>$req->latitude,
		            'longitude'=>$req->longitude,
		            ]);
				return response()->json([

				'message'=>'Location updated successfully.',			
				
				],200);
			
			
			
		}
		else if($drstatus->availability_status==0)
		{
			
			return response()->json([

				'message'=>'Driver is inactive !',
				

				],200);
		}
	}
	else
		{
			return response()->json([

				'message'=>'Invalid request !',
				

				],200);
		}
		
	}





}
