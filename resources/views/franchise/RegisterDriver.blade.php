
 @extends('layouts.Franchise')
@section('title')
 registered-drivers
  @endsection
 
@section('contents')




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Drivers</h1>
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
               <button type="button" class="btn yellowbtn" style="float: right;" value="Submit" onclick="window.location.href='/add-driver'" id="renewbt1"><i class="nav-icon fa fa-plus"></i>   Add New</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Added At</th>
                    <th>Profile Submission</th>
                    <th>Division Approval</th>
                    <th>Admin Approval</th>
                    <th>Profile</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($driver as $v )
                    
                  <tr>
                    <td>{{$loop->iteration}}</td>
                   
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->mobile }}</td>
                  
                   <td>{{$v->created_at->format('d-m-Y')}}</td>
                  @if($v->profile_submission==0)
                  <td><span class="badge badge-warning">Pending</span></td>
                   @else
                  <td><span class="badge badge-info">Submitted</span></td>
                   @endif
                  
                   @if($v->admin_approval_status==0)
                       <td><span class="badge badge-warning">Pending</span></td>
                       <td><span class="badge badge-warning">Pending</span></td>
                        <td>
                  <a style="cursor: pointer;background-color: #f39c12;border:none;" href="/driver-profile-add/{{encrypt($v->id)}}" class="btn btn-danger btn-sm"><b> View     </b></a>
                </td>
                      @elseif($v->admin_approval_status==1) 
                      <td><span class="badge badge-success">Completed</span></td>
                      <td><span class="badge badge-info">Processing</span></td>
                          <td>
                  <a style="cursor: pointer;background-color: grey;border:none;" disabled class="btn btn-danger btn-sm" ><b> Profile     </b></a>
                </td>
                      @elseif($v->admin_approval_status==2)
                    <td><span class="badge badge-success">Approved</span></td>
                      <td><span class="badge badge-success">Approved</span></td>
                         <td>
                  <a style="cursor: pointer;background-color: #f39c12;border:none;" href="/driver-profile-add/{{encrypt($v->id)}}" class="btn btn-danger btn-sm"><b> View     </b></a>
                </td>
                     @elseif($v->admin_approval_status==3)
                    <td><span class="badge badge-danger">Rejected</span></td>
                      <td><span class="badge badge-danger">Rejected</span></td>
                         <td>
                  <a style="cursor: pointer;background-color: #f39c12;border:none;" href="/driver-profile-add/{{encrypt($v->id)}}" class="btn btn-danger btn-sm"><b> View     </b></a>
                </td>
                      @endif
                     
                        
             
                      

                   
                 
             
                
                     
                      
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

  

</script>


@endsection

