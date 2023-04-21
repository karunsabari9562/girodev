<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use DB,Auth;
use App\Models\driver_reg_fee;


class OnlinePayController extends Controller
{

public function online_regfee()
    {

    	$user=Auth::guard('driverapi')->user()->id;
		$fee=driver_reg_fee::where('id',1)->first();
     
      return view('online_payments.DriverRegFee',['fee'=>$fee,'uid'=>$user]);

    }

    public function RegccavRequestHandler(Request $req)
    {
    	$allitem=$req->all();     
      	return view('online_payments.RegccavRequestHandler',['allitem'=>$allitem]);

    }

    public function RegccavResponseHandler(Request $req)
    {
     	$allitem=$req->all();

      return view('online_payments.RegccavResponseHandler',['allitem'=>$allitem]);

    }

//     public function fedcreate()
//     {
     
//       return view('meTrnReq');

//     }

// public function meTrnPay()
//     {
     
//       return view('meTrnPay');

//     }	


}

