
@extends('layouts.Admin')
@section('title')
 vehicle-category
  @endsection
 
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vehicle Categories</h1><br>
                <h1><button type="button" class="btn yellowbtn" value="Submit" onclick="window.location.href='/add-vehicle-category'" id="renewbt1"><i class="nav-icon fa fa-plus"></i>   Add New</button></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <!--  <li class="breadcrumb-item"><a href="/vehicle-types"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li> -->

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid" style="background-color: #f8f9fa;">
        <div class="card-body pb-0">
          <div class="row">


@foreach ($vtypes as $v )
            
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <br>
                      <h2 class="lead"><b>{{$v->category}}</b></h2>

                       @if($v->category_type==1)
                      <p class="text-sm" style=""><b>Category Type: Ride</b> </p>
                      @else
                      <p class="text-sm" style=""><b>Category Type: Service</b> </p>
                       @endif
                       @if($v->status==1)
                      <p class="text-sm" style="color: green;"><b>Status: Active</b> </p>
                      @else
                      <p class="text-sm" style="color: red;"><b>Status: Blocked</b> </p>
                       @endif

                       
                        <p class="text-sm" style="color: blue;cursor: pointer;" onclick="window.location.href='/edit-vehicle-category/{{encrypt($v->id)}}'"><u>edit</u> </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                  
                      </ul>
                    </div>
                    <div class="col-5">
                      <img src="{{asset($v->icon)}}" alt="user-avatar" style="width: 85px;height: 45px;">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    @if($v->status==1)
                    <a onclick="Block('{{$v->id}}')" class="btn btn-sm redbtn" style="float: left;">
                         Block
                    </a>
                       @else
                       <a onclick="Active('{{$v->id}}')" class="btn btn-sm greenbtn" style="float: left;">
                         Activate
                    </a>
                       @endif
                      
                    <a href="/vehicle-types/{{encrypt($v->id)}}" class="btn btn-sm yellowbtn">
                      Types
                    </a>
                  </div>
                </div>
              </div>
            </div>

   @endforeach 
      


           
            
            



          </div>
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    
  </div>
  <!-- /.content-wrapper -->
  




<!-- Page specific script -->

<script>
  
function Block(val)
    {
    
  
 swal({
  title: "Do you want to block this vehicle category ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/block-category',
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
                              title: "Vehicle category blocked successfully.",
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
  
});

}


function Active(val)
    {
    
  
 swal({
  title: "Do you want to activate this vehicle category ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/activate-category',
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
                              title: "Vehicle category activated successfully.",
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
  
});

}

</script>


@endsection

