<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class OnlinePayController extends Controller
{

public function payment_request($uid,$bid)
    {
     
      return view('payment_page');

    }

    public function payhand(Request $req)
    {
    	$allitem=$req->all();


     
      return view('ccavRequestHandler',['allitem'=>$allitem]);

    }

    public function payreshand(Request $req)
    {
     	$allitem=$req->all();

    	// die;
      return view('ccavResponseHandler',['allitem'=>$allitem]);

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

