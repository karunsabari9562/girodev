@extends('layouts.Franchise')
@section('title')
 profile
  @endsection
 
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <h3 id="twelve"><i class="fa fa-user" aria-hidden="true"></i>   Edit Profile
            </h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/franchise-profile"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>
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
            <h3 class="card-title">Franchise Profile</h3>

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
                  <label>Proprietor *</label>
                  <input type="text" name="cname" id="cname" class="form-control" value="{{$fr_det->proprietor_name}}">
                </div>

            <div class="form-group">
                  <label>Mobile *</label>
                  <input type="text" name="cmobile" id="cmobile" class="form-control" value="{{$fr_det->franchise_mobile}}">
                </div>
                
                <div class="form-group">
                  <label>Mail Id *</label>
                  <input type="text" name="cmail" id="cmail" class="form-control" value="{{$fr_det->mail_id}}">
                </div>

                 <div class="form-group">
                  <label>Photo</label><br>
                  <input type="file" name="pdf_file" id="pdf_file" onchange="Chkformat()" style=" background: #ececec;color: black;padding: 1em;">
                </div>

              </div>


             

            </div>
              
                
                  <button type="button" class="btn yellowbtn" value="Submit" onclick="Submit()" id="ab1">Submit</button>

                  <button type="button" class="btn yellowbtn" value="Submit" id="ab2"><i class="fa fa-spinner fa-spin"></i>   Submit</button>
              
                
          </div>
        </div>
    </section>




  















    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<script>


  
 function Submit()
{
      var error_num=0;
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

    var cmobile=$('input#cmobile').val();
    if(cmobile=='')
    {
        $('#cmobile').focus();
        $('#cmobile').css({'border':'1px solid red'});
        return false;
        var error_num=error_num+1;
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


    

  
    

    if(error_num!=0)
    {
        return false;
    }    
    else
    {

      $('#ab1').hide();
      $('#ab2').show();
    
          data = new FormData();


   data.append('cname', cname);
   data.append('cmobile', cmobile);
   data.append('cmail', cmail); 
  data.append('img', $('#pdf_file')[0].files[0]);



    //data.append('img', $('#pdf_file')[0].files[0]);
    //data.append('certi', $('#pdf_file1')[0].files[0]);

 data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/franchise-profile-update",
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
                                  title: "Profile Updated Successfully",
                                  closeOnClickOutside: false,
                                  icon: "success",
                                  buttons: "Ok",
      
                                })
    
                          .then((willDelete) => {
                           if (willDelete) {
                                 window.location.href='/franchise-profile';
                                      } 
    
                                });
                            
  }

  if(data['err'])
  {
    $('#ab2').hide();
$('#ab1').show();
       swal({
       title: "This mobile already exists !",
      //text: "Username and Password send to your Email",
      icon: "warning",
      buttons: "Ok",
       })
       return false;

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

