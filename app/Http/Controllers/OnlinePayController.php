<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use DB,Auth;
use App\Models\driver_reg_fee;
use App\Models\rides_booking;


class OnlinePayController extends Controller
{

public function online_regfee()
    {

    	$user=Auth::guard('driverapi')->user()->id;
		$fee=driver_reg_fee::where('id',1)->first();
     
      return view('online_payments.DriverRegFee',['fee'=>$fee,'uid'=>$user]);

    }

    public function online_regfees()
    {

    	$user=1;
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

     	// print_r($allitem);
     	// die;

      return view('online_payments.RegccavResponseHandler',['allitem'=>$allitem]);

    }

/////////////////////////////


public function online_farepayment($bid)
    {

    	$user=Auth::guard('customerapi')->user()->id;

		$bookdt=rides_booking::where('id',$bid)->where('customer_id',$user)->first();
		if($bookdt)
       {
       	return view('online_payments.OnlineFare',['bookdt'=>$bookdt]);
       }
     
      

    }


    public function online_farepayments()
    {

    	

		$bookdt=rides_booking::where('id',549)first();
		if($bookdt)
       {
       	return view('online_payments.OnlineFare',['bookdt'=>$bookdt]);
       }
     
      

    }

     public function FareccavRequestHandler(Request $req)
    {
    	$allitem=$req->all();     
      	return view('online_payments.FareccavRequestHandler',['allitem'=>$allitem]);

    }	


}

