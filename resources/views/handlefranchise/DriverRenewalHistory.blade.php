
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
            <h1>Driver Account Renewal History</h1>
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
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Payment Date</th>
                    <th>Amount</th>
                    <th>Reference Id</th>
                    <th>Valid From</th>
                    <th>Valid To</th>
                     
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($renewals as $r )

                    
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    
                    <td>{{ $r->payment_date->format('d-m-Y') }}</td>
                    <td>Rs.{{$r->amount}}</td>
                     <td>{{$r->reference_id}}</td>
                     <td>{{ $r->valid_from->format('d-m-Y') }}</td>
                     <td>{{ $r->valid_to->format('d-m-Y') }}</td>
                   
                  
                    
                   
                      
                  </tr>

                  @endforeach
               
    
                  </tbody>
                  <tfoot>
                  <tr>
                      <th>Sl.No</th>
                     <th>Payment Date</th>
                    <th>Amount</th>
                    <th>Reference Id</th>
                    <th>Valid From</th>
                    <th>Valid To</th>
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

