  @extends('layouts.Franchise')
  @section('title')
 driver-area
  @endsection
  @section('contents')

  @php
  $dt=date('Y-m-d');
 $franchises=Auth::guard('franchise')->user()->id;

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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Driver Area</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <!--  <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Detail</li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <!-- <div class="card-header">
          <h3 class="card-title">Driver Approval</h3>

          
        </div> -->
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                  
                  
                <div class="col-12 col-sm-4" style="cursor: pointer;" onclick="window.location.href='/active-drivers'">
                  <div class="info-box bg-c-green">
                      <!--<div class="box-c">-->
                      <!--    <i class="fa fa-check-circle"></i>-->
                      <!--</div>-->
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-white">Active Drivers</span>
                      <span class="info-box-number text-center text-white mb-0 size-lg">{{$cnt}}</span>
                    </div>
                  </div>
                </div>
                
                
                <div class="col-12 col-sm-4" style="cursor: pointer;" onclick="window.location.href='/expired-drivers'">
                  <div class="info-box bg-c-yellow">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-white">Expired Drivers</span>
                      <span class="info-box-number text-center text-white mb-0 size-lg">{{$cnt7}}</span>
                    </div>
                  </div>
                </div>
                
                
                <div class="col-12 col-sm-4" style="cursor: pointer;" onclick="window.location.href='/blocked-drivers'">
                  <div class="info-box  bg-c-blue">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-white">Blocked Drivers</span>
                      <span class="info-box-number text-center text-white mb-0 size-lg">{{$cnt1}}</span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="row">
                <div class="col-12"><br>
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
                        <a class="users-list-name" href="active-driver-profile/{{encrypt($d->id)}}" target="_blank">{{$d->name}}</a>
                        <span class="users-list-date">{{$d->driver_id}}</span>
                      </li>
                     @endforeach

                     @endif
                      
                      
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a class="yellowbtn" href="/active-drivers">View All Drivers</a>
                  </div>
                  <!-- /.card-footer -->
                </div>  


 <div class="card">
                  
                  <div class="card-body p-0">
                  

                      <img src="{{asset('giro/img1.png')}}" style="width: 100%;">
                      
                  </div>
               
                </div> 




                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
             
            <div class="card card-warning card-outline">
              <div class="card-body box-profile">
                

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item text-muted" style="cursor: pointer;" onclick="window.location.href='/reactivation-drivers-list'">
                    Re-activation pending requests <a class="float-right">{{$cnt11}}</a>
                  </li>
                  <li class="list-group-item text-muted"  style="cursor: pointer;" onclick="window.location.href='/deactivated-drivers'">
                    Deactivated Drivers (by Division) <a class="float-right">{{$cnt8}}</a>
                  </li>
                  <li class="list-group-item text-muted"  style="cursor: pointer;" onclick="window.location.href='/self-deactivated-drivers'">
                    Deactivated Drivers (by Self) <a class="float-right">{{$cnt9}}</a>
                  </li>
                   <li class="list-group-item text-muted"  style="cursor: pointer;" onclick="window.location.href='/admin-deactivated-drivers'">
                    Deactivated Drivers (by Admin) <a class="float-right">{{$cnt10}}</a>
                  </li>
                </ul>

              </div>
             
            </div>

            <div class="card card-warning card-outline">
              <div class="card-body box-profile">
                

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item text-muted" style="cursor: pointer;" onclick="window.location.href='/rc-expired-drivers'">
                    RC Expired <a class="float-right">{{$cnt2}}</a>
                  </li>
                  <li class="list-group-item text-muted" style="cursor: pointer;" onclick="window.location.href='/license-expired-drivers'">
                    License Expired <a class="float-right">{{$cnt3}}</a>
                  </li>
                  <li class="list-group-item text-muted" style="cursor: pointer;" onclick="window.location.href='/insurance-expired-drivers'">
                   Insurance Expired <a class="float-right">{{$cnt4}}</a>
                  </li>
                  <li class="list-group-item text-muted" style="cursor: pointer;" onclick="window.location.href='/pollution-expired-drivers'">
                    Pollution Certificate Expired <a class="float-right">{{$cnt5}}</a>
                  </li>
                  <li class="list-group-item text-muted" style="cursor: pointer;" onclick="window.location.href='/permit-expired-drivers'">
                    Vehicle Permit Expired <a class="float-right">{{$cnt6}}</a>
                  </li>

                </ul>
              </div>
             
            </div>
            
            <div class="card card-info">
                <div class="card-body card-block-a">
                    <h5 class="text-muted">Quick Links</h5>
              <ul class="list-unstyled">
                <li>
    <i class="fa fa-dot-circle" aria-hidden="true" style="font-size: 10px;"></i>  <a href="/rc-expiring-drivers" class="btn-link text-primary"> RC Expiring</a>
                </li>
                <li>
                  <i class="fa fa-dot-circle" aria-hidden="true" style="font-size: 10px;"></i>  <a href="/license-expiring-drivers" class="btn-link text-primary"></i> License Expiring</a>
                </li>
                <li>
                  <i class="fa fa-dot-circle" aria-hidden="true" style="font-size: 10px;"></i>  <a href="/insurance-expiring-drivers" class="btn-link text-primary"></i> Insurance Expiring  </a>
                </li>
                 <li>
                  <i class="fa fa-dot-circle" aria-hidden="true" style="font-size: 10px;"></i>  <a href="/pollution-expiring-drivers" class="btn-link text-primary"></i> Pollution Certificate Expiring </a>
                </li>
                 <li>
                  <i class="fa fa-dot-circle" aria-hidden="true" style="font-size: 10px;"></i>  <a href="/permit-expiring-drivers" class="btn-link text-primary"></i> Vehicle Permit Expiring  </a>
                </li>
                
              </ul>
              <!--<div class="text-center mt-5 mb-3">-->
                
              <!--</div>-->
                </div>
            </div>
              
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  



@endsection

