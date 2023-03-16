<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	html {
   
    font-family: "Outfit", sans-serif;
}

body {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.div {
    width: 20.125rem;
    background-color: white;
    padding: 25px;
    border-radius: 25px;
    text-align: center;
    border:15px solid #ffc107;
}

img {
    width: 20.125rem;
    border-radius: 25px;
}

.div2 {
    padding-left: 20px;
    padding-right: 20px;
}

h1 {
    font-size: 1.375rem;
    font-weight: 700;
}

p {
    font-size: 15px;
    font-weight: 400;
}
</style>
<body>
    <div class="div">
    	<h1><img src="{{ public_path('admin/img/logo/logo2.png')}}" alt="AdminLTELogo" style="width: 55%;"></h1>
       
        @php
        $dr_id=encrypt($driver->id);
        $url='http://girokab.ambiers.com/driver-details/'. $dr_id;
        $qw=base64_encode(QrCode::format('svg')->size(200)->margin(3)->errorCorrection('H')->generate($url));
        @endphp
        <img src="data:image/png;base64, {!! $qw !!}">
        <div class="div2">
            <h1>Scan Me..</h1>
            <p>{{$driver->driver_id}}</p>

        </div>
    </div>

</body>
</html>