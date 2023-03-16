
 @extends('layouts.Franchise')
@section('title')
 rejected-drivers
  @endsection
 
@section('contents')



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rejected Drivers</h1>
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
                 <h2 class="card-title" style="font-size: 25px;font-weight: bold;"></h2>
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Mobile</th>
                   
                    <th>Registered At</th>
                    <th>Rejected At</th>
                    <th>Reason</th>
                   <!--  <th>Profile</th> 
                    <th>Vehicle Details</th> -->
                    <!-- <th>Licence</th>                   
                    <th>RC</th> 
                    <th>Insurance</th> 
                    <th>Pollution</th> 
                    <th>Payment</th>  -->
                  <!--   <th>Actions</th> -->
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($driver as $v )

                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->mobile }}</td>
                  
                    <td>{{ $v->created_at->format('d-m-Y') }}</td>
                     <td>{{ $v->account_rejected_date->format('d-m-Y') }}</td>
                      <td>{{ $v->account_reject_reason }}</td>
 
                  </tr>

                  @endforeach
               
    
                  </tbody>
                  
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
    url:"/reject-driver",
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
                             window.location.href=window.location.href;
                                  } 

                            });
                                 
      }
      
      

    }




  })


}

 

</script>


@endsection

