 @extends('layouts.Franchise')
@section('title')
 document-approval
  @endsection
 
@section('contents')





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Vehicle Pollution Certificate Approval</h1>
          </div>
          <div class="col-sm-6 d-none d-sm-block">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/documents-reuploads"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>
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
              
<center>
                <div class="card-header">
                   <a href="{{asset($docs->GetDriver->photo)}}" target="_blank" class="nav-link"><img src="{{ asset($docs->GetDriver->photo)}}" class="img-circle" alt="User Image" style="width: 50%;"></a>
              </div>
             </center>
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

              <div class="card-header" style="cursor: pointer;">
                <h5 class="card-title">Profile Details</h5>
                <div class="card-tools">
                  <a href="/active-driver-profile/{{encrypt($docs->GetDriver->id)}}" class="btn btn-tool" target="_blank" style="color: black;">View</a>
                
                </div>
              </div>

              <div class="card-header" style="cursor: pointer;" onclick="RegHis()">
                <h5 class="card-title">Rejection History</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">View</a>
                
                </div>
              </div>
              
              
              
              
             
              
              

              




            </div>
          </div>
        </div>

<!-- ///////////////// -->


<div class="card card-row">
          <div class="card-header" style="background-color: #fab60b;color: white;">
            <h3 class="card-title">
             Vehicle Pollution Certificate 
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
                <!-- <h5 class="card-title">File :</h5> -->
                <div class="card-tools">
                         <input type="file" name="pdf_file" id="pdf_file" style=" background: #ececec;
                color: black;padding: 1em 0.2rem;border-radius: 5px;" onchange="Abc()">
                
                </div>
              </div>
               <div class="card-header">
                <h5 class="card-title">Expiry :</h5>
                <div class="card-tools">
                         <input type="date" class="form-control" name="dlexpiry" id="dlexpiry" value="{{$docs->doc_expiry}}" min="{{date('Y-m-d')}}">
                
                </div>
              </div>

              <br>
              <!--  <h5 class="card-title">Reject if ,</h5>
           <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="b1" value="Invalid Vehicle Pollution Certificate">
                  <label for="b1" class="custom-control-label">Invalid Vehicle Pollution Certificate </label>
                </div>
              
              
                
              </div> -->



              <div class="card-header">
             @if($docs->franchise_approval==1)
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


      


<div class="card card-row card-primary" id="rejj1">
          <div class="card-header" style="background-color: #c70000;color: white;">
            <h3 class="card-title">
              Rejection History
            </h3>
            <i class="fa fa-window-close" aria-hidden="true" style="float: right;cursor: pointer;" onclick="Close()"></i>
          </div>
       

          <div class="card-body">
            <div class="card card-primary card-outline">
              

              @if(!$driver_rej->isEmpty())
             
             @foreach($driver_rej as $dj)
             
              <div class="card-header">
                <h5 class="card-title"><i class="fa fa-exclamation-circle" style="color:#c70000 "></i>    {{$dj->rejection_reason}}</h5>
                @if($dj->rejected_by==2)
                <br><span style="font-size: 13px;">(By Admin)</span>
                @endif
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;">{{$dj->rejected_date->format('d-m-Y')}}</a>
                  
                </div>
              </div>
              @endforeach
              @else


               <div class="card-header">
                <h5 class="card-title"> No data found !</h5>
                <div class="card-tools">
                  <a class="btn btn-tool" style="color: black;"></a>
                  
                </div>
              </div>
             
               @endif

            </div>
          </div>
        </div>
      
        
      </div>
    </section><br><br>
  </div>

  <script type="text/javascript">

    function RegHis()
    {
      $('#rejj1').show();
    }
    function Close()
    {
      $('#rejj1').hide();
    }

 function Approve()
    {

      var dlexpiry=$('input#dlexpiry').val();
    if(dlexpiry=='')
    {
        $('#dlexpiry').focus();
        $('#dlexpiry').css({'border':'1px solid red'});
        return false;
    }
    else
        $('#dlexpiry').css({'border':'1px solid #CCC'});

       swal({
  title: "Do you want to send this document for admin approval ?",
  text: "Ensure that the Vehicle Pollution Certificate  validated thoroughly.",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

      
     $('#btt').hide();
      $('#btt1').show();

      data = new FormData();

  data.append('dr','{{$docs->driver_id}}');
  data.append('dtype','{{$docs->doc_type}}');
  data.append('expiry',dlexpiry);
    data.append('imgg', $('#pdf_file')[0].files[0]);
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
           
               $('#bt6').hide();
      $('#bt5').show();
               swal({
                       title: "Vehicle Pollution Certificate sent for admin approval successfully",
                      //text: "This profile moved to submission pending list .",
                       closeOnClickOutside: false,
                       icon: "success",
                      buttons: "Ok",
                    })
    
                     .then((willDelete) => {
                      if (willDelete) {
                       window.location.href='/documents-reuploads';
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

       swal({
  title: "Do you want to reject this document ?",
  //text: "Ensure that this student has a valid reason for a this action .",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

     var cnt=0;
      if($("#b1").prop('checked') == true)
      {
        var err1=$("#b1").val();

        var cnt=cnt+1;
      }
      else
      {
        var err1=0;
      }


      
    if(cnt==0)
    {
       swal({
                       title: "Please select reason for rejection",
                       closeOnClickOutside: false,
                       icon: "error",
                      buttons: "Ok",
                    });
      return false;
    }
    else
      
     $('#bt3').hide();
      $('#bt4').show();

      data = new FormData();
     
  data.append('err1', err1);
  data.append('docid','{{$docs->id}}');
   data.append('drid','{{$docs->driver_id}}');
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/reject-driverdoc",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
           
               $('#bt4').hide();
      $('#bt3').show();
               swal({
                       title: "Vehicle Pollution Certificate rejected successfully",
                       closeOnClickOutside: false,
                       icon: "success",
                      buttons: "Ok",
                    })
    
                     .then((willDelete) => {
                      if (willDelete) {
                       window.location.href='/documents-reuploads';
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