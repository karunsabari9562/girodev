
 @extends('layouts.Franchise')
@section('title')
 drivers-profile-updates
  @endsection
 
@section('contents')




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Drivers Profile Updates</h1>
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
                 <h2 class="card-title" style="font-size: 25px;font-weight: bold;">Rejected</h2>
              
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
                    <th>Document Type</th>
                <!--     <th>Rejected At</th> -->
                    <th>Rejection Reason</th>
                    
                
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($driver as $v )

                    
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $v->GetDriver->driver_id }}</td>
                    <td>{{ $v->GetDriver->name }}</td>
                    <td>{{ $v->GetDriver->mobile }}</td>

                    @if($v->doc_type==1)
                    <td>Vehicle RC</td>
                    @elseif($v->doc_type==2)
                    <td>Driving License</td>
                    @elseif($v->doc_type==3)
                    <td>Vehicle Insurance</td>
                    @elseif($v->doc_type==4)
                    <td>Pollution Certificate</td> 
                     @elseif($v->doc_type==20)
                    <td>License FrontSide</td> 
                    @elseif($v->doc_type==21)
                    <td>License Backside</td>
                   @endif

                    <td>{{ $v->doc_rejection_reason }}</td>
                      
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

