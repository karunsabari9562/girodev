@extends('layouts.Franchise')
@section('title')
 upload-documents
  @endsection
 
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fa fa-plus-circle" aria-hidden="true"></i>   Upload Document</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="/documents-reuploads"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>
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
          <div class="col-md-5" style="margin-left: 5%;">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header" style="background-color: #fab60b;">
                <h3 class="card-title">Upload Document</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Driver Id *</label>
                    <select class="form-control" id="dr" name="dr">
                      <option value="">Choose</option>
                      @foreach($driver as $d)
                      <option value="{{$d->id}}">{{$d->name}}  ({{$d->driver_id}})</option>
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Document Type *</label>
              <select class="form-control" id="dtype" name="dtype">
                      <option value="">Choose</option>
                      <option value="1">Vehicle RC</option>
                      <option value="20">License Frontside</option>
                     <!--  <option value="21">License Backside</option> -->
                      <option value="3">Insurance</option>
                      <option value="4">Pollution Certificate</option>
                      <option value="5">Vehicle Permit</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">File (PNG/JPG/JPEG/PDF) *</label><br>
                    <input type="file" id="pdf_file" name="pdf_file" onchange="Abc()" style=" background: #ececec;
                color: black;padding: 1em;">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Expiry *</label>
                    <input type="date" class="form-control" id="expiry" name="expiry" min="{{date('Y-m-d')}}">
                  </div>

    
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" class="btn yellowbtn" onclick="Save()" id="submitButton">Submit</button>
                  <button type="button" class="btn yellowbtn" id="submitButton1"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
                </div>
              </form><br><br>
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

      var dr=$('#dr option:selected').val();
    
      if(dr=='')
      {
        $('#dr').css('border','1px solid red');
        
        return false;
      }
      else
        $('#dr').css('border','1px solid #CCC');

       var dtype=$('#dtype option:selected').val();
    
      if(dtype=='')
      {
        $('#dtype').css('border','1px solid red');
        
        return false;
      }
      else
        $('#dtype').css('border','1px solid #CCC');


       var img=$('#pdf_file').val();
     if(img=='')
     {
      swal({
                                  title: "Please add image file.",
                                  closeOnClickOutside: false,
                                  icon: "error",
                                  buttons: "Ok",
      
                                })
      return false;
     }
     else

        var expiry=$('input#expiry').val();
    
      if(expiry=='')
      {
        $('#expiry').css('border','1px solid red');
        
        return false;
      }
      else
        $('#expiry').css('border','1px solid #CCC');

      
     $('#submitButton').hide();
      $('#submitButton1').show();

      data = new FormData();
  data.append('dr', dr);
  data.append('imgg', $('#pdf_file')[0].files[0]);
  data.append('expiry', expiry);
  data.append('dtype', dtype);
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/doc-reupload",
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
                       title: "Document uploaded successfully",
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
    
    
  function Abc()
  {
                  var name = document.getElementById("pdf_file").files[0].name;
  //alert(name)
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  //if(jQuery.inArray(ext, ['gif','png','jpg','jpeg','pdf']) == -1)
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg','pdf']) == -1)

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