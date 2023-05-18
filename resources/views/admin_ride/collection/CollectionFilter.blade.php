 @extends('layouts.Admin')
@section('title')
 collection-details
  @endsection
  
@section('contents')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Collection History</h1>
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
        <!--  <h3 class="card-title">Collection History</h3>-->

        <!--  <div class="card-tools">-->
        <!--    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">-->
        <!--      <i class="fas fa-minus"></i>-->
        <!--    </button>-->
        <!--    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">-->
        <!--      <i class="fas fa-times"></i>-->
        <!--    </button>-->
        <!--  </div>-->
        <!--</div>-->

        <div class="card-body">
<h4 style="font-size: 17px;font-weight: bold;">Collection Details {{date('Y-M')}}</h4>
          <div class="row">
            <div class="col-12 col-md-12 col-lg-7 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/all-collection'">
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
               
                <div class="col-12 col-sm-5" style="cursor: pointer;" onclick="window.location.href='/girokab-admin/offline-payments'">
                  <div class="info-box bg-c-yellow">
                      <div class="box-c">
                          <i class="fa fa-credit-card"></i>
                      </div>
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-white">Offline Payments</span>
                      <span class="info-box-text text-center text-white">Approval Pending</span>
                    </div>
                  </div>
                </div>
              
              </div>
              <div class="row">
                <div class="col-12">
                 
                   <br><h4 style="font-size: 17px;font-weight: bold;">Collection Analysis</h4>
                     <form class="form-horizontal" action="/girokab-admin/all-collection-history" method="post" target="_blank">
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




                <div class="col-12">
                 
                   <br><h4 style="font-size: 17px;font-weight: bold;">Registration Fee Analysis</h4>
                     <form class="form-horizontal" action="/girokab-admin/regfee-history" method="post" target="_blank">
                @csrf
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">From</label>
                    <div class="col-sm-10">
                    
                    <input type="date" name="regfrom" class="form-control">
                    @error('regfrom') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div> 
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">To</label>
                    <div class="col-sm-10">
                    <input type="date" name="regto" class="form-control">
                    @error('regto') <span style="color: red;">* {{$message}}</span> @enderror
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
            <div class="col-12 col-md-12 col-lg-5 order-1 order-md-2">
              
              
              <div class="card card-info">
              <div class="card-block">
                  <h3 class="text-primary mb-0">Driver Collections</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="/girokab-admin/driver-collection-history" method="post" target="_blank">
                @csrf
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Date *</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="dfrom" name="dfrom" placeholder="Email">
                      @error('dfrom') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div>

                 <!--  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">To *</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" id="dto" name="dto" placeholder="Password">
                         @error('dto') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div> -->

                   <!-- <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Driver *</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="drid" name="drid" placeholder="Driver Id">
                         @error('drid') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                  </div> -->

                  
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-info">Analise</button> -->
                    <button type="submit" class="btn yellowbtn float-right">View</button>
                 
                </div>
                <!-- /.card-footer -->
              </form>
            </div>



             
              
              <div class="card card-info">
              <div class="card-block">
                  <h3 class="text-primary mb-0">Division Collections</h3>
                  </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="/girokab-admin/division-collection-history" method="post">
                @csrf
                <div class="card-body">

                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Year *</label>
                    <div class="col-sm-12">
                      <select class="form-control" id="year" name="year">
                      <option value="">Choose</option>
                     <!--  <option value="1">All</option> -->
                      <option value="2023">2023</option>
                      <option value="2023">2024</option>
                      
                                   
                    </select>
                       @error('year') <span style="color: red;">* {{$message}}</span> @enderror
                    </div>
                      </div>


                    <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Month *</label>
                    <div class="col-sm-12">
                    <select class="form-control" id="month" name="month">
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
                    @error('month') <span style="color: red;">* {{$message}}</span> @enderror

</div>
</div>

<div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Div *</label>
                    <div class="col-sm-12">
                    <select class="form-control" id="frid" name="frid">
                      <option value="">Choose</option>
                     @foreach($franchise as $fr)
                     <option value="{{$fr->id}}">{{$fr->franchise_name}}</option>
                     @endforeach
                                   
                    </select>
                    @error('frid') <span style="color: red;">* {{$message}}</span> @enderror

</div>
</div>



                  </div>
<div class="card-footer">
                  <!-- <button type="submit" class="btn btn-info">Analise</button> -->
                    <button type="submit" class="btn yellowbtn float-right">View</button>
                 
                </div>
                </div>
                <!-- /.card-body -->
                
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