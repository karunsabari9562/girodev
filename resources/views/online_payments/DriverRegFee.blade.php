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

    <div class="bodyContent">
        <div class="contBox">
            <div class="text-center contBox-logo position-relative">
                <img src="{{asset('payments/assets/images/logo.svg')}}" alt="Logo">
            </div>

<form method="post" name="customerData" action="/RegccavRequestHandler">
    @csrf
    <input type="hidden" name="tid" id="tid" readonly value="{{$uid}}" />
        <input type="hidden" name="merchant_param1" id="merchant_param1" readonly value="1" />
        <input type="hidden" name="merchant_id" value="2288915"/>
        <input type="hidden" name="order_id" value="{{$uid}}"/>
        <input type="hidden" name="amount" value="{{$fee->fee}}" />
        <input type="hidden" name="currency" value="INR"/>
        <input type="hidden" name="redirect_url" value="https://girokab.com/RegccavResponseHandler"/>
        <input type="hidden" name="cancel_url" value="https://girokab.com/RegccavResponseHandler"/>
            <div class="textBlock position-relative">
                <div class="mb-4 textBlock-fee">
                    <span class="textBlock-fee-a">Registration Fee</span>
                    <span class="textBlock-fee-b">Rs. {{$fee->fee}}</span>
                </div>
                <div class="mb-4">
                  <input type="hidden" name="billing_tel" value="9562218794"/>
                  @if($mail_chk->email=='')
          <input type="email" class="form-control" id="billing_email" name="billing_email" placeholder="Enter your Email...." value="karunsabari@gmail.com">
          @else
             <input type="email" class="form-control" id="billing_email" name="billing_email" placeholder="Enter your Email...." value="karunsabari@gmail.com">
          @endif
                 
                </div>
                <div>
                    <button type="submit" class="btn mb-3">Pay Now</button>
                </div>
            </div>
</form>


        </div>
    </div>





    <!-- JS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    </script>
</body>

</html>