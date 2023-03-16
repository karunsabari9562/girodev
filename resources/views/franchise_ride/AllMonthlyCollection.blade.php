@extends('layouts.Franchise')
@section('title')
 collection-history
  @endsection
 
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>Completed Rides</h1> -->
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
<h3 class="card-title" style="font-size: 20px;font-weight: bold;">Summary - {{date("Y-M", strtotime($first_day))}}</h3>

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
                <p class="lead">Summary - {{date("Y-M", strtotime($first_day))}}</p>

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
                        <td style="font-size: 17px;font-weight: bold;">Rs.{{$sr}}</td>
                      </tr>
                      <tr>
                        <th>Total Collection</th>
                        <td>{{$sum}}</td>
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
                        

                      <tr style="font-weight: bold;">
                        <th>Commission</th>
                        <td style="font-size: 17px;">Rs.{{$div_amount}}</td>
                      </tr>
                      <tr style="font-weight: bold;">
                        <th>View Rides</th>
                        <td style="font-size: 17px;"> <a href="/completed-colrides/{{$first_day}}" class="btn yellowbtn btn-sm" target="_blank"><b> View </b></a></td>
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