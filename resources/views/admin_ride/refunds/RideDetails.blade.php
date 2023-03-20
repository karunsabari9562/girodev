@extends('layouts.Admin')
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
                    <small class="float-right">Id: {{$bookings->booking_id}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col" style="border: 1px solid #e1e1e1;">
                  <strong><u>Customer Details</u></strong>
                  <address>
                    <strong>Name</strong> : {{$bookings->GetCustomer->name}}</a><br>
                    <strong>Mob</strong> : {{$bookings->GetCustomer->mobile}}<br>
                   
                  </address>
                  <strong><u>Driver Details</u></strong>
                  <address>
                    <a href="/girokab-admin/active-driver-profile/{{encrypt($bookings->driver_id)}}" target="_blank"><strong>Id</strong> : {{$bookings->GetDriver->driver_id}}</a><br>
                    <strong>Name</strong> : {{$bookings->GetDriver->name}}<br>
                    <strong>Div</strong> : {{$bookings->GetFranchise->franchise_name}}<br>
                   
                  </address>
                </div>
                  <div class="col-sm-4 invoice-col" style="border: 1px solid #e1e1e1;">
                  <strong><u>Booking Details</u></strong>
                  <address>
                    
                    <strong>From</strong> : {{$bookings->from_location}}<br>
                    <strong>To</strong>    :  {{$bookings->to_location}}<br>
                    <strong>Distance</strong> : {{$bookings->distance}}km<br>
                   <strong> Date</strong> :{{$bookings->booked_at->format('d-m-Y h:i a')}}<br>
                      @if($bookings->night_ride==0)
                      <strong>Ride Type</strong> : Normal
                      @else
                       <strong>Ride Type</strong> : Special
                      @endif<br>
                  </address>
                </div>
                 <div class="col-sm-4 invoice-col" style="border: 1px solid #e1e1e1;">
                  <strong><u>Fare Details</u></strong>
                  <address>
                    
                   <strong>Ride Fare</strong> : Rs.{{$bookings->fare}}<br>    

                    <strong>Total Fare</strong> : Rs.{{$bookings->total_fare}}<br>

                    <strong>Payment Status</strong> : Paid<br>
                    
                    @if($bookings->payment_type==1)

                    <strong>Payment Type</strong> : Online<br>

                    <strong>Paid At</strong> : {{date("d-m-Y H:i a", strtotime($bookings->payment_date))}}<br>

                    <strong>Reference ID</strong> : Rs.{{$bookings->reference_id}}<br>

                    @elseif($bookings->payment_type==2)

                            <strong>Payment Type</strong> : Offline<br>

                    @endif

                  </address>
                </div>
                
               
              
                 

                @switch($bookings->status)
                      


                       @case(2)
                              <div class="col-sm-4 invoice-col" style="border: 1px solid #e1e1e1;">
                       <strong><u>Ride Status</u></strong>
                        <address>
                       <span class="badge badge-danger">Rejected</span><br>
                       <strong>Reason</strong> :{{$bookings->reason}} 
                        </address>
                      </div>
                  
                      @break

                       @case(3)
                             <div class="col-sm-4 invoice-col" style="border: 1px solid #e1e1e1;">
                       <strong><u>Ride Status</u></strong>
                        <address>
                      <span class="badge badge-danger">Cancelled</span><br>
                      <strong> Reason </strong>:{{$bookings->reason}} 
                        </address>
                      </div>
                    
                      @break

                       @case(4)
                        <div class="col-sm-4 invoice-col" style="border: 1px solid #e1e1e1;">
                        <strong><u>Ride Status</u></strong>
                        <address>
                        <span class="badge badge-danger">Timeout</span><br>
                
                        </address>
                        </div>
                      
                      @break

                        @endswitch

                     
               
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