@extends('layouts.Admin')
@section('title')
 payment-details
  @endsection
 
@section('contents')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Todays Bookings</li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- COLOR PALETTE -->
       
      
        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h1 class="card-title p-3" style="font-size: 20px;font-weight: bold;">Payment Details</h1>
              
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    
              
                   <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    
                    <th>Driver</th>
                    <th>Division</th>
                    <th>Ride Date</th>        
                    <th>Ride Fare</th>
                    <th>Paid Amount</th>
                    <th>Paid At</th>
                    <th>Reference Id</th>
                    <th>Remarks</th>
                     <th>Rides</th>
                    
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($pay as $b )
                    
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="/girokab-admin/active-driver-profile/{{encrypt($b->driver_id)}}" target="_blank">{{$b->GetDriver->driver_id}}</a></td>
                    <td><a href="/franchise-details/{{encrypt($b->franchise)}}" target="_blank">{{$b->GetFranchise->franchise_name}}</a></td>
                    <td>{{$b->ride_from->format('d-m-Y')}}</td>
                    <td>Rs.{{$b->total_ride_fare}}</td>
                    <td>Rs.{{$b->paid_amount}}</td>
                    <td>{{$b->payment_date->format('d-m-Y h:i a')}}</td>
                    <td>{{$b->reference_id}}</td>
                    <td>{{$b->remarks}}</td>
                    
                    <td><a style="cursor: pointer;background-color: #fab60b;border:none;" href="/girokab-admin/driver-paid-rides/{{encrypt($b->id)}}" class="btn btn-danger btn-sm" target="_blank"><b> View </b></a>
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
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   @endsection