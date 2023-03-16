@extends('layouts.Franchise')
@section('title')
 ride-history
  @endsection
 
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ride History</h1>
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
       <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Summary - {{date("d-m-Y", strtotime($dfrom))}} to {{date("d-m-Y", strtotime($dto))}}</h3>

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
                
               <p class="lead">Ride Summary </p>
                 <table class="table">
                      <tr>
                        <th style="width:50%">Completed</th>
                        <td>{{$cnt}}</td>
                      </tr>
                      <tr>
                        <th>Rejected</th>
                        <td>{{$cnt1}}</td>
                      </tr>
                      <tr>
                        <th>Cancelled</th>
                        <td>{{$cnt2}}</td>
                      </tr>
                      <tr>
                        <th>Timeout</th>
                        <td>{{$cnt3}}</td>
                      </tr>
                     
                    </table>
               
              </div>
         
              <div class="col-md-6">
                <p class="lead">Payment Summary</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Total Collection</th>
                        <td>Rs.{{$sum}}</td>
                      </tr>
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
                <h1 class="card-title p-3" style="font-size: 20px;font-weight: bold;">All Bookings</h1>
                <ul class="nav nav-pills ml-auto p-2">
               <!--   <li class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" data-toggle="dropdown" href="#">
                      Ride Details <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/todays-bookings/All'">All</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/todays-bookings/Completed'">Completed</a>
                      <a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/todays-bookings/Running'">Running</a>
                      <a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/todays-bookings/Unfinished'">Unfinished</a>
                    </div>
                  </li> -->
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    
              
                   <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Customer</th>
                    <th>Ride Details</th>
                    <th>Ride Date</th>
                    
                    <th>Driver</th>
                    <th>Status</th>
                    
                    <th>Details</th>
                    

                 
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($bookings as $b )
                    
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$b->GetCustomer->name}}<br>{{$b->GetCustomer->mobile}}</td>
                    <td>From : {{$b->from_location}}<br>To : {{$b->to_location}}</td>
                       <td>{{$b->booked_at->format('d-m-Y')}}</td>
                   <td><a href="/active-driver-profile/{{encrypt($b->driver_id)}}" target="_blank">{{$b->GetDriver->driver_id}}</a></td>
                   @switch($b->status)
                      @case(0)                       
                      <td><span class="badge badge-warning">Pending</span></td>
                     
                      
                          @break

                      @case(1)
                      <td><span class="badge badge-success">Accepted</span></td>
                       
                      @break

                       @case(2)
                      <td><span class="badge badge-danger">Rejected</span></td>
                       
                      @break

                       @case(3)
                      <td><span class="badge badge-danger">Cancelled</span></td>
                       <td></td>
                       
                      @break

                       @case(4)
                      <td><span class="badge badge-danger">Timeout</span></td>
                      
                      @break

                       @case(5)
                      <td><span class="badge badge-success">Started</span></td>
                       
                      @break

                       @case(6)
                      <td><span class="badge badge-info">completed</span></td>
                      
                       
                      @break

                        @endswitch
                  
                       <td>
                    <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/ride-details/{{encrypt($b->id)}}" class="btn btn-danger btn-sm" target="_blank"><b> View </b></a>
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