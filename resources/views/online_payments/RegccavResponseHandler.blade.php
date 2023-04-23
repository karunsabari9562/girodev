
@include('online_payments.Crypto');
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
		echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";

		
	}
	else if($order_status==="Aborted")
	{
		echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
	
	}
	else if($order_status==="Failure")
	{
		echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
	}
	else
	{
		echo "<br>Security Error. Illegal access detected";
	
	}

	echo "<br><br>";

	echo "<table cellspacing=4 cellpadding=4>";
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
	}

	echo "</table><br>";
	echo "</center>";
?>

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
