<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class OnlinePayController extends Controller
{

public function create()
    {
     
      return view('pay');

    }

    public function payhand(Request $req)
    {
    	$allitem=$req->all();
     
      return view('ccavRequestHandler',['allitem'=>$allitem]);

    }

    public function payreshand()
    {
     
      return view('ccavResponseHandler');

    }

    public function fedcreate()
    {
     
      return view('meTrnReq');

    }

public function meTrnPay()
    {
     
      return view('meTrnPay');

    }	


}

