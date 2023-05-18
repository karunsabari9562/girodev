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
            <h3 class="card-title">Summary </h3>

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
                        <td>Rs. {{$feesum}}</td>
                      </tr>
                      <!-- <tr>
                        <th>Online Payment</th>
                        <td>Rs.</td>
                      </tr>
                      <tr>
                        <th>Offline Payment</th>
                        <td>Rs.</td>
                      </tr>
                      <tr>
                        <th>Special Charged Rides</th>
                        <td></td>
                      </tr> -->
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
                <h1 class="card-title p-3" style="font-size: 20px;font-weight: bold;">Registration Fee Collections</h1>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    
              
                   <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Driver</th>
                    <th>Mobile</th>
                    <th>Division</th>
                    <th>Payment Date</th>
                    <th>Amount (Rs.)</th>
                    <!-- <th>Ride Details</th>
                    <th>Ride Date</th>
                    
                    <th>Driver</th>
                    <th>Rating</th>
                   
                    <th>Details</th> -->
                    

                 
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($fee as $f )
                    
                  <tr>
                    <td>{{$loop->iteration}}</td>
                     <td>{{$f->GetDriver->name}}</td>
                     <td>{{$f->GetDriver->mobile}}</td>
                   
                    <td>{{$f->GetFranchise->franchise_name}}</td>
                    <td>{{$f->payment_date->format('d-m-Y')}}</td>
                    <td>{{$f->amount}}</td>
                   
                      
                  
               
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