@extends('layouts.Admin')
@section('title')
 driver-approval
  @endsection
 
@section('contents')


<!-- *************************************** -->
<div class="modal" id="addreg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;">
      <div class="modal-header" style="background:#fab60b;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;"><i>   Reject Driver Profile</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('addreg').style.display='none'"></i>


       
      </div>
      <div class="modal-body">
        <form class="edit-content" id="reject" method="post">


         
          <div class="form-group">
            <label for="reason" class="col-form-label" style="font-weight: bold;">Reason:</label>
        
            <textarea class="form-control" rows="5" id="reason" name="reason"></textarea>
            
          </div>
         
        <input type="hidden" name="bid" id="bid">
      </div>
      <div class="modal-footer" style="border:none;">
        
        <button type="button" class="btn yellowbtn" id="ab1" onclick="Save()" style="background-color: #d98704;color: white;">Submit</button>
         <button type="button"  class="btn yellowbtn" id="ab2" disabled="" style="background-color: #d98704;color: white;"> <i class="fa fa-spinner fa-spin"></i>  Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- *************************************** -->



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Driver Approval</h1>
          </div>
          <div class="col-sm-6 d-none d-sm-block">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/girokab-admin/drivers-final-approval"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content pb-3">
      <div class="container-fluid h-100">

<!-- ///////////////////////////// -->

 <div class="card card-row card-primary">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Profile Details
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">
     
              <div class="card-header" style="cursor: pointer;background-color: #dee2e6;" onclick="Step1()" id="bg1">
                <h7 class="card-title">Personal Details</h7>
                
              </div>
              <div class="card-header" style="cursor: pointer;" onclick="Step2()" id="bg2">
                <h5 class="card-title">Vehicle Details</h5>
               
              </div>
              <div class="card-header" style="cursor: pointer;" onclick="Step3()" id="bg3">
                <h5 class="card-title">Driving License Frontside</h5>
                
              </div>
              <div class="card-header" style="cursor: pointer;" onclick="Step33()" id="bg33">
                <h5 class="card-title">Driving License Backside</h5>
                
              </div>
              <div class="card-header" style="cursor: pointer;" onclick="Step4()" id="bg4">
                <h5 class="card-title">Registration Certificate</h5>
                
              </div>
              <div class="card-header" style="cursor: pointer;" onclick="Step5()" id="bg5">
                <h5 class="card-title">Vehicle Insurance</h5>
                
              </div>

               <div class="card-header" style="cursor: pointer;" onclick="Step6()" id="bg6">
                <h5 class="card-title">Pollution Certificate</h5>
                
              </div>

               <div class="card-header" style="cursor: pointer;" onclick="Step7()" id="bg7">
                <h5 class="card-title">Vehicle Permit</h5>
                
              </div>
              <div class="card-header" style="cursor: pointer;" onclick="Step8()" id="bg8">
                <h5 class="card-title">Payment Details</h5>
                
              </div>

                <div class="card-header">

                 <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" onclick="ApproveDriver()" id="renewbt1">Approve</button></h5>

                 <button type="button" class="btn redbtn" value="Submit" onclick="Reject()" id="renewbt11" style="float: right;">Reject</button>
                 
              </div>

            </div>
           
          </div>
        </div>

<!-- ////////////////////////////////////////////////// -->

         <div class="card card-row card-primary" id="st11">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Personal Details
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">
              <center>
              <div class="card-header">
                   <a href="{{asset($driver_det->photo)}}" target="_blank" class="nav-link"><img src="{{ asset($driver_det->photo)}}" alt="User Image" style="width: 50%;border-radius: 5px;"></a>
              </div>
              </center>


              <div class="card-header">
                <h5 class="card-title">Name :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;font-size: 17px;font-weight: bold;">{{$driver_det->name}}</a>
                  
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">Mobile :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->mobile}}</a>
                
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">Registered At :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{ $driver_det->created_at->format('d-m-Y') }}</a>
                  
                </div>
              </div>

             
                     <div class="card-header">
                <h5 class="card-title">Registered By:</h5>
                <div class="card-tools">
                    @if($driver_det->added_by==0)
                  <a class="btn btn-tool" style="color: black;">Self</a>
                  @else
                  <a class="btn btn-tool" style="color: black;">Division</a>
                  @endif
                </div>
              </div>
              

                         

            </div>
          </div>
        </div>




         <div class="card card-row card-primary" id="st1">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Personal Details
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">
              
              <div class="card-header">
                <h5 class="card-title">Blood Group :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->blood_group}}</a>
                  
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">House Name :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->house_name}}</a>
                
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">Location :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->location}}</a>
                  
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">District :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->GetDistrict->district}}</a>
                  
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">State :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->GetState->state}}</a>
                  
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">Pin Code :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->pin}}</a>
                  
                </div>
              </div>
         

            </div>
          </div>
        </div>




