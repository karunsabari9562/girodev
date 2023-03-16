
@extends('layouts.Admin')
@section('title')
 disability-certificates
  @endsection
 
@section('contents')




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Disability Certificates</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="/girokab-admin/customer-area"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li> -->

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
                 <h2 class="card-title" style="font-size: 18px;font-weight: bold;">Rejected</h2>
                  
              
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Registered At</th>
                    <th>Certificate</th>
                    <th>Reason</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($docs as $d )

                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $d->GetCustomer->name }}</td>
                    <td>{{ $d->GetCustomer->mobile }}</td>
                    <td>{{ $d->GetCustomer->created_at->format('d-m-Y') }}</td>
                    <td><a style="cursor: pointer;background-color: #fab60b;border:none;" href="{{asset($d->document)}}" target="_blank" class="btn btn-danger btn-sm"><b> View      </b></a></td>
                    <td>{{ $d->document_rejection_reason }}</td>

                 <td>
                  <a style="cursor: pointer;background-color: #fab60b;border:none;" onclick="Restore('{{$d->id}}')" class="btn btn-danger btn-sm"><b> Restore      </b></a>
                 
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

  function Restore(docid)
    {

       swal({
  title: "Do you want to restore Certificate ?",
  //text: "Ensure that the Vehicle RC validated thoroughly.",
  icon: "warning",
  buttons: ["No", "Yes"],
})

.then((willDelete) => {
  if (willDelete) {


      data = new FormData();

  data.append('docid',docid);
  data.append('_token', "{{ csrf_token() }}");
    
      $.ajax({
    
        type:"POST",
        url:"/girokab-admin/restore-disability-doc",
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
                       title: "Certificate restored successfully",
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

