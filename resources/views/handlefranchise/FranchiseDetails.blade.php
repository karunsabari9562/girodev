@extends('layouts.Admin')
@section('title')
division-details
  @endsection
  
@section('contents')

<style type="text/css">
  .nav-pills .nav-link.active,
.nav-pills .show > .nav-link {
  color: #fff;
  background-color: #fab60b;
}

</style>

<!-- *************************************** -->
<div class="modal" id="addreg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;">
      <div class="modal-header" style="background:#d0a203;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;"><i>   Block Franchise</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('addreg').style.display='none'"></i>


       
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
        
        <button type="button" class="btn yellowbtn" id="ab1" onclick="Save()" style="background-color: #d98704;color: white;">Submit</button>
         <button type="button"  class="btn yellowbtn" id="ab2" disabled="" style="background-color: #d98704;color: white;"> <i class="fa fa-spinner fa-spin"></i>  Submit</button>
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
            <h4></h4>
          </div>
        
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="javascript:window.open('','_self').close();"><i class="fa fa-times" aria-hidden="true"></i>  close</a></li>
              {{-- <li class="breadcrumb-item active"></li> --}}
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
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset($franchise->photo)}}"
                       alt="User profile picture" style="width: 200px;border-radius:10px;height:200px;">
                </div>
                <h3 class="profile-username text-center"></h3>
                 @php
                 $d=date('Y-m-d');
                    $dt = date("d-m-Y", strtotime($franchise->valid_to));
                    $dt1 = date("d-m-Y", strtotime($franchise->valid_from));
                    @endphp

              <p class="text-center" style="font-weight: bold;">{{$franchise->franchise_name}}</p>

              @if($franchise->status==1)
                @if($franchise->valid_to>=$d)
                <p class="text-center" style="color: green;font-weight: bold;">Active</p>
                @else
                 <p class="text-center" style="color: red;font-weight: bold;">Expired</p>
                @endif
              @elseif($franchise->status==2)
                
               <p class="text-center" style="color: red;font-weight: bold;">Blocked</p>

               @endif

                <ul class="list-group list-group-unbordered mb-3">
                  @if($franchise->franchise_type==1 )
                     <li class="list-group-item">
                    <b>Type </b> <a class="float-right">Own</a>
                  </li>
                    @else
                      <li class="list-group-item">
                    <b>Type </b> <a class="float-right">Other</a>
                  </li>
                    @endif
                    <li class="list-group-item">
                    <b>Profit % </b> <a class="float-right">{{$franchise->profit}}%</a>
                  </li>
                  <li class="list-group-item">
                    <b>Mobile </b> <a class="float-right">{{$franchise->franchise_mobile}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Mail Id</b> <a class="float-right">{{$franchise->mail_id}}</a>
                  </li>
                 
                  <li class="list-group-item">
                   
                    <b>Valid To</b> <a class="float-right">{{$dt}}</a>
                  
                  </li>

                 
                   @if($franchise->status==2)
                   <li class="list-group-item">
                     @php
                   
                    $bdt = date("d-m-Y", strtotime($franchise->blocked_date));
                    @endphp
                    <b>Blocked At</b> <a class="float-right">{{$bdt}}</a>
                  
                  </li>
                  @endif
                 
                  
                  
                 
                  
                </ul>

                 
<center>
                 
            @if($franchise->status==2)
                <a style="cursor: pointer;" onclick="Active()" class="btn greenbtn"><b>Activate</b></a>
           @elseif($franchise->status==1)
                <a style="cursor: pointer;" onclick="Block()" class="btn redbtn"><b>Block</b></a>
             @endif 
                <a href="/edit-franchise/{{encrypt($franchise->id)}}" class="btn yellowbtn"><b>Edit</b></a> 
                </center>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">

              
                    <li class="nav-item"><a class="nav-link active" href="#ride" data-toggle="tab">Rides&Collection</a></li>
                  <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Company Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#renew2" data-toggle="tab">Validity History</a></li>
                  <li class="nav-item"><a class="nav-link" href="#renew1" data-toggle="tab">Validity Renew</a></li>
                  @if($franchise->status==2)
                  <li class="nav-item"><a class="nav-link" href="#block" data-toggle="tab">Reason for Block</a></li>
                 @endif
            
                 
               
                  

                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <span style="font-size: 20px;font-weight:bold">Franchise Details</span>
                          <table style="border-collapse: separate;
                          border-spacing: 0 1em;padding: 15px 15px;">
                          <tr>
                            <td style="font-weight: bold;">Proprietor  : </td>
                            <td style="padding: 0 15px;"> {{$franchise->proprietor_name}} </td>
                        </tr>
                          
                        <tr>
                            <td style="font-weight: bold;">Location  : </td>
                            <td style="padding: 0 15px;"> {{$franchise->franchise_location}} </td>
                        </tr>
                        
                        <tr>
                            <td style="font-weight: bold;">District  : </td>
                            <td style="padding: 0 15px;">{{$franchise->GetDist->district}} </td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">State  : </td>
                            <td style="padding: 0 15px;"> Kerala</td>
                        </tr>
                        
                        <tr>
                            <td style="font-weight: bold;">Landline  : </td>
                            <td style="padding: 0 15px;"> {{$franchise->franchise_landline}} </td>
                        </tr>
                       
                       
                        
                    </table>
                 
                      </div>
                      <!-- /.user-block -->
                      

                     

                    </div>
                    
                  </div>
               

         <div class="tab-pane" id="renew2">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      
                      <div>
                        
                        <i class="far fa-clock bg-warning"></i>


                        <div class="timeline-item">
<h3 class="timeline-header"><a href="#">Current Subscription</a></h3>
                          <div class="timeline-body">
                          <table style="border-collapse: separate;
                      border-spacing: 0 0.6em;padding: 15px 15px;">
                     
                     <tr>
                        <td style="font-weight: bold;">Valid From: </td>
                        <td style="padding: 0 15px;">{{$dt1}} </td>
                    </tr> 
                    <tr>
                        <td style="font-weight: bold;">Valid To: </td>
                        <td style="padding: 0 15px;"> {{$dt}}</td>
                    </tr>
                      
                     
                     
                </table>
              </div>



                        </div>

                      </div>
                      
                      
                      <div>
                        <i class="far fa-clock bg-warning"></i>
                      </div>
                    </div>
<!-- 
\\\\\\\\\\\\\ -->
             
              
                     <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                     <!--  <div class="time-label">
                        <span  style="background-color: #9d8787;color: white;">
                          Date Of Payment : 
                        </span>
                      </div> -->
                      <div>
                        
                        

                        @foreach($franchise_history as $s)
                         @php
                    $dtt = date("d-m-Y", strtotime($s->valid_to));
                    $dtt1 = date("d-m-Y", strtotime($s->valid_from));
                    @endphp
                        
                        <i class="far fa-clock bg-gray"></i>
                        <div class="timeline-item">
                        <h3 class="timeline-header"><a href="#">Previous Subscription</a></h3>
                          <div class="timeline-body">
                          <table style="border-collapse: separate;
                      border-spacing: 0 0.6em;padding: 15px 15px;">
                     
                    <tr>
                        <td style="font-weight: bold;">Valid From: </td>
                        <td style="padding: 0 15px;">{{$dtt1}} </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Valid To: </td>
                        <td style="padding: 0 15px;">{{$dtt}} </td>
                    </tr>
                      
                    
                   
                </table>
              </div>



                        </div>

@endforeach




                      </div>
                      
                      
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>

                  </div>        



<div class="tab-pane" id="renew1">
                    <form class="form-horizontal" >
                  
                    <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Valid From: </label>

                        <div class="col-sm-10">
                          <input type="date" name="valfrom" id="valfrom" class="form-control" min="{{$franchise->valid_to}}" value="{{$franchise->valid_to}}">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Valid to: </label>

                        <div class="col-sm-10">
                          <input type="date" name="valto" id="valto" class="form-control" min="{{date('Y-m-d')}}">
                        </div>
                      </div>
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="button" class="btn yellowbtn" value="Submit" onclick="Approve()" id="renewbt1">Submit</button>
                          <button type="button" class="btn yellowbtn" value="Submit" id="renewbt2"><i class="fa fa-spinner fa-spin"></i>  Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>


                  <div class="tab-pane active" id="ride">
                    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Ride History</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>

        <div class="card-body">
<h4 style="font-size: 17px;font-weight: bold;">Ride Details {{date('Y-M')}}</h4>
          <div class="row">
            <div class="col-12 col-md-12 col-lg-7 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/completed-mrides/{{encrypt($franchise->id)}}'">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Completed</span>
                      <span class="info-box-number text-center text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/rejected-mrides/{{encrypt($franchise->id)}}'">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Rejected</span>
                      <span class="info-box-number text-center text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/cancelled-mrides/{{encrypt($franchise->id)}}'">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Cancelled</span>
                      <span class="info-box-number text-center text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/timeout-mrides/{{encrypt($franchise->id)}}'">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Timeout</span>
                      <span class="info-box-number text-center text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              
              </div>

              <div class="row">
                <div class="col-12">
                 
                   <br><h4 style="font-size: 17px;font-weight: bold;">Collection Analysis</h4>
                     <form class="form-horizontal" action="/girokab-admin/division-collection-history" method="post" target="_blank">
                @csrf
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Year</label>
                    <div class="col-sm-10">
                    <select class="form-control" id="year" name="year">
                      <option value="">Choose</option>
                     <!--  <option value="1">All</option> -->
                      <option value="2023">2023</option>
                      <option value="2023">2024</option>
                      
                                   
                    </select>
                    @error('year') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div> 
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Month</label>
                    <div class="col-sm-10">
                    <select class="form-control" id="month" name="month">
                      <option value="">Choose</option>
                     <!--  <option value="1">All</option> -->
                      <option value="01">January</option>
                      <option value="02">February</option>
                      <option value="03">March</option>
                      <option value="04">April</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">August</option>
                      <option value="09">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                                   
                    </select>
                    @error('month') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                    <input type="hidden" name="frid" id="frid" value="{{$franchise->id}}">
                  </div> 

                     <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-info">Analise</button> -->
                    <button type="submit" class="btn yellowbtn float-right">View Collection</button>
                 
                </div>
                </form>
                </div>
              </div>
         
            </div>
            <div class="col-12 col-md-12 col-lg-5 order-1 order-md-2">
              <h3 class="text-primary">Find Rides <i class="fa fa-search" aria-hidden="true"></i></h3>
           
              
              

              <div class="card card-info">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="/girokab-admin/rides-history" method="post" target="_blank">
                @csrf
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">From *</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="dfrom" name="dfrom" placeholder="Email">
                      @error('dfrom') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">To *</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="dto" name="dto" placeholder="Password">
                         @error('dto') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div>

                  

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Type *</label>
                    <div class="col-sm-10">
                    <select class="form-control" id="btype" name="btype">
                      <!-- <option value="0">Choose</option> -->
                     <!--  <option value="1">All</option> -->
                      <option value="2">Completed</option>
                      <option value="3">Rejected</option>
                      <option value="4">Cancelled</option>
                      <option value="5">Timeout</option>
                                   
                    </select>
                    </div>
                  </div>
                   <input type="hidden" class="form-control" id="fid" name="fid" value="{{$franchise->id}}">
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-info">Analise</button> -->
                    <button type="submit" class="btn yellowbtn float-right">View</button>
                 
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
             <!--  <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div> -->
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
                  </div>


          <div class="tab-pane" id="block">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <span style="font-size: 20px;font-weight:bold">Franchise Details</span>
                          <table style="border-collapse: separate;
                          border-spacing: 0 1em;padding: 15px 15px;">
                          <tr>
                            <td style="font-weight: bold;">Reason  : </td>
                            <td style="padding: 0 15px;"> {{$franchise->reason}} </td>
                        </tr>
                         
                       
                        
                    </table>
                 
                      </div>
                      <!-- /.user-block -->
                      

                     

                    </div>
                    
                  </div>




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


  <script>

function Active()
    {
    
  
 swal({
  title: "Do you want to activate this franchise ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body='{{$franchise->id}}';




$.ajax({

              type:"POST",
              url:'/activate-franchise',
              data: {
        _token: @json(csrf_token()),
        body: body
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       swal({
                              title: "Franchise activated successfully.",
                              //text: "Username and Password send to your Email",
                              icon: "success",
                              buttons: "Ok",
                               closeOnClickOutside: false
  
                            })

                      .then((willDelete) => {
                       if (willDelete) {
                           window.location.href= window.location.href;
                                  } 

                            });

                     
                    }
                      
                
            }
       })

 } 
  
});

}


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

    var fid='{{$franchise->id}}';

    data = new FormData();
