
 @extends('layouts.Franchise')
@section('title')
 offline-drivers
  @endsection
 
@section('contents')




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Offline Drivers</h1>
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
                    <th>Driver Id</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>offlined At</th>
                    <th>Profile</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($driver as $v )
                    @php
                    $dt=date('Y-m-d');
                    @endphp
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $v->GetDriver->driver_id }}</td>
                    <td>{{ $v->GetDriver->name }}</td>
                    <td>{{ $v->GetDriver->mobile }}</td>
                  
                   <td>{{$v->offlined_at->format('d-M-Y h:i A')}}</td>
                   
                   
                     
                           <td>
                  <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/active-driver-profile/{{encrypt($v->dr_id)}}" class="btn btn-danger btn-sm" target="_blank"><b> View     </b></a>
                </td>
             
                      

                   
                 
             
                
                     
                      
                  </tr>

                  @endforeach
               
    
                  </tbody>
                  <tfoot>
                  <tr>
                     <th>Sl.No</th>
                    <th>Driver Id</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>offlined At</th>
                    <th>Actions</th>
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

