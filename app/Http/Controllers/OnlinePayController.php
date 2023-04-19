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

    public function payhand()
    {
     
      return view('ccavRequestHandler');

    }

    public function payreshand()
    {
     
      return view('ccavResponseHandler');

    }
	


}

