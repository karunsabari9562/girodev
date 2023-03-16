 @extends('layouts.Franchise')
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
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    
                    <small class="float-right">Date: {{date("d-M-Y", strtotime($dt))}}</small>
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
                      <th>Distance</th>
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
                      <td>{{$b->booking_id}}</td>
                      <td>
                      {{$b->distance}}km
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
                  <p class="lead"></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rs.{{$ride_fare}}</td>
                      </tr>
                     
                  <!--      <tr>
                        <th style="width:50%">Reference Id * :</th>
                        <td></td>
                      </tr>
                      <tr>
                        <th style="width:50%">Paid Amount * :</th>
                        <td></td>
                      </tr>
                      <tr>
                        <th style="width:50%">Remarks:</th>
                        <td></td>
                      </tr> -->
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
               <!--    <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> -->
                  <!-- <button type="button" id="submitButton" class="btn btn-success float-right" onclick="Pay()"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>

                  <button type="button" id="submitButton1" class="btn btn-success float-right" disabled=""><i class="far fa-credit-card"></i> Submitting
                    Payment....
                  </button> -->
                <!--   <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button> -->
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script type="text/javascript">
  



</script>



     @endsection