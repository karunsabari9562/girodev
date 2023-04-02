 @extends('layouts.Admin')
@section('title')
 today's-collection
  @endsection
  
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Today's Collection</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <!-- COLOR PALETTE -->
       <div class="card card-default">
          <div class="card-header">
      <h3 class="card-title">Collection Summary</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
             
            
              <div class="col-md-6">
                <p class="lead">Summary - {{date("d-m-Y", strtotime(date('Y-m-d')))}}</p>

                  <div class="table-responsive">
                    <table class="table">
                       <tr>
                        <th style="width:50%">Total Completed Rides</th>
                        <td>{{$cnt}}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Total Ride Fare</th>
                        <td>Rs.{{$ride_fare}}</td>
                      </tr>
                      <tr>
                        <th>Total Tax Amount</th>
                        <td>Rs.{{$tax}}</td>
                      </tr>
                      <tr>
                        <th>Total Service Charge</th>
                        <td>Rs.{{$sr}}</td>
                      </tr>
                      <tr>
                        <th>Total Collection</th>
                        <td>Rs.{{$sum}}</td>
                      </tr>
                    </table>
               
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

             <div class="col-md-6">
                <p class="lead">Summary</p>

                  <div class="table-responsive">
                    <table class="table">
                      
                      <tr>
                        <th>Online Payment</th>
                        <td>Rs.{{$sum1}}</td>
                      </tr>
                      <tr>
                        <th>Offline Payment</th>
                        <td>Rs.{{$sum2}}</td>
                      </tr>
                      <tr>
                        <th>Special Charged Rides</th>
                        <td>{{$sp}}</td>
                      </tr>
                    </table>
               
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            
             
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
         
        </div>
        <!-- /.card -->
        <!-- /.row -->
        <!-- END ALERTS AND CALLOUTS -->
      
      


        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h1 class="card-title p-3" style="font-size: 20px;font-weight: bold;">Today's Collection</h1>
                <ul class="nav nav-pills ml-auto p-2">
               
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    
              
                   <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <!-- <th>Customer</th>
                    <th>Ride Details</th> -->
                    <!-- <th>Fare Details</th> -->
                    
                    <th>Driver</th>
                    <th>Division</th>
                    <th>No.of Rides</th>
                  <!--   <th>Started/Completed At</th> -->
                    
                  <!--   <th>Payment</th>
                    <th>Review/Reason</th> -->
                    <th>Details</th>
                    

                 
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($driver as $b )

                    @php
                    $dt=date('Y-m-d');
                    $cnt=DB::table('rides_bookings')->where('driver_id',$b->driver_id)->where('status',6)->where('booked_date',$dt)->count();
                    @endphp
                    
                  <tr>
                    <td>{{$loop->iteration}}</td>

                   <td><a href="/girokab-admin/active-driver-profile/{{encrypt($b->driver_id)}}" target="_blank">{{$b->GetDriver->driver_id}}</a></td>
                   <td><a href="/franchise-details/{{encrypt($b->franchise)}}" target="_blank">{{$b->GetFranchise->franchise_name}} ({{$b->GetFranchise->franchise_id}})</a></td>
                   <td>{{$cnt}}</td>
                  <td>
                    <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/girokab-admin/driver-rides/{{encrypt($b->driver_id)}}" class="btn btn-danger btn-sm" target="_blank"><b> View </b></a>
                </td>
                       
                      

                  
                    
                     
                     
                  
               
                  </tr>

                  @endforeach
    
                  </tbody>
        
                </table>


                  </div>
                 
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->

        
        <!-- /.row -->
        <!-- END TYPOGRAPHY -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   @endsection