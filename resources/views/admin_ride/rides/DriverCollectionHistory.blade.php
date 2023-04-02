 @extends('layouts.Admin')
@section('title')
 driver-collection
  @endsection
 
@section('contents')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
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
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <img src="{{asset('admin/img/logo/logo2.png')}}" style="width: 150px;">
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
                    <a href="/active-driver-profile/{{encrypt($driver->id)}}" target="_blank">{{$driver->name}}</a><br>
                    {{$driver->driver_id}}</a><br>
                    {{$driver->mobile}}<br>
                 
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
                      <th>Ride Deatils</th>
                      <th>Date</th>
                      <th>Distance</th>
                       
                      <th>Fare</th>
                       <th>Approval</th>
                      <th>Deails</th>
                    
                    </tr>
                    </thead>
                    <tbody>

                     @foreach($booking as $b) 
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$b->from_location}} to {{$b->to_location}}</td>
                      <td>
                      {{$b->booked_at->format('d-m-Y')}}
                      </td>
                      <td>
                      {{$b->distance}}km
                      </td>

                      <td>Rs.{{$b->fare}}</td>
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
                    <a style="cursor: pointer;background-color: #10ad77;border:none;" href="/ride-details/{{encrypt($b->id)}}" class="btn btn-danger btn-sm" target="_blank"><b> View
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
                  <p class="lead">Payment Methods:</p>
                 

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due {{date("d-m-Y", strtotime(date('Y-m-d')))}}</p>

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