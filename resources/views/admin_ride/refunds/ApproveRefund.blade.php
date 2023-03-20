 @extends('layouts.Admin')
@section('title')
 approve-refund
  @endsection
  
@section('contents')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Refund Request Approval</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="javascript:window.open('','_self').close();"><i class="fa fa-times" aria-hidden="true"></i>  close</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-warning">
             <h5><i class="fas fa-warning"></i> Note:</h5>
             Please ensure that the customer is eligible for refund.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    
                    <small class="float-right"></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                 
                </div>

              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                     
                    <th>Customer</th>
                    <th>Driver</th>
                    <th>Ride Fare</th>
                    <th>Ride Date</th>
                    <th>Ride Details</th> 
                    
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
          <td>{{$b->GetCustomer->name}}<br>Mob: {{$b->GetCustomer->mobile}}</td>
                        <td><a href="/girokab-admin/active-driver-profile/{{encrypt($b->driver_id)}}" target="_blank">Id: {{$b->GetDriver->driver_id}}</a><br>
            
                      <td>Rs.{{$b->total_fare}}</td>

                     <td>{{$b->booked_at->format('d-m-Y')}}</td>
                    
                    <td>
                    <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/girokab-admin/refund-ride-details/{{encrypt($b->id)}}" class="btn btn-danger btn-sm" target="_blank"><b> View </b></a>
                </td>
                    </tr>
     
                    
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->


              <div class="row">
                <div class="col-6">
                  <p class="lead">.</p>
                
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Date : {{date("d-m-Y", strtotime(date('Y-m-d')))}}</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>Rs.{{$b->total_fare}}</td>
                      </tr>
                     
                       <tr>
                        <th style="width:50%">Reference Id * :</th>
                        <td><input type="text" name="refid" id="refid" class="form-control"></td>
                      </tr>
                      <tr>
                        <th style="width:50%">Paid Amount * :</th>
                        <td><input type="text" name="pamount" id="pamount" class="form-control"></td>
                      </tr>
                       <tr>
                        <th style="width:50%">Payment Date * :</th>
                        <td><input type="date" name="pdt" id="pdt" class="form-control"></td>
                      </tr>
                      <tr>
                        <th style="width:50%">Remarks:</th>
                        <td><textarea class="form-control" name="remark" id="remark"></textarea></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              
              <div class="row no-print">
                <div class="col-12">
           
                  <button type="button" id="submitButton" class="btn yellowbtn float-right" onclick="Pay()"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>

                  <button type="button" id="submitButton1" class="btn yellowbtn float-right" disabled=""><i class="far fa-credit-card"></i> Submitting
                    Payment....
                  </button>
               
                </div>
              </div>






            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>


<script type="text/javascript">
  
function Pay()

{
  var refid=$('input#refid').val();
  if(refid=='')
  {
    $('#refid').css('border','1px solid red');
    return false;
  }
  else
    $('#refid').css('border','1px solid #CCC');

   var pamount=$('input#pamount').val();
  if(pamount=='')
  {
    $('#pamount').css('border','1px solid red');
    return false;
  }
  else
    $('#pamount').css('border','1px solid #CCC');

     var pdt=$('input#pdt').val();
  if(pdt=='')
  {
    $('#pdt').css('border','1px solid red');
    return false;
  }
  else
    $('#pdt').css('border','1px solid #CCC');


 var remark=$('#remark').val();

$('#submitButton').hide();
      $('#submitButton1').show();

      data = new FormData();
      data.append('uid', '{{$b->id}}');
  data.append('bid', '{{$b->bid}}');
  data.append('cid', '{{$b->customer_id}}');
  data.append('did', '{{$b->driver_id}}');
  data.append('rdate', '{{$b->booked_date}}');
  data.append('refid', refid);
  data.append('pamount', pamount);
  data.append('pdt', pdt);
  data.append('remark', remark);

  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/girokab-admin/pay-refund",
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
                       title: "Payment details added successfully",
                       closeOnClickOutside: false,
                       icon: "success",
                      buttons: "Ok",
                    })
    
                     .then((willDelete) => {
                      if (willDelete) {
                       window.location.href='/girokab-admin/refund-requests';
                               } 
    
                    });
          }

        }
    
    
    
    
      })
    
    
    
    


}


</script>



     @endsection