@extends('layouts.Admin')
@section('title')
 driver-area
  @endsection
  
@section('contents')



<style type="text/css">
  .nav-pills .nav-link.active,
.nav-pills .show > .nav-link {
  color: #fff;
  background-color: #fab60b;
}

</style>

<!-- *************************************** -->
<div class="modal" id="addreg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;overflow: auto;">
      <div class="modal-header" style="background:#fab60b;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;"><i>   Deactivate Account</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('addreg').style.display='none'"></i>


       
      </div>
      <div class="modal-body">
        <form class="edit-content" id="reject" method="post">


       
          <div class="form-group">
            <label for="reason" class="col-form-label" style="font-weight: bold;">Reason:</label>
        
            <textarea class="form-control" rows="5" id="reason" name="reason"></textarea>
            
          </div>


         
        <input type="hidden" name="bid" id="bid">
      </div>
      <div class="modal-footer" style="border:none;">
        
        <button type="button" class="btn yellowbtn" id="ab1" onclick="Save()">Submit</button>
         <button type="button"  class="btn yellowbtn" id="ab2" disabled="" > <i class="fa fa-spinner fa-spin"></i>  Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- *************************************** -->


<!-- *************************************** -->
<div class="modal" id="addphoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;overflow: auto;">
      <div class="modal-header" style="background:#fab60b;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;"><i>   Edit Photo</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('addphoto').style.display='none'"></i>


       
      </div>
      <div class="modal-body">
        <form class="edit-content" id="reject" method="post">


       
          <div class="form-group">
            <label for="reason" class="col-form-label" style="font-weight: bold;">Photo:</label>
        
           

            <input type="file" class="form-control" name="pdf_file" id="pdf_file">
            
          </div>


         
        <input type="hidden" name="bid1" id="bid1">
      </div>
      <div class="modal-footer" style="border:none;">
        
        <button type="button" class="btn yellowbtn" id="ab3" onclick="SavePhoto()">Submit</button>
         <button type="button"  class="btn yellowbtn" id="ab4" disabled="" > <i class="fa fa-spinner fa-spin"></i>  Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- *************************************** -->



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="javascript:window.open('','_self').close();"><i class="fa fa-times" aria-hidden="true"></i>  close</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" id="sect1">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-warning card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset($driver_det->photo)}}"
                       alt="User profile picture" style="width: 120px;height: 130px;">
                </div>

                <h3 class="profile-username text-center">{{$driver_det->name}}</h3>

                <p class="text-muted text-center">{{$driver_det->driver_id}}</p>


                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    @if($driver_det->status==1)
                    <b>Status</b> <a class="float-right" style="color: green;">Active</a>
                    @elseif($driver_det->status==3)
                    <b>Status</b> <a class="float-right" style="color: red;">Blocked</a>
                     @elseif($driver_det->status==4)
                    <b>Status</b> <a class="float-right" style="color: red;">Deactivated (by Division)</a>
                     @elseif($driver_det->status==5)
                    <b>Status</b> <a class="float-right" style="color: red;">Deactivated (by Self)</a>
                     @elseif($driver_det->status==6)
                    <b>Status</b> <a class="float-right" style="color: red;">Deactivated (by Admin)</a>
                     @elseif($driver_det->status==7)
                    <b>Status</b> <a class="float-right" style="color: orange;">Re-activation pending</a>
                    @endif
                  </li>
                  <li class="list-group-item">
                    <b>Division</b> <a class="float-right">{{$driver_det->GetFranchise->franchise_name}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Vehicle No.</b> <a class="float-right">{{$driver_det->GetPDocs->rc_number}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>License No.</b> <a class="float-right">{{$driver_det->GetPDocs->license_number}}</a>
                  </li>
                    @php
                $dd=date('Y-m-d');
                @endphp
                  @if($driver_det->valid_to<$dd)
                  <li class="list-group-item">
                    <b>Valid Upto</b> <span class="badge badge-danger float-right" style="font-size: 15px;">{{ $driver_det->valid_to->format('d-m-Y') }}</span>
                  </li>
                  @else
                    <li class="list-group-item">
                    <b>Valid Upto</b><a class="float-right">{{ $driver_det->valid_to->format('d-m-Y') }}</a>
                  </li>
                  @endif

                  <li class="list-group-item">
                    <b>Profile Photo</b><a class="float-right" onclick="ChangePhoto()">Edit</a>
                  </li>
                  
                </ul>

                @php
                $d=date('Y-m-d');
                @endphp
               
               
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header" style="background-color: #fab60b;color: white;">
                <h3 class="card-title">Documents Expiry Dates</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
                <ul class="list-group list-group-unbordered mb-3">
                  
               
                  <li class="list-group-item" >
                     <a href="{{asset($driver_det->GetPDocs->rc_file)}}" target="_blank" style="color: black;"> <b>RC</b>
                      @if($driver_det->GetPDocs->rc_expiry>=$d)
               <span class="badge badge-success float-right" style="font-size: 15px;">{{ $driver_det->GetPDocs->rc_expiry->format('d-m-Y') }}</span>
                   @else
                  <span class="badge badge-danger float-right" style="font-size: 15px;">{{ $driver_det->GetPDocs->rc_expiry->format('d-m-Y') }}</span>
                   @endif
                   </a>
                  </li>


                  <li class="list-group-item">
                    <a href="{{asset($driver_det->GetPDocs->license_frontfile)}}" target="_blank" style="color: black;"><b>License Frontside</b>
                    @if($driver_det->GetPDocs->license_expiry>=$d)
                     <span class="badge badge-success float-right" style="font-size: 15px;">{{ $driver_det->GetPDocs->license_expiry->format('d-m-Y') }}</span>
                    @else
                      <span class="badge badge-danger float-right" style="font-size: 15px;">{{$driver_det->GetPDocs->license_expiry->format('d-m-Y')}}</span>
                    @endif
                    </a>
                  </li>

                  <li class="list-group-item">
                    <a href="{{asset($driver_det->GetPDocs->license_backfile)}}" target="_blank" style="color: black;"><b>License Backside</b>
                   
                    </a>
                  </li>

                  <li class="list-group-item">
                     <a href="{{asset($driver_det->GetPDocs->insurance_file)}}" target="_blank" style="color: black;"><b>Insurance</b></a>
                    @if($driver_det->GetPDocs->insurance_expiry>=$d)
                    <span class="badge badge-success float-right" style="font-size: 15px;">{{$driver_det->GetPDocs->insurance_expiry->format('d-m-Y')}}</span>
                    @else
                  <span class="badge badge-danger float-right" style="font-size: 15px;">{{$driver_det->GetPDocs->insurance_expiry->format('d-m-Y')}}</span>
                    @endif
                  </li>

                  <li class="list-group-item">
                     <a href="{{asset($driver_det->GetSDocs->pollution_file)}}" target="_blank" style="color: black;"><b>Pollution</b>
                    @if($driver_det->GetSDocs->pollution_expiry>=$d)
                    <span class="badge badge-success float-right" style="font-size: 15px;">{{$driver_det->GetSDocs->pollution_expiry->format('d-m-Y')}}</span>
                    @else
                     <span class="badge badge-danger float-right" style="font-size: 15px;">{{$driver_det->GetSDocs->pollution_expiry->format('d-m-Y')}}</span>
                    @endif
                    </a>
                  </li>

                  <li class="list-group-item">
                     <a href="{{asset($driver_det->GetSDocs->permit_file)}}" target="_blank" style="color: black;"><b>Permit</b>
                    @if($driver_det->GetSDocs->permit_expiry>=$d)
                    <span class="badge badge-success float-right" style="font-size: 15px;">{{$driver_det->GetSDocs->permit_expiry->format('d-m-Y')}}</span>
                    @else
                     <span class="badge badge-danger float-right" style="font-size: 15px;">{{$driver_det->GetSDocs->permit_expiry->format('d-m-Y')}}</span>
                    @endif
                    </a>
                  </li>


                 

               @if($driver_det->status==6)
              <li class="list-group-item">
               <a class="btn btn-success btn-block" onclick="ReactivateReq()"><b>Activate Account</b></a> 
              </li>
              @else
              <li class="list-group-item">
              <a class="btn btn-danger btn-block" onclick="DeactivateReq()"><b>Deactivate Account</b></a>
              </li>
              @endif
                </ul>

             
                
              

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Vehicle Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#address" data-toggle="tab">Personal Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#acc" data-toggle="tab">Account Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#down" data-toggle="tab">Downloads</a></li>
                  <li class="nav-item"><a class="nav-link" href="#other" data-toggle="tab">Others</a></li>
                  @if($driver_det->status!=1)
                  <li class="nav-item"><a class="nav-link" href="#reasonx" data-toggle="tab">Reason</a></li>
                  @endif
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                


                  <div class="tab-pane active" id="activity">
                    <div class="post">
                      <div class="user-block">
                        <span style="font-size: 20px;font-weight:bold">Vehicle Details</span>
                          <table style="border-collapse: separate;
                          border-spacing: 0 1em;padding: 15px 15px;">
                          <tr>
                            <td style="font-weight: bold;">Vehicle Category  : </td>
                            <td style="padding: 0 15px;">{{$driver_det->GetVCategory->category}} </td>
                        </tr>
                          
                        <tr>
                            <td style="font-weight: bold;">Vehicle Type  : </td>
                            <td style="padding: 0 15px;">  {{$driver_det->GetVType->type}} </td>
                        </tr>    
                        </table>
                      </div>                    
                    </div>                  
                  </div>

                  <div class="tab-pane" id="reasonx">
                    <div class="post">
                      <div class="user-block">
                        <!-- <span style="font-size: 20px;font-weight:bold">Vehicle Details</span> -->
                          <table style="border-collapse: separate;
                          border-spacing: 0 1em;padding: 15px 15px;">
                          <tr>
                            <td style="font-weight: bold;">{{$driver_det->account_reject_reason}} </td>
                            <td style="padding: 0 15px;"> </td>
                        </tr>
                             
                        </table>
                      </div>                    
                    </div>                  
                  </div>

                  <div class="tab-pane" id="address">
                    <div class="post">
                      <div class="user-block">
                        <span style="font-size: 20px;font-weight:bold">Personal Details</span>
                          <table style="border-collapse: separate;
                          border-spacing: 0 1em;padding: 15px 15px;">
                           <tr>
                            <td style="font-weight: bold;">Blood Group  : </td>
                            <td style="padding: 0 15px;">{{$driver_det->blood_group}} </td>

                            <td style="font-weight: bold;">District  : </td>
                            <td style="padding: 0 15px;">{{$driver_det->GetDistrict->district}} </td>
                        </tr>
                          <tr>
                            <td style="font-weight: bold;">House Name : </td>
                            <td style="padding: 0 15px;">{{$driver_det->house_name}} </td>

                            <td style="font-weight: bold;">State  : </td>
                            <td style="padding: 0 15px;">{{$driver_det->GetState->state}} </td>
                        </tr>
                          
                        <tr>
                            <td style="font-weight: bold;">Location  : </td>
                            <td style="padding: 0 15px;">  {{$driver_det->location}} </td>

                            <td style="font-weight: bold;">Pincode  : </td>
                            <td style="padding: 0 15px;">{{$driver_det->pin}} </td>
                        </tr>                       
                    </table>
                      </div> 
                    </div>                   
                  </div>

                  <div class="tab-pane" id="acc">
                    <div class="post">
                      <div class="user-block">
                        <span style="font-size: 20px;font-weight:bold">Account Details</span>
                          <table style="border-collapse: separate;
                          border-spacing: 0 1em;padding: 15px 15px;">
                           <tr>
                            <td style="font-weight: bold;">Registerd Date  : </td>
                            <td style="padding: 0 15px;">{{$driver_det->created_at->format('d-m-Y')}} </td>
                            <td style="font-weight: bold;">Payment Date  : </td>
                            <td style="padding: 0 15px;">{{$driver_det->GetSDocs->payment_date->format('d-m-Y')}} </td>
                          </tr>
                           <tr>
                            <td style="font-weight: bold;">Approved Date  : </td>
                            <td style="padding: 0 15px;">{{$driver_det->approved_date->format('d-m-Y')}} </td>
                            <td style="font-weight: bold;">Amount  : </td>
                            <td style="padding: 0 15px;">Rs.{{$driver_det->GetSDocs->amount}} </td>
                             </tr>
                            
                           <tr>
                            <td style="font-weight: bold;">Valid To  : </td>
                            <td style="padding: 0 15px;">{{$driver_det->valid_to->format('d-m-Y')}} </td>
                            <td style="font-weight: bold;">Reference Id  : </td>
                            <td style="padding: 0 15px;">{{$driver_det->GetSDocs->reference_id}} </td>
                          </tr>
                         
                                                
                    </table>
                      </div> 
                    </div>                   
                  </div>

                  <div class="tab-pane" id="down">
                    <div class="post">
                      <div class="user-block">
                       

               <a class="btn btn-app" style="background-color: #754c85;color: white;" href="/girokab-admin/qrcode-generate/{{encrypt($driver_det->id)}}">
                  <span class="badge bg-info"></span>
                  <i class="fa fa-qrcode"></i> Vehicle QRCode
                </a>
               <a class="btn btn-app" style="background-color: #798b3b;color: white;" href="/girokab-admin/driver-idcard-regenerations/{{encrypt($driver_det->id)}}">
                  <span class="badge bg-info"></span>
                  <i class="fas fa-id-card"></i> Driver Id Card
                </a>
                
                
                      </div> 
                    </div>                   
                  </div>

                  <div class="tab-pane" id="other">
                    <div class="post">
                      <div class="user-block">
                       

               <a class="btn btn-app bg-primary" href="/girokab-admin/driver-renewals-history/{{encrypt($driver_det->id)}}">
                  <span class="badge bg-info"></span>
                  <i class="fas fa-calendar"></i> Previous Subscriptions
                </a>
               <a class="btn btn-app bg-warning" href="/girokab-admin/driver-documents/{{encrypt($driver_det->id)}}">
                  <span class="badge bg-info"></span>
                  <i class="fas fa-file"></i> Expired Documents
                </a>
                <a class="btn btn-app bg-danger" href="/girokab-admin/driver-profile-rejections/{{encrypt($driver_det->id)}}">
                  <span class="badge bg-teal"></span>
                  <i class="fas fa-ban"></i> Profile Rejections
                </a>

                <a class="btn btn-app" style="background-color: #782c33;color: white;" href="/girokab-admin/driver-account-deactivations/{{encrypt($driver_det->id)}}">
                  <span class="badge bg-teal"></span>
                  <i class="fa fa-power-off"></i> Deactivation History
                </a>
                <!-- <a class="btn btn-app" style="background-color: #12966f;color: white;" href="/girokab-admin/driver-idcard-regenerations/{{encrypt($driver_det->id)}}">
                  <span class="badge bg-teal"></span>
                  <i class="fa fa-id-card"></i> Driver Id card Regeneration
                </a> -->
                
                      </div> 
                    </div>                   
                  </div>




                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

<section class="content">
      <div class="container-fluid">

<div class="card">
        <div class="card-header">
          <h3 class="card-title">Rides History</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <h4 style="font-size: 17px;font-weight: bold;">Ride Details {{date('Y-M')}}</h4>
          <div class="row">
            <div class="col-12 col-md-12 col-lg-7 order-2 order-md-1" >
              <div class="row">
                <div class="col-12 col-sm-6" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/completed-driver-rides/{{encrypt($driver_det->id)}}'">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Completed Rides</span>
                      <span class="info-box-number text-center text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/rejected-driver-rides/{{encrypt($driver_det->id)}}'">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Rejected Rides</span>
                      <span class="info-box-number text-center text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-6" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/timeout-driver-rides/{{encrypt($driver_det->id)}}'">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Timeout Rides</span>
                      <span class="info-box-number text-center text-muted mb-0"></span>
                    </div>
                  </div>
                </div>
              </div>
               <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
               <h4 style="font-size: 17px;font-weight: bold;">Payment Details</h4>
         
              <div class="card card-info">
             
              <form class="form-horizontal" action="/girokab-admin/drivers-payment" method="post" target="_blank">
                @csrf
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">From *</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="dfrom" name="dfrom" placeholder="Email">
                      @error('dfrom') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">To *</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="dto" name="dto" placeholder="Password">
                         @error('dto') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div>
                  <input type="hidden" class="form-control" id="drid" name="drid" value="{{$driver_det->id}}">

                 <!--  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Driver Id *</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="drid" name="drid" placeholder="Driver Id">
                         @error('drid') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div>
 -->
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-info">Analise</button> -->
                    <button type="submit" class="btn yellowbtn float-right">View</button>
                 
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        
            </div>
            </div>
            <div class="col-12 col-md-12 col-lg-5 order-1 order-md-2">
              <!-- <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Giro Kab</h3>
              <p class="text-muted">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua.</p> -->
              
              

              <div class="card card-info">
              
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="/girokab-admin/driver-rides-history" method="post" target="_blank">
                 @csrf
                <div class="card-body">
<h4 style="font-size: 17px;font-weight: bold;">Rides Search</h4>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">From *</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="dfrom" name="dfrom" placeholder="Email">
                      @error('dfrom') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">To *</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="dto" name="dto" placeholder="Password">
                         @error('dto') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div>
                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Type *</label>
                    <div class="col-sm-10">
                    <select class="form-control" id="btype" name="btype">
                      <!-- <option value="0">Choose</option> -->
                     <!--  <option value="1">All</option> -->
                      <option value="2">Completed</option>
                      <option value="3">Rejected</option>
                      <option value="4">Cancelled</option>
                      <option value="5">Timeout</option>
                                   
                    </select>
                    </div>
                  </div>

                    <div class="form-group row">
                   
                      <input type="hidden" class="form-control" id="drid" name="drid" value="{{$driver_det->id}}">
                       <input type="hidden" class="form-control" id="did" name="did" value="{{$driver_det->driver_id}}">
                         
                    
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-info">Analise</button> -->
                    <button type="submit" class="btn yellowbtn float-right">View</button>
                 
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
         
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
        </div>
        
    </section>




          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script type="text/javascript">


    

     function ReactivateReq()
    {

       swal({
  title: "Do you want to activate this driver ?",
  text: "Ensure that the driver is fit for service.",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
    if (willDelete) {

$('#sect1').css({ 'opacity' : 0.1 });

      data = new FormData();
     
  data.append('did','{{$driver_det->id}}');
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/girokab-admin/activate-driver",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
           $('#sect1').css({ 'opacity' : 1 });
               $('#bt6').hide();
      $('#bt5').show();
               swal({
                       title: "Driver activated successfully",
                       closeOnClickOutside: false,
                       icon: "success",
                      buttons: "Ok",
                    })
    
                     .then((willDelete) => {
                      if (willDelete) {
                       window.location.href=window.location.href;
                               } 
    
                    });
          }

        }
    
    
    
    
      })
    
    
    }
    
  
});
    
    
    } 



