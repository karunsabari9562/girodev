@extends('layouts.Franchise')
@section('title')
rides-list
  @endsection
 
@section('contents')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rides List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="javascript:window.open('','_self').close();"><i class="fa fa-times" aria-hidden="true"></i>  close</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-warning"></i> Note:</h5>
               Please ensure that all offline payment rides are approved.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
            
                    <small class="float-right">{{date("d-m-Y", strtotime(date($dfrom)))}} - {{date("d-m-Y", strtotime(date($dto)))}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                 <strong>Driver Details</strong>
                  <address>
                    <a href="/active-driver-profile/{{encrypt($driver->id)}}" target="_blank">Name: {{$driver->name}}</a><br>
                    Id : {{$driver->driver_id}}</a><br>
                    Mob : {{$driver->mobile}}<br>
                 
                  </address>
                </div>
                <!-- /.col -->
               
                <!-- /.col -->
                
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>Ride Id</th>
                      <th>Date</th>
                      <th>Total Fare</th>
                    <th>Ride Fare</th>
                      <th>Driver Fare</th>
                       <th>Approval</th>
                      <th>Deails</th>
                    
                    </tr>
                    </thead>
                    <tbody>

                     @foreach($booking as $b) 
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$b->booking_id}}<br></td>
                      <td>
                      {{$b->booked_at->format('d-m-Y')}}
                      </td>
                      <td>Rs.{{$b->total_fare}}</td>

                      <td>Rs.{{$b->fare}}</td>
                        <td>Rs.{{$b->driver_fare}} ( {{$b->driver_percent}}%)</td>
                      @if($b->payment_type==1)
                      <td>approved</td>
                      @else
                        @if($b->offline_pay_admin==0)
                         <td><a href="/ride-details/{{encrypt($b->id)}}" target="_blank" style="font-size:13px;color:red">pending<i class="fa fa-exclamation-triangle"></i></a></td>
                        @else
                          <td>approved</td>
                        @endif
                      @endif

                      
                      <td>
                    <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/ride-details/{{encrypt($b->id)}}" class="btn btn-danger btn-sm" target="_blank"><b> View
                    </td>
                    </tr>
                  @endforeach
                    
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">.</p>
                 
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">{{date("d-m-Y", strtotime(date($dfrom)))}} - {{date("d-m-Y", strtotime(date($dto)))}}</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rs.{{$sum}}</td>
                      </tr>
                     
                     
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <!-- <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div> -->
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
     @endsection