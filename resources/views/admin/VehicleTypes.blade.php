
@extends('layouts.Admin')
@section('title')
 vehicle-types
  @endsection
 
@section('contents')



<!-- *************************************** -->
<div class="modal" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;">
      <div class="modal-header" style="background:#d0a203;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;"><i><img src="{{ asset('admin/img/logo/lg.ico')}}" style="width: 60px;border-radius: 5px;">    Vehicle Model</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('editmodel').style.display='none'"></i>


       
      </div>
      <div class="modal-body">
        <form class="edit-content" id="reject" method="post">


         
          <div class="form-group">
            <label for="reason" class="col-form-label" style="font-weight: bold;">Vehicle Model:</label>
        <input type="text" name="vhmodel1" id="vhmodel1" class="form-control">
        <input type="hidden" name="bid" id="bid" class="form-control">
          </div>
          <div class="form-group">
            <label for="reason" class="col-form-label" style="font-weight: bold;">Icon:</label>
        <input type="file" name="pdf_file1" id="pdf_file1" class="form-control" onchange="Abc1()">
          </div>
      </div>
      <div class="modal-footer" style="border:none;">
        
        <button type="button" class="btn" id="ab3" onclick="Edit()" style="background-color: #d98704;color: white;">Update</button>
         <button type="button"  class="btn" id="ab4" disabled="" style="background-color: #d98704;color: white;"> <i class="fa fa-spinner fa-spin"></i>  Update</button>
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
            <h1>Vehicle Types</h1>
           
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
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h2 class="card-title" style="font-size: 25px;font-weight: bold;">{{$vhcat->category}}</h2>
                  <!-- <button type="button" class="btn btn-primary" value="Submit" onclick="AddType()" id="renewbt1" style="float: right;"><i class="nav-icon fa fa-plus"></i>   Add New</button> -->
                  <button type="button" class="btn yellowbtn" value="Submit" onclick="window.location.href='/add-vehicletype/{{encrypt($vhcat->id)}}'" id="renewbt1" style="float: right;"><i class="nav-icon fa fa-plus"></i>   Add New</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Type</th>
                    <th>Icon</th>
                    <th>Min.fare</th>
                    <th>Fare/km</th>
                    <th>Service Charge</th>
                    <th>Tax</th>
                    <th>Driver Profit</th>
                  <!--   <th>Div. Profit</th> -->
                    <th>Special Charge</th>
                    
                     <th>Status</th> 
                     <th>Update</th>                   
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($vtypes as $v )
                    @php
                    $t1 = date("h:m A", strtotime($v->timefrom));
                    $t2 = date("h:m A", strtotime($v->timeto));
                    @endphp
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><a href="/fare-histories/{{encrypt($v->id)}}">{{ $v->type }}</a></td>
                    <td><img src="{{asset($v->icon)}}" style="width: 75px;border-radius: 5px;"></td>
                    <td>Rs.{{ $v->minimum_fare }} / {{ $v->minimum_distance }}Km  </td>
                      
                    <td> Rs.{{ $v->fare }}</span></td>
                    <td> Rs.{{ $v->service_charge }}</td>
                    <td> {{ $v->ride_tax }} %</td>
                     <td> {{ $v->driver_profit }} %</td>
                    <!-- <td> {{ $v->div_profit }} %</td> -->

                     @if($v->special_ride==1)
                  <td style="color: green;">Enabled<br>From : {{ $t1 }}<br>To : {{ $t2 }}<br> Fare : Fare*{{$v->sp_charge}}</td>
                    @else
                    <td style="color: red;">Disabled</td>
                    @endif 
                    
                    @if($v->status==1)
                       <td>Active</td>
                    @else
                    <td>Blocked</td>
                    @endif   
              
                
              <td>
                  <a style="cursor: pointer;background-color: blue;border:none;" onclick="window.location.href='/edit-vehicletype/{{encrypt($v->id)}}'" class="btn btn-danger btn-sm"><b> <i class="fa fa-edit" aria-hidden="true"></i></b></a>
                </td>
                <td>
                 
                      @if($v->status==1)
                        <a style="cursor: pointer;background-color: #fd7e14;border:none;" onclick="Block('{{$v->id}}')" class="btn btn-danger btn-sm"><b> <i class="fa fa-ban" aria-hidden="true"></i></b></a>
                    @else
                   <a style="cursor: pointer;background-color: green;border:none;" onclick="Active('{{$v->id}}')" class="btn btn-danger btn-sm"><b> <i class="fa fa-check" aria-hidden="true"></i></b></a>
                    @endif 
                 
                  <!-- <a style="cursor: pointer;background-color: red;border:none;" onclick="Block()" class="btn btn-danger btn-sm"><b> <i class="fa fa-trash" aria-hidden="true"></i>     </b></a> -->
                </td>
              
                
                 
                      
                  </tr>

                  @endforeach
               
    
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  




<!-- Page specific script -->