function DeactivateReq()
{
 
  
var modal1 = document.getElementById("addreg");

modal1.style.display = "block";

}


function Save()
{


  var reason=$('#reason').val();

  if(reason=='')
  {
    $('#reason').css('border','1px solid red');
    
    return false;
  }
  else
    $('#reason').css('border','1px solid #CCC');

    var driverid='{{$driver_det->id}}';

    data = new FormData();
data.append('reason', reason);
   data.append('did', driverid);
 data.append('_token', @json(csrf_token()));

$('#ab1').hide();
$('#ab2').show();

$('#sect1').css({ 'opacity' : 0.1 });
  $.ajax({

    type:"POST",
    url:"/girokab-admin/deactivate-driver",
    data:data,
    dataType:"json",
    contentType: false,
   //cache: false,
   processData: false,

    success:function(data)
    {
      if(data['success'])
      {
        $('#ab2').hide();
        $('#ab1').show();
         
$('#sect1').css({ 'opacity' : 1 });
          swal({
                              title: "Driver account deactivated successfully.",
                              //text: "Username and Password send to your Email",
                              icon: "success",
                              buttons: "Ok",
                               closeOnClickOutside: false
  
                            })

                      .then((willDelete) => {
                       if (willDelete) {
                             window.location.href=window.location.href;
                                  } 

                            });
                                 
      }
      
      

    }




  })


}




