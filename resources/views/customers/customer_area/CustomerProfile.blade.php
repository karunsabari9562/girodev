@extends('layouts.Admin')
@section('title')
 customer-area
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
    <div class="modal-content" style="border:none;overflow: auto;">
      <div class="modal-header" style="background:#fab60b;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;"><i>   Block Customer</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('addreg').style.display='none'"></i>


       
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
        
        <button type="button" class="btn yellowbtn" id="ab1" onclick="Save()">Submit</button>
         <button type="button"  class="btn yellowbtn" id="ab2" disabled="" > <i class="fa fa-spinner fa-spin"></i>  Submit</button>
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
            <li class="breadcrumb-item"><a href="javascript:window.open('','_self').close();"><i class="fa fa-times" aria-hidden="true"></i>  close</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" id="sect1">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-warning card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  @if($customer_det->photo=='')
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset('customers/default.jpg')}}"
                       alt="User profile picture" style="width: 120px;height: 130px;">
                  @else
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset($customer_det->photo)}}"
                       alt="User profile picture" style="width: 120px;height: 130px;">
                  @endif
                  
                </div>

                <h3 class="profile-username text-center">{{$customer_det->name}}</h3>

                


                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    
                    <b>Mobile</b> <a class="float-right" style="color: black;">{{$customer_det->mobile}}</a>
                     
                  </li>
                
                    @if($customer_det->status==1)
                      <li class="list-group-item">
                    <b>Status</b> <a class="float-right" style="color: green;">Active</a>
                  </li>
                 
                    @else
                    <li class="list-group-item">
                    <b>Status</b> <a class="float-right" style="color: red;">Blocked</a><br>
                    </li>
                    <li class="list-group-item">
                    <b>Reason for Block</b> <a class="float-right" style="color: black;">{{$customer_det->block_reason}}</a>
                  </li>
                  
                     @endif
                   
               
                  <li class="list-group-item">
                    <b>Registered On</b> <span class="badge float-right" style="font-size: 15px;">{{ $customer_det->created_at->format('d-m-Y h:i a') }}</span>
                  </li>

                  <li class="list-group-item">
                    @if($customer_det->disability_status==1)
                    <b>Customer Type</b> <a class="float-right" style="color: black;">Disabled</a>
                    @else
                    <b>Customer Type</b> <a class="float-right" style="color: black;">General</a>
                     @endif
                   
                  </li>
                
                  
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->


            <div class="card card-primary">
              <div class="card-header" style="background-color: #fab60b;color: white;">
                <h3 class="card-title">Disability Document</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
                <ul class="list-group list-group-unbordered mb-3">
                  
                  @if($customer_det->disability_status==1)
               
                  <li class="list-group-item" >
                     <a href="{{asset($customer_det->disability_document)}}" target="_blank" style="color: black;"> <b>Document</b>
                      
                   </a>
                  </li>
                  @else
                    <li class="list-group-item" >
                     <a style="color: black;"> <b>No file found !</b>
                      
                   </a>
                  </li>
                  @endif

               @if($customer_det->status==1)
              <li class="list-group-item">
               <a class="btn btn-danger btn-block" onclick="DeactivateReq()"><b>Block Account</b></a> 
              </li>
              @else
              <li class="list-group-item">
              <a class="btn btn-success btn-block" onclick="ReactivateReq()"><b>Activate Account</b></a>
              </li>
              @endif
                </ul>

              </div>
              <!-- /.card-body -->
            </div>






            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            

<section class="content">
      <div class="container-fluid">

<div class="card">
        <div class="card-header">
          <h3 class="card-title">Rides History</h3>

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
        
          <div class="row">

            <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
              
              <div class="card card-info">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="/girokab-admin/customer-rides-history" method="post" target="_blank">
                 @csrf
                <div class="card-body">
  


                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-6 col-form-label">From *</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="dfrom" name="dfrom" placeholder="Email">
                      @error('dfrom') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-6 col-form-label">To *</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="dto" name="dto" placeholder="Password">
                         @error('dto') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div>
                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-6 col-form-label">Type *</label>
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

                    <div class="form-group row">
                   
                      <input type="hidden" class="form-control" id="drid" name="drid" value="{{$customer_det->id}}">
                      
                         
                    
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-info">Analise</button> -->
                    <button type="submit" class="btn yellowbtn float-right">View</button>
                 
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
         
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
        </div>
        
    </section>




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


    

     function ReactivateReq()
    {

       swal({
  title: "Do you want to activate this customer account ?",
  //text: "Ensure that the customer is fit for service.",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
    if (willDelete) {

$('#sect1').css({ 'opacity' : 0.1 });

      data = new FormData();
     
  data.append('custid','{{$customer_det->id}}');
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/girokab-admin/activate-customer",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
           $('#sect1').css({ 'opacity' : 1 });
               $('#bt6').hide();
      $('#bt5').show();
               swal({
                       title: "Customer account activated successfully",
                       closeOnClickOutside: false,
                       icon: "success",
                      buttons: "Ok",
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
  
});
    
    
    } 



function DeactivateReq()
{
 
  
var modal1 = document.getElementById("addreg");

modal1.style.display = "block";

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

    var custid='{{$customer_det->id}}';

    data = new FormData();
data.append('reason', reason);
   data.append('custid', custid);
 data.append('_token', @json(csrf_token()));

$('#ab1').hide();
$('#ab2').show();

$('#sect1').css({ 'opacity' : 0.1 });
  $.ajax({

    type:"POST",
    url:"/girokab-admin/block-customer",
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
         
$('#sect1').css({ 'opacity' : 1 });
          swal({
                              title: "Customer account blocked successfully.",
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





 
  


    
  </script>
  @endsection