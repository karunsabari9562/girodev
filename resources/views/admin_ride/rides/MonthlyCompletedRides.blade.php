@extends('layouts.Admin')
@section('title')
completed-rides
  @endsection
  
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Completed Rides</h1>
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
            <h3 class="card-title" style="font-size: 20px;font-weight: bold;">Summary - {{date("Y-M", strtotime(date('Y-m-d')))}}</h3>

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
                
               <p class="lead"> Summary </p>
                 
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
              <div class="col-md-6">
                
               <p class="lead"> Rating </p>
                 
                <table class="table">
                      <tr>
                        <th style="width:50%">5 <i class="fa fa-star" aria-hidden="true" style="color: #ffc107;"></th>
                        <td>{{$star5}} </td>
                      </tr>
                      <tr>
                        <th>4 <i class="fa fa-star" aria-hidden="true" style="color: #ffc107;"></th>
                        <td>{{$star4}}</td>
                      </tr>
                      <tr>
                        <th>3 <i class="fa fa-star" aria-hidden="true" style="color: #ffc107;"></th>
                        <td>{{$star3}}</td>
                      </tr>
                      <tr>
                        <th>2 <i class="fa fa-star" aria-hidden="true" style="color: #ffc107;"></th>
                        <td>{{$star2}}</td>
                      </tr>
                      <tr>
                        <th>1 <i class="fa fa-star" aria-hidden="true" style="color: #ffc107;"></th>
                        <td>{{$star1}}</td>
                      </tr>
                    </table>
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
                <h1 class="card-title p-3" style="font-size: 20px;font-weight: bold;">Completed Rides  - {{date("Y-M", strtotime(date('Y-m-d')))}}</h1>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    
              
                   <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Id</th>
                    <th>Customer</th>
                    <th>Ride Details</th>
                    <th>Ride Date</th>
                    
                    <th>Driver</th>
                    <th>Rating</th>
                    <!--<th>Review</th>-->
                    <th>Details</th>
                    

                 
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($bookings as $b )
                    
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$b->booking_id}}</td>
                    <td>{{$b->GetCustomer->name}}<br>Mob: {{$b->GetCustomer->mobile}}</td>
                    <td title="From : {{ $b->from_location}} , To : {{ $b->to_location }}" style="cursor: pointer;">From : {{ Str::limit($b->from_location, 20, '...') }}<br>
                      To : {{ Str::limit($b->to_location, 20, '...') }}<br>
                      
                      @if($b->night_ride==0)
                      Ride Type : Normal
                      @else
                       Ride Type : Special
                      @endif<br>
                    </td>
                       <td>{{$b->booked_at->format('d-m-Y')}}</td>
                   <td><a href="/girokab-admin/active-driver-profile/{{encrypt($b->driver_id)}}" target="_blank">{{$b->GetDriver->driver_id}}</a></td>
                                       
                      <td>
                      
                        @for($i=1;$i<=$b->star_rating;$i++)
                        <i class="fa fa-star" aria-hidden="true" style="color: #ffc107;"></i>

                        @endfor
                       
                      </td>
                      <!--<td>{{$b->review}}</td>-->
                     
                      
                  
                       <td>
                    <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/girokab-admin/ride-details/{{encrypt($b->id)}}" class="btn btn-danger btn-sm" target="_blank"><b> View </b></a>
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