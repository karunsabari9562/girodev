@extends('layouts.Franchise')
@section('title')
 add-driver-profile
  @endsection 
 
@section('contents')

<style type="text/css">
  .tacbox {
  display:block;
  padding: 1em;
  margin: 2em;
  border: 3px solid #ddd;
  background-color: #eee;
  max-width: 800px;
}

#checkbox {
  height: 2em;
  width: 2em;
  vertical-align: middle;
}
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Driver Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/register-driver"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
      <form>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Personal Details</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">

                
                 <div class="form-group">
                  <label>Name *</label>
                  <input type="text" name="name" id="name" class="form-control" value="{{$driver->name}}">
                </div>

                <div class="form-group">
                  <label>Mobile *</label>
                  <input type="text" name="mobile" id="mobile" class="form-control" value="{{$driver->mobile}}">
                </div>

               

                  <div class="form-group">
                  <label>Blood Group *</label>
                  <input type="text" name="bloodgp" id="bloodgp" class="form-control" value="{{$driver->blood_group}}">
                </div>

                <div class="form-group">
                  <label>Housename *</label>
                  <input type="text" name="hname" id="hname" class="form-control" value="{{$driver->house_name}}">
                </div>

                <div class="form-group">
                  <label>Location *</label>
                  <input type="text" name="location" id="location" class="form-control" value="{{$driver->location}}">
                </div>
                
                 
                 
              </div>


              <!-- /.col -->
              <div class="col-md-6">

                 
                 
                <div class="form-group">
                  <label>State *</label>
                  <select name="state" id="state" class="form-control select2" onchange="Selectdist(this.value)">
                  <!--   <option value="">Choose..</option> -->
                     @foreach($stat as $st)

                    <option value="{{$st->id}}">{{$st->state}}</option>
                    @endforeach

                  </select>

                </div>

                 <div class="form-group">
                  <label>District *</label>
                  <select name="dist" id="dist" class="form-control select2">
                    <option value="0">Choose..</option>
                  @foreach($dist as $dt)

                    <option value="{{$dt->id}}" @if($driver->district==$dt->id) selected @endif>{{$dt->district}}</option>
                    @endforeach 

                  </select>
                </div>
                
              
                
                <div class="form-group">
                  <label>Pin *</label>
                  <input type="text" name="pin" id="pin" class="form-control" value="{{$driver->pin}}">
                </div>

                 <div class="form-group">
                  <label>Photo *</label><br>
                <input type="file" name="pdf_file" id="pdf_file" onchange="Chkformat()" style=" background: #ececec;color: black;padding: 1em;">
                </div>

                 <div class="form-group">
              <img src="{{asset($driver->photo)}}" style="width: 100px;">
                </div>

                <!-- <div class="form-group">
                  <label>Enter password *</label>
                  <input type="password" name="newpass" id="newpass" class="form-control" value="{{$driver->password}}">
                </div>

                <div class="form-group">
                  <label>Confirm password *</label>
                  <input type="password" name="confirmpass" id="confirmpass" class="form-control" value="{{$driver->password}}">
                </div> -->
                

                
                
                
              </div>

            </div>
              <center>
                
                  
                  <button type="button" class="btn yellowbtn" onclick="AddDriver()" id="ab1">Submit</button>
                  <button type="button" class="btn yellowbtn" id="ab2"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
              
                </center>
                @if($driver->profile_approval_status==2)
                <span style="color: red;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>  Rejection Reason : {{$driver->profile_reject_reason}}</span>
                @endif
          </div>

        </div>
    </section>

<!-- ////////////// -->



<section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Vehicle Details</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">

                
                 <div class="form-group">
                  <label>Category *</label>
                 
                  <select name="vcat" id="vcat" class="form-control select2" onchange="Selecttype(this.value)">
                    <option value="">Choose..</option>
                  @foreach($cat as $c)

                    <option value="{{$c->id}}" @if($driver->vehicle_category==$c->id) selected @endif>{{$c->category}}</option>
                    @endforeach 

                  </select>
                </div>

                 
                 
              </div>


              <!-- /.col -->
              <div class="col-md-6">

                
                 
                
              
                
                <div class="form-group">
                  <label>Type *</label>
                  
                  <select name="vtype" id="vtype" class="form-control select2">
                    @foreach($types as $t)

                    <option value="{{$t->id}}" @if($driver->vehicle_type==$t->id) selected @endif>{{$t->type}}</option>
                    @endforeach 
                 
                  </select>

                </div>

               
                
                
                
                
              </div>

            </div>
               <center>
                
                  
                  <button type="button" class="btn yellowbtn" onclick="AddDriver1()" id="ab3">Submit</button>
                  <button type="button" class="btn yellowbtn" id="ab4"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
              
                </center>
                    @if($driver->vehicle_approval_status==2)
                <span style="color: red;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>  Rejection Reason : {{$driver->vehicle_reject_reason}}</span>
                @endif
          </div>
        </div>
    </section>




