
 @extends('layouts.Admin')
@section('title')
 driver-account-renew
  @endsection
 
@section('contents')

<style type="text/css">

/*PRELOADING------------ */


</style>

<!-- *************************************** -->
<div class="modal" id="addreg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none;">
      <div class="modal-header" style="background:#fab60b;color: white;border:none; ">
        <h5 class="modal-title" id="exampleModalLabel"  style="font-size: 25px;font-weight: bold;"><i>  Reject Renewal</i></h5><i class="fa fa-times-circle" aria-hidden="true" style="font-weight: bold;font-size: 25px;cursor: pointer;" onclick="document.getElementById('addreg').style.display='none'"></i>


       
      </div>
      <div class="modal-body">
        <form class="edit-content" id="reject" method="post">


         
          <div class="form-group">
            <label for="reason" class="col-form-label" style="font-weight: bold;">Reason:</label>
        
            <textarea class="form-control" rows="5" id="reason" name="reason">Invalid Payment</textarea>
            
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Drivers Account Renewals</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href=""><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li> -->

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
                 <!--<h2 class="card-title" style="font-size: 16px;font-weight: bold;">Pending</h2>-->
               <button type="button" class="btn yellowbtn" value="Submit" onclick="window.location.href='/girokab-admin/rejected-renewals'" id="renewbt1" style="float: right;">Rejected Renewals</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                     
                    <th>Driver Id</th>
                    <th>Name</th>
                    <th>Mobile</th>
                   <!--  <th>Current Expiry Date</th>
                    <th>Franchise</th> -->
                    <th>Payment Date</th>
                    <th>Amount</th>
                    <th>Reference Id</th>
                    
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($driver as $v )

                    
                  <tr>
                    <td>{{$loop->iteration}}</td>
                     <td>{{ $v->GetDriver->driver_id }}</td>
                    <td>{{ $v->GetDriver->name }}</td>
                    <td>{{ $v->GetDriver->mobile }}</td>
            

                    <td>{{$v->payment_date->format('d-m-Y')}}</td>
                    <td>Rs.{{ $v->amount }}</td>
                    <td>{{ $v->reference_id }}</td>
                   

                   

                   
                  <td>
                  <a style="cursor: pointer;background-color: #fab60b;border:none;" onclick="Approve('{{$v->id}}')"  class="btn btn-danger btn-sm"><b> Approve     </b></a>
                    <a style="cursor: pointer;background-color: red;border:none;" onclick="Reject('{{$v->id}}')" class="btn btn-danger btn-sm"><b> Reject     </b></a>
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

   function Approve(payid)
    {

       swal({
  title: "Do you want to approve this renewal request ?",
  text: "Ensure that the payment details validated thoroughly.",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {


   $('body').css("filter","blur(4px)");


   

      data = new FormData();

  data.append('payid',payid);
 
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/girokab-admin/approve-renewal",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
           
   $('body').css("filter","blur(0px)");
               $('#bt6').hide();
      $('#bt5').show();
               swal({
                       title: "Renewal request approved successfully",
                      text: "Driver account expiry date changed successfully.",
                       closeOnClickOutside: false,
                       icon: "success",
                      buttons: "Ok",
                    })
    
                     .then((willDelete) => {
                      if (willDelete) {
                       window.location.href= window.location.href;
                               } 
    
                    });
          }

        }
    
    
    
    
      })
    
    
    
    } 
  
});
    
    
    } 


function Reject(payid)
{
 
 
var modal2 = document.getElementById("addreg");

modal2.style.display = "block";
$('#bid').val(payid);
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

   var payid= $('input#bid').val();

    data = new FormData();
data.append('reason', reason);
data.append('payid', payid);
 
 data.append('_token', @json(csrf_token()));

$('#ab1').hide();
$('#ab2').show();


  $.ajax({

    type:"POST",
    url:"/girokab-admin/reject-renewal-req",
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
                              title: "Renewal request rejected successfully.",
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
  

</script>


@endsection

