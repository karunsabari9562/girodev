 @extends('layouts.Admin')
@section('title')
 driver-rides
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
                    <img src="{{asset('admin/img/logo/logo2.png')}}" style="width: 150px;">
                    <small class="float-right">Date: {{date("d-m-Y", strtotime(date('Y-m-d')))}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                 <strong>Driver Details</strong>
                  <address>
                     <a href="/girokab-admin/active-driver-profile/{{encrypt($driver->id)}}" target="_blank">Name :  {{$driver->name}}</a><br>
                    Id : {{$driver->driver_id}}</a><br>
                    Mob :  {{$driver->mobile}}<br>
                    Div :  {{$driver->GetFranchise->franchise_name}}<br>
                 
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
                      <td>{{$b->from_location}} to {{$b->to_location}}<br></td>
                      <td>
                     Rs. {{$b->total_fare}}
                      </td>

                      <td>Rs.{{$b->fare}}</td>
                      <td>Rs.{{$b->driver_fare}} ( {{$b->driver_percent}}%)</td>
                      @if($b->payment_type==1)
                      <td>approved</td>
                      @else
                        @if($b->offline_pay_admin==0)
                         <td><a href="/girokab-admin/rides-details/{{encrypt($b->id)}}" target="_blank" style="font-size:13px;color:red">pending<i class="fa fa-exclamation-triangle"></i></a></td>
                        @else
                          <td>approved</td>
                        @endif
                      @endif

                      <td>
                    <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/girokab-admin/ride-details/{{encrypt($b->id)}}" class="btn btn-danger btn-sm" target="_blank"><b> View
                    </td>
                    </tr>
                  @endforeach
                    
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- <div class="row">
               
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                 

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
             
                <div class="col-6">
                  <p class="lead">Amount Due {{date("d-m-Y", strtotime(date('Y-m-d')))}}</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rs.{{$ride_fare}}</td>
                      </tr>
                      
                      <tr>
                        <th style="width:50%">Reference Id * :</th>
                        <td><input type="text" name="" class="form-control"></td>
                      </tr>
                      <tr>
                        <th style="width:50%">Paid Amount * :</th>
                        <td><input type="text" name="" class="form-control"></td>
                      </tr>
                      <tr>
                        <th style="width:50%">Remarks:</th>
                        <td><textarea class="form-control"></textarea></td>
                      </tr>
                     
                     
                    </table>
                  </div>
                </div>
              
              </div> -->
              
              <!-- <div class="row no-print">
                <div class="col-12">
                 
                  <button type="button" class="btn yellowbtn float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
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