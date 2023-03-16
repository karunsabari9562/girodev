@extends('layouts.Admin')
@section('title')
 driver-approval
  @endsection
 
@section('contents')

<style type="text/css">
  @import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');



.wrapperx{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: #212529;
  padding: 35px 15px 15px;
  border-radius: 5px;
}

.wrapperx:before{
  content: "";
  position: absolute;
  top: 11px;
  left: 50%;
  transform: translateX(-50%);
  width: 80px;
  height: 13px;
  background: #fd9b00;
  border-radius: 50px;
}


.card{
  width: 220px;
  height: 350px;
  background: #fff;
  padding: 20px 20px 0;
  position: relative;
  border-radius: 5px;
}

.card img{
  width: 100%;
  margin-bottom: 15px;
  border-radius: 10px;
}





.card .info{
  position: absolute;
  bottom: 0;
  width: 100%;
  left: 0;
  padding: 15px;
  background: #fd9b00;
  border-bottom-left-radius: 5px;
  border-bottom-right-radius: 5px;
}

.card p{
  text-transform: uppercase;
  letter-spacing: 2px;
  font-weight: 400;
  color: #fff;
  text-align: center;
  font-size: 12px;
}
</style>





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper kanban">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Driver Approval</h1>
          </div>
          <div class="col-sm-6 d-none d-sm-block">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/drivers-final-approval"><i class="fa fa-arrow-left" aria-hidden="true"></i>  back</a></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content pb-3">
      
  <div class="wrapperx">

  <div class="card">
    <img src="{{ asset('admin/img/logo/logo2.png')}}" style="width: 170px;">
    <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHw%3D&w=1000&q=80" alt="Employee_ID" style="top: 0;">
    <div class="info">
      <p style="font-size: 16px;font-weight: bold;">Alex Woods</p>
      <p style="font-size: 11px;font-weight: bold;">GK10001</p>
    </div>
  </div>
</div>


<div class="wrapperx">

  <div class="card">
    <img src="{{ asset('admin/img/logo/logo2.png')}}" style="width: 170px;">
    <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHw%3D&w=1000&q=80" alt="Employee_ID" style="top: 0;">
    <div class="info">
      <p style="font-size: 16px;font-weight: bold;">Alex Woods</p>
      <p style="font-size: 11px;font-weight: bold;">GK10001</p>
    </div>
  </div>
</div>

    </section><br><br>
  </div>

  <script type="text/javascript">

 


  </script>

  @endsection