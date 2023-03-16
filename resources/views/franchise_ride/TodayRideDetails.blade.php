@extends('layouts.Franchise')
@section('title')
  ride-details
  @endsection
 
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ride Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="javascript:window.open('','_self').close();"><i class="fa fa-times" aria-hidden="true"></i>  close</a></li>
             <!--  <li class="breadcrumb-item active">Invoice</li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div> -->


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <!-- <i class="fas fa-globe"></i> AdminLTE, Inc. -->
                    <small class="float-right">Ride Date: {{$bookings->booked_at->format('d-m-Y')}}</small><br>
                    <!-- <small class="float-right">Booking Id: {{$bookings->booking_id}}</small> -->
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col" style="border: 1px solid black;">
                  <strong>Customer Details</strong>
                  <address>
                    <strong>Name</strong> : {{$bookings->GetCustomer->name}}</a><br>
                    <strong>Mob</strong> : {{$bookings->GetCustomer->mobile}}<br>
                   
                  </address>
                  <strong>Driver Details</strong>
                  <address>
                    <a href="/active-driver-profile/{{encrypt($bookings->driver_id)}}" target="_blank"><strong>Id</strong> : {{$bookings->GetDriver->driver_id}}</a><br>
                    <strong>Name</strong> : {{$bookings->GetDriver->name}}<br>
                   
                  </address>
                </div>
                  <div class="col-sm-4 invoice-col" style="border: 1px solid black;">
                  <strong>Booking Details</strong>
                  <address>
                    
                    <strong>From</strong> : {{$bookings->from_location}}<br>
                    <strong>To</strong>    :  {{$bookings->to_location}}<br>
                    <strong>Distance</strong> : {{$bookings->distance}}km<br>
                    <strong>Fare</strong> : Rs.{{$bookings->total_fare}}<br>
                   <strong> Date</strong> :{{$bookings->booked_at->format('d-m-Y h:i a')}}<br>
                      @if($bookings->night_ride==0)
                      <strong>Ride Type</strong> : Normal
                      @else
                       <strong>Ride Type</strong> : Special
                      @endif<br>
                  </address>
                </div>
                 <div class="col-sm-4 invoice-col" style="border: 1px solid black;">
                  <strong>Fare Details</strong>
                  <address>
                    
                    <strong>Ride Fare</strong> : Rs.{{$bookings->fare}}<br>     
                    <strong>Sevice Charge</strong> : Rs.{{$bookings->service_charge}}<br>
                    <strong>Tax</strong>    :  Rs.{{$bookings->tax}}<br>
                    <strong>Total Fare</strong> : Rs.{{$bookings->total_fare}}<br>
                    <strong>Driver Fare</strong> : Rs.{{$bookings->driver_fare}} ({{$bookings->driver_percent}}%)<br>
                    <strong>Div. Fare</strong> : Rs.{{$bookings->franchise_fare}} ({{$bookings->franchise_percent}}%)<br>
                 
                  </address>
                </div>
                
               
              
                 

                @switch($bookings->status)
                      @case(0)                       
                            <div class="col-sm-4 invoice-col">
                       <strong>Ride Status</strong>
                        <address>
                          <span class="badge badge-warning">Pending</span>
                        </address>
                      </div>
                          @break

                      @case(1)
                            <div class="col-sm-4 invoice-col" style="border: 1px solid black;">
                       <strong>Ride Status</strong>
                        <address>
                       <span class="badge badge-success">Accepted</span>
                        </address>
                      </div>
                     
                      @break

                       @case(2)
                              <div class="col-sm-4 invoice-col" style="border: 1px solid black;">
                       <strong>Ride Status</strong>
                        <address>
                       <span class="badge badge-danger">Rejected</span><br>
                       <strong>Reason</strong> :{{$bookings->reason}} 
                        </address>
                      </div>
                  
                      @break

                       @case(3)
                             <div class="col-sm-4 invoice-col" style="border: 1px solid black;">
                       <strong>Ride Status</strong>
                        <address>
                      <span class="badge badge-danger">Cancelled</span><br>
                      <strong> Reason </strong>:{{$bookings->reason}} 
                        </address>
                      </div>
                    
                      @break

                       @case(4)
                        <div class="col-sm-4 invoice-col" style="border: 1px solid black;">
                        <strong>Ride Status</strong>
                        <address>
                        <span class="badge badge-danger">Timeout</span><br>
                
                        </address>
                        </div>
                      
                      @break

                       @case(5)

                       <div class="col-sm-4 invoice-col" style="border: 1px solid black;">
                        <strong>Ride Status</strong>
                        <address>
                        <span class="badge badge-success">Started</span><br>
                        <strong>Started At</strong> : @if($bookings->started_at!=''){{$bookings->started_at->format('H:i a')}}@endif<br>
                        @if($bookings->payment_status==1)<strong>Payment Status</strong> : @if($bookings->payment_status==1)Paid @else Pending @endif<br>
                        <strong>Payment Type</strong> : @if($bookings->payment_type==1)Online @else Offline @endif<br>
                       <strong> Paid Amount</strong> : Rs.{{$bookings->paid_amount}}<br>
                        <strong> Reference Id </strong> : {{$bookings->reference_id}}<br>@endif
                        
                        </address>
                        </div>

                      @break

                       @case(6)
                       <div class="col-sm-4 invoice-col" style="border: 1px solid black;">
                        <strong>Ride Status</strong>
                        <address>
                        <span class="badge badge-info">completed</span><br>
                         <strong>Started At </strong> : @if($bookings->started_at!=''){{$bookings->started_at->format('H:i a')}}@endif<br>
                         <strong>Completed At </strong> : @if($bookings->started_at!=''){{$bookings->completed_at->format('H:i a')}}@endif<br>
                        @if($bookings->payment_status==1) <strong>Payment Status </strong> : @if($bookings->payment_status==1)Paid @else Pending @endif<br>
                        <strong> Payment Type </strong> : @if($bookings->payment_type==1)Online @else Offline @endif<br>
                         <strong>Paid Amount </strong> : Rs.{{$bookings->paid_amount}}<br>
                         <strong>Reference Id  </strong>: {{$bookings->reference_id}}<br>@endif
                         <strong>Extra Ride Fare </strong> : Rs.{{$bookings->extra_ride_fee}}<br>
                         <strong>Waiting Charge </strong> : Rs.{{$bookings->waiting_charge}}<br>


                         @for($i=1;$i<=$bookings->star_rating;$i++)
                        <i class="fa fa-star" aria-hidden="true" style="color: #ffc107;"></i>

                        @endfor
                        <br>
                         <strong>Review </strong> : {{$bookings->review}}
                        </address>
                        </div>

                      
                       
                      @break

                        @endswitch

                        @if($bookings->payment_type==2)

                        <div class="col-sm-4 invoice-col" style="border: 1px solid black;">
                        <strong>Offline Payment Approval</strong>
                        <address>
                        
                        <br> <strong>Div.approval </strong> : 
                        @if($bookings->offline_pay_franchise==1)
                        Approved at{{$bookings->offline_pay_franchisedt->format('H:i a')}}
                        @else
                        <span class="badge badge-warning">pending</span>
                        @endif<br>
                         <strong>Admin approval  </strong>: 
                        @if($bookings->offline_pay_admin==1)
                        Approved at{{$bookings->offline_pay_admindt->format('H:i a')}}
                        @else
                        <span class="badge badge-warning">pending</span><br>
                        @endif<br>

                        </address>
                        </div>
                        @endif
               
              </div>
              <!-- /.row -->












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