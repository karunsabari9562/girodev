

<html>
<head>
<title> Non-Seamless-kit</title>
</head>
<body>
<center>

@include('Crypto');

<?php 

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	$merchant_data='';
	$working_key='FA227F8AA1C5CD53181057BE5D1E8025';//Shared by CCAVENUES
	$access_code='AVUO48KD41AU46OUUA';//Shared by CCAVENUES
	
	foreach ($allitem as $key => $value){
		$merchant_data.=$key.'='.$value.'&';
	}

	// print_r($merchant_data);
	// die;

	$encrypted_data=encrypts($merchant_data,$working_key); // Method for encrypting the data.

?>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
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

