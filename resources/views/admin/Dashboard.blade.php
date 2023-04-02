@extends('layouts.Admin')
@section('title')
dashboard
  @endsection
 
@section('contents')
<style type="text/css">
  .order-card {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#344b64,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#cda56c,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#cb7281,#ff869a);
}


.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-block {
    padding: 25px;
}

.order-card i {
    font-size: 26px;
}

.f-left {
    float: left;
}

.f-right {
    float: right;
}
</style>


  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            
             
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
        <div class="col-md-4 col-xl-3" style="cursor: pointer;"  style="cursor: pointer;" onclick="window.location.href='/expired-franchise'">
            <div class="card bg-c-green order-card">
                <div class="card-block box-info">
                    <div class="box-a ">
                        <i class="fa fa-industry f-left"></i>
                    </div>
                    <div class="box-b">
                        <span class="md-font">Expired Divisions</span>
                    </div>
                    <div class="card-wave">
                      <img src="{{ asset('admin/img/wave.svg')}}">
                  </div>
                    <!--<h6 class="m-b-20">Expired Divisions</h6>-->
                    <!--<h2 class="text-right"><i class="fa fa-industry f-left"></i><span>  </span></h2>-->
                  
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3" style="cursor: pointer;" style="cursor: pointer;" onclick="window.location.href='/blocked-franchise'">
            <div class="card bg-c-blue order-card">
                <div class="card-block box-info">
                    <div class="box-a ">
                        <i class="fa fa-industry f-left"></i>
                    </div>
                    <div class="box-b">
                        <span class="md-font">Blocked Divisions</span>
                    </div>
                    <div class="card-wave">
                      <img src="{{ asset('admin/img/wave.svg')}}">
                  </div>
                   
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3" style="cursor: pointer;" onclick="window.location.href='/girokab-drivers/expired-drivers'">
            <div class="card bg-c-yellow order-card">
                <div class="card-block box-info">
                    <div class="box-a ">
                        <i class="fa fa-exclamation-triangle f-left"></i>
                    </div>
                    <div class="box-b">
                        <span class="md-font">Expired Drivers</span>
                    </div>
                    <div class="card-wave">
                      <img src="{{ asset('admin/img/wave.svg')}}">
                  </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3" style="cursor: pointer;" onclick="window.location.href='/girokab-drivers/blocked-drivers'">
            <div class="card bg-c-pink order-card">
                <div class="card-block box-info">
                    <div class="box-a ">
                        <i class="fa fa-ban f-left"></i>
                    </div>
                    <div class="box-b">
                        <span class="md-font">Blocked Drivers</span>
                    </div>
                    <div class="card-wave">
                      <img src="{{ asset('admin/img/wave.svg')}}">
                  </div>
                  
                </div>
            </div>
        </div>
      
       </div>
      
      

     <div class="row">
          <div class="col-md-8">

<!-- Today's Ride Bookings -->

             <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Today's Rides<br><b>( {{date("d-m-Y", strtotime(date('Y-m-d')))}} )</b></h3>
                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button> -->
                  <div class="btn-group" style="float: right;">
                    <button type="button" class="btn" style="float: right;background-color: #fab60b;color: white;" onclick="window.location.href='/girokab-admin/todays-bookings/All'">Ride Details</button>
                    
                  </div>
                </div>

              </div>
            
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                        @if(!$franchise->isEmpty())
                    <tr>
                       <th>Sl.No</th>
                      <th>Division</th>                     
                      <th>Completed Rides</th>
                      <th>Unfinished Rides</th>
                      <th>Details</th>
                    </tr>
                    </thead>
                    <tbody>
                     
                      @foreach($franchise as $b)

                      @php
                      $dt=date('Y-m-d');
                      $com=DB::table('rides_bookings')->where('franchise',$b->id)->where('booked_date',$dt)->where('status',6)->count();
                      $un=DB::table('rides_bookings')
                      ->where('franchise',$b->id)
                       ->where('booked_date',$dt)
                        ->where(function($q) {
                       $q->where('status', 2)
                       ->orwhere('status', 4)
                       ->orWhere('status', 3);
                        })
                      ->count();
                      @endphp
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>  <a href="/franchise-details/{{encrypt($b->id)}}" target="_blank" style="color: black;font-weight: bold;">{{$b->franchise_id}}</a></td>
                      <td><span class="badge badge-success" style="padding: 10px 10px;">{{$com}}</span></td>
                      <td><span class="badge badge-danger" style="padding: 10px 10px;">{{$un}}</span></td>
                       <td><span class="badge" style="background-color: #fab60b;color: white;padding: 10px 10px;cursor:pointer;" onclick="window.location.href='/franchise-details/{{encrypt($b->id)}}'">View</span></td>
                      

                   
                    @endforeach
                    @else


                      
                  <center>
                  <span>No divisions found !</span>
                </center><br>
                

                    @endif
                    
                    </tbody>

                  </table>
                </div>
              </div>
              <!-- <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Completed Rides</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Cancelled Rides</a>
              </div> -->
            </div>
<!-- Today's Ride Bookings -->

<!-- Today's Service Bookings -->             
             
            
          </div>

<!-- Today's Service Bookings -->  

<!-- Ads -->  

          <div class="col-md-4">





            



<div class="card">
              <div class="card-header">
                <h3 class="card-title">Vehicle Categories</h3>

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
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">


                  @foreach($cat as $ct)
                  <li class="item">
                    <div class="product-img">
                      <img src="{{$ct->icon}}" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="/vehicle-types/{{encrypt($ct->id)}}" style="color: black;font-weight: bold;" class="product-title">{{$ct->category}}
                        <span class="badge float-right" style="background-color: #fab60b;color: white;padding: 10px 10px;">Types</span></a>
                      <span class="product-description">
                       
                      </span>
                    </div>
                  </li>
                  @endforeach
                  
                </ul>
              </div>
              <!-- /.card-body -->
              <!-- <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Products</a>
              </div> -->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->





           










          </div>


         </div>





    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
   @endsection