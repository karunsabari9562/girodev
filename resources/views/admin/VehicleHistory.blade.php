
@extends('layouts.Admin')
@section('title')
 fare-history
  @endsection
 
@section('contents')




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fare History</h1>
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/vehicle-types/{{encrypt($type->category)}}"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>

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
                <h2 class="card-title" style="font-size: 25px;font-weight: bold;">{{$type->type}}</h2>
                  
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.No</th>
                      <th>Min.fare</th>
                    <th>Fare/km</th>
                    <th>Service Charge</th>
                    <th>Tax</th>
                    <th>Driver Profit</th>
                 <!--    <th>Div. Profit</th> -->
                    <th>Special Charge</th>
                    <th>Changed At</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($fares as $v )
                    @php
                    $dt = date("d-m-Y h:m A", strtotime($v->created_at));
                    $t1 = date("h:m A", strtotime($v->timefrom));
                    $t2 = date("h:m A", strtotime($v->timeto));
                    @endphp
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>Rs.{{ $v->minimum_fare }} / {{ $v->minimum_distance }}Km</td>
                    <td>Rs.{{ $v->fare }}</td>
                      <td> Rs.{{ $v->service_charge }}</td>
                    <td> {{ $v->ride_tax }} %</td>
                    <td> {{ $v->driver_profit }} %</td>
                  <!--   <td> {{ $v->div_profit }} %</td> -->

                     @if($v->special_ride==1)
                  <td style="color: green;">Enabled<br>From : {{ $t1 }}<br>To : {{ $t2 }}<br> Fare : Fare*{{$v->sp_charge}}</td>
                    @else
                    <td style="color: red;">Disabled</td>
                    @endif 
                      
              <td>{{ $dt }}</td>
              
                
                     
                      
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