<script>


  function AddType()
{

var modal1 = document.getElementById("addmodel");

modal1.style.display = "block";
}

 function EditModel(val1,val2)
{

var modal2 = document.getElementById("editmodel");
$('#vhmodel1').val(val1);
$('#bid').val(val2);
modal2.style.display = "block";
}

 function EditFare(val1,val2,val3,val4)
{

var modal3 = document.getElementById("editfare");
$('#charge1').val(val1);
$('#bbid').val(val2);
$('#mincharge1').val(val3);
$('#mindist1').val(val4);
modal3.style.display = "block";
}


function EditCharge()
    {
    
      var charge1=$('input#charge1').val();
    
      if(charge1=='')
      {
        $('#charge1').css('border','1px solid red');
        
        return false;
      }
      else
        $('#charge1').css('border','1px solid #CCC');

      var mincharge1=$('input#mincharge1').val();
    
      if(mincharge1=='')
      {
        $('#mincharge1').css('border','1px solid red');
        
        return false;
      }
      else
        $('#mincharge1').css('border','1px solid #CCC');

      var mindist1=$('input#mindist1').val();
    
      if(mindist1=='')
      {
        $('#mindist1').css('border','1px solid red');
        
        return false;
      }
      else
        $('#mindist1').css('border','1px solid #CCC');

    var bbid=$('input#bbid').val();
      
     $('#ab5').hide();
      $('#ab6').show();

      data = new FormData();
        data.append('bbid', bbid);
  data.append('charge1', charge1);
   data.append('mincharge1', mincharge1);
    data.append('mindist1', mindist1);
  data.append('category', '{{$vhcat->id}}');

  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/vehicle-fare-edit",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
            window.location.href=window.location.href;
              // $('#ab4').hide();
              // $('#ab3').show();
               // swal({
               //         title: "Vehicle type updated successfully",
               //         closeOnClickOutside: false,
               //         icon: "success",
               //        buttons: "Ok",
               //      })
    
               //       .then((willDelete) => {
               //        if (willDelete) {
               //         window.location.href=window.location.href;
               //                 } 
    
               //      });
          }

        }
    
    
    
    
      })
    
    
    
    
    
    
    } 


 function Save()
    {
    
      var vhmodel=$('input#vhmodel').val();
    
      if(vhmodel=='')
      {
        $('#vhmodel').css('border','1px solid red');
        
        return false;
      }
      else
        $('#vhmodel').css('border','1px solid #CCC');

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

    
      
     $('#ab1').hide();
      $('#ab2').show();

      data = new FormData();
       data.append('cat', '{{$vhcat->id}}');
        data.append('type', vhmodel);
        data.append('mincharge', mincharge);
        data.append('mindist', mindist);
        data.append('charge', charge);
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
              // $('#ab2').hide();
              // $('#ab1').show();
              window.location.href=window.location.href;
               // swal({
               //         title: "Vehicle type added successfully",
               //         closeOnClickOutside: false,
               //         icon: "success",
               //        buttons: "Ok",
               //      })
    
               //       .then((willDelete) => {
               //        if (willDelete) {
               //         window.location.href=window.location.href;
               //                 } 
    
               //      });
          }

        }
    
    
    
    
      })
    
    
    
    
    
    
    } 


function Edit()
    {
    
      var vhmodel1=$('input#vhmodel1').val();
    
      if(vhmodel1=='')
      {
        $('#vhmodel1').css('border','1px solid red');
        
        return false;
      }
      else
        $('#vhmodel1').css('border','1px solid #CCC');

    var bid=$('input#bid').val();
      
     $('#ab3').hide();
      $('#ab4').show();

      data = new FormData();
        data.append('bid', bid);
  data.append('type', vhmodel1);
  data.append('img', $('#pdf_file1')[0].files[0]);
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/vehicle-type-edit",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
            window.location.href=window.location.href;
              // $('#ab4').hide();
              // $('#ab3').show();
               // swal({
               //         title: "Vehicle type updated successfully",
               //         closeOnClickOutside: false,
               //         icon: "success",
               //        buttons: "Ok",
               //      })
    
               //       .then((willDelete) => {
               //        if (willDelete) {
               //         window.location.href=window.location.href;
               //                 } 
    
               //      });
          }

        }
    
    
    
    
      })
    
    
    
    
    
    
    } 
  
function Block(val)
    {
    
  
 swal({
  title: "Do you want to block this vehicle type ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/block-type',
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
                              title: "Vehicle type blocked successfully.",
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


function Active(val)
    {
    
  
 swal({
  title: "Do you want to activate this vehicle type ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/activate-type',
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
                              title: "Vehicle type activated successfully.",
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

function Abc1()
  {
                  var name = document.getElementById("pdf_file1").files[0].name;
  //alert(name)
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  //if(jQuery.inArray(ext, ['gif','png','jpg','jpeg','pdf']) == -1)
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1)

  {
   alert("Invalid File.");
   $('input#pdf_file1').val("");
   return false;
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("pdf_file1").files[0]);
  var f = document.getElementById("pdf_file1").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 6000000)
  {
   alert("File Size is very big");
   $('input#pdf_file1').val("");
   return false;
  }

  
}

</script>


@endsection

