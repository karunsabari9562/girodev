 @extends('layouts.Admin')
@section('title')
 driver-rides
  @endsection
  
@section('contents')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ride Details</h1>
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
             Please ensure that all offline payment rides are approved.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    
                    <small class="float-right">Date: {{date("d-M-Y", strtotime($dt))}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                 <strong>Driver Details</strong>
                  <address>
                    <a href="/girokab-admin/active-driver-profile/{{encrypt($driver->id)}}" target="_blank">Name :  {{$driver->name}}</a><br>
                    Id : {{$driver->driver_id}}</a><br>
                    Mob :  {{$driver->mobile}}<br>
                    Div :  {{$driver->GetFranchise->franchise_name}}<br>
                 
                  </address>
                </div>

              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>Ride Id</th>
                      <th>Total Fare</th>
                      <th>Ride Fare</th>
                      <th>Driver Fare</th>
                      <th>Approval</th>
                      <th>Deails</th>
                    
                    </tr>
                    </thead>
                    <tbody>

                     @foreach($booking as $b) 
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$b->booking_id}}</td>
                      <td>
                      Rs. {{$b->total_fare}}
                      </td>

                           <td>Rs.{{$b->fare}}</td>
                      <td>Rs.{{$b->driver_fare}} ( {{$b->driver_percent}}%)</td>
                      @if($b->payment_type==1)
                      <td>approved</td>
                      @else
                        @if($b->offline_pay_admin==0)
                         <td><a href="/girokab-admin/rides-details/{{encrypt($b->id)}}" target="_blank" style="font-size:13px;color:red">pending<i class="fa fa-exclamation-triangle"></i></a></td>
                        @else
                          <td>approved</td>
                        @endif
                      @endif

                      <td>
                    <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/girokab-admin/ride-details/{{encrypt($b->id)}}" class="btn btn-danger btn-sm" target="_blank"><b> View
                    </td>
                    </tr>
                  @endforeach
                    
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

@if(!$cnt)
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
                        <td>Rs.{{$ride_fare}}</td>
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

@else

 <div class="row">
                <div class="col-6">
                  <p class="lead">.</p>
                
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Already Paid..</p>

                  <div class="table-responsive">
                    <table class="table">
                      
                     <tr>
                        <th style="width:50%">Paid Amount :</th>
                        <td>Rs.{{$cnt->paid_amount}}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Paid At :</th>
                        <td>{{$cnt->payment_date->format('d-m-Y h:i a')}}</td>
                      </tr>
                       <tr>
                        <th style="width:50%">Reference Id :</th>
                        <td>{{$cnt->reference_id}}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Remarks : </th>
                        <td>{{$cnt->remarks}}</td>
                      </tr>
                      
                    </table>
                  </div>

                </div>
              </div>
              
             

@endif





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

 var remark=$('#remark').val();

$('#submitButton').hide();
      $('#submitButton1').show();

      data = new FormData();
  data.append('refid', refid);
  data.append('pamount', pamount);
  data.append('remark', remark);
  data.append('drid', '{{$driver->id}}');
  data.append('frid', '{{$driver->franchise}}');
  data.append('tot_amount', '{{$ride_fare}}');
    data.append('ride_dt', '{{$dt}}');
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/driver-salary-pay",
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
                       window.location.href=window.location.href;
                               } 
    
                    });
          }

        }
    
    
    
    
      })
    
    
    
    


}


</script>



     @endsection