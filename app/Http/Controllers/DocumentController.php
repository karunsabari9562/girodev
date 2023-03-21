<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth;
use Illuminate\Support\Facades\File;
use App\Models\driver_docs_reupload;
use App\Models\driver_primary_document;
use App\Models\driver_secondary_document;
use App\Models\driver_registration;

class DocumentController extends Controller
{
    

    public function upload_document()
     
    {
    
        $franchise=Auth::guard('franchise')->user()->id;
        $driver=driver_registration::select('id','driver_id','name','mobile')->where('franchise',$franchise)->where('status',1)->orderBy('driver_id','ASC')->get();
        return view('franchise.DriverUploadDocument',['driver'=>$driver]);
       
    }



    /////////////////////////////

	public function doc_reupload(Request $req)
		
	{
		    $franchise=Auth::guard('franchise')->user()->id;

		$docs=driver_docs_reupload::where('driver_id',$req->dr)->where('status','!=',1)->where('doc_type',$req->dtype)->first();

				if($docs)
				{
				 $img = $req->file('imgg');
				
        		if($img=='')
        			{
            			$new_name=$docs->doc_file;
        			}
       			 else
       			 	{
       			 		if($req->dtype==1)
       			 		{
	              		$imgWillDelete = public_path() . $docs->doc_file;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('imgg');
	            		 $new_name = "/vehicle_rc/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('vehicle_rc'), $new_name); 
	            		} 

	            		if($req->dtype==20)
       			 		{
	              		$imgWillDelete = public_path() . $docs->doc_file;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('imgg');
	            		 $new_name = "/driver_license/front" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('driver_license'), $new_name); 
	            		} 

	            		if($req->dtype==21)
       			 		{
	              		$imgWillDelete = public_path() . $docs->doc_file;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('imgg');
	            		 $new_name = "/driver_license/back" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('driver_license'), $new_name);  
	            		} 
	            		if($req->dtype==3)
       			 		{
	              		$imgWillDelete = public_path() . $docs->doc_file;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('imgg');
	            		 $new_name = "/vehicle_insurance/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('vehicle_insurance'), $new_name); 
	            		} 
	            		if($req->dtype==4)
       			 		{
	              		$imgWillDelete = public_path() . $docs->doc_file;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('imgg');
	            		 $new_name = "/pollution_certificate/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('pollution_certificate'), $new_name);  
	            		} 
	            		if($req->dtype==5)
       			 		{
	              		$imgWillDelete = public_path() . $docs->doc_file;
	            		File::delete($imgWillDelete);
	          			$image = $req->file('imgg');
	            		 $new_name = "/vehicle_permit/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('vehicle_permit'), $new_name); 
	            		} 
	            		 
        		 	 }
		
				driver_docs_reupload::where('driver_id',$req->dr)->where('status','!=',1)->where('doc_type',$req->dtype)->update([
				'doc_file'=>$new_name,
				'doc_upload_status'=>1,	
				'doc_approval_status'=>0,
				'franchise_approval'=>1,
				'status'=>0,	
				'doc_rejection_reason'=>'',	
				'admin_approval'=>0,
				'admin_reject_reason'=>'',
				'doc_expiry'=>$req->expiry,
				 ]);
				}
				else
				{
					 $img = $req->file('imgg');
				
        		if($img=='')
        			{
            			$new_name=$docs->doc_file;
        			}
       			 else
       			 	{
	              		
	          			if($req->dtype==1)
       			 		{
	              		$image = $req->file('imgg');
	            		 $new_name = "/vehicle_rc/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('vehicle_rc'), $new_name);
	            		} 
	            		if($req->dtype==20)
       			 		{
	              		$image = $req->file('imgg');
	            		 $new_name = "/driver_license/front" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('driver_license'), $new_name);
	            		} 
	            		if($req->dtype==21)
       			 		{
	              		$image = $req->file('imgg');
	            		 $new_name = "/driver_license/back" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('driver_license'), $new_name);
	            		} 
	            		if($req->dtype==3)
       			 		{
	              		$image = $req->file('imgg');
	            		 $new_name = "/vehicle_insurance/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('vehicle_insurance'), $new_name);  
	            		} 
	            		if($req->dtype==4)
       			 		{
	              		$image = $req->file('imgg');
	            		 $new_name = "/pollution_certificate/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('pollution_certificate'), $new_name);  
	            		} 
	            		if($req->dtype==5)
       			 		{
	              		$image = $req->file('imgg');
	            		 $new_name = "/vehicle_permit/" . time() . '.' . $image->getClientOriginalExtension();
	            		$image->move(public_path('vehicle_permit'), $new_name); 
	            		}  
        		 	}
					driver_docs_reupload::create([
				'driver_id'=>$req->dr,
				'franchise'=>$franchise,
				'doc_type'=>$req->dtype,			
				'doc_file'=>$new_name,
				'doc_upload_status'=>1,	
				'doc_approval_status'=>0,
				'franchise_approval'=>1,
				'status'=>0,
				'doc_rejection_reason'=>'',	
				'admin_approval'=>0,
				'admin_reject_reason'=>'',
				'doc_expiry'=>$req->expiry,	
				 ]);
				}


				$data['success']="success";
				echo json_encode($data);

			
	}




}
