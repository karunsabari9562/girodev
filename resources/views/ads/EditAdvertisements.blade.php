@extends('layouts.Admin')
@section('title')
 edit-advertisement
  @endsection
 
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>  Edit Advertisement</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="/advertisement"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>
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
                <h3 class="card-title">Edit Advertisement</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title *</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$ads->title}}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">File (PNG/JPG/JPEG) *</label><br>
                    <input type="file" id="pdf_file" name="pdf_file" onchange="Abc()" style=" background: #ececec;
                color: black;padding: 1em;">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Valid from *</label>
                    <input type="date" class="form-control" id="vfrom" name="vfrom" value="{{$ads->valid_from}}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Valid to *</label>
                    <input type="date" class="form-control" id="vto" name="vto" value="{{$ads->valid_to}}">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Visible To *</label>

                    
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="1" @if($ads->visibleto_driver==1) checked @endif>
                  <label for="customCheckbox1" class="custom-control-label">Drivers</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox2" value="2" @if($ads->visibleto_passenger==1) checked @endif>
                  <label for="customCheckbox2" class="custom-control-label">Customers</label>
                </div>
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="customCheckbox3" value="3" @if($ads->visibleto_franchise==1) checked @endif>
                  <label for="customCheckbox3" class="custom-control-label">Franchise</label>
                </div>
                
              
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

      var chk=0;
    
      var title=$('input#title').val();
    
      if(title=='')
      {
        $('#title').css('border','1px solid red');
        
        return false;
      }
      else
        $('#title').css('border','1px solid #CCC');


        var vfrom=$('input#vfrom').val();
    
      if(vfrom=='')
      {
        $('#vfrom').css('border','1px solid red');
        
        return false;
      }
      else
        $('#vfrom').css('border','1px solid #CCC');

        var vto=$('input#vto').val();
    
      if(vto=='')
      {
        $('#vto').css('border','1px solid red');
        
        return false;
      }
      else
        $('#vto').css('border','1px solid #CCC');


      if($("#customCheckbox1").prop('checked') == true)
      {
          var dstatus=1;
          
      }
      else
      {
          var dstatus=0;
      }
      if($("#customCheckbox2").prop('checked') == true)
      {
          var pstatus=1;
         
      }
      else
      {
           var pstatus=0;
      }
      if($("#customCheckbox3").prop('checked') == true)
      {
          var fstatus=1;

      }
      else
      {
          var fstatus=0;
      }

      
     $('#submitButton').hide();
      $('#submitButton1').show();

      data = new FormData();
      data.append('aid', '{{$ads->id}}');
  data.append('title', title);
  data.append('img', $('#pdf_file')[0].files[0]);
  data.append('vfrom', vfrom);
  data.append('vto', vto);
  data.append('dstatus', dstatus);
  data.append('pstatus', pstatus);
  data.append('fstatus', fstatus);
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/advertisement-edit",
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
                       title: "Advertisement updated successfully",
                       closeOnClickOutside: false,
                       icon: "success",
                      buttons: "Ok",
                    })
    
                     .then((willDelete) => {
                      if (willDelete) {
                       window.location.href='/advertisement';
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
  if(jQuery.inArray(ext, ['svg','png','jpg','jpeg']) == -1)

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