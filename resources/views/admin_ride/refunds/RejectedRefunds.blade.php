
 @extends('layouts.Admin')
@section('title')
 rejected-refund-requests
  @endsection
 
@section('contents')




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <!--   <h1>Refund Requests</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Project Detail</li> -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
      
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-9 order-2 order-md-1">
            
              <div class="row">
                <div class="col-12"><br>
                  <h4>Rejected Refund Requests</h4><br>
                    
                  <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Customer</th>
                    <th>Driver</th>
                    <th>Ride Date</th>
                    <th>Ride Details</th>               
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($bookings as $b )

                   
                  <tr>
                    <td>{{$loop->iteration}}</td>
                       <td>{{$b->GetCustomer->name}}<br>Mob: {{$b->GetCustomer->mobile}}</td>
                        <td><a href="/girokab-admin/active-driver-profile/{{encrypt($b->driver_id)}}" target="_blank">Id: {{$b->GetDriver->driver_id}}</a><br>
            
                 

                     <td>{{$b->booked_at->format('d-m-Y')}}</td>
                    
                    <td>
                    <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/girokab-admin/refund-ride-details/{{encrypt($b->id)}}" class="btn btn-danger btn-sm" target="_blank"><b> View </b></a>
                </td>

                <td>
                    <a style="cursor: pointer;background-color: #fab60b;border:none;" onclick="Restore('{{$b->id}}')" class="btn btn-danger btn-sm" target="_blank"><b> Restore </b></a>

                </td>

                   
                  </tr>

                  @endforeach
               
    
                  </tbody>
                 
                </table>

                    

                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-3 order-1 order-md-2">
                <div class="card card-info">
                    <div class="card-block flex-column">
                        <img src="{{asset('giro/img1.png')}}" style="width: 100%;">
                    </div>
                    <div class="card-body card-block-a">
                        <h5 class="text-muted">Quick Links</h5>
              <ul class="list-unstyled">
                <li>
    <i class="fa fa-dot-circle" aria-hidden="true" style="font-size: 10px;"></i>  <a href="/girokab-admin/completed-refunds" class="btn-link text-primary"> Completed Refunds</a>
                </li>
                <li>
                  <i class="fa fa-dot-circle" aria-hidden="true" style="font-size: 10px;"></i>  <a href="/girokab-admin/refund-requests" class="btn-link text-primary"></i> Pending Refunds</a>
                </li>
                
                
              </ul>
            
                    </div>
                </div>
            
              
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
  <script type="text/javascript">


         function Restore(val)
    {

       swal({
  title: "Do you want to restore this refund request ?",
  //text: "Ensure that the customer is fit for service.",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
    if (willDelete) {

      data = new FormData();
     
  data.append('bid',val);
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/girokab-admin/restore-refund",
         data: data,
        dataType:"json",
        contentType: false,
//cache: false,
processData: false,
       
        success:function(data)
        {
          if(data['success'])
          {
          
               swal({
                       title: "Refund request restored successfully",
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

