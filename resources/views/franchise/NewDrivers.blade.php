
 @extends('layouts.Franchise')
@section('title')
 new-drivers
  @endsection
 
@section('contents')




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Driver Approval</h1>
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
                <div class="col-12 col-sm-4" style="cursor: pointer;" onclick="window.location.href='/franchise-division/driver-approval-pending'">
                  <div class="info-box bg-c-green">
                      <div class="box-c">
                          <i class="fa fa-check-circle"></i>
                      </div>
                    <div class="info-box-content">
                      <span class="info-box-number text-center text-white mb-0 size-lg">{{$cnt}}</span>
                      <span class="info-box-text text-center text-white">Approval Pending</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4" style="cursor: pointer;" onclick="window.location.href='/franchise-division/new-drivers'">
                  <div class="info-box bg-c-yellow">
                      <div class="box-c">
                          <i class="fa fa-paper-plane"></i>
                      </div>
                    <div class="info-box-content">
                      <span class="info-box-number text-center text-white mb-0 size-lg">{{$cnt1}}</span>
                      <span class="info-box-text text-center text-white">Submission Pending</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4" style="cursor: pointer;" onclick="window.location.href='/franchise-division/rejected-drivers'">
                  <div class="info-box  bg-c-blue">
                      <div class="box-c">
                          <i class="fa fa-ban "></i>
                      </div>
                    <div class="info-box-content">
                      <span class="info-box-number text-center text-white mb-0 size-lg">{{$cnt2}}</span>
                      <span class="info-box-text text-center text-white"> Rejected Requests</span>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="row">
                <div class="col-12"><br>
                  <h4>Submission Pending Drivers</h4><br>
                    
                  <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Registered At</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($driver as $v )

                   
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $v->name }}</td>
                    <td>{{ $v->mobile }}</td>
            
                    <td>{{ $v->created_at->format('d-m-Y') }}</td>
 
                <td>
                   <a style="cursor: pointer;background-color: #f39c12;border:none;" onclick="window.location.href='/franchise-division/driver-profile-status/{{encrypt($v->id)}}'" class="btn btn-danger btn-sm"><b> view   </b></a>
                  <!-- <a style="cursor: pointer;background-color: red;border:none;" onclick="Reject('{{$v->id}}')" class="btn btn-danger btn-sm"><b> <i class="fa fa-ban" aria-hidden="true"></i>     </b></a> -->
                </td>
              
                
                     
                      
                  </tr>

                  @endforeach
               
    
                  </tbody>
                 
                </table>

                    

                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                <div class="card card-info">
                    <div class="card-block flex-column">
                    <img src="{{asset('giro/img1.png')}}" style="width: 100%;">
                <p class="text-muted mt-2 mb-2">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>
              
              </div>
              <div class="card-body card-block-a">
              <h5 class="text-muted">Quick Links</h5>
              <ul class="list-unstyled">
                <li>
    <i class="fa fa-dot-circle" aria-hidden="true" style="font-size: 10px;"></i>  <a href="/franchise-division/driver-approval-pending" class="btn-link text-primary"> Approval pending drivers</a>
                </li>
                <li>
                  <i class="fa fa-dot-circle" aria-hidden="true" style="font-size: 10px;"></i>  <a href="/franchise-division/rejected-drivers" class="btn-link text-primary"></i> Rejected Requests</a>
                </li>
                <li>
                  <i class="fa fa-dot-circle" aria-hidden="true" style="font-size: 10px;"></i>  <a href="/driver-area" class="btn-link text-primary"></i> Registered Drivers  </a>
                </li>
                
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="/register-driver" class="btn btn-md ctm-btn"><i class="fa fa-user"></i>  Register Driver  <i class="fa fa-chevron-right"></i></a>
                <!-- <a href="#" class="btn btn-sm btn-warning">Report contact</a> -->
              </div>
              </div>
                </div>
              <!--<h3 class="text-primary"><img src="{{asset('giro/img1.png')}}" style="width: 100%;"></h3>-->
              <!--<p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terr.</p>-->
              

              <br>
             <!--  <div class="text-muted">
                <p class="text-sm">Client Company
                  <b class="d-block">Deveint Inc</b>
                </p>
                <p class="text-sm">Project Leader
                  <b class="d-block">Tony Chicken</b>
                </p>
              </div> -->

              
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

