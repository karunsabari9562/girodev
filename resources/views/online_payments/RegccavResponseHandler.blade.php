
@include('online_payments.Crypto')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="csrf-token" content="fXN8PUjloPiPwalcvzMnZbLum4g4cdb8f3ZygYEC">

    <title>GiroKab</title>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('payments/assets/css/main.css')}}">



</head>

<body>
<?php

	//error_reporting(1);
	
	$workingKey='FA227F8AA1C5CD53181057BE5D1E8025';		//Working Key should be provided here.
	$encResponse=$allitem["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypts($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		
        if($i==0)	$bid=$information[1];
		if($i==2)	$rid=$information[1];
		if($i==3)	$order_status=$information[1];
		if($i==10)	$amt=$information[1];
		if($i==26)	$ptype=$information[1];
		
	}



	if($order_status==="Success")
	{
		// echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";

		echo '<div class="bodyContent">
        <div class="text-center successful-wrap h-100">
            <div class="successful-info">
                <div class="successful-icon mb-4">
                    <img src="https://girokab.com/payments/assets/images/check.svg" alt="">
                   
                </div>
                <div class="successful-text">
                    <span>Payment Successful</span>
                </div>
                <div class="successful-btn">
                    <span>Done</span>
                </div>
            </div>

        </div>
    </div>';

		
	}
	else if($order_status==="Aborted")
	{
		// echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";

		echo '<div class="bodyContent">
        <div class="text-center successful-wrap h-100">
            <div class="successful-info">
                <div class="successful-icon mb-4">
               
                
                  <img src="https://girokab.com/payments/assets/images/close.svg" alt="">
                </div>
                <div class="successful-text">
                    <span>Payment Unsuccessful</span>
                </div>
                <div class="successful-btn">
                    <span>Done</span>
                </div>
            </div>

        </div>
    </div>';
	
	}
	else if($order_status==="Failure")
	{
		// echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
		echo '<div class="bodyContent">
        <div class="text-center successful-wrap h-100">
            <div class="successful-info">
                <div class="successful-icon mb-4">
                    
                  <img src="https://girokab.com/payments/assets/images/close.svg" alt="">
                </div>
                <div class="successful-text">
                    <span>Payment Faild</span>
                </div>
                <div class="successful-btn">
                    <span>Done</span>
                </div>
            </div>

        </div>
    </div>';
	}
	else
	{
		// echo "<br>Security Error. Illegal access detected";

		echo '<div class="bodyContent">
        <div class="text-center successful-wrap h-100">
            <div class="successful-info">
                <div class="successful-icon mb-4">
                    
                <img src="https://girokab.com/payments/assets/images/close.svg" alt="">
                </div>
                <div class="successful-text">
                    <span>Security Error. Illegal access detected</span>
                </div>
                <div class="successful-btn">
                    <span>Done</span>
                </div>
            </div>

        </div>
    </div>';
	
	}

	// echo "<br><br>";

	// echo "<table cellspacing=4 cellpadding=4>";
	// for($i = 0; $i < $dataSize; $i++) 
	// {
	// 	$information=explode('=',$decryptValues[$i]);
	//     	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
	// }

	// echo "</table><br>";
	// echo "</center>";
?>
<script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<script type="text/javascript">

	var resstat='{{$order_status}}';
	var a1='{{$bid}}';
	var a2='{{$rid}}';
	var a3='{{$amt}}';
	var a4='{{$ptype}}';

	// alert(resstat);
	// alert(a1);
	// alert(a2);
	// alert(a3);
	// alert(a4);


	if(resstat=='Success')
	{
		
		if(a4==1)
		{

			data = new FormData();
  	  data.append('driverid', '{{$bid}}');
  	  data.append('amount', '{{$amt}}');
      data.append('referenceid', '{{$rid}}');
      data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/pay-regfee",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
		processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
              // $('#submitButton1').hide();
              // $('#submitButton').show();
              //  swal({
              //          title: "Vehicle category added successfully",
              //          closeOnClickOutside: false,
              //          icon: "success",
              //         buttons: "Ok",
              //       })
    
              //        .then((willDelete) => {
              //         if (willDelete) {
              //          window.location.href=window.location.href;
              //                  } 
    
              //       });
          }

        }
    
    
    
    
      })

		}
		else
		{

			data = new FormData();
  	  data.append('bookingid', '{{$bid}}');
      data.append('referenceid', '{{$rid}}');
      data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/pay-ridefee",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
		processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
              // $('#submitButton1').hide();
              // $('#submitButton').show();
              //  swal({
              //          title: "Vehicle category added successfully",
              //          closeOnClickOutside: false,
              //          icon: "success",
              //         buttons: "Ok",
              //       })
    
              //        .then((willDelete) => {
              //         if (willDelete) {
              //          window.location.href=window.location.href;
              //                  } 
    
              //       });
          }

        }
    
    
    
    
      })

		}
		
      
    
	}
	




</script>
