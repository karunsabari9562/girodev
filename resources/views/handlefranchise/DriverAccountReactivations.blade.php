
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
            <h1>Driver Account Re-activation Requests</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="/girokab-admin/driver-account-deactivations/{{encrypt($driver->id)}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>

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

              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Requested By</th>
                    <th>Status</th>
                    
                     
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($driver_react as $dj )

                    
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    
                    <td>{{ $dj->requested_date->format('d-m-Y') }}</td>
                   @if($dj->status==0)
                    <td>pending</td>
                    @elseif($dj->status==1)
                    <td>Approved</td>
                    @elseif($dj->status==2)
                    <td>Rejected</td>
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

