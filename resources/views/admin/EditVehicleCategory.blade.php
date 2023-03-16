@extends('layouts.Admin')
@section('title')
 edit-vehicle-category
  @endsection
 
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>  Edit Vehicle Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="/vehicle-categories"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <br><br>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-9" style="margin-left: 5%;">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header" style="background-color: #fab60b;">
                <h3 class="card-title">Edit Vehicle Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category *</label>
                    <input type="text" class="form-control" id="type" name="type" placeholder="Vehicle Category" value="{{$type->category}}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Category Type *</label>
                    <select name="ctype" id="ctype" class="form-control">
                      <option value="">Choose</option>
                      <option value="1" @if($type->category_type==1) selected @endif>Ride</option>
                      <option value="2" @if($type->category_type==2) selected @endif>Service</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Icon (PNG/JPG/JPEG) *</label><br>
                    <input type="file" id="pdf_file" name="pdf_file" onchange="Abc()" style=" background: #ececec;color: black;padding: 1em;">
                  </div>
    
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" class="btn yellowbtn" onclick="Save()" id="submitButton">Submit</button>
                  <button type="button" class="btn yellowbtn" id="submitButton1"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
         







          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<script>

  
    
      
    function Save()
    {
    
      var type=$('input#type').val();
    
      if(type=='')
      {
        $('#type').css('border','1px solid red');
        
        return false;
      }
      else
        $('#type').css('border','1px solid #CCC');

      var ctype=$('#ctype option:selected').val();
    
      if(ctype=='')
      {
        $('#ctype').css('border','1px solid red');
        
        return false;
      }
      else
        $('#ctype').css('border','1px solid #CCC');

       var img=$('#pdf_file').val();
     

      
     $('#submitButton').hide();
      $('#submitButton1').show();

      data = new FormData();
  data.append('type', type);
  data.append('ctype', ctype);
  data.append('vid', '{{$type->id}}');
  data.append('img', $('#pdf_file')[0].files[0]);
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/vehicle-category-edit",
         data: data,
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
                       title: "Vehicle category updated successfully",
                       closeOnClickOutside: false,
                       icon: "success",
                      buttons: "Ok",
                    })
    
                     .then((willDelete) => {
                      if (willDelete) {
                       window.location.href='/vehicle-categories';
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