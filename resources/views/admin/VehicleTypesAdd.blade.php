@extends('layouts.Admin')
@section('title')
 add-vehicle-type
  @endsection
 
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fa fa-plus-circle" aria-hidden="true"></i>   Add Vehicle Type</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="/vehicle-types/{{encrypt($vhcat->id)}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>
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
                <h3 class="card-title">Add Vehicle Type of {{$vhcat->category}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Type *</label>
                    <input type="text" class="form-control" id="type" name="type" placeholder="Vehicle Type">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Icon (PNG/JPG/JPEG) *</label><br>
                    <input type="file" id="pdf_file" name="pdf_file" onchange="Abc()" style=" background: #ececec;color: black;padding: 1em;">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Service Charge (Rs.) *</label>
                    <input type="number" class="form-control" id="sr_charge" name="sr_charge">
                  </div>

                  <div class="form-group">
   
         <div class="col-sm-10">
            <div class="row">

               <div class="col-md-4">
                    <label class="col-sm-12 control-label">Min.Fare(Rs.) *</label>
                  <div class="input-group">
                     <input type="number" class="form-control" id="mincharge">
                    
                  </div>
               </div>               
               <div class="col-md-4">
                 <label class="col-sm-12 control-label">Min.Distance(Km) *</label>
                  <div class="input-group">
                     <input type="number" class="form-control" id="mindist">
                     
                  </div>                  
               </div>
               <div class="col-md-4">
                    <label class="col-sm-12 control-label">Fare/km (Rs.) *</label>
                  <div class="input-group">
                     <input type="number" name="charge" id="charge" class="form-control">
                    
                  </div>
               </div>               
            </div>          
         </div>         
      </div>

       <div class="form-group">
   
         <div class="col-sm-10">
            <div class="row">

               <div class="col-md-6">
                    <label class="col-sm-12 control-label">Tax/Ride(%) *</label>
                  <div class="input-group">
                     <input type="number" class="form-control" id="ride_tax">
                    
                  </div>
               </div>
               <div class="col-md-6">
                    <label class="col-sm-12 control-label">Driver Profit/Ride(%) *</label>
                  <div class="input-group">
                     <input type="number" class="form-control" id="dr_profit">
                    
                  </div>
               </div>               
               <!-- <div class="col-md-4" hidden="">
                 <label class="col-sm-12 control-label">Division Profit/Ride(%) *</label>
                  <div class="input-group">
                     <input type="number" class="form-control" id="div_profit" value="0">
                     
                  </div>                  
               </div> -->
                              
            </div>          
         </div>         
      </div>

      <div class="form-group">
   
         <div class="col-sm-10">
            <div class="row">

               <div class="col-md-3">
                    <label class="col-sm-12 control-label">Special Charge *</label>
                  <div class="input-group" >
                     <select class="form-control" id="spstat">
                       <option value="1">Enabled</option>
                       <option value="2" selected="">Disabled</option>
                     </select>
                    
                  </div>
               </div>
               <div class="col-md-3">
                    <label class="col-sm-8 control-label">Time From</label>
                  <div class="input-group">
                     <input type="time" class="form-control" id="tfrom">
                    
                  </div>
               </div>               
               <div class="col-md-3">
                 <label class="col-sm-8 control-label">Time To</label>
                  <div class="input-group">
                     <input type="time" class="form-control" id="tto">
                     
                  </div>                  
               </div>

               <div class="col-md-3">
                    <label class="col-sm-12 control-label">Charge</label>
                  <div class="input-group" >
                     <select class="form-control" id="mlnum">
                      <option value="">Choose</option>
                       <option value="1.5">1/2x (E.g:Rs.20 -> Rs.30)</option>
                       <option value="2">2x (E.g:Rs.20 -> Rs.40)</option>
                     </select>
                    
                  </div>
               </div>
                              
            </div>          
         </div>         
      </div>
    
                  </div>
                  
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" class="btn yellowbtn" onclick="Save()" id="ab1">Submit</button>
                  <button type="button" class="btn yellowbtn" id="ab2"> <i class="fa fa-spinner fa-spin"></i>   Submit</button>
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
    
      var vhmodel=$('input#type').val();
    
      if(vhmodel=='')
      {
        $('#type').css('border','1px solid red');
        
        return false;
      }
      else
        $('#type').css('border','1px solid #CCC');

       var img=$('#pdf_file').val();
     if(img=='')
     {
      swal({
                                  title: "Please add Icon.",
                                  closeOnClickOutside: false,
                                  icon: "error",
                                  buttons: "Ok",
      
                                })
      return false;
     }
     else

        var sr_charge=$('input#sr_charge').val();
    
      if(sr_charge=='')
      {
        $('#sr_charge').css('border','1px solid red');
        
        return false;
      }
      else
        $('#sr_charge').css('border','1px solid #CCC');


      var mincharge=$('input#mincharge').val();
    
      if(mincharge=='')
      {
        $('#mincharge').css('border','1px solid red');
        
        return false;
      }
      else
        $('#mincharge').css('border','1px solid #CCC');

      var mindist=$('input#mindist').val();
    
      if(mindist=='')
      {
        $('#mindist').css('border','1px solid red');
        
        return false;
      }
      else
        $('#mindist').css('border','1px solid #CCC');


          var charge=$('input#charge').val();
    
      if(charge=='')
      {
        $('#charge').css('border','1px solid red');
        
        return false;
      }
      else
        $('#charge').css('border','1px solid #CCC');

      var ride_tax=$('input#ride_tax').val();
    
      if(ride_tax=='')
      {
        $('#ride_tax').css('border','1px solid red');
        
        return false;
      }
      else
        $('#ride_tax').css('border','1px solid #CCC');

          var dr_profit=$('input#dr_profit').val();
    
      if(dr_profit=='')
      {
        $('#dr_profit').css('border','1px solid red');
        
        return false;
      }
      else
        $('#dr_profit').css('border','1px solid #CCC');

      //   var div_profit=$('input#div_profit').val();
    
      // if(div_profit=='')
      // {
      //   $('#div_profit').css('border','1px solid red');
        
      //   return false;
      // }
      // else
      //   $('#div_profit').css('border','1px solid #CCC');

       var spstat=$('#spstat option:selected').val();
    
      if(spstat==1)
      {
              var tfrom=$('input#tfrom').val();
          
            if(tfrom=='')
            {
              $('#tfrom').css('border','1px solid red');
              
              return false;
            }
            else
              $('#tfrom').css('border','1px solid #CCC');

            var tto=$('input#tto').val();
          
            if(tto=='')
            {
              $('#tto').css('border','1px solid red');
              
              return false;
            }
            else
              $('#tto').css('border','1px solid #CCC');

            var mlnum=$('#mlnum option:selected').val();
          
            if(mlnum=='')
            {
              $('#mlnum').css('border','1px solid red');
              
              return false;
            }
            else
              $('#mlnum').css('border','1px solid #CCC');
      }
      else
      {
        var tfrom='';
        var tto='';
        var mlnum='';
        
      }

      

    
      
     $('#ab1').hide();
      $('#ab2').show();

      data = new FormData();
       data.append('cat', '{{$vhcat->id}}');
        data.append('type', vhmodel);
         data.append('sr_charge', sr_charge);
        data.append('mincharge', mincharge);
        data.append('mindist', mindist);
        data.append('charge', charge);

        data.append('ride_tax', ride_tax);
         data.append('dr_profit', dr_profit);
        //data.append('div_profit', div_profit);
        data.append('spstat', spstat);
        data.append('tfrom', tfrom);
        data.append('tto', tto);
         data.append('mlnum', mlnum);
         data.append('img', $('#pdf_file')[0].files[0]);
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/vehicle-type-add",
         data: data,
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
                       title: "Vehicle type added successfully",
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