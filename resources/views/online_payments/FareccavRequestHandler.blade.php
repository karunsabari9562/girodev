
@include('online_payments.Crypto')
<html>
<head>
<title>Fare Payment</title>
</head>
<body>
<center>



<?php 
	
	$merchant_data='';
	$working_key='FA227F8AA1C5CD53181057BE5D1E8025';
	$access_code='AVUO48KD41AU46OUUA';
	
	foreach ($allitem as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}


	$encrypted_data=encrypts($merchant_data,$working_key); 

?>
<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
	@csrf
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

