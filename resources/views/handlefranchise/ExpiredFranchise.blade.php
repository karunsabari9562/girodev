
@extends('layouts.Admin')
@section('title')
expired-divisions
  @endsection
 
@section('contents')




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Expired Divisions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/franchise-area"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>

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
                 <h2 class="card-title" style="font-size: 25px;font-weight: bold;">Expired Divisions</h2>
                 <!-- <button type="button" class="btn btn-primary" value="Submit" onclick="AddModel()" id="renewbt1" style="float: right;"><i class="nav-icon fa fa-plus"></i>   Add New</button> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                    <th>Division Id</th>
                    <th>Division Type</th>
                     <th>Division</th> 
                     <th>Proprietor</th>
                     <th>Mobile</th> 
                     <!-- <th>District</th>
                     <th>Location</th> -->
                     <th>Expired At</th>
                     <th>Drivers</th>                    
                    <th>Profile</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($franchise as $f )
                     @php
                    $dt = date("d-m-Y", strtotime($f->valid_to));
                   
                    @endphp
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $f->franchise_id }}</td>
                    @if($f->franchise_type==1 )
                    <td>Own</td>
                    @else
                     <td>Other</td>
                    @endif
                    <td>{{ $f->franchise_name }}</td>
                    <td>{{ $f->proprietor_name }}</td>
                    <td>{{ $f->franchise_mobile }}</td>
                    
                     <td>{{ $dt }}</td>
                    
                  <td>
                  <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/girokab-admin/franchise-drivers/{{encrypt($f->id)}}" class="btn btn-danger btn-sm"><b> View</b></a>
                      
                 
                
                </td>
                
                <td>
                  <a style="cursor: pointer;background-color: #fab60b;border:none;" href="/franchise-details/{{encrypt($f->id)}}" target="_blank" class="btn btn-danger btn-sm"><b> View</b></a>
                      
                 
                
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

 
</script>


@endsection

