
 @extends('layouts.Admin')
@section('title')
 completed-refund-requests
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
                <div class="col-12">
                 
                   <br><h4>Refund Analysis</h4><br>
                     <form class="form-horizontal" action="/girokab-admin/all-refund-history" method="post" target="_blank">
                @csrf
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Year</label>
                    <div class="col-sm-10">
                    <select class="form-control" id="year1" name="year1">
                      <option value="">Choose</option>
                     <!--  <option value="1">All</option> -->
                      <option value="2023">2023</option>
                      <option value="2023">2024</option>
                      
                                   
                    </select>
                    @error('year1') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div> 
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Month</label>
                    <div class="col-sm-10">
                    <select class="form-control" id="month1" name="month1">
                      <option value="">Choose</option>
                     <!--  <option value="1">All</option> -->
                      <option value="01">January</option>
                      <option value="02">February</option>
                      <option value="03">March</option>
                      <option value="04">April</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">August</option>
                      <option value="09">September</option>
                      <option value="10">October</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                                   
                    </select>
                    @error('month1') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div> 

                     <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-info">Analise</button> -->
                    <button type="submit" class="btn yellowbtn float-right">View Collection</button>
                 
                </div>
                </form>
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
                  <i class="fa fa-dot-circle" aria-hidden="true" style="font-size: 10px;"></i>  <a href="/girokab-admin/refund-requests" class="btn-link text-primary"></i> Pending Refunds</a>
                </li>
                <li>
                  <i class="fa fa-dot-circle" aria-hidden="true" style="font-size: 10px;"></i>  <a href="/girokab-admin/rejected-refunds" class="btn-link text-primary"></i> Rejected Refunds</a>
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


         function Reject(val)
    {

       swal({
  title: "Do you want to reject this refund request ?",
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
        url:"/girokab-admin/reject-refund",
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
                       title: "Refund request rejected successfully",
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

