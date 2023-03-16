
@extends('layouts.Admin')
@section('title')
active-division
  @endsection
 
@section('contents')




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Active Divisions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right custom-breadcrumb">
              <li class="breadcrumb-item"><a href="/franchise-area"><i class="fa fa-arrow-left" aria-hidden="true"></i>  Back</a></li>

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
                 <h2 class="card-title" style="font-size: 25px;font-weight: bold;">Active Divisions</h2>
                 <!-- <button type="button" class="btn btn-primary" value="Submit" onclick="AddModel()" id="renewbt1" style="float: right;"><i class="nav-icon fa fa-plus"></i>   Add New</button> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Division Id</th>
                     <th>Division Type</th>
                     <th>Division</th> 
                     <th>Proprietor</th>
                     <th>Mobile</th> 
                    <!--  <th>District</th>
                     <th>Location</th>  -->
                     <th>Valid To</th>
                     <th>Drivers</th>                     
                    <th>Profile</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($franchise as $f )
                    @php
                    $dt = date("d-m-Y", strtotime($f->valid_to));
                   
                    @endphp
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $f->franchise_id }}</td>
                    @if($f->franchise_type==1 )
                    <td>Own</td>
                    @else
                     <td>Other</td>
                    @endif
                    <td>{{ $f->franchise_name }}</td>
                    <td>{{ $f->proprietor_name }}</td>
                    <td>{{ $f->franchise_mobile }}</td>
                    
                    <td>{{ $dt}}</td>
                    
                  <td>
                  <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/girokab-admin/franchise-drivers/{{encrypt($f->id)}}" class="btn btn-danger btn-sm"><b> View</b></a>
                      
                 
                
                </td>
                
                <td>
                  <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/franchise-details/{{encrypt($f->id)}}" target="_blank" class="btn btn-danger btn-sm"><b> View</b></a>
                      
                 
                
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

