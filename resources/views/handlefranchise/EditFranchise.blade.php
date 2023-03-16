@extends('layouts.Admin')
@section('title')
 edit-division
  @endsection 
 
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Division </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/franchise-details/{{encrypt($franchise->id)}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>
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
            <h3 class="card-title">Edit Division</h3>

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
                  <label>Division Type *</label>
                  <select id="ftype" name="ftype" class="form-control">
                    <option value="">Choose</option>
                    <option  value="1" @if($franchise->franchise_type==1)selected @endif>Own Division</option>
                    <option  value="2" @if($franchise->franchise_type==2)selected @endif>Other Division</option>
                    
                  </select>
                </div>
                 <div class="form-group">
                  <label>Division Name *</label>
                  <input type="text" name="cname" id="cname" class="form-control" value="{{$franchise->franchise_name}}">
                </div>

                <div class="form-group">
                  <label>Proprietor Name *</label>
                  <input type="text" name="pname" id="pname" class="form-control" value="{{$franchise->proprietor_name}}">
                </div>

                  <div class="form-group">
                  <label>Mobile *</label>
                  <input type="text" name="cmobile" id="cmobile" class="form-control" value="{{$franchise->franchise_mobile}}">
                </div>

                <div class="form-group">
                  <label>Mail Id *</label>
                  <input type="text" name="cmail" id="cmail" class="form-control" value="{{$franchise->mail_id}}">
                </div>

                 <div class="form-group">
                  <label>Location *</label>
                  <input type="text" name="clocation" id="clocation" class="form-control" value="{{$franchise->franchise_location}}">
                </div>
                 
               
                
                 
                 
              </div>


              <!-- /.col -->
              <div class="col-md-6">

                 <div class="form-group">
                  <label>State *</label>
                  <select name="cstate" id="cstate" class="form-control select2" onchange="Selectdist(this.value)">
                  <!--   <option value="">Choose..</option> -->
                    @foreach($stat as $st)

                    <option value="{{$st->id}}">{{$st->state}}</option>
                    @endforeach

                  </select>

                </div>

                 <div class="form-group">
                  <label>District *</label>
                  <select name="cdist" id="cdist" class="form-control select2">
                    <option value="0">Choose..</option>
                    @foreach($dist as $dt)

                    <option value="{{$dt->id}}" @if($franchise->franchise_district==$dt->id)selected @endif>{{$dt->district}}</option>
                    @endforeach 

                  </select>
                </div>
               
                
                <div class="form-group">
                  <label>Landline</label>
                  <input type="text" name="clandline" id="clandline" class="form-control" value="{{$franchise->Landline}}">
                </div>
                
                 <div class="form-group">
                  <label>Profit % *</label>
                  <input type="number" name="profit" id="profit" class="form-control" value="{{$franchise->profit}}">
                </div> 

                <div class="form-group">
                  <label>Latitude *</label>
                  <input type="text" name="lat" id="lat" class="form-control" value="{{$franchise->latitude}}">
                </div>
                <div class="form-group">
                  <label>Longitude *</label>
                  <input type="text" name="long" id="long" class="form-control" value="{{$franchise->longitude}}">
                </div>
                
                
              </div>

            </div>
              <center>
                
                  
                  <button type="button" class="btn yellowbtn" onclick="AddFranchise()" id="submitButton">Submit</button>
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



  
 function AddFranchise()
{
      var error_num=0;
      var ftype=$('#ftype option:selected').val();
    if(ftype=='')
    {
        $('#ftype').focus();
        $('#ftype').css({'border':'1px solid red'});
        return false;
        var error_num=error_num+1;
    }
    else
  
    $('#ftype').css({'border':'1px solid #CCC'});
    var cname=$('input#cname').val();
    if(cname=='')
    {
        $('#cname').focus();
        $('#cname').css({'border':'1px solid red'});
        return false;
        var error_num=error_num+1;
    }
    else
  
    $('#cname').css({'border':'1px solid #CCC'});

        var pname=$('input#pname').val();
    if(pname=='')
    {
        $('#pname').focus();
        $('#pname').css({'border':'1px solid red'});
        return false;
        var error_num=error_num+1;
    }
    else
        $('#pname').css({'border':'1px solid #CCC'});

  

    var cmobile=$('input#cmobile').val();
    if(cmobile=='')
    {
        $('#cmobile').focus();
        $('#cmobile').css({'border':'1px solid red'});
        return false;
        var error_num=error_num+1;
    }
    else if(cmobile.length!=10)  {
              
              $('#cmobile').css('border','1px solid red');
              $('#cmobile').focus();
              swal({
                              title: "Invalid Mobile number ",
                              //text: "Username and Password send to your Email",
                              icon: "error",
                              buttons: "Ok",
  
                            })
              return false;
              }
    else
  
    $('#cmobile').css({'border':'1px solid #CCC'});


        var cmail=$('input#cmail').val();
    if(cmail=='')
    {
        $('#cmail').focus();
        $('#cmail').css({'border':'1px solid red'});
        return false;
        var error_num=error_num+1;
    }
    else
        $('#cmail').css({'border':'1px solid #CCC'});

   var clocation=$('input#clocation').val();
    if(clocation=='')
    {
        $('#clocation').focus();
        $('#clocation').css({'border':'1px solid red'});
        return false;
        var error_num=error_num+1;
    }
    else
  
    $('#clocation').css({'border':'1px solid #CCC'});



  var cstate=$('#cstate option:selected').val();
    if(cstate=='')
    {
        $('#cstate').focus();
        $('#cstate').css({'border':'1px solid red'});
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
  
    $('#cstate').css({'border':'1px solid #CCC'});

   var cdist=$('#cdist option:selected').val();
    if(cdist=='0')
    {
        $('#cdist').focus();
        $('#cdist').css({'border':'1px solid red'});
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
  
    $('#cdist').css({'border':'1px solid #CCC'});

  


    var clandline=$('input#clandline').val();
  
  var profit=$('input#profit').val();
    if(profit=='')
    {
        $('#profit').focus();
        $('#profit').css({'border':'1px solid red'});
        swal({
                title: "Please add profit percentage ",
                closeOnClickOutside: false,
                icon: "error",
                buttons: "Ok",
      
                });
        return false;
        var error_num=error_num+1;
    }
    else
  
    $('#profit').css({'border':'1px solid #CCC'});

    var lat=$('input#lat').val();
    if(lat=='')
    {
        $('#lat').focus();
        $('#lat').css({'border':'1px solid red'});
        swal({
                title: "Please add Latitude",
                closeOnClickOutside: false,
                icon: "error",
                buttons: "Ok",
      
                });
        return false;
        var error_num=error_num+1;
    }
    else
  
    $('#lat').css({'border':'1px solid #CCC'});


  var long=$('input#long').val();
    if(long=='')
    {
        $('#long').focus();
        $('#long').css({'border':'1px solid red'});
        swal({
                title: "Please add Longitude",
                closeOnClickOutside: false,
                icon: "error",
                buttons: "Ok",
      
                });
        return false;
        var error_num=error_num+1;
    }
    else
  
    $('#long').css({'border':'1px solid #CCC'});
 

    if(error_num!=0)
    {
        return false;
    }    
    else
    {

    $('#submitButton').hide();
      $('#submitButton1').show();
    
          data = new FormData();


   data.append('frid', '{{$franchise->id}}');
   data.append('ftype', ftype);
   data.append('cname', cname);
   data.append('cmobile', cmobile);
   data.append('clocation', clocation);
   data.append('cdist', cdist);
   data.append('cstate', cstate);
   data.append('clandline', clandline);
   data.append('cmail', cmail);
   data.append('pname', pname);
    data.append('profit', profit);
   data.append('lat', lat);
   data.append('long', long);
   data.append('_token', @json(csrf_token()));

 $.ajax({

type:"POST",
url:"/franchise-update",
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
                                  title: "Division Updated Successfully",
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