<!-- ////////////////////////////////////////////////// -->

<div class="card card-row card-primary" id="st2">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Vehicle Details
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">
             
              <div class="card-header">
                <h5 class="card-title">Categroy :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->GetVcategory->category}}</a>
                  
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">Type :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->GetVtype->type}}</a>
                
                </div>
              </div>

             




            </div>
          </div>
        </div>


<!-- ////////////////////////////////////////////////// -->

<div class="card card-row card-primary" id="st3">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Driving License FrontSide
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">

              <center>
                <div class="card-header">
                   <a href="{{asset($driver_det->GetPDocs->license_frontfile)}}" target="_blank" class="nav-link"><img src="{{ asset('default/file.png')}}" alt="User Image" style="width: 50%;border-radius: 10px;"></a>
              </div>
             </center>
              <div class="card-header">
                <h5 class="card-title">No. :</h5>
                <div class="card-tools">
                 
          <a class="btn btn-tool" style="color: black;font-size: 15px;">{{$driver_det->GetPDocs->license_number}}</a>
                  
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">Expiry :</h5>
                <div class="card-tools">
                         
                         <a class="btn btn-tool" style="color: black;font-size: 15px;">{{$driver_det->GetPDocs->license_expiry->format('d-m-Y')}}</a>
                
                </div>
              </div>


            </div>
          </div>
        </div>
<!-- ////////////////////////////////////////////////// -->
        <div class="card card-row card-primary" id="st33">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Driving License BackSide
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">

              <center>
                <div class="card-header">
                   <a href="{{asset($driver_det->GetPDocs->license_backfile)}}" target="_blank" class="nav-link"><img src="{{ asset('default/file.png')}}" alt="User Image" style="width: 50%;border-radius: 10px;"></a>
              </div>
             </center>
             
            </div>
          </div>
        </div>


<!-- ////////////////////////////////////////////////// -->



      <div class="card card-row card-primary" id="st4">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Registration Certificate
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">

                <center>
                <div class="card-header">
                   <a href="{{asset($driver_det->GetPDocs->rc_file)}}" target="_blank" class="nav-link"><img src="{{ asset('default/file.png')}}"  alt="User Image" style="width: 50%;border-radius: 10px;"></a>
              </div>
             </center>
             
              <div class="card-header">
                <h5 class="card-title">No. :</h5>
                <div class="card-tools">
                 
             
                 <a class="btn btn-tool" style="color: black;font-size: 15px;">{{$driver_det->GetPDocs->rc_number}}</a>
                  
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">Expiry :</h5>
                <div class="card-tools">
                         
                          <a class="btn btn-tool" style="color: black;font-size: 15px;">{{$driver_det->GetPDocs->rc_expiry->format('d-m-Y')}}</a>
                
                </div>
              </div>


            </div>
          </div>
        </div>


<!-- ////////////////////////////////////////////////// -->



       <div class="card card-row card-primary" id="st5">
          <div class="card-header"style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Vehicle Insurance
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">

                <center>
                <div class="card-header">
                   <a href="{{asset($driver_det->GetPDocs->insurance_file)}}" target="_blank" class="nav-link"><img src="{{ asset('default/file.png')}}" alt="User Image" style="width: 50%;border-radius: 10px;"></a>
              </div>
             </center>
             

               <div class="card-header">
                <h5 class="card-title">Expiry :</h5>
                <div class="card-tools">
                        
                         <a class="btn btn-tool" style="color: black;font-size: 15px;">{{$driver_det->GetPDocs->insurance_expiry->format('d-m-Y')}}</a>
                
                </div>
              </div>

              

            


            </div>
          </div>
        </div>


