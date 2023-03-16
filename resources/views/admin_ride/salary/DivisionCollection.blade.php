 @extends('layouts.Admin')
@section('title')
 payment-details
  @endsection
  
@section('contents')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payment Details</h1>
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


@if($pay)

       <div class="card card-default">
          
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
             
            
              <div class="col-md-6">
                <p class="lead">Div : {{$pay->GetFranchise->franchise_name}}</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Rides From</th>
                        <td style="font-size: 17px;font-weight: bold;">{{$pay->ride_from->format('d-m-Y')}}</td>
                      </tr>

                      <tr style="font-weight: bold;">
                        <th>Rides To</th>
                        <td style="font-size: 17px;">{{$pay->ride_to->format('d-m-Y')}}</td>
                      </tr>
                       <tr>
                        <th style="width:50%">Total Service Charge</th>
                        <td>Rs.{{$pay->total_service_charge}}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Division Commission</th>
                        <td>Rs.{{$pay->total_commission}}</td>
                      </tr>
                     

                     
                    </table>
               
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

             <div class="col-md-6">
                <p class="lead">Payment Summary</p>

                  <div class="table-responsive">
                    <table class="table">
                      
                        <tr>
                        <th>Paid Amount</th>
                        <td>Rs.{{$pay->paid_amount}}</td>
                      </tr>
                    <tr>
                        <th>Paid At</th>
                        <td style="font-size: 17px;font-weight: bold;">{{$pay->payment_date->format('d-m-Y h:i a')}}</td>
                      </tr>
                      <tr>
                        <th>Reference Id</th>
                        <td>{{$pay->reference_id}}</td>
                      </tr>
                      <tr>
                        <th>Remarks</th>
                        <td>{{$pay->remarks}}</td>
                      </tr>

                      
                     <!--  <tr style="font-weight: bold;">
                        <th>View Rides</th>
                        <td style="font-size: 17px;"> <a style="cursor: pointer;background-color: #10ad77;border:none;" href="/girokab-admin/completed-all-mrides" class="btn btn-danger btn-sm" target="_blank"><b> View </b></a></td>
                      </tr> -->
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


@else

<div class="card card-default">
          <div class="card-header">
            <h3 class="card-title" style="font-size: 20px;font-weight: bold;">No data found !</h3>

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
          
          
        </div>
@endif











        <!-- /.card -->
        <!-- /.row -->
        <!-- END ALERTS AND CALLOUTS -->
      
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