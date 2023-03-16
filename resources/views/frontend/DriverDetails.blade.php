<!DOCTYPE html>
<html>
<head>
  <title></title>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 


  <style type="text/css">
    body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
  </style>
</head>
<body>
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <center>
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <img src="{{ asset('admin/img/logo/logo2.png')}}" alt="AdminLTELogo" style="width: 40%;">
            </ol>
          </nav>
          </center>
          <!-- /Breadcrumb -->
          @php
          $d=date('Y-m-d');
          @endphp
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{$driver->photo}}" alt="Admin" class="rounded-circle" style="width: 150px;height: 150px;">
                    <div class="mt-3">
                      <h4>{{$driver->name}}</h4>
                      <p class="text-secondary mb-1">{{$driver->driver_id}}</p>

                      @if($driver->status==1)
                    Status :     <a class="float-right" style="color: green;font-weight: bold;"> &nbsp   Active</a>
                    @elseif($driver->status==3)
                     Status :     <a class="float-right" style="color: red;font-weight: bold;"> &nbsp  Blocked</a>
                     @elseif($driver->status==4)
                     Status :     <a class="float-right" style="color: red;font-weight: bold;"> &nbsp Deactivated</a>
                     @elseif($driver->status==5)
                   Status :     <a class="float-right" style="color: red;font-weight: bold;"> &nbsp Deactivated</a>
                     @elseif($driver->status==6)
                     Status :     <a class="float-right" style="color: red;font-weight: bold;"> &nbsp Deactivated</a>
                     @elseif($driver->status==7)
                    Status :     <a class="float-right" style="color: red;font-weight: bold;"> &nbsp Re-activation pending</a>
                    @endif
                 
                 <!--    <br><br>
                      <button class="btn btn-primary"><i class="fa fa-globe"></i>  Visit Website</button> -->
                 <!--     <button class="btn btn-outline-primary">Message</button> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Mobile</h6>
                    <span class="text-secondary">{{$driver->mobile}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Division</h6>
                    <span class="text-secondary">{{$driver->GetFranchise->franchise_name}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Vehicle</h6>
                    <span class="text-secondary">{{$driver->GetVType->type}} </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">License No.</h6>
                    <span class="text-secondary">{{$driver->GetPDocs->license_number}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Vehicle No.</h6>
                    <span class="text-secondary">{{$driver->GetPDocs->rc_number}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0">Member from</h6>
                    <span class="text-secondary">{{$driver->approved_date->format('d-M-Y')}} </span>
                  </li>
                  
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">License Expiry</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      @if($driver->GetPDocs->license_expiry>=$d)
                     <span class="badge badge-success" style="font-size: 15px;">{{ $driver->GetPDocs->license_expiry->format('d-M-Y') }}</span>
                    @else
                      <span class="badge badge-danger" style="font-size: 15px;">{{$driver->GetPDocs->license_expiry->format('d-M-Y')}} (Expired)</span>
                    @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Vehicle RC Expiry</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      @if($driver->GetPDocs->rc_expiry>=$d)
               <span class="badge badge-success" style="font-size: 15px;">{{ $driver->GetPDocs->rc_expiry->format('d-M-Y') }}</span>
                   @else
                  <span class="badge badge-danger" style="font-size: 15px;">{{ $driver->GetPDocs->rc_expiry->format('d-M-Y') }} (Expired)</span>
                   @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Vehicle Insurance Expiry</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                       @if($driver->GetPDocs->insurance_expiry>=$d)
                    <span class="badge badge-success" style="font-size: 15px;">{{$driver->GetPDocs->insurance_expiry->format('d-M-Y')}}</span>
                    @else
                  <span class="badge badge-danger" style="font-size: 15px;">{{$driver->GetPDocs->insurance_expiry->format('d-M-Y')}} (Expired)</span>
                    @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Pollution Certificate Expiry</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                       @if($driver->GetSDocs->pollution_expiry>=$d)
                    <span class="badge badge-success" style="font-size: 15px;">{{$driver->GetSDocs->pollution_expiry->format('d-M-Y')}}</span>
                    @else
                     <span class="badge badge-danger" style="font-size: 15px;">{{$driver->GetSDocs->pollution_expiry->format('d-M-Y')}} (Expired)</span>
                    @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Vehicle Permit Expiry</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      @if($driver->GetSDocs->permit_expiry>=$d)
                    <span class="badge badge-success" style="font-size: 15px;">{{$driver->GetSDocs->permit_expiry->format('d-M-Y')}}</span>
                    @else
                     <span class="badge badge-danger" style="font-size: 15px;">{{$driver->GetSDocs->permit_expiry->format('d-M-Y')}} (Expired)</span>
                    @endif
                    </div>
                  </div>
                  
                 
                </div>
              </div>

              


            </div>
          </div>
</body>
</html>