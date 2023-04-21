<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Pay Now</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="{{ asset('admin/css/style.css')}}">
</head>
<script>
  window.onload = function() {
    var d = new Date().getTime();
    document.getElementById("tid").value = d;
  };
</script>
<style type="text/css">
	
	body {
  background: #FEF8F8;
}


.container {
  margin-top: 50px;
}

#Checkout {
  z-index: 100001;
  background: ;
  width: 50%;
  min-width: 300px;
  height: 100%;
  min-height: 100%;
  background: 0 0 #ffffff;
  border-radius: 8px;
  border: 1px solid #dedede;
  margin-left: auto;
  margin-right: auto;
  display: block;
}

#Checkout>h1 {
  margin: 0;
  padding: 20px;
  text-align: center;
  background: #EEF2F4;
  color: #5D6F78;
  font-size: 24px;
  font-weight: 300;
  border-bottom: 1px solid #DEDEDE;
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
}

#Checkout>form {
  margin: 0 25px 25px;
}

label {
  color: #46545C;
  margin-bottom: 2px;
}

.input-container {
  position: relative;
}

.input-container input {
  padding-right: 25px;
}

.input-container>i, a[role="button"] {
  color: #d3d3d3;
  width: 25px;
  height: 30px;
  line-height: 30px;
  font-size: 16px;
  position: absolute;
  top: 2px;
  right: 2px;
  cursor: pointer;
  text-align: center;
}

.input-container>i:hover, a[role="button"]:hover {
  color: #777;
}
.amount-placeholder {
  font-size: 20px;
  height: 34px;
}

.amount-placeholder>button {
  float: right;
  width: 60px;
}

.amount-placeholder>span {
  line-height: 34px;
}



.align-middle {
  vertical-align: middle;
}

input {
  box-shadow: none!important;
}

input:focus {
  border-color: #b0e5e3!important;
  background-color: #EEF9F9!important;
}
</style>

<body>
  

<div class="container">
  <div id="Checkout" class="inline">
      <h1><img src="{{ asset('admin/img/logo/logo2.png')}}" alt="logo" style="width: 50%;"></h1>
      
      <form method="post" name="customerData" action="/RegccavRequestHandler">
    @csrf
      	<br>
        <input type="hidden" name="tid" id="tid" readonly value="{{$uid}}" />
        <input type="hidden" name="merchant_id" value="2288915"/>
        <input type="hidden" name="order_id" value="{{$uid}}"/>
        <input type="hidden" name="amount" value="{{$fee->fee}}" />
        <input type="hidden" name="currency" value="INR"/>
        <input type="hidden" name="redirect_url" value="https://girokab.com/RegccavResponseHandler"/>
        <input type="hidden" name="cancel_url" value="https://girokab.com/RegccavResponseHandler"/>
          <!-- <div class="form-group">
              <label for="PaymentAmount">Trip Amount</label>
              <div class="amount-placeholder">
                  <span>Rs.</span>
                  <span>500.00</span>
              </div>
          </div> -->
          <div class="form-group">
              <label for="PaymentAmount">Registration Fee</label>
              <div class="amount-placeholder">
                  <span>Rs.</span>
                  <span>{{$fee->fee}}</span>
              </div>
          </div>
          <!-- <div class="form-group">
              <label for="PaymentAmount">Service Charge</label>
              <div class="amount-placeholder">
                  <span>$</span>
                  <span>500.00</span>
              </div>
          </div> -->
          
          <br><br>
          <button id="PayButton" class="btn btn-block yellowbtn" type="submit">
              <span class="submit-button-lock"></span>
              <!-- <INPUT TYPE="submit" value="CheckOut" class="btn yellowbtn w-100"> -->
          </button>
      </form>
  </div>
</div>
</body>

</html>






<!-- <html>
<head>
<script>
	window.onload = function() {
		var d = new Date().getTime();
		document.getElementById("tid").value = d;
	};
</script>
</head>
<body>
	<form method="post" name="customerData" action="/ccavRequestHandler">
		@csrf
		<table width="40%" height="100" border='1' align="center"><caption><font size="4" color="blue"><b>Integration Kit</b></font></caption></table>
			<table width="40%" height="100" border='1' align="center">
				<tr>
					<td>Parameter Name:</td><td>Parameter Value:</td>
				</tr>
				<tr>
					<td colspan="2"> Compulsory information</td>
				</tr>
				<tr>
					<td>TID	:</td><td><input type="text" name="tid" id="tid" readonly value="{{$uid}}" /></td>
				</tr>
				<tr>
					<td>Merchant Id	:</td><td><input type="text" name="merchant_id" value="2288915"/></td>
				</tr>
				<tr>
					<td>Order Id	:</td><td><input type="text" name="order_id" value="{{$uid}}"/></td>
				</tr>
				<tr>
					<td>Amount	:</td><td><input type="text" name="amount" value="{{$fee->fee}}" /></td>
				</tr>
				<tr>
					<td>Currency	:</td><td><input type="text" name="currency" value="INR"/></td>
				</tr>
				<tr>
					<td>Redirect URL	:</td><td><input type="text" name="redirect_url" value="https://girokab.com/ccavResponseHandler"/></td>
				</tr>
			 	<tr>
			 		<td>Cancel URL	:</td><td><input type="text" name="cancel_url" value="https://girokab.com/ccavResponseHandler"/></td>
			 	</tr>
			 	

				<tr>
		        	<td></td><td><INPUT TYPE="submit" value="CheckOut"></td>
		        </tr>
		     	
		        
	      	</table>
	      </form>
	</body>
</html> -->


