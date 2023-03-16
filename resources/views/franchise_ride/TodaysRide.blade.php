@extends('layouts.Franchise')
@section('title')
  todays-bookings
  @endsection
 
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <!--  <h1>Todays Bookings</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <!--  <li class="breadcrumb-item"><a href="#">Home</a></li>
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
       
        <!-- /.row -->
        <!-- END ALERTS AND CALLOUTS -->


        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h1 class="card-title p-3" style="font-size: 20px;font-weight: bold;">{{$btype}}</h1>
                <ul class="nav nav-pills ml-auto p-2">
                  <li class="nav-item dropdown">
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
                  </li>
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">

                   <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Customer</th>
                    <th>Ride Details</th>                    
                    <th>Driver</th>
                    <th>Status</th>                  
                    <th>Reason</th>
                    

                 
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($bookings as $b )
                    
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$b->GetCustomer->name}}<br>{{$b->GetCustomer->mobile}}</td>
                    <td>From : {{ Str::limit($b->from_location, 20, '...') }}<br>
                      To : {{ Str::limit($b->to_location, 20, '...') }}</td>
                    
                   <td><a href="/active-driver-profile/{{encrypt($b->driver_id)}}" target="_blank">{{$b->GetDriver->driver_id}}</a></td>
                   @switch($b->status)
                     

                       @case(2)
                      <td><span class="badge badge-danger">Rejected</span></td>
                       
                       <td>{{$b->reason}}</td>
                      @break

                       @case(3)
                      <td><span class="badge badge-danger">Cancelled</span></td>
                       
                       <td>{{$b->reason}}</td>
                      @break

                       @case(4)
                      <td><span class="badge badge-danger">Timeout</span></td>
                      
                       <td></td>
                      @break

                      

                        @endswitch
                  
                    
                    
                     
                  
               
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