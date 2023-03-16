@extends('layouts.Admin')
@section('title')
completed-rides
  @endsection
  
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Todays Bookings</li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- COLOR PALETTE -->
       <div class="card card-default">
          <div class="card-header">
<h3 class="card-title" style="font-size: 20px;font-weight: bold;">Summary - {{date("Y-M", strtotime($first_day))}}</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
             
            
              <div class="col-md-6">
                <p class="lead">Division : {{$frdt->franchise_name}}</p>

                  <div class="table-responsive">
                    <table class="table">
                       <tr>
                        <th style="width:50%">Total Completed Rides</th>
                        <td>{{$cnt}}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Total Ride Fare</th>
                        <td>Rs.{{$ride_fare}}</td>
                      </tr>
                      <tr>
                        <th>Total Tax Amount</th>
                        <td>Rs.{{$tax}}</td>
                      </tr>
                      <tr>
                        <th>Total Service Charge</th>
                        <td style="font-size: 17px;font-weight: bold;">Rs.{{$sr}}</td>
                      </tr>
                    
                      <tr>
                        <th>Total Collection</th>
                        <td>Rs.{{$sum}}</td>
                      </tr>
                      <tr>
                        <th>Special Charged Rides</th>
                        <td>{{$sp}}</td>
                      </tr>
                    </table>
               
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

             <div class="col-md-6">
                <p class="lead">Summary</p>

                  <div class="table-responsive">
                    <table class="table">
                      
                      <tr>
                        <th>Online Payment</th>
                        <td>Rs.{{$sum1}}</td>
                      </tr>
                      <tr>
                        <th>Offline Payment</th>
                        <td>Rs.{{$sum2}}</td>
                      </tr>
                       
                      <tr style="font-weight: bold;">
                        <th>Commission</th>
                        <td style="font-size: 17px;">Rs.{{$div_amount}}</td>
                      </tr>
                      <tr style="font-weight: bold;">
                        <th>View Rides</th>
                        <td style="font-size: 17px;"> <a href="/girokab-admin/completed-colrides/{{$first_day}}/{{encrypt($franchise)}}" class="btn yellowbtn btn-sm" target="_blank"><b> View </b></a></td>
                      </tr>
                    </table>
               
              </div>
              <!-- /.col -->

            </div>
            
            </div>
            <!-- /.row -->



@if(!$pay)

            <div class="row">
                <!-- accepted payments column -->
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
                        <td>Rs.{{$div_amount}}</td>
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
                <!-- /.col -->
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
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">.</p>

                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Already Paid...</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Paid Amount :</th>
                        <td>Rs.{{$pay->paid_amount}}</td>
                      </tr>
                      <tr>
                        <th style="width:50%">Paid At :</th>
                        <td>{{$pay->payment_date->format('d-m-Y h:i a')}}</td>
                      </tr>
                     
                       <tr>
                        <th style="width:50%">Reference Id :</th>
                        <td>{{$pay->reference_id}}</td>
                      </tr>
                      
                      <tr>
                        <th style="width:50%">Remarks :</th>
                        <td>{{$pay->remarks}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>

@endif








          </div>
          <!-- /.card-body -->
         
        </div>
        
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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
   data.append('ride_from', '{{$first_day}}');
  data.append('frid', '{{$frdt->id}}');
    data.append('tot', '{{$sr}}');
  data.append('com', '{{$div_amount}}');
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/franchise-salary-pay",
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
                       window.location.href='/girokab-admin/all-collection-filter';
                               } 
    
                    });
          }

        }
    
    
    
    
      })
    
    
    
    


}


</script>


   @endsection