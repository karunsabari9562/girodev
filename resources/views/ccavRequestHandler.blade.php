<html>
<head>
<title> Custom Form Kit </title>
</head>
<body>
<center>

<!--  -->

<?php 

	error_reporting(0);
	
	$merchant_data='';
	$working_key='FA227F8AA1C5CD53181057BE5D1E8025';//Shared by CCAVENUES
	$access_code='AVUO48KD41AU46OUUA';//Shared by CCAVENUES
	
	foreach ($allitem as $key => $value){
		$merchant_data.=$key.'='.urlencode($value).'&';
	}

	// print_r($merchant_data);
	// die;

	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

?>
<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

