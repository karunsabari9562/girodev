
@extends('layouts.Admin')
@section('title')
 vehicle-models
  @endsection
 
@section('contents')




<!-- *************************************** -->
<div class="modal" id="addmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;">
      <div class="modal-header" style="background:#d0a203;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;"><i><img src="{{ asset('admin/img/logo/lg.ico')}}" style="width: 60px;border-radius: 5px;">   Vehicle Model</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('addmodel').style.display='none'"></i>


       
      </div>
      <div class="modal-body">
        <form class="edit-content" id="reject" method="post">


         
          <div class="form-group">
            <label for="reason" class="col-form-label" style="font-weight: bold;">Vehicle Model:</label>
        <input type="text" name="vhmodel" id="vhmodel" class="form-control">
          </div>
      </div>
      <div class="modal-footer" style="border:none;">
        
        <button type="button" class="btn" id="ab1" onclick="Save()" style="background-color: #d98704;color: white;">Add</button>
         <button type="button"  class="btn" id="ab2" disabled="" style="background-color: #d98704;color: white;"> <i class="fa fa-spinner fa-spin"></i>  Add</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- *************************************** -->

<!-- *************************************** -->
<div class="modal" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;">
      <div class="modal-header" style="background:#d0a203;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;"><i><img src="{{ asset('admin/img/logo/lg.ico')}}" style="width: 60px;border-radius: 5px;">   Vehicle Model</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('editmodel').style.display='none'"></i>


       
      </div>
      <div class="modal-body">
        <form class="edit-content" id="reject" method="post">


         
          <div class="form-group">
            <label for="reason" class="col-form-label" style="font-weight: bold;">Vehicle Model:</label>
        <input type="text" name="vhmodel1" id="vhmodel1" class="form-control">
        <input type="hidden" name="bid" id="bid" class="form-control">
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
            <h1>Vehicle Models</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/vehicle-types/{{encrypt($vtype->category)}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>

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
                 <h2 class="card-title" style="font-size: 25px;font-weight: bold;">{{$vtype->GetCategory->category}} - {{$vtype->type}}</h2>
                 <button type="button" class="btn btn-primary" value="Submit" onclick="AddModel()" id="renewbt1" style="float: right;"><i class="nav-icon fa fa-plus"></i>   Add New</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Model</th>
                     <th>Status</th>                  
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($vmodels as $v )
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $v->model }}</td>
                    
                    @if($v->status==1)
                       <td>Active</td>
                    @else
                    <td>Blocked</td>
                    @endif   
              
                
                <td>
                  <a style="cursor: pointer;background-color: blue;border:none;" onclick="EditModel('{{$v->model}}','{{$v->id}}')" class="btn btn-danger btn-sm"><b> <i class="fa fa-edit" aria-hidden="true"></i></b></a>
                      @if($v->status==1)
                        <a style="cursor: pointer;background-color: #fd7e14;border:none;" onclick="Block('{{$v->id}}')" class="btn btn-danger btn-sm"><b> <i class="fa fa-ban" aria-hidden="true"></i></b></a>
                    @else
                   <a style="cursor: pointer;background-color: green;border:none;" onclick="Active('{{$v->id}}')" class="btn btn-danger btn-sm"><b> <i class="fa fa-check" aria-hidden="true"></i></b></a>
                    @endif 
                 
                  <a style="cursor: pointer;background-color: red;border:none;" onclick="Block()" class="btn btn-danger btn-sm"><b> <i class="fa fa-trash" aria-hidden="true"></i>     </b></a>
                </td>
              
                
                     
                      
                  </tr>

                  @endforeach
               
    
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sl.No</th>
                    <th>Model</th>
                     <th>Status</th>                  
                    <th>Actions</th>
                  </tr>
                  </tfoot>
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

  function AddModel()
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

    
      
     $('#ab1').hide();
      $('#ab2').show();

      data = new FormData();
       data.append('category', '{{$vtype->category}}');
        data.append('type', '{{$vtype->id}}');
  data.append('vhmodel', vhmodel);
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/vehicle-model-add",
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
              // $('#ab2').hide();
              // $('#ab1').show();
              //  swal({
              //          title: "Vehicle model added successfully",
              //          closeOnClickOutside: false,
              //          icon: "success",
              //         buttons: "Ok",
              //       })
    
              //        .then((willDelete) => {
              //         if (willDelete) {
              //          window.location.href=window.location.href;
              //                  } 
    
              //       });
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
  data.append('vhmodel1', vhmodel1);
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/vehicle-model-edit",
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
              //  swal({
              //          title: "Vehicle model updated successfully",
              //          closeOnClickOutside: false,
              //          icon: "success",
              //         buttons: "Ok",
              //       })
    
              //        .then((willDelete) => {
              //         if (willDelete) {
              //          window.location.href=window.location.href;
              //                  } 
    
              //       });
          }

        }
    
    
    
    
      })
    
    
    
    
    
    
    } 
  
function Block(val)
    {
    
  
 swal({
  title: "Do you want to block this vehicle model ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/block-model',
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
                              title: "Vehicle model blocked successfully.",
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
  title: "Do you want to activate this vehicle model ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

  var body=val;




$.ajax({

              type:"POST",
              url:'/activate-model',
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
                              title: "Vehicle model activated successfully.",
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

</script>


@endsection