<!-- ////////////////////////////////////////////////// -->



  <div class="card card-row" id="st6">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Pollution Certificate
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">

                <center>
                <div class="card-header">
                   <a href="{{asset($driver_det->GetSDocs->pollution_file)}}" target="_blank" class="nav-link"><img src="{{ asset('default/file.png')}}" alt="User Image" style="width: 50%;border-radius: 10px;"></a>
              </div>
             </center>
             

               <div class="card-header">
                <h5 class="card-title">Expiry :</h5>
                <div class="card-tools">
                         
                         <a class="btn btn-tool" style="color: black;font-size: 15px;">{{$driver_det->GetSDocs->pollution_expiry->format('d-m-Y')}}</a>
                
                </div>
              </div>
              




            </div>
          </div>
        </div>



<!-- ////////////////////////////////////////////////// -->

  

<div class="card card-row" id="st7">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Vehicle Permit
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">

                <center>
                <div class="card-header">
                   <a href="{{asset($driver_det->GetSDocs->permit_file)}}" target="_blank" class="nav-link"><img src="{{ asset('default/file.png')}}" alt="User Image" style="width: 50%;border-radius: 10px;"></a>
              </div>
             </center>
             

               <div class="card-header">
                <h5 class="card-title">Expiry :</h5>
                <div class="card-tools">
                         
                            <a class="btn btn-tool" style="color: black;font-size: 15px;">{{$driver_det->GetSDocs->permit_expiry->format('d-m-Y')}}</a>
                
                </div>
              </div>
              




            </div>
          </div>
        </div>



<!-- ////////////////////////////////////////////////// -->

<div class="card card-row" id="st8">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Payment Details
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">

               <div class="card-header">
                <h5 class="card-title">Payment Date :</h5>
                <div class="card-tools">
                         
                        
                         <a class="btn btn-tool" style="color: black;font-size: 15px;">{{$driver_det->GetSDocs->payment_date->format('d-m-Y')}}</a>
                         
                
                </div>
              </div>
               <div class="card-header">
                <h5 class="card-title">Amount (Rs.) :</h5>
                <div class="card-tools">
                         
                         <a class="btn btn-tool" style="color: black;font-size: 15px;">{{$driver_det->GetSDocs->amount}}</a>
                
                </div>
              </div>
               <div class="card-header">
                <h5 class="card-title">Reference Id :</h5>
                <div class="card-tools">
                           @if($driver_det->added_by==0)
                         <a class="btn btn-tool" style="color: black;font-size: 15px;">{{$driver_det->GetSDocs->reference_id}}</a>
                         @endif
                
                </div>
              </div>
              




            </div>
          </div>
        </div>



<!-- ////////////////////////////////////////////////// -->

<div class="card card-row card-primary" id="rej1">
          <div class="card-header" style="background-color: #c70000;color: white;">
            <h3 class="card-title">
              Rejection History
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">
             
              @if(!$driver_rej->isEmpty())

             
             @foreach($driver_rej as $dj)
             @php
             $rejdt = date("d-m-Y", strtotime($dj->rejected_date));
             @endphp
              <div class="card-header">
                <h5 class="card-title"><i class="fa fa-exclamation-circle" style="color:#c70000 "></i>    {{$dj->rejection_reason}}</h5>
                @if($dj->rejected_by==1)
                <br><span style="font-size: 13px;">(By Franchise)</span>
                @endif
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$rejdt}}</a>
                  
                </div>
              </div>
              @endforeach
               @else
               <div class="card-header">
                <h5 class="card-title"> No data found !</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;"></a>
                  
                </div>
              </div>
               @endif

            </div>
          </div>
        </div>



      
        
      </div>
    </section><br><br>
  </div>

  <script type="text/javascript">

     function ApproveDriver()
{
 
swal({
  title: "Do you want to approve driver profile ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body='{{$driver_det->id}}';




$.ajax({

              type:"POST",
              url:'/approve-driver-profile',
              data: {
        _token: @json(csrf_token()),
        body: body,
  
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       swal({
                              title: "Driver profile approved successfully.",
                              //text: "Username and Password send to your Email",
                              icon: "success",
                              buttons: "Ok",
                               closeOnClickOutside: false
  
                            })

                      .then((willDelete) => {
                       if (willDelete) {
                             window.location.href='/girokab-admin/drivers-final-approval';
                                  } 

                            });

                     
                    }
                  
                
            }
       })

 } 
  
});
}

 function Reject()
{
 
 
var modal2 = document.getElementById("addreg");

modal2.style.display = "block";
}


