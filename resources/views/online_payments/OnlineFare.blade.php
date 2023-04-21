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
      
      <form method="post" name="customerData" action="/FareccavRequestHandler">
    @csrf
      	<br>
        <input type="hidden" name="tid" id="tid" readonly value="{{$bookdt->id}}" />
        <input type="hidden" name="merchant_id" value="2288915"/>
        <input type="hidden" name="order_id" value="{{$bookdt->id}}"/>
        <input type="hidden" name="amount" value="{{$bookdt->total_fare}}" />
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
                  <span>{{$bookdt->total_fare}}</span>
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
              <span class="submit-button-lock">Pay Now</span>
              <!-- <INPUT TYPE="submit" value="CheckOut" class="btn yellowbtn w-100"> -->
          </button>
      </form>
  </div>
</div>
</body>

</html>









