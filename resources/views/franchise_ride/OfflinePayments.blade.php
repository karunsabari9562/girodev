@extends('layouts.Franchise')
@section('title')
 offline-payments
  @endsection
 
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Offline Ride Payments</h1>
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
       
      


        <div class="row">
          <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card">
              <div class="card-header d-flex p-0">
                <h1 class="card-title p-3" style="font-size: 20px;font-weight: bold;"></h1>
              
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    
              
                   <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Customer</th>                   
                    <th>Ride Date</th>
                    <th>Fare</th>
                    <th>Driver</th>
                    <th>Div. Approval</th>
                    <th>Admin Approval</th>
                    <th>Approve</th>
                   
                    

                 
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($bookings as $b )
                    
                  <tr>
                    <td><a href="/ride-details/{{encrypt($b->id)}}" target="_blank">{{$b->booking_id}}</a></td>
                    <td>{{$b->GetCustomer->name}}<br>{{$b->GetCustomer->mobile}}</td>
                    
                       <td>{{$b->booked_at->format('d-m-Y')}}</td>
                       <td>Rs.{{$b->total_fare}}</td>
                   <td><a href="/active-driver-profile/{{encrypt($b->driver_id)}}" target="_blank">{{$b->GetDriver->driver_id}}</a></td>
                                       
                      @if($b->offline_pay_franchise==1)
                      <td><span class="badge badge-success">Approved</span></td>
                      @else
                      <td><span class="badge badge-warning">Pending</span></td>

                      @endif

                      @if($b->offline_pay_admin==1)
                      <td></td>
                      @else
                      <td><span class="badge badge-warning">Pending</span></td>
                      @endif

                      @if($b->offline_pay_franchise==1)
                      <td>
                    <a style="cursor: pointer;background-color: grey;border:none;" disabled="" class="btn btn-danger btn-sm"><b> Approved </b></a>
                </td>
                      @else
                      <td>
                    <a style="cursor: pointer;background-color: #fab60b;border:none;" onclick="Approve('{{$b->bid}}')" class="btn btn-danger btn-sm" target="_blank"><b> Approve </b></a>
                </td>
                      
                      @endif
                      
                    
                     
                      
                  
                      
                    
                     
                  
               
                  </tr>

                  @endforeach
    
                  </tbody>
        
                </table>


                  </div>
                 
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- ./card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- END ACCORDION & CAROUSEL-->

        
        <!-- /.row -->
        <!-- END TYPOGRAPHY -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  <script type="text/javascript">

     function Approve(bid)
    {

       swal({
  title: "Do you want to approve this payment ?",
  text: "Ensure that the ride fare received.Further changes are not allowed.",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {

$('#sect1').css({ 'opacity' : 0.1 });
      data = new FormData();
     
  data.append('bid',bid);
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/offline-pay-approve",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
           $('#sect1').css({ 'opacity' : 1 });
               $('#bt6').hide();
      $('#bt5').show();
               swal({
                       title: "Payment approved successfully",
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
    
    
  
});
    
    
    } 
  </script>
   @endsection