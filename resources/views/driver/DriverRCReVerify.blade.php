 @extends('layouts.Admin')
@section('title')
 document-approval
  @endsection
 
@section('contents')

<!-- *************************************** -->
<div class="modal" id="addreg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;">
      <div class="modal-header" style="background:#fab60b;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;"><i>  Reject Vehicle RC</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('addreg').style.display='none'"></i>


       
      </div>
      <div class="modal-body">
        <form class="edit-content" id="reject" method="post">


         
          <div class="form-group">
            <label for="reason" class="col-form-label" style="font-weight: bold;">Reason:</label>
        
            <textarea class="form-control" rows="5" id="reason" name="reason"></textarea>
            
          </div>
         
        <input type="hidden" name="bid" id="bid">
      </div>
      <div class="modal-footer" style="border:none;">
        
        <button type="button" class="btn yellowbtn" id="ab1" onclick="Save()">Submit</button>
         <button type="button"  class="btn yellowbtn" id="ab2" disabled=""> <i class="fa fa-spinner fa-spin"></i>  Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- *************************************** -->




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Vehicle RC Approval</h1>
          </div>
          <div class="col-sm-6 d-none d-sm-block">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/girokab-admin/driver-profile-updates"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content pb-3">
      <div class="container-fluid h-100">


         <div class="card card-row">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Basic Details
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">
              

              <div class="card-header">
                <h5 class="card-title">Name :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;font-size: 20px;">{{$docs->GetDriver->name}}</a>
                  
                </div>
              </div>
        <div class="card-header">
                <h5 class="card-title">Driver Id :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$docs->GetDriver->driver_id}}</a>
                
                </div>
              </div>
               <div class="card-header">
                <h5 class="card-title">Mobile :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$docs->GetDriver->mobile}}</a>
                
                </div>
              </div>

              <div class="card-header">
                <h5 class="card-title">Division :</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$docs->GetFranchise->franchise_name}}</a>
                
                </div>
              </div>

              
              
              
              
             
              
              

              




            </div>
          </div>
        </div>

<!-- ///////////////// -->


<div class="card card-row">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
              Vehicle RC
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">

              <center>
                <div class="card-header">
                   <a href="{{asset($docs->doc_file)}}" target="_blank" class="nav-link"><img src="{{ asset('default/file.png')}}" alt="User Image" style="width: 50%;"></a>
              </div>
             </center>
              

               <div class="card-header">
                <h5 class="card-title">Expiry :</h5>
                <div class="card-tools">
                         <input type="date" class="form-control" name="dlexpiry" id="dlexpiry" value="{{$docs->doc_expiry}}" readonly="">
                
                </div>
              </div>

             



              <div class="card-header">
             @if($docs->admin_approval==1)
                  <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" disabled="" id="renewbt1"><i class="fa fa-check"></i>  Approved</button></h5>
                  @else
                    <h5 class="card-title"><button type="button" class="btn yellowbtn" value="Submit" onclick="Approve()" id="renewbt1">  Approve</button></h5>
                  @endif
                

                    <button type="button" class="btn redbtn" value="Submit" onclick="Reject()" id="bt3" style="float: right;">  Reject</button>
                 <button type="button" class="btn redbtn" value="Submit" disabled="" id="bt4" style="float: right;">  Reject</button>
              </div>

              



            </div>
          </div>
        </div>


<!-- ////////////////////////////////////////////////// -->



        

<!-- ////////////////////////////////////////////////// -->




<!-- ////////////////////////////////////////////////// -->



  

<!-- ////////////////////////////////////////////////// -->


      

<div class="card card-row card-primary" id="rej1">
          <div class="card-header" style="background-color: #c70000;color: white;">
            <h3 class="card-title">
              Rejection History
            </h3>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">
              @if($driver_rejcnt==0)
               <div class="card-header">
                <h5 class="card-title"> No data found !</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;"></a>
                  
                </div>
              </div>
              @else
             
             @foreach($driver_rej as $dj)
             @php
             $rejdt = date("d-m-Y", strtotime($dj->rejected_date));
             @endphp
              <div class="card-header">
                <h5 class="card-title"><i class="fa fa-exclamation-circle" style="color:#c70000 "></i>    {{$dj->rejection_reason}}</h5>
                @if($dj->rejected_by==1)
                <br><span style="font-size: 13px;">(By Franchise)</span>
                @endif
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$rejdt}}</a>
                  
                </div>
              </div>
              @endforeach
               @endif

            </div>
          </div>
        </div>

      
        
      </div>
    </section><br><br>
  </div>

  <script type="text/javascript">

 function Approve()
    {

       swal({
  title: "Do you want to approve this Vehicle RC ?",
  text: "Ensure that the Vehicle RC validated thoroughly.",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

      
     $('#btt').hide();
      $('#btt1').show();

      data = new FormData();

  data.append('did','{{$docs->driver_id}}');
  data.append('docid','{{$docs->id}}');
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/admin/rc-reapproval",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
           
               $('#bt6').hide();
      $('#bt5').show();
               swal({
                       title: "Vehicle RC approved successfully",
                      //text: "This profile moved to submission pending list .",
                       closeOnClickOutside: false,
                       icon: "success",
                      buttons: "Ok",
                    })
    
                     .then((willDelete) => {
                      if (willDelete) {
                       window.location.href='/girokab-admin/driver-profile-updates';
                               } 
    
                    });
          }

        }
    
    
    
    
      })
    
    
    
    } 
  
});
    
    
    } 

    

function Reject()
    {

       var modal2 = document.getElementById("addreg");

modal2.style.display = "block";
}


function Save()
{


  var reason=$('#reason').val();

  if(reason=='')
  {
    $('#reason').css('border','1px solid red');
    
    return false;
  }
  else
    $('#reason').css('border','1px solid #CCC');

    var docid='{{$docs->id}}';

    data = new FormData();
data.append('reason', reason);
   data.append('docid', docid);
   data.append('drid', '{{$docs->driver_id}}');
 data.append('_token', @json(csrf_token()));

$('#ab1').hide();
$('#ab2').show();


  $.ajax({

    type:"POST",
    url:"/admin/reject-driverdoc",
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
                              title: "Vehicle RC rejected successfully.",
                              //text: "Username and Password send to your Email",
                              icon: "success",
                              buttons: "Ok",
                               closeOnClickOutside: false
  
                            })

                      .then((willDelete) => {
                       if (willDelete) {
                             window.location.href='/girokab-admin/driver-profile-updates';
                                  } 

                            });
                                 
      }
      
      

    }




  })

    
    
    } 









  </script>

  @endsection