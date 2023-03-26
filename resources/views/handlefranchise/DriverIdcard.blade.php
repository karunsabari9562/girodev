<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<style type="text/css">
 
@font-face {
  font-family: 'DMSans-Regular';
  font-style: normal;
  font-weight: normal;
  src: url(http://" . $_SERVER['SERVER_NAME']."/images/DMSans-Regular.ttf) format('truetype');
}

.code{
        height: 20px !important;
        width: 2px !important;
    }
.topics tr { 
    overflow: hidden;
    height: 50px;
    white-space: nowrap;
}

body {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.div {
    width: 17.125rem;
    height: 28.4rem;
    background-color: white;
    padding: 25px;
    border-radius: 20px;
    text-align: center;
    border:2px solid #ffc107;
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
    font-size: 14px;
    font-weight: 400;
}
</style>
<body>
    <center>
    <div class="row">
    <div class="div" style="background-repeat: no-repeat;
    background-size: cover; background-image: url(images/card-fnd-bg.png)">
      <h1><img src="{{ public_path('admin/img/logo/logo2.png')}}" alt="AdminLTELogo" style="width: 65%;"></h1>
       
        
         <img style="width: 130px;border: 5px solid #fff;height: 130px;
    background-size: cover;" src="{{ public_path($driver->photo)}}" alt="" >
        <div >
            <h1>{{$driver->name}}</h1>
            <table style="position: absolute;left: 111px;">
                <tr>
                    <td style="font-weight: 200;font-size: 14px;font-family: 'DMSans-Regular';">ID</td>
                    <td>:</td>
                    <td style="font-size: 13px;">{{$driver->driver_id}}</td>
                </tr>
                <tr>
                
                    <td style="font-weight: 200;font-size: 14px;">DIV</td>
                    <td>:</td>
                    <td style="font-size: 13px;">{{$driver->Getfranchise->franchise_id}}</td>
                </tr>
                 <tr>
                
                    <td style="font-weight: 200;font-size: 14px;">MOB</td>
                    <td>:</td>
                    <td style="font-size: 13px;">{{$driver->mobile}}</td>
                </tr>
                <tr>
                 
                    <td style="font-weight: 200;font-size: 14px;">DOI</td>
                    <td>:</td>
                    <td style="font-size: 13px;">{{$driver->approved_date->format('d-M-Y')}}</td>
                </tr>
            </table>
            
             

        </div>
       
        <br><br><br><br><br><br>
        <div class="div2">
           <p style="font-weight: bold;font-size: 15px;position: absolute;left: 107px;">www.girokab.com</p>
        </div>
        
    </div>

      <div class="div" style="position: absolute;left: 350px;top:0px;background-color: #FFFFFF;">
     




        <h1><img src="{{ public_path('admin/img/logo/logo2.png')}}" alt="AdminLTELogo" style="width: 65%;"></h1>
       
        @php
        $dr_id=encrypt($driver->id);
        $url='https://girokab.com/driver-details/'. $dr_id;
        $qw=base64_encode(QrCode::format('svg')->size(50)->margin(3)->errorCorrection('H')->generate($url));
        @endphp
    
        <div class="div2">
             
            <img src="data:image/png;base64, {!! $qw !!}" alt="" style="border-radius: 0px;width: 110px;"><br><br>
                       
            <table>
                <tr>
                    <td style="font-weight: 200;font-size: 13px;">VEHICLE</td>
                    <td>:</td>
                    <td style="font-size: 13px;">{{$driver->GetVType->type}} </td>
                </tr>

                <tr></tr>
                
                <tr style="vertical-align: top;">
                
                    <td style="font-weight: 200;font-size: 13px;">ADDRESS</td>
                    <td>:</td>
                    <td style="font-size: 13px;position: absolute;top: 60px;">{{$driver->house_name}}, {{$driver->location}}, {{$driver->GetDistrict->district}}, {{$driver->GetState->state}}, {{$driver->pin}}</td>
                </tr>
               <tr></tr>
               
                 <tr>
                
                    <td style="font-weight: 200;font-size: 13px;">BLOOD GP</td>
                    <td>:</td>
                    <td style="font-size: 13px;width: 20px;">{{$driver->blood_group}}</td>
                </tr>
               
            </table>
       

    </div>
         <div class="div2" style="float: right;">
            
            <p style="font-weight: 200;font-size: 13px;position: absolute;left: 130px;top: 400px;">Founder & CEO Giro Kab<br>Muhammed Hasbeer</p>
            <img style="width: 135px;position: absolute;left: 130px;top: 400px; opacity: 0.2;" src="{{ public_path('images/seal.png')}}" alt="">
              <img style="width: 75px;position: absolute;left: 170px;top: 445px;opacity: 5;" src="{{ public_path('images/sign.png')}}" alt=""><br><br>
         </div>

</div>
</center>
</body>
</html>