<!-- ////////////// -->



<section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Driver Documents</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">

                
                 <div class="form-group">
                  <label>License FrontSide *</label><br>
                  <input type="file" name="pdf_file1" id="pdf_file1" style=" background: #ececec;
                color: black;padding: 1em;">
                  @if($driver->GetPDocs->license_frontfile!="")
                  <a href="{{asset($driver->GetPDocs->license_frontfile)}}" target="_blank" class="view-btn-a">View</a>
                  @endif
                   @if($driver->GetPDocs->licensefront_approval_status==2)
                <br><span style="color: red;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>  Rejection Reason : {{$driver->GetPDocs->licensefront_rejection_reason}}</span>
                @endif
                </div>
                <div class="form-group">
                  <label>License BackSide *</label><br>
                  <input type="file" name="pdf_file2" id="pdf_file2" style=" background: #ececec;
                color: black;padding: 1em;">
                  @if($driver->GetPDocs->license_backfile!="")
                  <a href="{{asset($driver->GetPDocs->license_backfile)}}" target="_blank" class="view-btn-a">View</a>
                  @endif
                  @if($driver->GetPDocs->licenseback_approval_status==2)
                <br><span style="color: red;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>  Rejection Reason : {{$driver->GetPDocs->licenseback_rejection_reason}}</span>
                @endif
                </div>
                <div class="form-group">
                  <label>Vehicle RC *</label><br>
                  <input type="file" name="pdf_file3" id="pdf_file3" style=" background: #ececec;
                color: black;padding: 1em;">
                  @if($driver->GetPDocs->rc_file!="")
                  <a href="{{asset($driver->GetPDocs->rc_file)}}" target="_blank" class="view-btn-a">View</a>
                  @endif
                  @if($driver->GetPDocs->rc_approval_status==2)
               <br> <span style="color: red;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>  Rejection Reason : {{$driver->GetPDocs->rc_rejection_reason}}</span>
                @endif
                </div>

                 
                 
              </div>


              <!-- /.col -->
              <div class="col-md-6">

                
                 
                
              
                
               <div class="form-group">
                  <label>Vehicle Insurance *</label><br>
                  <input type="file" name="pdf_file4" id="pdf_file4" style=" background: #ececec;
                color: black;padding: 1em;">
                  @if($driver->GetPDocs->insurance_file!="")
                  <a href="{{asset($driver->GetPDocs->insurance_file)}}" target="_blank" class="view-btn-a">View</a>
                  @endif
                   @if($driver->GetPDocs->insurance_approval_status==2)
                <br><span style="color: red;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>  Rejection Reason : {{$driver->GetPDocs->insurance_rejection_reason}}</span>
                @endif
                </div>
                <div class="form-group">
                  <label>Pollution Certificate *</label><br>
                  <input type="file" name="pdf_file5" id="pdf_file5" style=" background: #ececec;
                color: black;padding: 1em;">
                  @if($driver->GetSDocs->pollution_file!="")
                  <a href="{{asset($driver->GetSDocs->pollution_file)}}" target="_blank" class="view-btn-a">View</a>
                  @endif
                   @if($driver->GetSDocs->pollution_approval_status==2)
                <br><span style="color: red;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>  Rejection Reason : {{$driver->GetSDocs->pollution_rejection_reason}}</span>
                @endif
                </div>
                <div class="form-group">
                  <label>Vehicle Permit *</label><br>
                  <input type="file" name="pdf_file6" id="pdf_file6" style=" background: #ececec;
                color: black;padding: 1em;">
                  @if($driver->GetSDocs->permit_file!="")
                  <a href="{{asset($driver->GetSDocs->permit_file)}}" target="_blank" class="view-btn-a">View</a>
                  @endif
                    @if($driver->GetSDocs->permit_approval_status==2)
                <br><span style="color: red;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i>  Rejection Reason : {{$driver->GetSDocs->permit_rejection_reason}}</span>
                @endif
                </div>


                
                
                
                
                
              </div>

            </div>
              <center>
                
                  
                  <button type="button" class="btn yellowbtn" onclick="AddDriver2()" id="submitButton">Submit</button>
                  <button type="button" class="btn yellowbtn" id="submitButton1"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
              
                </center>
          </div>
        </div>
    </section>


  <!-- ////////////// -->