function ChangePhoto()
{
 
  
var modal11 = document.getElementById("addphoto");

modal11.style.display = "block";

}
 
  
function SavePhoto()
{


  var img=$('#pdf_file').val();

  if(img=='')
  {
    alert('Please add photo');
    
    return false;
  }
  else

    var driverid='{{$driver_det->id}}';

    data = new FormData();
 data.append('img', $('#pdf_file')[0].files[0]);
   data.append('did', driverid);
 data.append('_token', @json(csrf_token()));

$('#ab3').hide();
$('#ab4').show();

$('#sect1').css({ 'opacity' : 0.1 });
  $.ajax({

    type:"POST",
    url:"/girokab-admin/driver-photochange",
    data:data,
    dataType:"json",
    contentType: false,
   //cache: false,
   processData: false,

    success:function(data)
    {
      if(data['success'])
      {
        $('#ab2').hide();
        $('#ab1').show();
         
$('#sect1').css({ 'opacity' : 1 });
          swal({
                              title: "Driver photo changed successfully.",
                              //text: "Username and Password send to your Email",
                              icon: "success",
                              buttons: "Ok",
                               closeOnClickOutside: false
  
                            })

                      .then((willDelete) => {
                       if (willDelete) {
                             window.location.href=window.location.href;
                                  } 

                            });
                                 
      }
      
      

    }




  })


}

    
  function Abc()
  {
                  var name = document.getElementById("pdf_file").files[0].name;
  //alert(name)
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  //if(jQuery.inArray(ext, ['gif','png','jpg','jpeg','pdf']) == -1)
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)

  {
   alert("Invalid File.");
   $('input#pdf_file').val("");
   return false;
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("pdf_file").files[0]);
  var f = document.getElementById("pdf_file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 6000000)
  {
   alert("File Size is very big");
   $('input#pdf_file').val("");
   return false;
  }

  
}
    
  </script>
  @endsection