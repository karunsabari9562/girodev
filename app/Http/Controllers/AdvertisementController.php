<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\advertisement;
use Illuminate\Support\Facades\File;

class AdvertisementController extends Controller
{
    public function advertisement()
    {
    	 $ads=advertisement::where('status',1)->get();
        return view('ads.Advertisements',['ads'=>$ads]);
       
    }

    public function all_advertisement()
    {
         $ads=advertisement::where('status',1)->get();
        return view('ads.AllAdvertisements',['ads'=>$ads]);
       
    }

     public function add_advertisement()
    {
    	 
        return view('ads.AddAdvertisements');
       
    }

    public function advertisement_add(Request $req)
    {
        $img = $req->file('img');
        if($img=='')
        {
            $new_name="0";
        }
        else{
          $image = $req->file('img');
             $new_name = "advertisements/" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('advertisements'), $new_name);
            //$ins['Photo']=$new_name;
        }
     
        advertisement::create([

            'title'=>$req->title,
            'valid_from'=>$req->vfrom,
            'valid_to'=>$req->vto,
            'photo'=>$new_name,
            'visibleto_driver'=>$req->dstatus,
            'visibleto_passenger'=>$req->pstatus,
            'visibleto_franchise'=>$req->fstatus,
            'status'=>1

            ]);

            $data['success']="success";
            echo json_encode($data);

      } 


      public function block_ads(Request $req)
    {

        $vid=$req->body;
        advertisement::where('id',$vid)->update([

            'status'=>2

            ]);

$data['success']="success";
echo json_encode($data);

      }


      public function activate_ads(Request $req)
    {

        $nid=$req->body;
        

        advertisement::where('id',$nid)->update([

            'status'=>1

            ]);

            $data['success']="success";
            echo json_encode($data);

      }

      public function delete_ads(Request $req)
    {

        $nid=$req->body;
        

        advertisement::where('id',$nid)->delete();

            $data['success']="success";
            echo json_encode($data);

      }

       public function edit_advertisement($aid)
    {
    	$adid=decrypt($aid);
    	$ads=advertisement::where('id',$adid)->first();
        return view('ads.EditAdvertisements',['ads'=>$ads]);
       // print_r(bcrypt("admin"));
    }

    public function advertisement_edit(Request $req)
    {

    	$aid=$req->aid;
        $ad_det=advertisement::where('id',$aid)->first();
        $img = $req->file('img');
        if($img=='')
        {
            $new_name=$ad_det->photo;
        }
        else{
        	 $imgWillDelete = public_path() . $ad_det->photo;
            File::delete($imgWillDelete);
          $image = $req->file('img');
             $new_name = "advertisements/" . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('advertisements'), $new_name);
            //$ins['Photo']=$new_name;
        }
     
        advertisement::where('id',$req->aid)->update([

            'title'=>$req->title,
            'valid_from'=>$req->vfrom,
            'valid_to'=>$req->vto,
            'photo'=>$new_name,
            'visibleto_driver'=>$req->dstatus,
            'visibleto_passenger'=>$req->pstatus,
            'visibleto_franchise'=>$req->fstatus,

            ]);

            $data['success']="success";
            echo json_encode($data);

      } 


      public function blocked_advertisement()
    {
         $ads=advertisement::where('status',2)->get();
        return view('ads.BlockedAdvertisements',['ads'=>$ads]);
       // print_r(bcrypt("admin"));
    }

     public function edit_advertisements($aid)
    {
        $adid=decrypt($aid);
        $ads=advertisement::where('id',$adid)->first();
        return view('ads.EditAdvertisements1',['ads'=>$ads]);
       // print_r(bcrypt("admin"));
    }



                // Advertisements Api Actions


    public function driver_ads()
        
    {
       $dt=date('Y-m-d');
        $ads=advertisement::where('visibleto_driver',1)->where('valid_from','<=',$dt)->where('valid_to','>=',$dt)->where('status',1)->get();
        if($ads)
        {
        return response()->json([

                'ads_details'=>$ads,
                

                ],200);
        }
        else
        {
            return response()->json([

                'message'=>'No advertisements found !',
                

                ],200);
        }
    }


        public function customer_ads()
        
    {
       $dt=date('Y-m-d');
        $ads=advertisement::where('visibleto_passenger',1)->where('valid_from','<=',$dt)->where('valid_to','>=',$dt)->where('status',1)->get();
        if($ads)
        {
        return response()->json([

                'ads_details'=>$ads,
                

                ],200);
        }
        else
        {
            return response()->json([

                'message'=>'No advertisements found !',
                

                ],200);
        }
    }



}
