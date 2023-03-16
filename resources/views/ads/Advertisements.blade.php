
@extends('layouts.Admin')
@section('title')
 advertisements
  @endsection
 
@section('contents')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Advertisements</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href=""><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li> -->

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                 <h2 class="card-title"></h2>

              <button type="button" class="btn yellowbtn" value="Submit" onclick="window.location.href='/add-advertisement'" id="renewbt1" style="float: right;"><i class="nav-icon fa fa-plus"></i>   Add New</button>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Title</th>
                    <th>Valid From</th>
                    <th>Valid To</th>
                    <th>Driver</th> 
                    <th>Customer</th>
                    <th>Franchice</th>   
                    <th>File</th>                
                    <th>Actions</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($ads as $v )

                    @php
                    $dt = date("d-m-Y", strtotime($v->valid_from));
                    $dt1 = date("d-m-Y", strtotime($v->valid_to));
                    $todt=date("Y-m-d");
                    @endphp
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $v->title }}</td>
                    
                    
                     

                    <td>{{ $dt }}</td>

                    @if($v->valid_to>=$todt)
                       <td>{{ $dt1 }}</td>
                    @else
                    <td style="color: red;">{{ $dt1 }} (Expired)</td>
                    @endif
                  

                    @if($v->visibleto_driver==1)
                       <td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>
                    @else
                    <td><i class="fa fa-times" aria-hidden="true" style="color: red;"></i></td>
                    @endif

                    @if($v->visibleto_passenger==1)
                       <td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>
                    @else
                    <td><i class="fa fa-times" aria-hidden="true" style="color: red;"></i></td>
                    @endif
                    @if($v->visibleto_franchise==1)
                       <td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>
                    @else
                    <td><i class="fa fa-times" aria-hidden="true" style="color: red;"></i></td>
                    @endif

                    <td> 
                     <a  href="{{asset($v->photo)}}" target="_blank" class="btn btn-success btn-sm"><b><i class="fa fa-image"></i> </b></a>

                  </td>
              
                
                <td>
                  <a style="cursor: pointer;background-color: blue;border:none;" href="/edit-advertisement/{{encrypt($v->id)}}" class="btn btn-danger btn-sm"><b> <i class="fa fa-edit" aria-hidden="true"></i></b></a>
                      @if($v->status==1)
                        <a style="cursor: pointer;background-color: #fd7e14;border:none;" onclick="Block('{{$v->id}}')" class="btn btn-danger btn-sm"><b> <i class="fa fa-ban" aria-hidden="true"></i></b></a>
                    @else
                   <a style="cursor: pointer;background-color: green;border:none;" onclick="Active('{{$v->id}}')" class="btn btn-danger btn-sm"><b> <i class="fa fa-check" aria-hidden="true"></i></b></a>
                    @endif 
                 </td>
                 <td>
                  <a style="cursor: pointer;background-color: red;border:none;" onclick="Delete('{{$v->id}}')" class="btn btn-danger btn-sm"><b> <i class="fa fa-trash" aria-hidden="true"></i>     </b></a>
                </td>
              
                
                     
                      
                  </tr>

                  @endforeach
               
    
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sl.No</th>
                    <th>Title</th>
                   
                    <th>Valid From</th>
                    <th>Valid To</th>
                    <th>Driver</th> 
                    <th>Customer</th>
                    <th>Franchice</th> 
                      <th>File</th>                  
                    <th>Actions</th>
                    <th>Delete</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  




<!-- Page specific script -->

<script>

  function Delete(val)
    {
    
  
 swal({
  title: "Do you want to delete this advertisement ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
    confirmButtonColor: "#DD6B55",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/delete-ads',
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
                              title: "Advertisement deleted successfully.",
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


  function Block(val)
    {
    
  
 swal({
  title: "Do you want to block this advertisement ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/block-ads',
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
                              title: "Advertisement blocked successfully.",
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
  title: "Do you want to activate this advertisement ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/activate-ads',
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
                              title: "Advertisement activated successfully.",
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

