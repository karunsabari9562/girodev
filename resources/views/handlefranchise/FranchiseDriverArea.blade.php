 @extends('layouts.Admin')
@section('title')
 driver-area
  @endsection
  
@section('contents')

  @php
  $dt=date('Y-m-d');
 
 $cnt=DB::table('driver_registrations')->where('franchise',$franchises)->where('status',1)->count();

 $cnt1=DB::table('driver_registrations')->where('franchise',$franchises)->where('status',3)->count();

 $cnt2=DB::table('driver_primary_documents')->where('franchise',$franchises)->where('status',1)->where('rc_expiry','<',$dt)->count();

 $cnt3=DB::table('driver_primary_documents')->where('franchise',$franchises)->where('status',1)->where('license_expiry','<',$dt)->count();

 $cnt4=DB::table('driver_primary_documents')->where('franchise',$franchises)->where('status',1)->where('insurance_expiry','<',$dt)->count();

 $cnt5=DB::table('driver_secondary_documents')->where('franchise',$franchises)->where('status',1)->where('pollution_expiry','<',$dt)->count();

 $cnt6=DB::table('driver_secondary_documents')->where('franchise',$franchises)->where('status',1)->where('permit_expiry','<',$dt)->count();

$cnt7=DB::table('driver_registrations')->where('franchise',$franchises)->where('status',1)->where('valid_to','<',$dt)->count();
$cnt8=DB::table('driver_registrations')->where('franchise',$franchises)->where('status',4)->count();
$cnt9=DB::table('driver_registrations')->where('franchise',$franchises)->where('status',5)->count();
$cnt10=DB::table('driver_registrations')->where('franchise',$franchises)->where('status',6)->count();
$cnt11=DB::table('driver_registrations')->where('franchise',$franchises)->where('status',7)->count();

  @endphp
  
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{$fr_det->franchise_name}} - {{$fr_det->franchise_id}}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin-dashboard">Home</a></li>
              <li class="breadcrumb-item active">Drivers Area</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/active-drivers/{{encrypt($franchises)}}'">
            <div class="info-box">
              <span class="info-box-icon bg-info icon-white"><i class="fa fa-user"></i></span>

              <div class="info-box-content text-center">
                <span class="box-z"> {{$cnt}}</span>
                <span class="info-box-text" style="font-weight: bold;">Active Drivers</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
         
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>



          <div class="col-12 col-sm-6 col-md-3" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/expired-drivers/{{encrypt($franchises)}}'">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning icon-white"><i class="fa fa-exclamation-triangle"></i></span>

              <div class="info-box-content text-center">
                <span class="box-z"> {{$cnt7}}</span>
                <span class="info-box-text" style="font-weight: bold;">Expired Driver</span>
              </div>
            </div>
            
          </div>

           <div class="col-12 col-sm-6 col-md-3" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/blocked-drivers/{{encrypt($franchises)}}'">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger icon-white"><i class="fa fa-ban"></i></span>

              <div class="info-box-content text-center">
                <span class="box-z"> {{$cnt1}}</span>
                <span class="info-box-text" style="font-weight: bold;">Blocked Driver</span>
              </div>
            </div>
            
          </div>

          <div class="col-12 col-sm-6 col-md-3" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/reactivation-drivers-list/{{encrypt($franchises)}}'">
            <div class="info-box mb-3">
              <span class="info-box-icon  icon-white" style="background-color: #4b7755;color: white;"><i class="fa fa-toggle-on"></i></span>

              <div class="info-box-content text-center">
                <span class="box-z"> {{$cnt11}}</span>
                <span class="info-box-text" style="font-weight: bold;">Re-activation pending</span>
              </div>
            </div>
            
          </div>

          <div class="col-12 col-sm-6 col-md-4" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/deactivated-drivers/{{encrypt($franchises)}}'">
            <div class="info-box mb-3">
              <span class="info-box-icon icon-white" style="background-color: #72484c;color: white;"><i class="fa fa-power-off"></i></span>

              <div class="info-box-content text-center">
                <span class="box-z"> {{$cnt8}}</span>
                <span class="info-box-text" style="font-weight: bold;">Deactivated Driver (by Division)</span>
              </div>
            </div>
            
          </div>

          <div class="col-12 col-sm-6 col-md-4" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/self-deactivated-drivers/{{encrypt($franchises)}}'">
            <div class="info-box mb-3">
              <span class="info-box-icon icon-white" style="background-color: #18324f;color: white;"><i class="fa fa-power-off"></i></span>
              <div class="info-box-content text-center">
                <span class="box-z"> {{$cnt9}}</span>
                <span class="info-box-text" style="font-weight: bold;">Deactivated Driver (by Self)</span>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-4" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/admin-deactivated-drivers/{{encrypt($franchises)}}'">
            <div class="info-box mb-3">
              <span class="info-box-icon icon-white" style="background-color: #545222;color: white;"><i class="fa fa-power-off"></i></span>

              <div class="info-box-content text-center">
                <span class="box-z"> {{$cnt10}}</span>
                <span class="info-box-text" style="font-weight: bold;">Deactivated Driver (by Admin)</span>
              </div>
            </div>
            
          </div>

          
          <!-- /.col -->
        </div>
        <!-- /.row -->

        

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            
            <div class="row">
              
              <div class="col-md-12">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest Drivers</h3>

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
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">

                      @if($cnt==0)
                      <li>
                        
                     <a class="users-list-name">No Active Drivers Found !</a>
                      </li>

                      @else
                      @foreach($driver as $d)
                      <li>
                        <img src="{{$d->photo}}" alt="User Image" style="width: 100px;height: 120px;">
                        <a class="users-list-name" href="/girokab-admin/active-driver-profile/{{encrypt($d->id)}}" target="_blank">{{$d->name}}</a>
                        <span class="users-list-date">{{$d->driver_id}}</span>
                      </li>
                     @endforeach

                     @endif
                      
                      
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="/girokab-admin/active-drivers/{{encrypt($franchises)}}">View All Drivers</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>


            <div class="row">
          

          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-4" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/rc-expiring-drivers/{{encrypt($franchises)}}'">
            <div class="info-box mb-3">
              <span class="info-box-icon icon-white" style="background-color: #cdbb8f;"><i class="fa fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" style="font-weight: bold;">RC Expiring</span>
                <span class="info-box-number">View</span>
              </div>
              
            </div>
          
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/license-expiring-drivers/{{encrypt($franchises)}}'">
            <div class="info-box mb-3">
              <span class="info-box-icon icon-white" style="background-color: #cdbb8f;"><i class="fa fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" style="font-weight: bold;">License Expiring</span>
                <span class="info-box-number">View</span>
              </div>
              
            </div>
            
          </div>
          <div class="col-12 col-sm-6 col-md-4" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/insurance-expiring-drivers/{{encrypt($franchises)}}'">
            <div class="info-box mb-3">
              <span class="info-box-icon icon-white" style="background-color: #cdbb8f;"><i class="fa fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" style="font-weight: bold;">Insurance Expiring</span>
                <span class="info-box-number">View</span>
              </div>
              
            </div>
            
          </div>
          <div class="col-12 col-sm-6 col-md-6" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/pollution-expiring-drivers/{{encrypt($franchises)}}'">
            <div class="info-box mb-3">
              <span class="info-box-icon icon-white" style="background-color: #cdbb8f;"><i class="fa fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" style="font-weight: bold;">Pollution Certificate Expiring</span>
                <span class="info-box-number">View</span>
              </div>
              
            </div>
            
          </div>

           <div class="col-12 col-sm-6 col-md-6" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/permit-expiring-drivers/{{encrypt($franchises)}}'">
            <div class="info-box mb-3">
              <span class="info-box-icon icon-white" style="background-color: #cdbb8f;"><i class="fa fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" style="font-weight: bold;">Vehicle Permit Expiring</span>
                <span class="info-box-number">View</span>
              </div>
              
            </div>
            
          </div>

         

         

          
          <!-- /.col -->
        </div>
        <!-- /.row -->
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
            <!-- <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
             
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>Item</th>
                      <th>Status</th>
                      <th>Popularity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="badge badge-success">Shipped</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR1848</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-warning">Pending</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>iPhone 6 Plus</td>
                      <td><span class="badge badge-danger">Delivered</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-info">Processing</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR1848</a></td>
                      <td>Samsung Smart TV</td>
                      <td><span class="badge badge-warning">Pending</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR7429</a></td>
                      <td>iPhone 6 Plus</td>
                      <td><span class="badge badge-danger">Delivered</span></td>
                      <td>
                        <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                      </td>
                    </tr>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="badge badge-success">Shipped</span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
               
              </div>
              
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              
            </div> -->
            
          </div>
       

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 " style="background-color: #ebebeb;cursor: pointer;" onclick="window.location.href='/girokab-admin/rc-expired-drivers/{{encrypt($franchises)}}'">
              <span class="info-box-icon"><i class="far fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">RC Expired</span>
                <span class="info-box-number">{{$cnt2}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3" style="background-color: #ebebeb;cursor: pointer;" onclick="window.location.href='/girokab-admin/license-expired-drivers/{{encrypt($franchises)}}'">
              <span class="info-box-icon"><i class="far fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">License Expired</span>
                <span class="info-box-number">{{$cnt3}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3" style="background-color: #ebebeb;cursor: pointer;" onclick="window.location.href='/girokab-admin/insurance-expired-drivers/{{encrypt($franchises)}}'">
              <span class="info-box-icon"><i class="far fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Insurance Expired</span>
                <span class="info-box-number">{{$cnt4}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3" style="background-color: #ebebeb;cursor: pointer;" onclick="window.location.href='/girokab-admin/pollution-expired-drivers/{{encrypt($franchises)}}'">
              <span class="info-box-icon"><i class="far fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Pollution Certificate Expired</span>
                <span class="info-box-number">{{$cnt5}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            <div class="info-box mb-3" style="background-color: #ebebeb;cursor: pointer;" onclick="window.location.href='/girokab-admin/permit-expired-drivers/{{encrypt($franchises)}}'">
              <span class="info-box-icon"><i class="far fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Vehicle Permit Expired</span>
                <span class="info-box-number">{{$cnt6}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            

            <!-- PRODUCT LIST -->
           <!--  <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Products</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Samsung TV
                        <span class="badge badge-warning float-right">$1800</span></a>
                      <span class="product-description">
                        Samsung 32" 1080p 60Hz LED Smart HDTV.
                      </span>
                    </div>
                  </li>
                 
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">Bicycle
                        <span class="badge badge-info float-right">$700</span></a>
                      <span class="product-description">
                        26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                      </span>
                    </div>
                  </li>
                  
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">
                        Xbox One <span class="badge badge-danger float-right">
                        $350
                      </span>
                      </a>
                      <span class="product-description">
                        Xbox One Console Bundle with Halo Master Chief Collection.
                      </span>
                    </div>
                  </li>
                 
                  <li class="item">
                    <div class="product-img">
                      <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title">PlayStation 4
                        <span class="badge badge-success float-right">$399</span></a>
                      <span class="product-description">
                        PlayStation 4 500GB Console (PS4)
                      </span>
                    </div>
                  </li>
                 
                </ul>
              </div>
             
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Products</a>
              </div>
             
            </div> -->
           
          </div>
        
        </div>
       
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  


  @endsection