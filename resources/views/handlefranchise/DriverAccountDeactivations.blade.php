
@extends('layouts.Admin')
@section('title')
 driver-area
  @endsection
  
@section('contents')




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Driver Account Deactivations</h1>
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

                 <a href="/girokab-admin/driver-account-reactivations/{{encrypt($driver->id)}}" class="btn btn-primary" value="Submit"  id="renewbt1" style="float: right;">  Re-activation Requests</a>
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Deactivated By</th>
                    <th>Reason</th>
                    <th>Deactivated At</th>
                     
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($driver_deact as $dj )

                    
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    @if($dj->deactivated_by==1)
                    <td>Franchise</td>
                    @elseif($dj->deactivated_by==2)
                    <td>Self</td>
                    @elseif($dj->deactivated_by==3)
                    <td>Admin</td>
                    @endif
                     <td>{{$dj->reason}}</td>
                    <td>{{ $dj->created_at->format('d-m-Y') }}</td>
                   
                   
                  
                    
                   
                      
                  </tr>

                  @endforeach
               
    
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>Sl.No</th>
                    <th>Rejected By</th>
                    <th>Rejected At</th>
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

  

</script>


@endsection

