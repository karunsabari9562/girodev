 @extends('layouts.Admin')
@section('title')
 completed-refunds
  @endsection
  
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Completed Refunds</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Todays Bookings</li> -->
              <li class="breadcrumb-item"><a href="javascript:window.open('','_self').close();"><i class="fa fa-times" aria-hidden="true"></i>  close</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- COLOR PALETTE -->
    <!--    <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title" style="font-size: 20px;font-weight: bold;">Summary - {{date("Y-M", strtotime(date('Y-m-d')))}}</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          
         
        </div> -->

        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h1 class="card-title p-3" style="font-size: 20px;font-weight: bold;">Completed Refunds  - {{date("Y-M", strtotime($first_day))}}</h1>
                
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    
              
                   <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Customer</th>
                    <th>Driver</th>
                    <th>Ride Details</th>
                    <th>Paid Date</th> 
                    <th>Paid Amount</th>
                    <th>Reference Id</th>
                    <th>Remarks</th>
                
                    

                 
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($refund as $r )
                    
                  <tr>
                     <td>{{$loop->iteration}}</td>
                    <td>{{$r->GetCustomer->name}}<br>Mob: {{$r->GetCustomer->mobile}}</td>
                        <td><a href="/girokab-admin/active-driver-profile/{{encrypt($r->driver_id)}}" target="_blank">Id: {{$r->GetDriver->driver_id}}</a><br></td>
            
                     <td>
                     <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/girokab-admin/refund-ride-details/{{encrypt($r->bid)}}" class="btn btn-danger btn-sm" target="_blank"><b> View </b></a>
                     </td>

                      <td>{{date("d-m-Y", strtotime($r->payment_date))}}</td>
                      <td>Rs.{{$r->paid_amount}}</td>
                      <td>{{$r->reference_id}}</td>
                      <td>{{$r->remarks}}</td>
                  
               
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