data.append('reason', reason);
   data.append('fid', fid);
 data.append('_token', @json(csrf_token()));

$('#ab1').hide();
$('#ab2').show();


  $.ajax({

    type:"POST",
    url:"/block-franchise",
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
                              title: "Franchise blocked successfully.",
                              //text: "Username and Password send to your Email",
                              icon: "success",
                              buttons: "Ok",
                               closeOnClickOutside: false
  
                            })

                      .then((willDelete) => {
                       if (willDelete) {
                             window.location.href=window.location.href;
                                  } 

                            });
                                 
      }
      
      

    }




  })


}

 

function Approve()
{
$('#renewbt2').hide();

var error_num=0;

var valfrom=$('input#valfrom').val();
    if(valfrom=='')
    {
        $('#valfrom').focus();
        $('#valfrom').css({'border':'1px solid red'});
        //return false;
        var error_num=error_num+1;
    }
    else
  
    $('#valfrom').css({'border':'1px solid #CCC'});

   var valto=$('input#valto').val();
    if(valto=='')
    {
        $('#valto').focus();
        $('#valto').css({'border':'1px solid red'});
        //return false;
        var error_num=error_num+1;
    }
    else
  
    $('#valto').css({'border':'1px solid #CCC'});



  $('#renewbt1').hide();
  $('#renewbt2').show();


  data = new FormData();
  data.append('valto', valto);
  data.append('valfrom', valfrom);
  data.append('fid', '{{$franchise->id}}');
  data.append('_token', "{{ csrf_token() }}");
  
$.ajax({

type:"POST",
url:"/renew-franchise",
data:data,
dataType:"json",
contentType: false,
//cache: false,
processData: false,

success:function(data)
{
  if(data['success'])
  {
      $('#renewbt2').hide();
  $('#renewbt1').show();
                swal({
                  title: "Franchise validity updated successfully.",
                  //text: "Username and Password send to your Email",
                 icon: "success",
                 buttons: "Ok",
                closeOnClickOutside: false
  
                })

                .then((willDelete) => {
                if (willDelete) {
                window.location.href= window.location.href;
                          } 

                    });
                            
  }

  if(data['err'])
  {
    
  }

}




})
}













  </script>


 @endsection
