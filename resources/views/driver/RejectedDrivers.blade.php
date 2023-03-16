
@extends('layouts.Admin')
@section('title')
 rejected-drivers
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Franchise</th>
                    <th>Registered At</th>
                    <th>Rejected At</th>
                    <th>Reason</th>
                    <th>Profile</th> 
                    <th>Vehicle Details</th>
                    <th>Licence</th>                   
                    <th>RC</th> 
                    <th>Insurance</th> 
                    <th>Pollution</th> 
                    <th>Payment</th> 
                  <!--   <th>Actions</th> -->
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($driver as $v )

                    @php
                    $dt = date("d-m-Y", strtotime($v->applied_date));
                    $dt1 = date("d-m-Y", strtotime($v->account_rejected_date));
                    $doc=DB::table('driver_documents')->where('driver_id',$v->id)->first();
                    @endphp
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->mobile }}</td>
                    <td>{{ $v->GetFranchise->franchise_name }}</td>
                    <td>{{ $dt }}</td>
                     <td>{{ $dt1 }}</td>
                      <td>{{ $v->account_reject_reason }}</td>

                    @if($v->profile_upload_status==0)
                       <td>pending</td>
                    @else
                    <td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>
                    @endif

                    @if($v->vehicle_upload_status==0)
                       <td>pending</td>
                    @else
                    <td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>
                    @endif 

                    @if($doc!='')

                    @if($doc->license_upload_status==0)
                       <td>pending</td>
                    @else
                    <td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>
                    @endif
                    @else
                    <td>pending</td>
                    @endif   

                    @if($doc!='')
                     @if($doc->rc_upload_status==0)
                       <td>pending</td>
                    @else
                    <td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>
                    @endif
                    @else
                    <td>pending</td>
                    @endif 
                    @if($doc!='')
                     @if($doc->insurance_upload_status==0)
                       <td>pending</td>
                    @else
                    <td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>
                    @endif
                    @else
                    <td>pending</td>
                    @endif 
                    @if($doc!='')
                     @if($doc->pollution_upload_status==0)
                       <td>pending</td>
                    @else
                    <td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>
                    @endif
                    @else
                    <td>pending</td>
                    @endif    

                     @if($doc!='')
                     @if($doc->payment_status==0)
                       <td>pending</td>
                    @else
                    <td><i class="fa fa-check" aria-hidden="true" style="color: green;"></i></td>
                    @endif
                    @else
                    <td>pending</td>
                    @endif 
                
              <!--   <td> -->
                  <!-- 
                      @if($v->status==1)
                        <a style="cursor: pointer;background-color: #fd7e14;border:none;" onclick="Block('{{$v->id}}')" class="btn btn-danger btn-sm"><b> <i class="fa fa-ban" aria-hidden="true"></i></b></a>
                    @else
                   <a style="cursor: pointer;background-color: green;border:none;" onclick="Active('{{$v->id}}')" class="btn btn-danger btn-sm"><b> <i class="fa fa-check" aria-hidden="true"></i></b></a>
                    @endif  -->
                 
                 <!--  <a style="cursor: pointer;background-color: red;border:none;" onclick="Reject('{{$v->id}}')" class="btn btn-danger btn-sm"><b> <i class="fa fa-ban" aria-hidden="true"></i>     </b></a>
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
                    <th>Rejected At</th>
                    <th>Reason</th>
                    <th>Profile</th> 
                    <th>Vehicle Details</th>
                    <th>Licence</th>                   
                    <th>RC</th> 
                    <th>Insurance</th> 
                    <th>Pollution</th> 
                    <th>Payment</th> 
                   <!--  <th>Actions</th> -->
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

