 @extends('layouts.Franchise')
@section('title')
 driver-submission-status
  @endsection
 
@section('contents')


<!-- *************************************** -->
<div class="modal" id="addreg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;">
      <div class="modal-header" style="background:#d0a203;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;"><i><img src="{{ asset('admin/img/logo/lg.ico')}}" style="width: 60px;border-radius: 5px;">   Reject Driver</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('addreg').style.display='none'"></i>


       
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
        
        <button type="button" class="btn" id="ab1" onclick="Save()" style="background-color: #d98704;color: white;">Submit</button>
         <button type="button"  class="btn" id="ab2" disabled="" style="background-color: #d98704;color: white;"> <i class="fa fa-spinner fa-spin"></i>  Submit</button>
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
            <h1>Driver Profile Submission</h1>
          </div>
          <div class="col-sm-6 d-none d-sm-block">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/franchise-division/new-drivers"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content pb-3">
      <div class="container-fluid h-100">


         <div class="card card-row" style="width: 380px;">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Submission Details
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">
              

              <div class="card-header">
                <h5 class="card-title">Name :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;font-size: 20px;">{{$driver->name}}</a>
                  
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">Mobile :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver->mobile}}</a>
                
                </div>
              </div>
              <div class="card-header">
                <h5 class="card-title">Registered At :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{ $driver->created_at->format('d-m-Y') }}</a>
                
                </div>
              </div>

               
              <div class="card-header" style="cursor: pointer;">
                <h7 class="card-title">Personal Details</h7>
                <div class="card-tools">
                  @if($driver->profile_upload_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                   @else
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif
                  
                </div>
              </div>
              <div class="card-header" style="cursor: pointer;">
                <h5 class="card-title">Vehicle Details</h5>
                <div class="card-tools">
                   @if($driver->vehicle_upload_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                   @else               
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif                
                </div>
              </div>
              <div class="card-header" style="cursor: pointer;">
                <h5 class="card-title">Driving License Front side</h5>
                <div class="card-tools">
                  @if($driver->GetPDocs->licensefront_upload_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                  @else
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif
                  
                </div>
              </div>
              <div class="card-header" style="cursor: pointer;">
                <h5 class="card-title">Driving License Back Side</h5>
                <div class="card-tools">
                  @if($driver->GetPDocs->licenseback_upload_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                  @else
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif
                  
                </div>
              </div>
              <div class="card-header" style="cursor: pointer;">
                <h5 class="card-title">Registration Certificate</h5>
                <div class="card-tools">
                   @if($driver->GetPDocs->rc_upload_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                  @else
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif
                  
                </div>
              </div>
              <div class="card-header" style="cursor: pointer;">
                <h5 class="card-title">Vehicle Insurance</h5>
                <div class="card-tools">
                   @if($driver->GetPDocs->insurance_upload_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                  @else
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif
                  
                </div>
              </div>

               <div class="card-header" style="cursor: pointer;">
                <h5 class="card-title">Pollution Certificate</h5>
                <div class="card-tools">
                   @if($driver->GetSDocs->pollution_upload_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                  @else
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif
                  
                </div>
              </div>

              <div class="card-header" style="cursor: pointer;">
                <h5 class="card-title">Vehicle Permit</h5>
                <div class="card-tools">
                   @if($driver->GetSDocs->permit_upload_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                  @else
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif
                  
                </div>
              </div>

              <div class="card-header" style="cursor: pointer;">
                <h5 class="card-title">Payment</h5>
                <div class="card-tools">
                   @if($driver->GetSDocs->payment_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                  @else
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif
                  
                </div>
              </div>

              



            </div>

                <button type="button" class="btn btn-danger" value="Submit" onclick="Reject('{{$driver->id}}')" id="btt" style="float: right;">  Reject</button>
          </div>
        </div>


        
      </div>
    </section><br><br>
  </div>

  <script type="text/javascript">

  function Reject(val1)
{
 
 $('#bid').val(val1)
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

    var driverid=$('input#bid').val();

    data = new FormData();
data.append('reason', reason);
   data.append('driverid', driverid);
 data.append('_token', @json(csrf_token()));

$('#ab1').hide();
$('#ab2').show();


  $.ajax({

    type:"POST",
    url:"/franchise-division/reject-driver",
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
                              title: "Driver rejected successfully.",
                              //text: "Username and Password send to your Email",
                              icon: "success",
                              buttons: "Ok",
                               closeOnClickOutside: false
  
                            })

                      .then((willDelete) => {
                       if (willDelete) {
                             window.location.href='/franchise/new-drivers';
                                  } 

                            });
                                 
      }
      
      

    }




  })


}

 

  </script>

  @endsection