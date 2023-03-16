
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
            <h1>{{$fr_det->franchise_name}} - {{$fr_det->franchise_id}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="/driver-area"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li> -->

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
                 <h2 class="card-title" style="font-size: 16px;font-weight: bold;">Driving License Expiring..</h2>
              
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
                    <!-- <th>Franchise</th> -->
                    <!-- <th>Registered At</th> -->
                    <!-- <th>Profile Review</th>
                    <th>Admin approval</th> -->
                    <!-- <th>Profile</th> 
                    <th>Vehicle Details</th> -->
                    <th>License Expiry</th> 
                    
                   <!--  <th>Payment</th>  -->
                    <th>Profile</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($driver as $v )
                        @if($v->GetDriver->status==1)
                    @php
                    $dt = date("d-m-Y", strtotime($v->license_expiry));
                  
                    
                    @endphp
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $v->GetDriver->driver_id }}</td>
                    <td>{{ $v->GetDriver->name }}</td>
                    <td>{{ $v->GetDriver->mobile }}</td>
                  
                    <td>{{ $dt }}</td>
                    
                   
                     
                           <td>
                 <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/girokab-admin/active-driver-profile/{{encrypt($v->id)}}" class="btn btn-danger btn-sm" target="_blank"><b> View </b></a>
                </td>
             
                      

                   
                 
             
                
                     
                      
                  </tr>
                  @endif
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

