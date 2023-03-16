 @extends('layouts.Admin')
@section('title')
 todays-rides
  @endsection
  
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Today's Rides</h1>
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
            <h3 class="card-title">Summary - {{date("d-m-Y", strtotime(date('Y-m-d')))}}</h3>

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
                        <th>Running</th>
                        <td>{{$cnt1}}</td>
                      </tr>
                      <tr>
                        <th>Rejected/Cancelled</th>
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
                <h1 class="card-title p-3" style="font-size: 20px;font-weight: bold;">Today's Rides</h1>
                <ul class="nav nav-pills ml-auto p-2">
                 <li class="nav-item dropdown">
                    <a class="nav-link  dropdown-toggle" data-toggle="dropdown" href="#">
                      Ride Details <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/todays-bookings/All'">All</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/todays-bookings/Completed'">Completed</a>
                      <a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/todays-bookings/Running'">Running</a>
                      <a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/todays-bookings/Unfinished'">Unfinished</a>
                    </div>
                  </li>
                  
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
                    <!-- <th>Fare Details</th> -->
                    
                    <th>Driver</th>
                    <th>Status</th>
                  <!--   <th>Started/Completed At</th> -->
                    
                    <th>Payment</th>
                    <th>Review/Reason</th>
                    <th>Details</th>
                    

                 
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($bookings as $b )
                    
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$b->GetCustomer->name}}<br>Mob: {{$b->GetCustomer->mobile}}</td>
                    <td>From : {{ Str::limit($b->from_location, 20, '...') }}<br>
                      To : {{ Str::limit($b->to_location, 20, '...') }}<br>
                      Distance : {{$b->distance}}km <br>
                      Booked At :{{$b->booked_at->format('h:i a')}}<br>
                      @if($b->night_ride==0)
                      Ride Type : Normal
                      @else
                       Ride Type : Special
                      @endif<br>
                       Total Fare : Rs.{{$b->total_fare}}

                    </td>
                      
                    
                  <td><a href="/girokab-admin/active-driver-profile/{{encrypt($b->driver_id)}}" target="_blank">Id: {{$b->GetDriver->driver_id}}</a><br>
                    <a href="/franchise-details/{{encrypt($b->franchise)}}" target="_blank">Div: {{$b->GetFranchise->franchise_id}}</a>
                   @switch($b->status)
                      @case(0)                       
                      <td><span class="badge badge-warning">Pending</span></td>
                     
                      <td></td>
                     
                      <td></td>
                       <td></td>
                          @break

                      @case(1)
                      <td><span class="badge badge-success">Accepted</span></td>
                       
                       <td><span class="badge badge-warning">Pending</span></td>
                       
                       <td></td>
                        <td></td>
                      @break

                       @case(2)
                      <td><span class="badge badge-danger">Rejected</span></td>
                       
                       
                       <td></td>
                       <td>{{$b->reason}}</td>
                        <td></td>
                      @break

                       @case(3)
                      <td><span class="badge badge-danger">Cancelled</span></td>
                       
                  
                       <td></td>
                       <td>{{$b->reason}}</td>
                        <td></td>
                      @break

                       @case(4)
                      <td><span class="badge badge-danger">Timeout</span></td>
                       
                      
                       <td></td>
                       <td></td>
                        <td></td>
                      @break

                       @case(5)
                      <td><span class="badge badge-success">Started</span><br>
                        Started At : @if($b->started_at!=''){{$b->started_at->format('H:i a')}}@endif</td>
                      
                       <td>@if($b->payment_status==1)Payment Status : @if($b->payment_status==1)Paid @else Pending @endif<br>
                          Payment Type : @if($b->payment_type==1)Online @else Offline @endif<br>
                          Paid Amount : Rs.{{$b->paid_amount}}<br>
                          Reference Id : {{$b->reference_id}}<br>@endif</td>
                      
                       <td></td>
                        <td></td>
                      @break

                       @case(6)
                      <td><span class="badge badge-info">completed</span><br>
                        Started At :  @if($b->started_at!=''){{$b->started_at->format('H:i a')}}@endif<br>Completed At :  @if($b->started_at!=''){{$b->completed_at->format('H:i a')}}@endif
                      </td>
                      
                       <td>Payment Status : @if($b->payment_status==1)Paid @else Pending @endif<br>
                          Payment Type : @if($b->payment_type==1)Online @else Offline @endif<br>
                          Paid Amount : Rs.{{$b->paid_amount}}<br>
                          Reference Id : {{$b->reference_id}}<br></td>
                       
                    
                       <td>{{$b->review}}<br>
                        @for($i=1;$i<=$b->star_rating;$i++)
                        <i class="fa fa-star" aria-hidden="true" style="color: #ffc107;"></i>

                        @endfor
                       </td>

                       <td>
                    <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/girokab-admin/rides-details/{{encrypt($b->id)}}" class="btn btn-danger btn-sm" target="_blank"><b> View </b></a>
                </td>
                       
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