
@extends('layouts.Admin')
@section('title')
 driver-id-card
  @endsection
  
@section('contents')

<!-- *************************************** -->
<div class="modal" id="addreg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;overflow: auto;">
      <div class="modal-header" style="background:#fab60b;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;"><i>   Regenrate Driver Id Card</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('addreg').style.display='none'"></i>


       
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
            <h1>Driver Id Card Gererations</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="/girokab-admin/active-driver-profile/{{encrypt($driver->id)}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>

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
                 <h2 class="card-title" style="font-size: 20px;font-weight: bold;">Driver : {{$driver->name}} ( {{$driver->driver_id}} )</h2>

                 @if($dr_cnt==0)
                 <a href="/girokab-admin/driver-idcard-generation/{{encrypt($driver->id)}}" target="_blank" class="btn yellowbtn" value="Submit"  id="renewbt1" style="float: right;"><i class="fa fa-file-pdf" aria-hidden="true"></i>   Generate Id Card</a>
                 @else
                 <a onclick="Generate()" class="btn yellowbtn" value="Submit"  id="renewbt1" style="float: right;"><i class="fa fa-file-pdf" aria-hidden="true"></i>   Regenerate Id Card</a>
                 @endif
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Regenerated At</th>
                    <th>Reason</th>
                    <!-- <th>Deactivated At</th> -->
                     
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($idcardreg as $dj )

                    
                  <tr>
                    <td>{{$loop->iteration}}</td>
                   
                   <td>{{ $dj->regenerated_at}}</td>
                     <td>{{$dj->reason}}</td>
                     
                  </tr>

                  @endforeach
               
    
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>Sl.No</th>
                  <th>Regenerated At</th>
                    <th>Reason</th>
                   
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

function Generate()
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

    // var driverid='{{$driver->id}}';

//     data = new FormData();
// data.append('reason', reason);
//    data.append('did', driverid);
//  data.append('_token', @json(csrf_token()));

// 
var modal1 = document.getElementById("addreg");
modal1.style.display = "none";

window.open('/girokab-admin/driver-idcard-regenerate/' + '{{encrypt($driver->id)}}' + '/' + reason);

 
window.location.href=window.location.href;

}
  

</script>


@endsection

