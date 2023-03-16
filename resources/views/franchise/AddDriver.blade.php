@extends('layouts.Franchise')
@section('title')
 add-driver
  @endsection 
 
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Driver </h1>
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
            <h3 class="card-title">Add Driver</h3>

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
                  <input type="text" name="name" id="name" class="form-control" value="">
                </div>

                <div class="form-group">
                  <label>Mobile *</label>
                  <input type="text" name="mobile" id="mobile" class="form-control" value="">
                </div>

                <div class="form-group">
                  <label>Vehicle Category *</label>
                 
                  <select name="vcat" id="vcat" class="form-control select2" onchange="Selecttype(this.value)">
                    <option value="">Choose..</option>
                  @foreach($cat as $c)

                    <option value="{{$c->id}}">{{$c->category}}</option>
                    @endforeach 

                  </select>
                </div>

                <div class="form-group">
                  <label>Vehicle Type *</label>
                  
                  <select name="vtype" id="vtype" class="form-control select2">
                    <option value="0">Choose..</option>
                 
                  </select>

                </div>

                  <div class="form-group">
                  <label>Blood Group *</label>
                  <input type="text" name="bloodgp" id="bloodgp" class="form-control" value="">
                </div>

                <div class="form-group">
                  <label>Housename *</label>
                  <input type="text" name="hname" id="hname" class="form-control" value="">
                </div>

                
                <div class="form-group">
                  <label>Photo *</label>
                <input type="file" name="pdf_file" id="pdf_file" onchange="Chkformat()" style=" background: #ececec;
                color: black;padding: 1em;">
                </div>
                 
                 
              </div>


              <!-- /.col -->
              <div class="col-md-6">

                 <div class="form-group">
                  <label>Location *</label>
                  <input type="text" name="location" id="location" class="form-control" value="">
                </div>
                 
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

                    <option value="{{$dt->id}}">{{$dt->district}}</option>
                    @endforeach 

                  </select>
                </div>
                
              
                
                <div class="form-group">
                  <label>Pin *</label>
                  <input type="text" name="pin" id="pin" class="form-control" value="">
                </div>


                 

                <div class="form-group">
                  <label>Enter password *</label>
                  <input type="password" name="newpass" id="newpass" class="form-control" value="">
                </div>

                <div class="form-group">
                  <label>Confirm password *</label>
                  <input type="password" name="confirmpass" id="confirmpass" class="form-control" value="">
                </div>
                
                
                
                
              </div>

            </div>
              <center>
                
                  
                  <button type="button" class="btn yellowbtn" onclick="AddDriver()" id="submitButton">Submit</button>
                  <button type="button" class="btn yellowbtn" id="submitButton1"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
              
                </center>
          </div>
        </div>
    </section>





  














    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<script>



  
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


 var img=$('input#pdf_file').val();
    if(img=='')
    {
       
        swal({
                title: "Please add photo",
                closeOnClickOutside: false,
                icon: "error",
                buttons: "Ok",
      
                });
        return false;
        var error_num=error_num+1;
    }
    else
  
   


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

  var newpass=$('input#newpass').val();
    
      if(newpass=='')
      {
        $('#newpass').css('border','1px solid red');
        
        return false;
      }
      else
        $('#newpass').css('border','1px solid #CCC');
    
      var confirmpass=$('input#confirmpass').val();
    
      if(confirmpass=='')
      {
        $('#confirmpass').css('border','1px solid red');
        
        return false;
      }
      else if(confirmpass!=newpass)
      {
        $('#confirmpass').css('border','1px solid red');
    
        swal({
                title: "Passwords are not matching !",
                closeOnClickOutside: false,
                icon: "error",
                buttons: "Ok",
      
                });
        
        return false;
      }
      else
        $('#confirmpass').css('border','1px solid #CCC');


 
 

    if(error_num!=0)
    {
        return false;
    }    
    else
    {

    $('#submitButton').hide();
      $('#submitButton1').show();
    
          data = new FormData();


   data.append('name', name);
   data.append('mobile', mobile);
   data.append('vcat', vcat);
   data.append('vtype', vtype);
   data.append('bloodgp', bloodgp);
   data.append('hname', hname);
   data.append('location', location);
   data.append('dist', dist);
   data.append('state', state);
   data.append('pin', pin);
    data.append('newpass', newpass);
  
  data.append('img', $('#pdf_file')[0].files[0]);

 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/driver-add",
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
                                  title: "Driver Added Successfully",
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
     $('#submitButton1').hide();
              $('#submitButton').show();
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

    

         function Selecttype(val)
{
 
            $.post("/get-type",{uid:val,_token: @json(csrf_token())},function(result){
          
                $('#vtype').html(result);
            });
}

    
</script>
@endsection

