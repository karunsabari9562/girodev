@extends('layouts.Franchise')
@section('title')
 unfinished-rides
  @endsection
 
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$type}} Rides</h1>
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
                <h1 class="card-title p-3" style="font-size: 20px;font-weight: bold;">{{$type}} Rides - {{date("d-m-Y", strtotime($dfrom))}} to {{date("d-m-Y", strtotime($dto))}}</h1>
            
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    
              <h3 style="font-size: 22px;">Driver Id : {{$driver}} </h3>
                   <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Customer</th>
                    <th>Ride Details</th>
                    <th>Ride Date</th>
           
                    <th>Reason</th>
                   
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($bookings as $b )
                    
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$b->GetCustomer->name}}<br>Mob: {{$b->GetCustomer->mobile}}</td>
                    <td title="From : {{ $b->from_location}} , To : {{ $b->to_location }}" style="cursor: pointer;">  From : {{ Str::limit($b->from_location, 20, '...') }}<br>To : {{ Str::limit($b->to_location, 20, '...') }}<br></td>
                       <td>{{$b->booked_at->format('d-m-Y')}}</td>
               
                      <td>{{$b->reason}}</td>
                     
                  </tr>

                  @endforeach
    
                  </tbody>
        
                </table>


                  </div>

                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
     
        </div>
      
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   @endsection