function Save()
{


  var reason=$('#reason').val();

  if(reason=='')
  {
    $('#reason').css('border','1px solid red');
    
    return false;
  }
  else
    $('#reason').css('border','1px solid #CCC');

    var driverid='{{$driver_det->id}}';

    data = new FormData();
data.append('reason', reason);
   data.append('driverid', driverid);
 data.append('_token', @json(csrf_token()));

$('#ab1').hide();
$('#ab2').show();


  $.ajax({

    type:"POST",
    url:"/reject-driver-profile",
    data:data,
    dataType:"json",
    contentType: false,
   //cache: false,
   processData: false,

    success:function(data)
    {
      if(data['success'])
      {
        $('#ab2').hide();
        $('#ab1').show();
         

          swal({
                              title: "Driver profile rejected successfully.",
                              //text: "Username and Password send to your Email",
                              icon: "success",
                              buttons: "Ok",
                               closeOnClickOutside: false
  
                            })

                      .then((willDelete) => {
                       if (willDelete) {
                             window.location.href='/girokab-admin/drivers-final-approval';
                                  } 

                            });
                                 
      }
      
      

    }




  })


}



function Step1()
{
  $('#st1').show();
  $('#st11').show();
  $("#bg1").css("background-color", "#dee2e6");
  $('#st2').hide();
   $("#bg2").css("background-color", "white");
  $('#st3').hide();
   $("#bg3").css("background-color", "white");
    $('#st33').hide();
   $("#bg33").css("background-color", "white");
  $('#st4').hide();
   $("#bg4").css("background-color", "white");
  $('#st5').hide();
   $("#bg5").css("background-color", "white");
  $('#st6').hide();
   $("#bg6").css("background-color", "white");
   $('#st7').hide();
  $("#bg7").css("background-color", "white");
   $('#st8').hide();
  $("#bg8").css("background-color", "white");

}

function Step2()
{
  $('#st1').hide();
  $('#st11').hide();
  $("#bg1").css("background-color", "white");
  $('#st2').show();
  $("#bg2").css("background-color", "#dee2e6");
  $('#st3').hide();
  $("#bg3").css("background-color", "white");
      $('#st33').hide();
   $("#bg33").css("background-color", "white");
  $('#st4').hide();
  $("#bg4").css("background-color", "white");
  $('#st5').hide();
  $("#bg5").css("background-color", "white");
  $('#st6').hide();
  $("#bg6").css("background-color", "white");
  $('#st7').hide();
  $("#bg7").css("background-color", "white");
   $('#st8').hide();
  $("#bg8").css("background-color", "white");
}

function Step3()
{
  $('#st1').hide();
  $('#st11').hide();
  $("#bg1").css("background-color", "white");
  $('#st2').hide();
  $("#bg2").css("background-color", "white");
  $('#st3').show();
   $("#bg3").css("background-color", "#dee2e6");
       $('#st33').hide();
   $("#bg33").css("background-color", "white");
  $('#st4').hide();
  $("#bg4").css("background-color", "white");
  $('#st5').hide();
  $("#bg5").css("background-color", "white");
  $('#st6').hide();
  $("#bg6").css("background-color", "white");
  $('#st7').hide();
  $("#bg7").css("background-color", "white");
   $('#st8').hide();
  $("#bg8").css("background-color", "white");
}

