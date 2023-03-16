
 @extends('layouts.Admin')
@section('title')
 rejected-renewals
  @endsection
 
@section('contents')


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
              <li class="breadcrumb-item"><a href="/girokab-admin/driver-account-renewal"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>

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
                 <h2 class="card-title" style="font-size: 25px;font-weight: bold;">Rejected</h2>
              
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
                    <th>Payment Date</th>
                    <th>Amount</th>
                    <th>Reference Id</th>
                    <th>Rejected At</th>
                     <th>Reason</th>
                    
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
                    <td>{{$v->rejected_date->format('d-m-Y')}}</td>
                    <td>{{ $v->rejection_reason }}</td>
                   

                   

                   
                  <td>
                  <a style="cursor: pointer;background-color: #fab60b;border:none;" onclick="Restore('{{$v->id}}')"  class="btn btn-danger btn-sm"><b> Restore     </b></a>
              
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

   function Restore(payid)
    {

       swal({
  title: "Do you want to restore this renewal request ?",
  //text: "Ensure that the Vehicle RC validated thoroughly.",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {


      data = new FormData();

  data.append('payid',payid);
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/girokab-admin/restore-renewal",
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
                       title: "Renewal request restored successfully",
                      //text: "This profile moved to submission pending list .",
                       closeOnClickOutside: false,
                       icon: "success",
                      buttons: "Ok",
                    })
    
                     .then((willDelete) => {
                      if (willDelete) {
                       window.location.href='/girokab-admin/disability-certificates';
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