<section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Profile Submission</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">

                <div class="col-md-6">
              <label>Registration Fee *</label>
               <input type="text" name="rfee" id="rfee" class="form-control" value="Rs.{{$regfee->fee}}" readonly="">    
                 
              </div>

              <div class="col-md-6">

                <label>Payment Date *</label>
                @if($driver->GetSDocs->payment_status!=0)

                <input type="date" name="pdt" id="pdt" class="form-control" value="{{$driver->GetSDocs->payment_date->format('Y-m-d')}}">   
                @else
                <input type="date" name="pdt" id="pdt" class="form-control">
                @endif
                 
              </div>




              <div class="col-md-12">

                
                 <div class="tacbox">
  <input id="checkbox" type="checkbox" />
  <label for="checkbox">I assure that the given details are valid and registration fee (Rs.{{$regfee->fee}}) collected.</label>
</div>

                 
                 
              </div>


              

            </div>
               <center>
                
                  
                  <button type="button" class="btn yellowbtn" onclick="FinalSubmit()" id="ab5">Submit</button>
                  <button type="button" class="btn yellowbtn" id="ab6"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
              
                </center>
          </div>
        </div>
    </section>




<!-- ////////////// -->















    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<script>




function FinalSubmit()
{
        
   if($("#checkbox").prop('checked') == false)
   {
   swal({
                                  title: "Please assure that the given details are valid and registration fee collected.",
                                  closeOnClickOutside: false,
                                  icon: "error",
                                  buttons: "Ok",
      
                                })
   return false;
  }
else
    var pdt=$('input#pdt').val();
    if(pdt=='')
    {
        $('#pdt').focus();
        $('#pdt').css({'border':'1px solid red'});
        return false;
        var error_num=error_num+1;
    }
    else
  
    $('#pdt').css({'border':'1px solid #CCC'});
  
    $('#ab5').hide();
      $('#ab6').show();
    
          data = new FormData();

  data.append('drid', '{{$driver->id}}');
   data.append('pdt', pdt);
  data.append('fee', '{{$regfee->fee}}');
 
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/driver-profile-submit",
data:data,
dataType:"json",
contentType: false,
//cache: false,
processData: false,

success:function(data)
{
  if(data['success'])
  {
     $('#ab6').hide();
              $('#ab5').show();
    swal({
                                  title: "Profile submitted successfully",
                                  closeOnClickOutside: false,
                                  icon: "success",
                                  buttons: "Ok",
      
                                })
    
                          .then((willDelete) => {
                           if (willDelete) {
                                 window.location.href='/register-driver';
                                      } 
    
                                });
                            
  }

    if(data['err'])
  {
     $('#ab6').hide();
              $('#ab5').show();
    swal({
                                  title: "All fields are mandatory !",
                                  closeOnClickOutside: false,
                                  icon: "error",
                                  buttons: "Ok",
      
                                })
    
                        
                            
  }

 

}




})



}




  
 function AddDriver()
{
      var error_num=0;
      
    var name=$('input#name').val();
    if(name=='')
    {
        $('#name').focus();
        $('#name').css({'border':'1px solid red'});
        return false;
        var error_num=error_num+1;
    }
    else
  
    $('#name').css({'border':'1px solid #CCC'});


    var mobile=$('input#mobile').val();
    if(mobile=='')
    {
        $('#mobile').focus();
        $('#mobile').css({'border':'1px solid red'});
        return false;
        var error_num=error_num+1;
    }
    else if(mobile.length!=10)  {
              
              $('#mobile').css('border','1px solid red');
              $('#mobile').focus();
              swal({
                              title: "Invalid Mobile number ",
                              //text: "Username and Password send to your Email",
                              icon: "error",
                              buttons: "Ok",
  
                            })
              return false;
              }
    else
  
    $('#mobile').css({'border':'1px solid #CCC'});


        var bloodgp=$('input#bloodgp').val();
    if(bloodgp=='')
    {
        $('#bloodgp').focus();
        $('#bloodgp').css({'border':'1px solid red'});
        return false;
        var error_num=error_num+1;
    }
    else
        $('#bloodgp').css({'border':'1px solid #CCC'});

      var hname=$('input#hname').val();
    if(hname=='')
    {
        $('#hname').focus();
        $('#hname').css({'border':'1px solid red'});
        return false;
        var error_num=error_num+1;
    }
    else
        $('#hname').css({'border':'1px solid #CCC'});

   var location=$('input#location').val();
    if(location=='')
    {
        $('#location').focus();
        $('#location').css({'border':'1px solid red'});
        return false;
        var error_num=error_num+1;
    }
    else
  
    $('#location').css({'border':'1px solid #CCC'});



  var state=$('#state option:selected').val();
    if(state=='')
    {
        $('#state').focus();
        $('#state').css({'border':'1px solid red'});
        swal({
                title: "Please choose state",
                closeOnClickOutside: false,
                icon: "error",
                buttons: "Ok",
      
                });
        return false;
        var error_num=error_num+1;
    }
    else
  
    $('#state').css({'border':'1px solid #CCC'});

   var dist=$('#dist option:selected').val();
    if(dist=='0')
    {
        $('#dist').focus();
        $('#dist').css({'border':'1px solid red'});
        swal({
                title: "Please choose district",
                closeOnClickOutside: false,
                icon: "error",
                buttons: "Ok",
      
                });
        return false;
        var error_num=error_num+1;
    }
    else
  
    $('#dist').css({'border':'1px solid #CCC'});

var pin=$('input#pin').val();
    if(pin=='')
    {
        $('#pin').focus();
        $('#pin').css({'border':'1px solid red'});
        swal({
                title: "Please add pincode",
                closeOnClickOutside: false,
                icon: "error",
                buttons: "Ok",
      
                });
        return false;
        var error_num=error_num+1;
    }
    else
  
    $('#pin').css({'border':'1px solid #CCC'});



    if(error_num!=0)
    {
        return false;
    }    
    else
    {

    $('#ab1').hide();
      $('#ab2').show();
    
          data = new FormData();

  data.append('drid', '{{$driver->id}}');
   data.append('name', name);
   data.append('mobile', mobile);
   data.append('bloodgp', bloodgp);
   data.append('hname', hname);
   data.append('location', location);
   data.append('dist', dist);
   data.append('state', state);
   data.append('pin', pin);
   data.append('img', $('#pdf_file')[0].files[0]);

 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/add-driver-pdetails",
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
    swal({
                                  title: "Personal details submitted successfully",
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

    if(data['err'])
  {
     $('#ab2').hide();
              $('#ab1').show();
    swal({
                                  title: "Mobile number already exists.",
                                  closeOnClickOutside: false,
                                  icon: "error",
                                  buttons: "Ok",
      
                                })
    
                        
                            
  }

 

}




})



}


}


