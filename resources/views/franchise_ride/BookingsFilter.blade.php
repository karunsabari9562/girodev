@extends('layouts.Franchise')
@section('title')
  rides-history
  @endsection
 
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rides History</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
             <!--  <li class="breadcrumb-item"><a href="#">Home</a></li>
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
        <!--<div class="card-header">-->
          <!--<h3 class="card-title">Rides History</h3>-->

         
        <!--</div>-->

        <div class="card-body">
<h4 style="font-size: 17px;font-weight: bold;">Ride Details {{date('Y-M')}}</h4>
          <div class="row">
            <div class="col-12 col-md-12 col-lg-7 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4" style="cursor: pointer;" onclick="window.location.href='/completed-mrides'">
                  <div class="info-box bg-c-green">
                      <div class="box-c">
                          <i class="fa fa-check-circle"></i>
                      </div>
                    <div class="info-box-content">
                      <span class="info-box-number text-center text-white mb-0 size-lg">{{$com}}</span>
                      <span class="info-box-text text-center text-white">Completed</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4" style="cursor: pointer;" onclick="window.location.href='/rejected-mrides'">
                  <div class="info-box bg-c-blue">
                      <div class="box-c">
                          <i class="fa fa-paper-plane"></i>
                      </div>
                    <div class="info-box-content">
                      <span class="info-box-number text-center text-white mb-0 size-lg">{{$rej}}</span>
                      <span class="info-box-text text-center text-white">Rejected</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4" style="cursor: pointer;" onclick="window.location.href='/cancelled-mrides'">
                  <div class="info-box bg-c-pink">
                      <div class="box-c">
                          <i class="fa fa-times"></i>
                      </div>
                    <div class="info-box-content">
                      <span class="info-box-number text-center text-white mb-0 size-lg">{{$can}}</span>
                      <span class="info-box-text text-center text-white">Cancelled</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4" style="cursor: pointer;" onclick="window.location.href='/timeout-mrides'">
                  <div class="info-box bg-c-yellow">
                      <div class="box-c">
                          <i class="fa fa-recycle"></i>
                      </div>
                    <div class="info-box-content">
                      <span class="info-box-number text-center text-white mb-0 size-lg">{{$time}}</span>
                      <span class="info-box-text text-center text-white">Timeout</span>
                    </div>
                  </div>
                </div>
              
              </div>
              
            </div>
            <div class="col-12 col-md-12 col-lg-5 order-1 order-md-2">
      
              <div class="card card-info">
                  
              <div class="card-block">
                    <i class="fa fa-search mr-2" aria-hidden="true"></i>
                <h3 class="text-primary mb-0">
                    Find Rides 
                </h3>
              </div>
              
              <form class="form-horizontal" action="/rides-history" method="post" target="_blank">
                @csrf
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">From</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="dfrom" name="dfrom" placeholder="Email">
                      @error('dfrom') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">To</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="dto" name="dto" placeholder="Password">
                         @error('dto') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div>

                  

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-10">
                    <select class="form-control" id="btype" name="btype">
                      <!-- <option value="0">Choose</option> -->
                     <!--  <option value="1">All</option> -->
                      <option value="2">Completed</option>
                      <option value="3">Rejected</option>
                      <option value="4">Cancelled</option>
                      <option value="5">Timeout</option>
                                   
                    </select>
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-info">Analise</button> -->
                    <button type="submit" class="btn yellowbtn float-right">View</button>
                 
                </div>
                <!-- /.card-footer -->
              </form>
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

  @endsection