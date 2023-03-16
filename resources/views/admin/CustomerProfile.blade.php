@extends('layouts.Admin')
@section('title')
customer-profile
  @endsection
  
@section('contents')

<!-- *************************************** -->
<div class="modal" id="addreg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;">
      <div class="modal-header" style="background:grey;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;"><i><i class="fa fa-tasks" aria-hidden="true"></i>   Block Customer</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('addreg').style.display='none'"></i>


       
      </div>
      <div class="modal-body">
        <form class="edit-content" id="reject" method="post">


         
          <div class="form-group">
            <label for="reason" class="col-form-label" style="font-weight: bold;">Reason:</label>
        
            <textarea class="form-control" rows="5" id="reason" name="reason"></textarea>
            
          </div>
         
       <!--  <input type="hidden" name="bid" id="bid"> -->
      </div>
      <div class="modal-footer" style="border:none;">
        
        <button type="button" class="btn btn-primary" id="ab1" onclick="Save()">Submit</button>
         <button type="button"  class="btn btn-primary" id="ab2" disabled=""> <i class="fa fa-spinner fa-spin"></i>  Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- *************************************** -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin-dashboard">Home</a></li>
              <li class="breadcrumb-item active">Customer Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if($customer->photo=='')
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('customers/default.png')}}"
                       alt="User profile picture">
                       @else

                         <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('/customers/'.$customer->photo)}}"
                       alt="User profile picture">
                       @endif
                </div>

                <h3 class="profile-username text-center">{{$customer->name}}</h3>

                <p class="text-muted text-center">Customer Id : {{$customer->id}}</p>

                

                <a onclick="Block()" style="cursor: pointer;" class="btn btn-danger btn-block"><b>Block</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Customer</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                 <strong><i class="fas fa-coins mr-1"></i> Points</strong>

                <p class="" style="font-size: 20px;font-weight: bold;color: green;">
                  {{$customer->points}}
                </p>

                <hr>
                <strong><i class="fas fa-mobile mr-1"></i> Mobile</strong>

                <p class="text-muted">
                  {{$customer->mobile}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <!-- <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr> -->
<!-- 
                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Activities</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> -->
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  

 <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">

                      @if($act_count==0)
                      <div class="time-label">
                        <span class="bg-danger">
                          No activities Found !
                        </span>
                      </div>
   @else
@foreach($activity as $act)
@php
     $d1 = date("d-m-Y", strtotime($act->scan_date));

     $batch_det=DB::table('qrcode_details')->where('code',$act->GetQrParent->parent_code)->first();
     @endphp

              
                      <!-- timeline time label -->
                      
                   
                      <div class="time-label">
                        <span class="bg-danger">
                          {{$d1}}
                        </span>
                      </div>
                      <div>
                        <i class="fas fa-check bg-primary"></i>

                        <div class="timeline-item">
                    <!--       <span class="time"><i class="far fa-clock"></i> 12:05</span> -->

                          <h3 class="timeline-header"><a href="#">QR Code</a>  :    {{$act->qrcode_id}}  ( Batch : {{$batch_det->name}})</h3>
                          <h3 class="timeline-header"><a href="#">Point</a>  :    {{$act->points}}</h3>
                          <!-- <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div> -->
                          <!-- <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div> -->
                        </div>
                      </div>
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div><br>
            
                       

@endforeach

          @endif
         </div>
                  </div>

                      
                     
                      
                      
                      <!-- END timeline item -->
                      
                   
                  <!-- /.tab-pane -->




                  



                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    function Block()
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

    var cid='{{$customer->id}}';

    data = new FormData();
data.append('reason', reason);
   data.append('cid', cid);
 data.append('_token', @json(csrf_token()));

$('#ab1').hide();
$('#ab2').show();


  $.ajax({

    type:"POST",
    url:"/block-customer",
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
                              title: "Customer blocked Successfully.",
                              //text: "Username and Password send to your Email",
                              icon: "success",
                              buttons: "Ok",
                               closeOnClickOutside: false
  
                            })

                      .then((willDelete) => {
                       if (willDelete) {
                             window.location.href='/active-customers';
                                  } 

                            });
         
                                 
      }
      
      

    }




  })


}
  </script>
   @endsection