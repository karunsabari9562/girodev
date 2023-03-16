
@extends('layouts.Admin')
@section('title')
 new-drivers
  @endsection
 
@section('contents')




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>New Drivers List</h1>
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
                 <h2 class="card-title" style="font-size: 18px;font-weight: bold;">Profile primary validation pending.. </h2>
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Franchise</th>
                    <th>Registered At</th>
                    <th>Basic Details</th> 
                    <th>Vehicle Details</th>
                    <th>Licence</th>                   
                    <th>RC</th> 
                    <th>Insurance</th> 
                    <th>Pollution</th> 
                   <!--  <th>Payment</th>  -->
                    <!-- <th>Actions</th> -->
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($driver as $v )

                    @php
                    $dt = date("d-m-Y", strtotime($v->applied_date));
                    $doc=DB::table('driver_documents')->where('driver_id',$v->id)->first();
                    @endphp
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->mobile }}</td>
                    <td>{{ $v->GetFranchise->franchise_name }}</td>
                    <td>{{ $dt }}</td>

                    @if($v->profile_approval_status==0)
                       <td>pending</td>
                    @elseif($v->profile_approval_status==1)
                    <td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>
                    @else
                    <td style="color: red;">Rejected</td>
                    @endif

                     @if($v->vehicle_approval_status==0)
                       <td>pending</td>
                    @elseif($v->vehicle_approval_status==1)
                    <td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>
                    @else
                    <td style="color: red;">Rejected</td>
                    @endif

                     @if($v->license_approval_status==0)
                       <td>pending</td>
                    @elseif($v->license_approval_status==1)
                    <td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>
                    @else
                    <td style="color: red;">Rejected</td>
                    @endif

                     @if($v->rc_approval_status==0)
                       <td>pending</td>
                    @elseif($v->rc_approval_status==1)
                    <td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>
                    @else
                    <td style="color: red;">Rejected</td>
                    @endif

                     @if($v->insurance_approval_status==0)
                       <td>pending</td>
                    @elseif($v->insurance_approval_status==1)
                    <td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>
                    @else
                    <td style="color: red;">Rejected</td>
                    @endif

                     @if($v->pollution_approval_status==0)
                       <td>pending</td>
                    @elseif($v->pollution_approval_status==1)
                    <td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>
                    @else
                    <td style="color: red;">Rejected</td>
                    @endif

                    
                
               <!--  <td>
                 
                  <a style="cursor: pointer;background-color: red;border:none;" onclick="Reject('{{$v->id}}')" class="btn btn-danger btn-sm"><b> <i class="fa fa-ban" aria-hidden="true"></i>     </b></a>
                </td> -->
              
                
                     
                      
                  </tr>

                  @endforeach
               
    
                  </tbody>
                  <tfoot>
                  <tr>
                     <th>Sl.No</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Franchise</th>
                    <th>Registered At</th>
                    <th>Basic Details</th> 
                    <th>Vehicle Details</th>
                    <th>Licence</th>                   
                    <th>RC</th> 
                    <th>Insurance</th> 
                    <th>Pollution</th> 
                   <!--  <th>Payment</th>  -->
                    <!-- <th>Actions</th> -->
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

