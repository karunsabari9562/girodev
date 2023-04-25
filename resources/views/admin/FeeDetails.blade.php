
@extends('layouts.Admin')
@section('title')
 fee-details
  @endsection
 
@section('contents')

<!-- *************************************** -->
<div class="modal" id="addmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;">
      <div class="modal-header" style="background:#fab60b;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 22px;font-weight: bold;">Driver Registration Fee</h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('addmodel').style.display='none'"></i>


       
      </div>
      <div class="modal-body">
        <form class="edit-content" id="reject" method="post">

          <div class="form-group">
            <label for="reason" class="col-form-label" style="font-weight: bold;">Fee (Rs.):</label>
        <input type="number" name="charge" id="charge" class="form-control" value="{{$regfee->fee}}">
          </div>

          
      </div>
      <div class="modal-footer" style="border:none;">
        
        <button type="button" class="btn yellowbtn" id="ab1" onclick="Save()">Update</button>
         <button type="button"  class="btn yellowbtn" id="ab2" disabled="" > <i class="fa fa-spinner fa-spin"></i>  Update</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- *************************************** -->

<!-- *************************************** -->
<div class="modal" id="addmodelrenew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;">
      <div class="modal-header" style="background:#fab60b;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;"><i>  Driver Renewal Fee</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('addmodelrenew').style.display='none'"></i>


       
      </div>
      <div class="modal-body">
        <form class="edit-content" id="reject" method="post">

          <div class="form-group">
            <label for="reason" class="col-form-label" style="font-weight: bold;">Fee (Rs.):</label>
        <input type="number" name="charge1" id="charge1" class="form-control" value="{{$renewfee->fee}}">
          </div>

          
      </div>
      <div class="modal-footer" style="border:none;">
        
        <button type="button" class="btn yellowbtn" id="ab3" onclick="SaveRenew()">Update</button>
         <button type="button"  class="btn yellowbtn" id="ab4" disabled=""> <i class="fa fa-spinner fa-spin"></i>  Update</button>
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
            <h1>Fee & Fare Settings</h1><br>
               
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <!--  <li class="breadcrumb-item"><a href="/vehicle-types"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li> -->

            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid" style="background-color: #f8f9fa;">
        <div class="card-body pb-0">
          <div class="row">

            
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
                      <br>
                      <h2 class="lead"><b>Driver Registration Fee</b></h2>

                      <p class="" style="font-weight: bold;font-size:18px;"><b>Fee Amount : Rs. {{$regfee->fee}}</b> </p>
          <p class="text-sm" style="font-weight: bold;font-size:25px;"><b>Last updated at : {{$regfee->updated_at->format('d-M-Y H:i A')}}</b> </p>
                     

                    </div>
                    
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    
                      
                    <a onclick="EditRegFee()" class="btn btn-sm yellowbtn">
                      Edit
                    </a>
                  </div>
                </div>
              </div>
            </div>

             <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
                      <br>
                      <h2 class="lead"><b>Driver Renewal Fee</b></h2>

                      <p class="" style="font-weight: bold;font-size:18px;"><b>Fee Amount : Rs. {{$renewfee->fee}}</b> </p>
                       <p class="text-sm" style="font-weight: bold;font-size:25px;"><b>Last updated at : {{$renewfee->updated_at->format('d-M-Y H:i A')}}</b> </p>
                     

                    </div>
                    
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    
                      
                    <a onclick="EditRenewFee()" class="btn btn-sm yellowbtn">
                      Edit
                    </a>
                  </div>
                </div>
              </div>
            </div>


            
          </div>
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>
    
  </div>
  <!-- /.content-wrapper -->
  




<!-- Page specific script -->

<script>

   function EditRenewFee()
{

var modal2 = document.getElementById("addmodelrenew");

modal2.style.display = "block";
}

function SaveRenew()
    {
    
      var charge1=$('input#charge1').val();
    
      if(charge1=='')
      {
        $('#charge1').css('border','1px solid red');
        
        return false;
      }
      else
        $('#charge1').css('border','1px solid #CCC');

      
     $('#ab3').hide();
      $('#ab4').show();

      data = new FormData();

  data.append('charge1', charge1);
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/driver-renewfee-edit",
         data: data,
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
                       title: "Driver renewal fee updated successfully",
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
  
  function EditRegFee()
{

var modal1 = document.getElementById("addmodel");

modal1.style.display = "block";
}

function Save()
    {
    
      var charge=$('input#charge').val();
    
      if(charge=='')
      {
        $('#charge').css('border','1px solid red');
        
        return false;
      }
      else
        $('#charge').css('border','1px solid #CCC');

      
     $('#ab1').hide();
      $('#ab2').show();

      data = new FormData();

  data.append('charge', charge);
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/driver-regfee-edit",
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
                       title: "Driver registration fee updated successfully",
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



</script>


@endsection

