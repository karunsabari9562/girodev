 @extends('layouts.Franchise')
@section('title')
 driver-approval
  @endsection
 
@section('contents')





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Driver Approval</h1>
          </div>
          <div class="col-sm-6 d-none d-sm-block">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/franchise-division/driver-approval-pending"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content pb-3">
      <div class="container-fluid h-100">

      <!--   /////////////////////// -->


<!-- ////////////// -->

         <div class="card card-row card-primary">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Approval Status
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">
     
              <div class="card-header" style="cursor: pointer;background-color: #dee2e6;" onclick="Step1()" id="bg1">
                <h7 class="card-title">Personal Details</h7>
                <div class="card-tools">
                  @if($driver_det->profile_approval_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                  @elseif($driver_det->profile_approval_status==2)
                   <a class="btn btn-tool" style="color: red;">Rejected</a>
                   @else
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif
                  
                </div>
              </div>
              <div class="card-header" style="cursor: pointer;" onclick="Step2()" id="bg2">
                <h5 class="card-title">Vehicle Details</h5>
                <div class="card-tools">
                   @if($driver_det->vehicle_approval_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                  @elseif($driver_det->vehicle_approval_status==2)
                   <a class="btn btn-tool" style="color: red;">Rejected</a>
                   @else
                 
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif
                  
                </div>
              </div>
              <div class="card-header" style="cursor: pointer;" onclick="Step3()" id="bg3">
                <h5 class="card-title">Driving License Frontside</h5>
                <div class="card-tools">
                  @if($driver_det->GetPDocs->licensefront_approval_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                      @elseif($driver_det->GetPDocs->licensefront_approval_status==2)
                   <a class="btn btn-tool" style="color: red;">Rejected</a>
                  @else
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif
                  
                </div>
              </div>
              <div class="card-header" style="cursor: pointer;" onclick="Step33()" id="bg33">
                <h5 class="card-title">Driving License Backside</h5>
                <div class="card-tools">
                  @if($driver_det->GetPDocs->licenseback_approval_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                      @elseif($driver_det->GetPDocs->licenseback_approval_status==2)
                   <a class="btn btn-tool" style="color: red;">Rejected</a>
                  @else
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif
                  
                </div>
              </div>
              <div class="card-header" style="cursor: pointer;" onclick="Step4()" id="bg4">
                <h5 class="card-title">Registration Certificate</h5>
                <div class="card-tools">
                   @if($driver_det->GetPDocs->rc_approval_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                  @elseif($driver_det->GetPDocs->rc_approval_status==2)
                   <a class="btn btn-tool" style="color: red;">Rejected</a>
                  @else
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif
                  
                </div>
              </div>
              <div class="card-header" style="cursor: pointer;" onclick="Step5()" id="bg5">
                <h5 class="card-title">Vehicle Insurance</h5>
                <div class="card-tools">
                   @if($driver_det->GetPDocs->insurance_approval_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                  @elseif($driver_det->GetPDocs->insurance_approval_status==2)
                   <a class="btn btn-tool" style="color: red;">Rejected</a>
                  @else
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif
                  
                </div>
              </div>

               <div class="card-header" style="cursor: pointer;" onclick="Step6()" id="bg6">
                <h5 class="card-title">Pollution Certificate</h5>
                <div class="card-tools">
                   @if($driver_det->GetSDocs->pollution_approval_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                  @elseif($driver_det->GetSDocs->pollution_approval_status==2)
                   <a class="btn btn-tool" style="color: red;">Rejected</a>
                  @else
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif
                  
                </div>
              </div>

               <div class="card-header" style="cursor: pointer;" onclick="Step7()" id="bg7">
                <h5 class="card-title">Vehicle Permit</h5>
                <div class="card-tools">
                   @if($driver_det->GetSDocs->permit_approval_status==1)
                  <a class="btn btn-tool" style="color: black;"><i class="fa fa-check" style="color: green;"></i></a>
                  @elseif($driver_det->GetSDocs->permit_approval_status==2)
                   <a class="btn btn-tool" style="color: red;">Rejected</a>
                  @else
                   <a class="btn btn-tool" style="color: orange;">Pending..</a>
                  @endif
                  
                </div>
              </div>

            </div>
            @if($driver_det->profile_approval_status==1 && $driver_det->vehicle_approval_status==1 && $driver_det->GetPDocs->licensefront_approval_status==1 && $driver_det->GetPDocs->licenseback_approval_status==1 && $driver_det->GetPDocs->rc_approval_status==1 && $driver_det->GetPDocs->insurance_approval_status==1 && $driver_det->GetSDocs->pollution_approval_status==1 && $driver_det->GetSDocs->permit_approval_status==1 && $driver_det->GetSDocs->payment_status==1)
                 <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" onclick="SendForApproval()" id="bbtt">  Send for <br>Approval</button></h5>
                  @else
                    <h5 class="card-title"><button type="button" class="btn" value="Submit" disabled="" id="bbtt1" style="background-color: grey;">  Send for <br>Approval</button></h5>
                  @endif
               
                
                  @if($driver_det->profile_approval_status==2 || $driver_det->vehicle_approval_status==2 || $driver_det->GetPDocs->licensefront_approval_status==2 || $driver_det->GetPDocs->licenseback_approval_status==2 ||  
                  $driver_det->GetPDocs->rc_approval_status==2 || $driver_det->GetPDocs->insurance_approval_status==2 || $driver_det->GetSDocs->pollution_approval_status==2 || $driver_det->GetSDocs->permit_approval_status==2 ||$driver_det->GetSDocs->payment_status==2)
                <button type="button" class="btn redbtn" value="Submit" onclick="RejectResubmit()" id="btt" style="float: right;">  Reject for<br> Resubmission</button>
                @else
                 <button type="button" class="btn redbtn" value="Submit" disabled="" id="btt1" style="background-color: grey;float: right;border-color: grey;">  Reject for<br> Resubmission</button>
                @endif
          </div>
        </div>

<!-- ////////////////////////////////////////////////// -->

       <div class="card card-row card-primary" id="st11">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Personal Details
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">
              <center>
              <div class="card-header">
                   <a href="{{asset($driver_det->photo)}}" target="_blank" class="nav-link"><img src="{{ asset($driver_det->photo)}}" alt="User Image" style="width: 50%;border-radius: 5px;"></a>
              </div>
              </center>


              <div class="card-header">
                <h5 class="card-title">Name :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;font-size: 17px;font-weight: bold;">{{$driver_det->name}}</a>
                  
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">Mobile :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->mobile}}</a>
                
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">Registered At :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{ $driver_det->created_at->format('d-m-Y') }}</a>
                  
                </div>
              </div>

            </div>
          </div>
        </div>




         <div class="card card-row card-primary" id="st1">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Personal Details
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">
              
              <div class="card-header">
                <h5 class="card-title">Blood Group :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->blood_group}}</a>
                  
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">House Name :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->house_name}}</a>
                
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">Location :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->location}}</a>
                  
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">District :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->GetDistrict->district}}</a>
                  
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">State :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->GetState->state}}</a>
                  
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">Pin Code :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->pin}}</a>
                  
                </div>
              </div>
              <br>
<h5 class="card-title">Reject if ,</h5>
           <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="e1" value="Invalid Profile photo">
                  <label for="e1" class="custom-control-label">Invalid Profile photo</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="e2" value="Invalid House name">
                  <label for="e2" class="custom-control-label">Invalid House name</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="e3" value="Invalid Location">
                  <label for="e3" class="custom-control-label">Invalid Location</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="e4" value="Invalid Pincode">
                  <label for="e4" class="custom-control-label">Invalid Pincode</label>
                </div>
                
              </div>

              <div class="card-header">
                 @if($driver_det->profile_approval_status==1)
                  <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" disabled="" id="renewbt1"><i class="fa fa-check"></i>  Approved</button></h5>
                  @else
                    <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" onclick="ApprovePdetails()" id="renewbt1">  Approve</button></h5>
                  @endif
               
                

                <button type="button" class="btn redbtn" value="Submit" onclick="Reject1()" id="bt0" style="float: right;">  Reject</button>
                 <button type="button" class="btn redbtn" value="Submit" disabled="" id="bt01" style="float: right;">  Reject</button>
              </div>
              
               


            </div>
          </div>
        </div>



<!-- ////////////////////////////////////////////////// -->

<div class="card card-row card-primary" id="st2">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Vehicle Details
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">
             
              <div class="card-header">
                <h5 class="card-title">Categroy :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->GetVcategory->category}}</a>
                  
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">Type :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$driver_det->GetVtype->type}}</a>
                
                </div>
              </div>

               <!-- <div class="card-header">
                <h5 class="card-title">Model :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;"></a>
                  
                </div>
              </div> -->
<br>
               <h5 class="card-title">Reject if ,</h5>
           <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="a1" value="Invalid Vehicle Category">
                  <label for="a1" class="custom-control-label">Invalid Vehicle Category</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="a2" value="Invalid Vehicle Type">
                  <label for="a2" class="custom-control-label">Invalid Vehicle Type</label>
                </div>
                <!-- <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="a3" value="Invalid Vehicle Model">
                  <label for="a3" class="custom-control-label">Invalid Vehicle Model</label>
                </div> -->
              
                
              </div>

             <div class="card-header">
                @if($driver_det->vehicle_approval_status==1)
                  <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" disabled="" id="renewbt1"><i class="fa fa-check"></i>  Approved</button></h5>
                  @else
                    <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" onclick="ApproveVdetails()" id="renewbt1">  Approve</button></h5>
                  @endif
                
                 
                <button type="button" class="btn redbtn" value="Submit" onclick="Reject2()" id="bt1" style="float: right;">  Reject</button>
                 <button type="button" class="btn redbtn" value="Submit" disabled="" id="bt2" style="float: right;">  Reject</button>
               
              </div>



            </div>
          </div>
        </div>


<!-- ////////////////////////////////////////////////// -->

<div class="card card-row card-primary" id="st3">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Driving License FrontSide
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">

              <center>
                <div class="card-header">
                   <a href="{{asset($driver_det->GetPDocs->license_frontfile)}}" target="_blank" class="nav-link"><img src="{{ asset('default/file.png')}}" alt="User Image" style="width: 50%;border-radius: 10px;"></a>
              </div>
             </center>
              <div class="card-header">
                <h5 class="card-title">No. :</h5>
                <div class="card-tools">
                 
                 <input type="text" class="form-control" name="dlnum" id="dlnum" value="{{$driver_det->GetPDocs->license_number}}">
                  
                </div>
              </div>

               <div class="card-header">
                <h5 class="card-title">Expiry :</h5>
                <div class="card-tools">
                  @if($driver_det->GetPDocs->license_expiry!='')
            <input type="date" class="form-control" name="dlexpiry" id="dlexpiry" value="{{ $driver_det->GetPDocs->license_expiry->format('Y-m-d') }}" min="{{date('Y-m-d')}}">
            @else
            <input type="date" class="form-control" name="dlexpiry" id="dlexpiry" min="{{date('Y-m-d')}}">
            @endif
                
                </div>
              </div>

              <br>
               <h5 class="card-title">Reject if ,</h5>
           <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="b1" value="Invalid Driving License (Frontside)">
                  <label for="b1" class="custom-control-label">Invalid Driving License (Frontside)</label>
                </div>
              
              
                
              </div>



              <div class="card-header">
             @if($driver_det->GetPDocs->licensefront_approval_status==1)
                  <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" disabled="" id="renewbt1"><i class="fa fa-check"></i>  Approved</button></h5>
                  @else
                    <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" onclick="Approvedlfrontdetails()" id="renewbt1">  Approve</button></h5>
                  @endif
                

                    <button type="button" class="btn redbtn" value="Submit" onclick="Reject3()" id="bt3" style="float: right;">  Reject</button>
                 <button type="button" class="btn redbtn" value="Submit" disabled="" id="bt4" style="float: right;">  Reject</button>
              </div>

              



            </div>
          </div>
        </div>
<!-- ////////////////////////////////////////////////// -->
        <div class="card card-row card-primary" id="st33">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Driving License BackSide
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">

              <center>
                <div class="card-header">
                   <a href="{{asset($driver_det->GetPDocs->license_backfile)}}" target="_blank" class="nav-link"><img src="{{ asset('default/file.png')}}" alt="User Image" style="width: 50%;border-radius: 10px;"></a>
              </div>
             </center>
             

              <br>
               <h5 class="card-title">Reject if ,</h5>
           <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="bb1" value="Invalid Driving License (Backside)">
                  <label for="bb1" class="custom-control-label">Invalid Driving License (Backside)</label>
                </div>
              
              
                
              </div>



              <div class="card-header">
             @if($driver_det->GetPDocs->licenseback_approval_status==1)
                  <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" disabled="" id="renewbt1"><i class="fa fa-check"></i>  Approved</button></h5>
                  @else
                    <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" onclick="Approvedlbackdetails()" id="renewbt1">  Approve</button></h5>
                  @endif
                

                    <button type="button" class="btn redbtn" value="Submit" onclick="Reject33()" id="bbt3" style="float: right;">  Reject</button>
                 <button type="button" class="btn redbtn" value="Submit" disabled="" id="bbt4" style="float: right;">  Reject</button>
              </div>

              



            </div>
          </div>
        </div>


<!-- ////////////////////////////////////////////////// -->

 <div class="card card-row card-primary" id="st4">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Registration Certificate
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">

                <center>
                <div class="card-header">
                   <a href="{{asset($driver_det->GetPDocs->rc_file)}}" target="_blank" class="nav-link"><img src="{{ asset('default/file.png')}}"  alt="User Image" style="width: 50%;border-radius: 10px;"></a>
              </div>
             </center>
             
              <div class="card-header">
                <h5 class="card-title">No. :</h5>
                <div class="card-tools">
                 
                 <input type="text" class="form-control" name="rcnum" id="rcnum" value="{{ $driver_det->GetPDocs->rc_number}}">
                  
                </div>
              </div>

              

               <div class="card-header">
                <h5 class="card-title">Expiry :</h5>

                <div class="card-tools">
                  @if($driver_det->GetPDocs->rc_expiry!='')
                         <input type="date" class="form-control" name="rcexpiry" id="rcexpiry" value="{{$driver_det->GetPDocs->rc_expiry->format('Y-m-d')}}" min="{{date('Y-m-d')}}">
                         @else
          <input type="date" class="form-control" name="rcexpiry" id="rcexpiry" min="{{date('Y-m-d')}}">
            @endif
                
                </div>
              </div>

              <br>
               <h5 class="card-title">Reject if ,</h5>
           <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="c1" value="Invalid RC">
                  <label for="c1" class="custom-control-label">Invalid RC</label>
                </div>
              
              
                
              </div>

             <div class="card-header">
                 @if($driver_det->GetPDocs->rc_approval_status==1)
                  <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" disabled="" id="renewbt1" ><i class="fa fa-check"></i>  Approved</button></h5>
                  @else
                    <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" onclick="Approvercdetails()" id="renewbt1">  Approve</button></h5>
                  @endif
                

                    <button type="button" class="btn redbtn" value="Submit" onclick="Reject4()" id="bt5" style="float: right;">  Reject</button>
                 <button type="button" class="btn redbtn" value="Submit" disabled="" id="bt6" style="float: right;">  Reject</button>
              </div>



            </div>
          </div>
        </div>



<!-- ////////////////////////////////////////////////// -->

 <div class="card card-row card-primary" id="st5">
          <div class="card-header"style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Vehicle Insurance
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">

                <center>
                <div class="card-header">
                   <a href="{{asset($driver_det->GetPDocs->insurance_file)}}" target="_blank" class="nav-link"><img src="{{ asset('default/file.png')}}" alt="User Image" style="width: 50%;border-radius: 10px;"></a>
              </div>
             </center>
             

               <div class="card-header">
                <h5 class="card-title">Expiry :</h5>
                <div class="card-tools">

                 
             @if($driver_det->GetPDocs->insurance_expiry!='')
                         <input type="date" class="form-control" name="inexpiry" id="inexpiry" value="{{$driver_det->GetPDocs->insurance_expiry->format('Y-m-d')}}" min="{{date('Y-m-d')}}">
                         @else
              <input type="date" class="form-control" name="inexpiry" id="inexpiry" min="{{date('Y-m-d')}}">
            @endif
                
                </div>
              </div>

              <br>
               <h5 class="card-title">Reject if ,</h5>
           <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="d1" value="Invalid Vehicle Insurance">
                  <label for="d1" class="custom-control-label">Invalid Vehicle Insurance</label>
                </div>
              
              
                
              </div>

            <div class="card-header">
               @if($driver_det->GetPDocs->insurance_approval_status==1)
                  <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" disabled="" id="renewbt1"><i class="fa fa-check"></i>  Approved</button></h5>
                  @else
                    <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" onclick="Approveinsdetails()" id="renewbt1">  Approve</button></h5>
                  @endif
                

                    <button type="button" class="btn redbtn" value="Submit" onclick="Reject5()" id="bt7" style="float: right;">  Reject</button>
                 <button type="button" class="btn redbtn" value="Submit" disabled="" id="bt8" style="float: right;">  Reject</button>
              </div>



            </div>
          </div>
        </div>

        

<!-- ////////////////////////////////////////////////// -->

<div class="card card-row" id="st6">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Pollution Certificate
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">

                <center>
                <div class="card-header">
                   <a href="{{asset($driver_det->GetSDocs->pollution_file)}}" target="_blank" class="nav-link"><img src="{{ asset('default/file.png')}}" alt="User Image" style="width: 50%;border-radius: 10px;"></a>
              </div>
             </center>
             

               <div class="card-header">
                <h5 class="card-title">Expiry :</h5>
                <div class="card-tools">

                 
              @if($driver_det->GetSDocs->pollution_expiry!='')
                         <input type="date" class="form-control"  name="plexpiry" id="plexpiry" value="{{$driver_det->GetSDocs->pollution_expiry->format('Y-m-d')}}" min="{{date('Y-m-d')}}">
                         @else
            <input type="date" class="form-control"  name="plexpiry" id="plexpiry" min="{{date('Y-m-d')}}">
            @endif
                
                </div>
              </div>
              <br>
               <h5 class="card-title">Reject if ,</h5>
           <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="f1" value="Invalid Pollution Certificate">
                  <label for="f1" class="custom-control-label">Invalid Pollution Certificate</label>
                </div>
              
              
                
              </div>
<div class="card-header">
                @if($driver_det->GetSDocs->pollution_approval_status==1)
                  <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" disabled="" id="renewbt1"><i class="fa fa-check"></i>  Approved</button></h5>
                  @else
                    <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" onclick="Approvepldetails()" id="renewbt1">  Approve</button></h5>
                  @endif
                

                   <button type="button" class="btn redbtn" value="Submit" onclick="Reject6()" id="bt9" style="float: right;">  Reject</button>
                 <button type="button" class="btn redbtn" value="Submit" disabled="" id="bt10" style="float: right;">  Reject</button>
              </div>



            </div>
          </div>
        </div>



<!-- ////////////////////////////////////////////////// -->

<!-- ////////////////////////////////////////////////// -->

<div class="card card-row" id="st7">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Vehicle Permit
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">

                <center>
                <div class="card-header">
                   <a href="{{asset($driver_det->GetSDocs->permit_file)}}" target="_blank" class="nav-link"><img src="{{ asset('default/file.png')}}" alt="User Image" style="width: 50%;border-radius: 10px;"></a>
              </div>
             </center>
             

               <div class="card-header">
                <h5 class="card-title">Expiry :</h5>
                <div class="card-tools">
                 
             @if($driver_det->GetSDocs->permit_expiry!='')
                         <input type="date" class="form-control"  name="prexpiry" id="prexpiry" value="{{$driver_det->GetSDocs->permit_expiry->format('Y-m-d')}}" min="{{date('Y-m-d')}}">
                         @else
           <input type="date" class="form-control"  name="prexpiry" id="prexpiry" min="{{date('Y-m-d')}}">
            @endif
                
                </div>
              </div>
              <br>
               <h5 class="card-title">Reject if ,</h5>
           <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="g1" value="Invalid Vehicle Permit">
                  <label for="g1" class="custom-control-label">Invalid Vehicle Permit</label>
                </div>
              
              
                
              </div>
<div class="card-header">
                @if($driver_det->GetSDocs->permit_approval_status==1)
                  <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" disabled="" id="renewbt1"><i class="fa fa-check"></i>  Approved</button></h5>
                  @else
                    <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" onclick="Approveprdetails()" id="renewbt1">  Approve</button></h5>
                  @endif
                

                   <button type="button" class="btn redbtn" value="Submit" onclick="Reject7()" id="bt11" style="float: right;">  Reject</button>
                 <button type="button" class="btn redbtn" value="Submit" disabled="" id="bt12" style="float: right;">  Reject</button>
              </div>



            </div>
          </div>
        </div>



<!-- ////////////////////////////////////////////////// -->
      
<div class="card card-row card-primary" id="rej1">
          <div class="card-header" style="background-color: #c70000;color: white;">
            <h3 class="card-title">
              Rejection History
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">
             
              @if(!$driver_rej->isEmpty())

             
             @foreach($driver_rej as $dj)
             @php
             $rejdt = date("d-m-Y", strtotime($dj->rejected_date));
             @endphp
              <div class="card-header">
                <h5 class="card-title"><i class="fa fa-exclamation-circle" style="color:#c70000 "></i>    {{$dj->rejection_reason}}</h5>
                @if($dj->rejected_by==2)
                <br><span style="font-size: 13px;">(By Admin)</span>
                @endif
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$rejdt}}</a>
                  
                </div>
              </div>
              @endforeach
               @else
               <div class="card-header">
                <h5 class="card-title"> No data found !</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;"></a>
                  
                </div>
              </div>
               @endif

            </div>
          </div>
        </div>


      
        
      </div>
    </section><br><br>
  </div>

  <script type="text/javascript">

 function SendForApproval()
    {

       swal({
  title: "Do you want to send this profile for admin approval ?",
  text: "Ensure that the driver profile details validated thoroughly.",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

      
     $('#bbtt').hide();
      $('#bbtt1').show();

      data = new FormData();

  data.append('did','{{$driver_det->id}}');
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/send-for-approval",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
           
               $('#bbtt1').hide();
      $('#bbtt').show();
               swal({
                       title: "Profile sent for admin approval successfully",
                      //text: "This profile moved to submission pending list .",
                       closeOnClickOutside: false,
                       icon: "success",
                      buttons: "Ok",
                    })
    
                     .then((willDelete) => {
                      if (willDelete) {
                       window.location.href='/franchise-division/driver-approval-pending';
                               } 
    
                    });
          }

        }
    
    
    
    
      })
    
    
    
    } 
  
});
    
    
    } 

    function RejectResubmit()
    {

       swal({
  title: "Do you want to reject this profile for resubmission ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

      
     $('#btt').hide();
      $('#btt1').show();

      data = new FormData();

  data.append('did','{{$driver_det->id}}');
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/reject-for-resubmission",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
           
               $('#bt6').hide();
      $('#bt5').show();
               swal({
                       title: "Profile rejected successfully",
                      text: "This profile moved to submission pending list .",
                       closeOnClickOutside: false,
                       icon: "success",
                      buttons: "Ok",
                    })
    
                     .then((willDelete) => {
                      if (willDelete) {
                       window.location.href='/franchise-division/driver-approval-pending';
                               } 
    
                    });
          }

        }
    
    
    
    
      })
    
    
    
    } 
  
});
    
    
    } 


    function Reject7()
    {

       swal({
  title: "Do you want to reject Vehicle Permit ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

     var cnt=0;
      if($("#g1").prop('checked') == true)
      {
        var err1=$("#g1").val();

        var cnt=cnt+1;
      }
      else
      {
        var err1=0;
      }


      
    if(cnt==0)
    {
       swal({
                       title: "Please select reason for rejection",
                       closeOnClickOutside: false,
                       icon: "error",
                      buttons: "Ok",
                    });
      return false;
    }
    else
      
     $('#bt11').hide();
      $('#bt12').show();

      data = new FormData();
     
  data.append('err1', err1);
  data.append('did','{{$driver_det->id}}');
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/reject-prdet",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
           
               $('#bt12').hide();
      $('#bt11').show();
               swal({
                       title: "Vehicle permit rejected successfully",
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


function Reject6()
    {

       swal({
  title: "Do you want to reject Pollution Certificate ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

     var cnt=0;
      if($("#f1").prop('checked') == true)
      {
        var err1=$("#f1").val();

        var cnt=cnt+1;
      }
      else
      {
        var err1=0;
      }


      
    if(cnt==0)
    {
       swal({
                       title: "Please select reason for rejection",
                       closeOnClickOutside: false,
                       icon: "error",
                      buttons: "Ok",
                    });
      return false;
    }
    else
      
     $('#bt9').hide();
      $('#bt10').show();

      data = new FormData();
     
  data.append('err1', err1);
  data.append('did','{{$driver_det->id}}');
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/reject-pldet",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
           
               $('#bt6').hide();
      $('#bt5').show();
               swal({
                       title: "Pollution certificate rejected successfully",
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


function Reject5()
    {

       swal({
  title: "Do you want to reject Insurance Certificate ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

     var cnt=0;
      if($("#d1").prop('checked') == true)
      {
        var err1=$("#d1").val();

        var cnt=cnt+1;
      }
      else
      {
        var err1=0;
      }


      
    if(cnt==0)
    {
       swal({
                       title: "Please select reason for rejection",
                       closeOnClickOutside: false,
                       icon: "error",
                      buttons: "Ok",
                    });
      return false;
    }
    else
      
     $('#bt7').hide();
      $('#bt8').show();

      data = new FormData();
     
  data.append('err1', err1);
  data.append('did','{{$driver_det->id}}');
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/reject-indet",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
           
               $('#bt6').hide();
      $('#bt5').show();
               swal({
                       title: "Insurance certificate rejected successfully",
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


function Reject4()
    {

       swal({
  title: "Do you want to reject RC ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

     var cnt=0;
      if($("#c1").prop('checked') == true)
      {
        var err1=$("#c1").val();

        var cnt=cnt+1;
      }
      else
      {
        var err1=0;
      }


      
    if(cnt==0)
    {
       swal({
                       title: "Please select reason for rejection",
                       closeOnClickOutside: false,
                       icon: "error",
                      buttons: "Ok",
                    });
      return false;
    }
    else
      
     $('#bt5').hide();
      $('#bt6').show();

      data = new FormData();
     
  data.append('err1', err1);
  data.append('did','{{$driver_det->id}}');
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/reject-rcdet",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
           
               $('#bt6').hide();
      $('#bt5').show();
               swal({
                       title: "RC rejected successfully",
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


    function Reject33()
    {

       swal({
  title: "Do you want to reject Driving License (Backside)  ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

     var cnt=0;
      if($("#bb1").prop('checked') == true)
      {
        var err1=$("#bb1").val();

        var cnt=cnt+1;
      }
      else
      {
        var err1=0;
      }


      
    if(cnt==0)
    {
       swal({
                       title: "Please select reason for rejection",
                       closeOnClickOutside: false,
                       icon: "error",
                      buttons: "Ok",
                    });
      return false;
    }
    else
      
     $('#bt3').hide();
      $('#bt4').show();

      data = new FormData();
     
  data.append('err1', err1);
  data.append('did','{{$driver_det->id}}');
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/reject-lsdetback",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
           
               $('#bt4').hide();
      $('#bt3').show();
               swal({
                       title: "Driving License (Backside) rejected successfully",
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


    function Reject3()
    {

       swal({
  title: "Do you want to reject Driving License (Frontside)  ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

     var cnt=0;
      if($("#b1").prop('checked') == true)
      {
        var err1=$("#b1").val();

        var cnt=cnt+1;
      }
      else
      {
        var err1=0;
      }


      
    if(cnt==0)
    {
       swal({
                       title: "Please select reason for rejection",
                       closeOnClickOutside: false,
                       icon: "error",
                      buttons: "Ok",
                    });
      return false;
    }
    else
      
     $('#bt3').hide();
      $('#bt4').show();

      data = new FormData();
     
  data.append('err1', err1);
  data.append('did','{{$driver_det->id}}');
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/reject-lsdet",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
           
               $('#bt4').hide();
      $('#bt3').show();
               swal({
                       title: "Driving License (Frontside) rejected successfully",
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


function Reject2()
    {

       swal({
  title: "Do you want to reject vehicle details ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

     var cnt=0;
      if($("#a1").prop('checked') == true)
      {
        var err1=$("#a1").val();

        var cnt=cnt+1;
      }
      else
      {
        var err1=0;
      }

      if($("#a2").prop('checked') == true)
      {
        var err2=$("#a2").val();

        var cnt=cnt+1;
      }
      else
      {
        var err2=0;
      }

      if($("#a3").prop('checked') == true)
      {
        var err3=$("#a3").val();

        var cnt=cnt+1;
      }
      else
      {
        var err3=0;
      }

      
    if(cnt==0)
    {
       swal({
                       title: "Please select one reason for rejection",
                       closeOnClickOutside: false,
                       icon: "error",
                      buttons: "Ok",
                    });
      return false;
    }
    else
      
     $('#bt1').hide();
      $('#bt2').show();

      data = new FormData();
     
  data.append('err1', err1);
  data.append('err2', err2);
  data.append('err3', err3);
  data.append('did','{{$driver_det->id}}');
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/reject-vdet",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
           
               $('#bt2').hide();
      $('#bt1').show();
               swal({
                       title: "Vehicle details rejected successfully",
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


 function Reject1()
    {

       swal({
  title: "Do you want to reject personal details ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

     var cnt=0;
      if($("#e1").prop('checked') == true)
      {
        var err1=$("#e1").val();

        var cnt=cnt+1;
      }
      else
      {
        var err1=0;
      }

      if($("#e2").prop('checked') == true)
      {
        var err2=$("#e2").val();

        var cnt=cnt+1;
      }
      else
      {
        var err2=0;
      }

      if($("#e3").prop('checked') == true)
      {
        var err3=$("#e3").val();

        var cnt=cnt+1;
      }
      else
      {
        var err3=0;
      }

      if($("#e4").prop('checked') == true)
      {
        var err4=$("#e4").val();

        var cnt=cnt+1;
      }
      else
      {
        var err4=0;
      }
    
      
    if(cnt==0)
    {
       swal({
                       title: "Please select one reason for rejection",
                       closeOnClickOutside: false,
                       icon: "error",
                      buttons: "Ok",
                    });
      return false;
    }
    else
      
     $('#bt0').hide();
      $('#bt01').show();

      data = new FormData();
     
  data.append('err1', err1);
  data.append('err2', err2);
  data.append('err3', err3);
  data.append('err4', err4);
  data.append('did','{{$driver_det->id}}');
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/reject-pdet",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
           
               $('#bt01').hide();
      $('#bt0').show();
               swal({
                       title: "Personal details rejected successfully",
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










    
function ApprovePdetails()
    {
    
  
 swal({
  title: "Do you want to approve personal details ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body='{{$driver_det->id}}';




$.ajax({

              type:"POST",
              url:'/approve-pdet',
              data: {
        _token: @json(csrf_token()),
        body: body
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       swal({
                              title: "Personal details approved successfully.",
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
  
});

}


function ApproveVdetails()
    {
    
  
 swal({
  title: "Do you want to approve vehicle details ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body='{{$driver_det->id}}';




$.ajax({

              type:"POST",
              url:'/approve-vdet',
              data: {
        _token: @json(csrf_token()),
        body: body
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       swal({
                              title: "Vehicle details approved successfully.",
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
  
});

}

function Approvedlfrontdetails()
    {
    
var dlnum=$('input#dlnum').val();
    if(dlnum=='')
    {
        $('#dlnum').focus();
        $('#dlnum').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#dlnum').css({'border':'1px solid #CCC'});

        var dlexpiry=$('input#dlexpiry').val();
    if(dlexpiry=='')
    {
        $('#dlexpiry').focus();
        $('#dlexpiry').css({'border':'1px solid red'});
        return false;
    }
    else
        $('#dlexpiry').css({'border':'1px solid #CCC'});
  
 swal({
  title: "Do you want to approve driving license (Frontside) ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body='{{$driver_det->id}}';




$.ajax({

              type:"POST",
              url:'/approve-dldet',
              data: {
        _token: @json(csrf_token()),
        body: body,
        dlnum:dlnum,
        dlexpiry:dlexpiry
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       swal({
                              title: "Driving license (Frontside) approved successfully.",
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
  
});

}

function Approvedlbackdetails()
    {
    
 
 swal({
  title: "Do you want to approve driving license (Backside) ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body='{{$driver_det->id}}';




$.ajax({

              type:"POST",
              url:'/approve-dldetback',
              data: {
        _token: @json(csrf_token()),
        body: body
     
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       swal({
                              title: "Driving license (Backside) approved successfully.",
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
  
});

}

function Approvercdetails()
    {
    
var rcnum=$('input#rcnum').val();
    if(rcnum=='')
    {
        $('#rcnum').focus();
        $('#rcnum').css({'border':'1px solid red'});
        return false;
    }
    else
  
    $('#rcnum').css({'border':'1px solid #CCC'});

        var rcexpiry=$('input#rcexpiry').val();
    if(rcexpiry=='')
    {
        $('#rcexpiry').focus();
        $('#rcexpiry').css({'border':'1px solid red'});
        return false;
    }
    else
        $('#rcexpiry').css({'border':'1px solid #CCC'});
  
 swal({
  title: "Do you want to approve RC ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body='{{$driver_det->id}}';




$.ajax({

              type:"POST",
              url:'/approve-rcdet',
              data: {
        _token: @json(csrf_token()),
        body: body,
        rcnum:rcnum,
        rcexpiry:rcexpiry
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       swal({
                              title: "RC approved successfully.",
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
  
});

}

function Approveinsdetails()
    {
    


        var inexpiry=$('input#inexpiry').val();
    if(inexpiry=='')
    {
        $('#inexpiry').focus();
        $('#inexpiry').css({'border':'1px solid red'});
        return false;
    }
    else
        $('#inexpiry').css({'border':'1px solid #CCC'});
  
 swal({
  title: "Do you want to approve insurance certificate ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body='{{$driver_det->id}}';




$.ajax({

              type:"POST",
              url:'/approve-insdet',
              data: {
        _token: @json(csrf_token()),
        body: body,
        inexpiry:inexpiry
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       swal({
                              title: "Insurance certificate approved successfully.",
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
  
});

}


function Approvepldetails()
    {
    


        var plexpiry=$('input#plexpiry').val();
    if(plexpiry=='')
    {
        $('#plexpiry').focus();
        $('#plexpiry').css({'border':'1px solid red'});
        return false;
    }
    else
        $('#plexpiry').css({'border':'1px solid #CCC'});
  
 swal({
  title: "Do you want to approve pollution certificate ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body='{{$driver_det->id}}';




$.ajax({

              type:"POST",
              url:'/approve-pldet',
              data: {
        _token: @json(csrf_token()),
        body: body,
        plexpiry:plexpiry
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       swal({
                              title: "Pollution certificate approved successfully.",
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
  
});

}


function Approveprdetails()
    {
    


        var prexpiry=$('input#prexpiry').val();
    if(prexpiry=='')
    {
        $('#prexpiry').focus();
        $('#prexpiry').css({'border':'1px solid red'});
        return false;
    }
    else
        $('#prexpiry').css({'border':'1px solid #CCC'});
  
 swal({
  title: "Do you want to approve vehicle permit ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body='{{$driver_det->id}}';




$.ajax({

              type:"POST",
              url:'/approve-prdet',
              data: {
        _token: @json(csrf_token()),
        body: body,
        prexpiry:prexpiry
       
        },
               
              dataType:"json",
              success:function(data)
                {
                  //$('.loader').hide();
                  //$('.overlay').hide();

                  if(data['success'])
                    {
                       swal({
                              title: "Vehicle permit approved successfully.",
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
  
});

}

function Step1()
{
  $('#st1').show();
  $('#st11').show();
  $("#bg1").css("background-color", "#dee2e6");
  $('#st2').hide();
   $("#bg2").css("background-color", "white");
  $('#st3').hide();
   $("#bg3").css("background-color", "white");
    $('#st33').hide();
   $("#bg33").css("background-color", "white");
  $('#st4').hide();
   $("#bg4").css("background-color", "white");
  $('#st5').hide();
   $("#bg5").css("background-color", "white");
  $('#st6').hide();
   $("#bg6").css("background-color", "white");
   $('#st7').hide();
  $("#bg7").css("background-color", "white");

}

function Step2()
{
  $('#st1').hide();
  $('#st11').hide();
  $("#bg1").css("background-color", "white");
  $('#st2').show();
  $("#bg2").css("background-color", "#dee2e6");
  $('#st3').hide();
  $("#bg3").css("background-color", "white");
      $('#st33').hide();
   $("#bg33").css("background-color", "white");
  $('#st4').hide();
  $("#bg4").css("background-color", "white");
  $('#st5').hide();
  $("#bg5").css("background-color", "white");
  $('#st6').hide();
  $("#bg6").css("background-color", "white");
  $('#st7').hide();
  $("#bg7").css("background-color", "white");
}

function Step3()
{
  $('#st1').hide();
  $('#st11').hide();
  $("#bg1").css("background-color", "white");
  $('#st2').hide();
  $("#bg2").css("background-color", "white");
  $('#st3').show();
   $("#bg3").css("background-color", "#dee2e6");
       $('#st33').hide();
   $("#bg33").css("background-color", "white");
  $('#st4').hide();
  $("#bg4").css("background-color", "white");
  $('#st5').hide();
  $("#bg5").css("background-color", "white");
  $('#st6').hide();
  $("#bg6").css("background-color", "white");
  $('#st7').hide();
  $("#bg7").css("background-color", "white");
}

function Step33()
{
  $('#st1').hide();
  $('#st11').hide();
  $("#bg1").css("background-color", "white");
  $('#st2').hide();
  $("#bg2").css("background-color", "white");

  $('#st3').hide();
  $("#bg3").css("background-color", "white");
  $('#st33').show();
  $("#bg33").css("background-color", "#dee2e6");
  $('#st4').hide();
  $("#bg4").css("background-color", "white");
  $('#st5').hide();
  $("#bg5").css("background-color", "white");
  $('#st6').hide();
  $("#bg6").css("background-color", "white");
  $('#st7').hide();
  $("#bg7").css("background-color", "white");
}

function Step4()
{
  $('#st1').hide();
  $('#st11').hide();
  $("#bg1").css("background-color", "white");
  $('#st2').hide();
  $("#bg2").css("background-color", "white");
  $('#st3').hide();
  $("#bg3").css("background-color", "white");
      $('#st33').hide();
   $("#bg33").css("background-color", "white");
  $('#st4').show();
  $("#bg4").css("background-color", "#dee2e6");
  $('#st5').hide();
  $("#bg5").css("background-color", "white");
  $('#st6').hide();
  $("#bg6").css("background-color", "white");
  $('#st7').hide();
  $("#bg7").css("background-color", "white");
}

function Step5()
{
  $('#st1').hide();
  $('#st11').hide();
  $("#bg1").css("background-color", "white");
  $('#st2').hide();
  $("#bg2").css("background-color", "white");
  $('#st3').hide();
  $("#bg3").css("background-color", "white");
  $('#st33').hide();
  $("#bg33").css("background-color", "white");
  $('#st4').hide();
  $("#bg4").css("background-color", "white");
  $('#st5').show();
  $("#bg5").css("background-color", "#dee2e6");
  $('#st6').hide();
  $("#bg6").css("background-color", "white");
  $('#st7').hide();
  $("#bg7").css("background-color", "white");
}

function Step6()
{
  $('#st1').hide();
  $('#st11').hide();
  $("#bg1").css("background-color", "white");
  $('#st2').hide();
  $("#bg2").css("background-color", "white");
  $('#st3').hide();
  $("#bg3").css("background-color", "white");
  $('#st4').hide();
  $("#bg4").css("background-color", "white");
  $('#st5').hide();
  $("#bg5").css("background-color", "white");
  $('#st6').show();
  $("#bg6").css("background-color", "#dee2e6");
   $('#st7').hide();
  $("#bg7").css("background-color", "white");
}

function Step7()
{
  $('#st1').hide();
  $('#st11').hide();
  $("#bg1").css("background-color", "white");
  $('#st2').hide();
  $("#bg2").css("background-color", "white");
  $('#st3').hide();
  $("#bg3").css("background-color", "white");
  $('#st4').hide();
  $("#bg4").css("background-color", "white");
  $('#st5').hide();
  $("#bg5").css("background-color", "white");
  $('#st6').hide();
  $("#bg6").css("background-color", "white");
  $('#st7').show();
  $("#bg7").css("background-color", "#dee2e6");
}



  </script>

  @endsection