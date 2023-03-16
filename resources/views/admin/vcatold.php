
@extends('layouts.Admin')
@section('title')
 vehicle-category
  @endsection
 
@section('contents')

<style type="text/css">
.card-custom {
  overflow: hidden;
  min-height: 50px;
  box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
  border-radius: 10px;
}

.card-custom-img {
  height: 200px;
  min-height: 200px;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  border-color: inherit;
}

/* First border-left-width setting is a fallback */
.card-custom-img::after {
  position: absolute;
  content: '';
  top: 161px;
  left: 0;
  width: 0;
  height: 0;
  border-style: solid;
  border-top-width: 0;
  border-right-width: 0;
  border-bottom-width: 0;
  border-left-width: 545px;
  border-left-width: calc(575px - 5vw);
  border-top-color: transparent;
  border-right-color: transparent;
  border-bottom-color: transparent;
  border-left-color: inherit;
}

.card-custom-avatar img {
  border-radius: 50%;
  box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
  position: absolute;
  top: 100px;
  left: 1.25rem;
  width: 100px;
  height: 100px;
}

</style>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Vehicle Categories</h1><br>
                <h1><button type="button" class="btn btn-primary" value="Submit" onclick="window.location.href='/add-vehicle-category'" id="renewbt1"><i class="nav-icon fa fa-plus"></i>   Add New</button></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <!--  <li class="breadcrumb-item"><a href="/vehicle-types"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li> -->

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <section class="wrapper">
   
  <div class="container">
    <div class="row pt-5 m-auto">

        @foreach ($vtypes as $v )
      <div class="col-md-6 col-lg-4 pb-3">

        <!-- Copy the content below until next comment -->
        <div class="card card-custom bg-white border-white border-0">
          <div class="card-custom-img" style="background-image: url({{asset($v->icon)}});"></div>
          <div class="card-custom-avatar">
            <img class="img-fluid" src="{{ asset('admin/img/logo/logo1.png')}}" alt="Avatar" style="width: 20%;height: 20%;" />
          </div>
          @if($v->status==1)
          <div class="card-body" style="overflow-y: auto;background-color: #ececec;">           
           <h2 class="card-title" style="font-size: 20px;font-weight: bold;text-align: center;"> <i class="fa fa-edit" onclick="window.location.href='/edit-vehicle-category/{{encrypt($v->id)}}'" style="cursor: pointer;"></i>   {{$v->category}} </h2>  <span style="color: green;">(active)</span>
          </div>
          @else
          <div class="card-body" style="overflow-y: auto;background-color: #ececec;">           
           <h2 class="card-title" style="font-size: 20px;font-weight: bold;text-align: center;"> <i class="fa fa-edit" onclick="window.location.href='/edit-vehicle-category/{{encrypt($v->id)}}'" style="cursor: pointer;"></i>   {{$v->category}} </h2>  <span style="color: red;">(Blocked)</span>
          </div>
          @endif

          <div class="card-footer" style="background: inherit; border-color: inherit;background-color: #ececec;">
            <a href="/vehicle-types/{{encrypt($v->id)}}" class="btn btn-outline-primary">Types</a>
              @if($v->status==1)
            <a onclick="Block('{{$v->id}}')" class="btn btn-outline-primary" style="float: right;cursor: pointer;">Block</a>
            @else
            <a onclick="Active('{{$v->id}}')" class="btn btn-outline-primary" style="float: right;cursor: pointer;">Activate</a>
              @endif
          </div>
        </div>
        <!-- Copy until here -->

      </div>
      @endforeach 
      
    </div>
  </div>



             
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

