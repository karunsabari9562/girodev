
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
                 <h2 class="card-title" style="font-size: 20px;font-weight: bold;">Active Drivers</h2>
              
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
                    <th>Member From</th>
                      <th>Expiry Date</th>
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
                    <td>{{ $v->driver_id }}</td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->mobile }}</td>
                  
                   <td>{{$v->approved_date->format('d-m-Y')}}</td>
                   @if($v->valid_to<$dt)
                   <td style="color: red;font-weight: bold;"><span>{{$v->valid_to->format('d-m-Y')}} (expired)</td>
                   @else
                   <td>{{$v->valid_to->format('d-m-Y')}}</td>
                   @endif
                   
                     
                           <td>
                  <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/girokab-admin/active-driver-profile/{{encrypt($v->id)}}" class="btn btn-danger btn-sm" target="_blank"><b> View </b></a>
                </td>
             
                      

                   
                 
             
                
                     
                      
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