function Step33()
{
  $('#st1').hide();
  $('#st11').hide();
  $("#bg1").css("background-color", "white");
  $('#st2').hide();
  $("#bg2").css("background-color", "white");

  $('#st3').hide();
  $("#bg3").css("background-color", "white");
  $('#st33').show();
  $("#bg33").css("background-color", "#dee2e6");
  $('#st4').hide();
  $("#bg4").css("background-color", "white");
  $('#st5').hide();
  $("#bg5").css("background-color", "white");
  $('#st6').hide();
  $("#bg6").css("background-color", "white");
  $('#st7').hide();
  $("#bg7").css("background-color", "white");
   $('#st8').hide();
  $("#bg8").css("background-color", "white");
}

function Step4()
{
  $('#st1').hide();
  $('#st11').hide();
  $("#bg1").css("background-color", "white");
  $('#st2').hide();
  $("#bg2").css("background-color", "white");
  $('#st3').hide();
  $("#bg3").css("background-color", "white");
      $('#st33').hide();
   $("#bg33").css("background-color", "white");
  $('#st4').show();
  $("#bg4").css("background-color", "#dee2e6");
  $('#st5').hide();
  $("#bg5").css("background-color", "white");
  $('#st6').hide();
  $("#bg6").css("background-color", "white");
  $('#st7').hide();
  $("#bg7").css("background-color", "white");
   $('#st8').hide();
  $("#bg8").css("background-color", "white");
}

function Step5()
{
  $('#st1').hide();
  $('#st11').hide();
  $("#bg1").css("background-color", "white");
  $('#st2').hide();
  $("#bg2").css("background-color", "white");
  $('#st3').hide();
  $("#bg3").css("background-color", "white");
  $('#st33').hide();
  $("#bg33").css("background-color", "white");
  $('#st4').hide();
  $("#bg4").css("background-color", "white");
  $('#st5').show();
  $("#bg5").css("background-color", "#dee2e6");
  $('#st6').hide();
  $("#bg6").css("background-color", "white");
  $('#st7').hide();
  $("#bg7").css("background-color", "white");
   $('#st8').hide();
  $("#bg8").css("background-color", "white");
}

function Step6()
{
  $('#st1').hide();
  $('#st11').hide();
  $("#bg1").css("background-color", "white");
  $('#st2').hide();
  $("#bg2").css("background-color", "white");
  $('#st3').hide();
  $("#bg3").css("background-color", "white");
  $('#st4').hide();
  $("#bg4").css("background-color", "white");
  $('#st5').hide();
  $("#bg5").css("background-color", "white");
  $('#st6').show();
  $("#bg6").css("background-color", "#dee2e6");
   $('#st7').hide();
  $("#bg7").css("background-color", "white");
   $('#st8').hide();
  $("#bg8").css("background-color", "white");
}

function Step7()
{
  $('#st1').hide();
  $('#st11').hide();
  $("#bg1").css("background-color", "white");
  $('#st2').hide();
  $("#bg2").css("background-color", "white");
  $('#st3').hide();
  $("#bg3").css("background-color", "white");
  $('#st4').hide();
  $("#bg4").css("background-color", "white");
  $('#st5').hide();
  $("#bg5").css("background-color", "white");
  $('#st6').hide();
  $("#bg6").css("background-color", "white");
  $('#st7').show();
  $("#bg7").css("background-color", "#dee2e6");
   $('#st8').hide();
  $("#bg8").css("background-color", "white");
}

function Step8()
{
  $('#st1').hide();
  $('#st11').hide();
  $("#bg1").css("background-color", "white");
  $('#st2').hide();
  $("#bg2").css("background-color", "white");
  $('#st3').hide();
  $("#bg3").css("background-color", "white");
  $('#st4').hide();
  $("#bg4").css("background-color", "white");
  $('#st5').hide();
  $("#bg5").css("background-color", "white");
  $('#st6').hide();
  $("#bg6").css("background-color", "white");
   $('#st7').hide();
  $("#bg7").css("background-color", "white");
  $('#st8').show();
  $("#bg8").css("background-color", "#dee2e6");
}



  </script>

  @endsection