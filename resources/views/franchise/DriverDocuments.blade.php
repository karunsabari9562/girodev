
 @extends('layouts.Franchise')
@section('title')
 drivers-documents
  @endsection
 
@section('contents')




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Driver Documents</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="/active-driver-profile/{{encrypt($driver->id)}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>

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
                    <th>Document Type</th>
                    <th>Document</th>
                    <th>Expiry Date</th>
                     
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($docs as $v )

                    @php
                    $dt = date("d-m-Y", strtotime($v->doc_expiry));
               
                    @endphp
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    @if($v->doc_type==1)
                    <td>Vehicle RC</td>
                    @elseif($v->doc_type==2)
                    <td>Driving License</td>
                    @elseif($v->doc_type==3)
                    <td>Vehicle Insurance</td>
                    @elseif($v->doc_type==4)
                    <td>Vehicle Pollution Certificate</td>
                    @elseif($v->doc_type==5)
                    <td>Vehicle Permit</td>
                     @elseif($v->doc_type==20)
                    <td>License FrontSide</td> 
                    @elseif($v->doc_type==21)
                    <td>License Backside</td> 
                    @endif
                    <td><a href="{{asset($v->doc_file)}}" target="_blank"><i class="fa fa-file" style="font-size: 25px;"></i></a></td>
                   
                  
                    <td>{{ $dt }}</td>
                   
                      
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

