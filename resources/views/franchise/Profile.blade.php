@extends('layouts.Franchise')
@section('title')
 profile
  @endsection
 
@section('contents')







  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h3 id="twelve" class="text-center"><i class="fa fa-user" aria-hidden="true"></i>   My Profile
            </h3>
          </div>
          <div class="col-sm-12">
            <ol class="breadcrumb justify-content-center">
              <li class="breadcrumb-item"><a href="/franchise-dashboard"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>
              {{-- <li class="breadcrumb-item active"></li> --}}
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4" style="margin-right: auto;margin-left: auto;">

            <!-- Profile Image -->
             @php
                    $dt = date("d-m-Y", strtotime($fr_det->valid_to));
              
                    @endphp
            <div class="card card-warning card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset($fr_det->photo)}}"
                       alt="User profile picture" style="width: 150px;border-radius:10px;height:150px;">
                </div>
                <h3 class="profile-username text-center">{{$fr_det->franchise_name}}</h3>

                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Proprietor </b> <a class="float-right">{{$fr_det->proprietor_name}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Mobile </b> <a class="float-right">{{$fr_det->franchise_mobile}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Mail Id</b> <a class="float-right">{{$fr_det->mail_id}}</a>
                  </li>
                    <li class="list-group-item">
                    <b>Account Expiry Date</b> <a class="float-right">{{$dt}}</a>
                  </li>
                  </li>
                    <li class="list-group-item">
                    <b>Acddress</b> <a class="float-right">{{$fr_det->franchise_location}}, {{$fr_det->GetDist->district}}, Kerala</a>
                  </li>
                  
                 
                  <!-- <li class="list-group-item">
                    <b>Applied Date</b> <a class="float-right">jj</a>
                  </li> -->
                  
                 
                  
                </ul>

                 

                 
                <a style="cursor: pointer;" href="/edit-franchise-profile" class="btn yellowbtn btn-block"><b>Edit</b></a>
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script>

     function Selectpay(val)
{
  if(val==2)
  {
    $('#d1').hide();
    $('#d2').hide();
  }
  else
  {
    $('#d1').show();
    $('#d2').show();
  }
}





   

        
















  </script>


 @endsection
