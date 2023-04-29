<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use DB,Auth;
use App\Models\driver_reg_fee;
use App\Models\rides_booking;
use App\Models\driver_secondary_document;
use App\Models\driver_registration;
use App\Models\customer_registration;


class OnlinePayController extends Controller
{
	private $database;

  public function __construct()
  {
    $this->database = \App\services\FirebaseService::connect();
  }

public function online_regfee()
    {

    	$user=Auth::guard('driverapi')->user()->id;
		$fee=driver_reg_fee::where('id',1)->first();

		$mail_chk=driver_registration::select('mobile','email')->where('id',$user)->first();
     
      return view('online_payments.DriverRegFee',['fee'=>$fee,'uid'=>$user,'mail_chk'=>$mail_chk]);

    }

    public function online_regfees()
    {

    	$user=1;
		$fee=driver_reg_fee::where('id',1)->first();
     $mail_chk=['mobile'=>'9562218794','email'=>'karunsabari@gmail.com'];
      return view('online_payments.DriverRegFees',['fee'=>$fee,'uid'=>$user,'mail_chk'=>$mail_chk]);

    }

    public function RegccavRequestHandler(Request $req)
    {

    	$allitem=$req->all();

    	driver_registration::where('id',$req->order_id)->update([

    		'email'=>$req->billing_email

    	]);     
      	return view('online_payments.RegccavRequestHandler',['allitem'=>$allitem]);

    }

    public function RegccavResponseHandler(Request $req)
    {
     	$allitem=$req->all();

     	// print_r($allitem);
     	// die;

      return view('online_payments.RegccavResponseHandler',['allitem'=>$allitem]);

    }




    public function pay_regfee(Request $req)
		
	{
		

				$user=$req->driverid;


				driver_secondary_document::where('driver_id',$user)->update([
				'payment_status'=>1,
				'payment_date'=>date('Y-m-d'),	
				'amount'=>$req->amount,	
				'reference_id'=>$req->referenceid,	
				]);
		
		
	}

/////////////////////////////


public function online_farepayment($bid)
    {

    	$user=Auth::guard('customerapi')->user()->id;

		$bookdt=rides_booking::where('id',$bid)->where('customer_id',$user)->first();
		if($bookdt)
       {
       	 $mail_chk=customer_registration::select('mobile','email')->where('id',$bookdt->customer_id)->first();
       	return view('online_payments.OnlineFare',['bookdt'=>$bookdt,'mail_chk'=>$mail_chk]);
       }
     
      

    }


    public function online_farepayments()
    {

    	

		$bookdt=rides_booking::where('id',1)->first();
		if($bookdt)
       {
       	$mail_chk=customer_registration::select('mobile','email')->where('id',2)->first();
       	return view('online_payments.OnlineFare',['bookdt'=>$bookdt,'mail_chk'=>$mail_chk]);
       }
     
      

    }

     public function FareccavRequestHandler(Request $req)
    {
    	$allitem=$req->all();    

    	customer_registration::where('mobile',$req->billing_tel)->update([

    		'email'=>$req->billing_email

    	]);  
      	return view('online_payments.FareccavRequestHandler',['allitem'=>$allitem]);

    }




    public function pay_ridefee(Request $req)
        
    {
        
              $book_id=$req->bookingid;


              $bookdt=rides_booking::where('id',$book_id)->first();

       if($bookdt)
       {
            
                  rides_booking::where('id',$book_id)->update([
                  
                    'payment_type'=>1,
                    'payment_status'=>1,
                    'payment_date'=>date('Y-m-d H:i:s'),
                    'paid_amount'=>$bookdt->total_fare,
                    'reference_id'=>$req->referenceid,                  

                    ]);

                   $tb="new_bookings";
                   $postData=[

                  'payment_status'=>1,
                  'payment_type'=>1,

                    ];
                $key=$book_id;
  
         $this->database->getReference($tb.'/'.$key)->update($postData); 

                }
             
            }    
                       
        
   


}