function AddDriver1()
{
      var error_num=0;
      
    var vcat=$('#vcat option:selected').val();
    if(vcat=='')
    {
        $('#vcat').focus();
        $('#vcat').css({'border':'1px solid red'});
        swal({
                title: "Please choose vehicle category",
                closeOnClickOutside: false,
                icon: "error",
                buttons: "Ok",
      
                });
        return false;
        var error_num=error_num+1;
    }
    else
  
    $('#vcat').css({'border':'1px solid #CCC'});

   var vtype=$('#vtype option:selected').val();
    if(vtype=='0')
    {
        $('#vtype').focus();
        $('#vtype').css({'border':'1px solid red'});
        swal({
                title: "Please choose vehicle type",
                closeOnClickOutside: false,
                icon: "error",
                buttons: "Ok",
      
                });
        return false;
        var error_num=error_num+1;
    }
    else
  
    $('#vtype').css({'border':'1px solid #CCC'});

 

    if(error_num!=0)
    {
        return false;
    }    
    else
    {

    $('#ab3').hide();
      $('#ab4').show();
    
          data = new FormData();

 
  data.append('drid', '{{$driver->id}}');
   data.append('vcat', vcat);
   data.append('vtype', vtype);
  
 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/add-driver-vdetails",
data:data,
dataType:"json",
contentType: false,
//cache: false,
processData: false,

success:function(data)
{
  if(data['success'])
  {
     $('#ab4').hide();
              $('#ab3').show();
    swal({
                                  title: "Vehicle details submitted successfully",
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


}



function AddDriver2()
{
     // var error_num=0;
      
    

 // var pdf1=$('input#pdf_file1').val();
 //    if(pdf1=='')
 //    {
       
 //        swal({
 //                title: "Please upload License FrontSide",
 //                closeOnClickOutside: false,
 //                icon: "error",
 //                buttons: "Ok",
      
 //                });
 //        return false;
 //        var error_num=error_num+1;
 //    }
 //    else

    //    var pdf2=$('input#pdf_file2').val();
    // if(pdf2=='')
    // {
       
    //     swal({
    //             title: "Please upload License BackSide",
    //             closeOnClickOutside: false,
    //             icon: "error",
    //             buttons: "Ok",
      
    //             });
    //     return false;
    //     var error_num=error_num+1;
    // }
    // else

    //    var pdf3=$('input#pdf_file3').val();
    // if(pdf3=='')
    // {
       
    //     swal({
    //             title: "Please upload Vehicle RC",
    //             closeOnClickOutside: false,
    //             icon: "error",
    //             buttons: "Ok",
      
    //             });
    //     return false;
    //     var error_num=error_num+1;
    // }
    // else

    //    var pdf4=$('input#pdf_file4').val();
    // if(pdf4=='')
    // {
       
    //     swal({
    //             title: "Please upload Vehicle Insurance",
    //             closeOnClickOutside: false,
    //             icon: "error",
    //             buttons: "Ok",
      
    //             });
    //     return false;
    //     var error_num=error_num+1;
    // }
    // else

    //    var pdf5=$('input#pdf_file5').val();
    // if(pdf5=='')
    // {
       
    //     swal({
    //             title: "Please upload Polltion Certificate",
    //             closeOnClickOutside: false,
    //             icon: "error",
    //             buttons: "Ok",
      
    //             });
    //     return false;
    //     var error_num=error_num+1;
    // }
    // else

    //    var pdf6=$('input#pdf_file6').val();
    // if(pdf6=='')
    // {
       
    //     swal({
    //             title: "Please upload Vehicle Permit",
    //             closeOnClickOutside: false,
    //             icon: "error",
    //             buttons: "Ok",
      
    //             });
    //     return false;
    //     var error_num=error_num+1;
    // }
    // else
  
   

    // if(error_num!=0)
    // {
    //     return false;
    // }    
    // else
    // {

    $('#submitButton').hide();
      $('#submitButton1').show();
    
          data = new FormData();

    data.append('drid', '{{$driver->id}}');
    data.append('pdf1', $('#pdf_file1')[0].files[0]);
    data.append('pdf2', $('#pdf_file2')[0].files[0]);
    data.append('pdf3', $('#pdf_file3')[0].files[0]);
    data.append('pdf4', $('#pdf_file4')[0].files[0]);
    data.append('pdf5', $('#pdf_file5')[0].files[0]);
    data.append('pdf6', $('#pdf_file6')[0].files[0]);

 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/add-driver-docs",
data:data,
dataType:"json",
contentType: false,
//cache: false,
processData: false,

success:function(data)
{
  if(data['success'])
  {
     $('#submitButton1').hide();
              $('#submitButton').show();
    swal({
                                  title: "Documents submitted successfully",
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







         function Selecttype(val)
{
 
            $.post("/get-type",{uid:val,_token: @json(csrf_token())},function(result){
          
                $('#vtype').html(result);
            });
}



function Chkformat()
{
                  var name = document.getElementById("pdf_file").files[0].name;
  //alert(name)
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  //if(jQuery.inArray(ext, ['gif','png','jpg','jpeg','pdf']) == -1)
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)

  {
   swal({
            title: "Invalid file format !",
            text: "Upload JPG/JPEG/PNG file",
            icon: "warning",
            buttons: "Ok",
            });
   $('input#pdf_file').val("");
   return false;
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("pdf_file").files[0]);
  var f = document.getElementById("pdf_file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 300000)
  {
   swal({
            title: "File size is very big !",
            text: "maximum file size is 300kb.",
            icon: "warning",
            buttons: "Ok",
            });
   $('input#pdf_file').val("");
   return false;
  }

  
                }

    

    
</script>
@endsection

