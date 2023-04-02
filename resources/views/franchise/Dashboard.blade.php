@extends('layouts.Franchise')
@section('title')
 dashboard
  @endsection
 
@section('contents')

  

 @php
  $dt=date('Y-m-d');
 $franchises=Auth::guard('franchise')->user()->id;

 $cnt=DB::table('active_drivers')->where('franchise',$franchises)->where('status',1)->where('availability_status',1)->count();
  $cntt=DB::table('active_drivers')->where('franchise',$franchises)->where('status',1)->where('availability_status',0)->count();

 $cnt1=DB::table('driver_registrations')->where('franchise',$franchises)->where('status',3)->count();


$cnt2=DB::table('driver_registrations')->where('franchise',$franchises)->where('status',1)->where('valid_to','<',$dt)->count();

  @endphp

  <style type="text/css">

:root {
  --primary-color: slategrey;
}

* {
  box-sizing: border-box;
}

 
.carousel-container {
  border-radius: 5px;
  overflow: hidden;
  max-width: 800px;
  max-height: 800px;
  position: relative;
  box-shadow: 0 0 30px -20px #223344;
  margin: auto;
  z-index: 0;
}

/* Hide the images by default */
.mySlides {
  display: none;
}
.mySlides img {
  display: block;
  width: 100%;
  height: 100%;
}

/* image gradient overlay [optional] */
/*  .mySlides::after {
  content: "";
  position: absolute;
  inset: 0;
    background-image: linear-gradient(-45deg, rgba(110, 0, 255, .1), rgba(70, 0, 255, .2));
} */

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  transform: translate(0, -50%);
  width: auto;
  padding: 20px;
  color: white;
  font-weight: bold;
  font-size: 24px;
  border-radius: 0 8px 8px 0;
  background: rgba(173, 216, 230, 0.1);
  user-select: none;
}
.next {
  right: 0;
  border-radius: 8px 0 0 8px;
}
.prev:hover,
.next:hover {
  background-color: rgba(173, 216, 230, 0.3);
}

/* Caption text */
.text {
  color: #f2f2f2;
  background-color: rgba(10, 10, 20, 0.1);
  backdrop-filter: blur(6px);
  border-radius: 10px;
  font-size: 20px;
  padding: 8px 12px;
  position: absolute;
  bottom: 60px;
  left: 50%;
  transform: translate(-50%);
  text-align: center;
}


.dots-container {
  position: absolute;
  bottom: 10px;
  left: 50%;
  transform: translate(-50%);
}

/* The dots/bullets/indicators */
.dots {
  cursor: pointer;
  height: 14px;
  width: 14px;
  margin: 0 4px;
  background-color: rgba(173, 216, 230, 0.2);
  backdrop-filter: blur(2px);
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.3s ease;
}
.active,
.dots:hover {
  background-color: rgba(173, 216, 230, 0.8);
}

/* transition animation */
.animate {
  -webkit-animation-name: animate;
  -webkit-animation-duration: 1s;
  animation-name: animate;
  animation-duration: 2s;
}

@keyframes animate {
  from {
    transform: scale(1.1) rotateY(10deg);
  }
  to {
    transform: scale(1) rotateY(0deg);
  }
}


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
            <h1></h1>
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
        <div class="col-md-4 col-xl-3" style="cursor: pointer;" onclick="window.location.href='/online-drivers'">
            <div class="card bg-c-green order-card">
                <div class="card-block box-info">
                    <div class="box-a ">
                        <i class="fa fa-user f-left"></i>
                    </div>
                    <div class="box-b">
                        <span>  {{$cnt}}</span>
                        <span class="md-font">Online Drivers</span>
                    </div>
                  <div class="card-wave">
                      <img src="{{asset('/admin/img/wave.svg')}}">
                  </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3" style="cursor: pointer;" onclick="window.location.href='/offline-drivers'">
            <div class="card bg-c-blue order-card">
                <div class="card-block box-info">
                    <div class="box-a ">
                        <i class="fa fa-user f-left"></i>
                    </div>
                    <div class="box-b">
                        <span>{{$cntt}}</span>
                        <span class="md-font">Offline Drivers</span>
                    </div>
                  <div class="card-wave">
                      <img src="{{asset('/admin/img/wave.svg')}}">
                  </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3" style="cursor: pointer;" onclick="window.location.href='/expired-drivers'">
            <div class="card bg-c-yellow order-card">
                <div class="card-block box-info">
                    <div class="box-a ">
                        <i class="fa fa-exclamation-triangle f-left"></i>
                    </div>
                    <div class="box-b">
                        <span>{{$cnt2}}</span>
                        <span class="md-font">Expired Drivers</span>
                    </div>
                  <div class="card-wave">
                      <img src="{{asset('/admin/img/wave.svg')}}">
                  </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3" style="cursor: pointer;" onclick="window.location.href='/blocked-drivers'">
            <div class="card bg-c-pink order-card">
                <div class="card-block box-info">
                    <div class="box-a ">
                        <i class="fa fa-ban f-left"></i>
                    </div>
                    <div class="box-b">
                        <span>{{$cnt1}}</span>
                        <span class="md-font">Blocked Drivers</span>
                    </div>
                  <div class="card-wave">
                      <img src="{{asset('/admin/img/wave.svg')}}">
                  </div>
                </div>
            </div>
        </div>
      
       </div>

     <div class="row">
          <div class="col-md-6">

<!-- Today's Ride Bookings -->



<div class="info-box mb-2" style="background-color: #b2cdd1;cursor: pointer;" onclick="window.location.href='/todays-collection'">
              <span class="info-box-icon"><i class="fas fa-money-bill-wave"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Today's Collection</span>
                <span class="info-box-number">View</span>
              </div>
              <!-- /.info-box-content -->
            </div>
<div class="info-box mb-2" style="background-color: #c2a1c3;cursor: pointer;" onclick="window.location.href='/todays-bookings/All'">
              <span class="info-box-icon"><i class="fa fa-history"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Today's Rides</span>
                <span class="info-box-number">View</span>
              </div>
              <!-- /.info-box-content -->
            </div>
 <div class="info-box mb-2" style="background-color: #c4cb83;cursor: pointer;" onclick="window.location.href='/register-driver'">
              <span class="info-box-icon"><i class="fa fa-plus"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Register Driver</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div>







<!-- Today's Ride Bookings -->

<!-- Today's Service Bookings -->             
             
            
          </div>

<!-- Today's Service Bookings -->  

<!-- Ads -->  

          <div class="col-md-6">



          <div class="card">
              
              <div class="card-body p-0">
                    <div class="table-responsive">
              <div class="carousel-container">

            @foreach($ads as $a)
              <div class="mySlides animate">
                <img src="{{asset($a->photo)}}" alt="slide" style="max-height: 400px;" />
                <!-- <div class="number">1 / 5</div> -->
                <div class="text">{{$a->title}}</div>
              </div>
              @endforeach
              <a class="prev" onclick="prevSlide()">&#10094;</a>
              <a class="next" onclick="nextSlide()">&#10095;</a>

              <div class="dots-container">
                @foreach($ads as $a)
                <span class="dots" onclick="currentSlide(1)"></span>

                @endforeach
              </div>
            </div>

              </div>
                </div>
                 </div>

          </div>


         </div>





 <div class="row">
          <div class="col-md-12">

<!-- Today's Ride Bookings -->

             <div class="card">
              <div class="card-header border-transparent grid-header">
                <h3 class="card-title">Today's Bookings ( {{date("d-m-Y", strtotime(date('Y-m-d')))}} )</h3>
                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button> -->
                  <div class="btn-group" style="float: right;">
                    <button type="button" class="btn" style="float: right;background-color: #fab60b;color: black;">Ride Details</button>
                    <button type="button" class="btn dropdown-toggle dropdown-icon" data-toggle="dropdown" style="background-color: #fab60b;color: white;">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                       <a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/todays-bookings/All'">All</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/todays-bookings/Completed'">Completed</a>
                      <a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/todays-bookings/Running'">Running</a>
                      <a class="dropdown-item" style="cursor: pointer;" onclick="window.location.href='/todays-bookings/Unfinished'">Unfinished</a>
                      
                    </div>
                  </div>
                </div>

              </div>
            
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                        @if(!$bookings->isEmpty())
                    <tr>
                       <th>Sl.No</th>
                      <th>Customer</th>                     
                      <th>From</th>
                      <th>To</th>
                      <th>Driver</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                     
                      @foreach($bookings as $b)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$b->GetCustomer->name}}</td>
                    <td title="{{ $b->from_location }}" style="cursor: pointer;">{{ Str::limit($b->from_location, 20, '...') }}</td>
           
                      <td title="{{ $b->to_location}}" style="cursor: pointer;">{{ Str::limit($b->to_location, 20, '...')}}</td>
                      <td><a href="/active-driver-profile/{{encrypt($b->driver_id)}}" target="_blank">{{$b->GetDriver->driver_id}}</a></td>

                      @switch($b->status)
                      @case(0)                       
                      <td><span class="badge badge-warning">Pending</span></td>
                          @break

                      @case(1)
                      <td><span class="badge badge-success">Accepted</span></td>
                      @break

                       @case(2)
                      <td><span class="badge badge-danger">Rejected</span></td>
                      @break

                       @case(3)
                      <td><span class="badge badge-danger">Cancelled</span></td>
                      @break

                       @case(4)
                      <td><span class="badge badge-danger">Timeout</span></td>
                      @break

                       @case(5)
                      <td><span class="badge badge-success">Started</span></td>
                      @break

                       @case(6)
                      <td><span class="badge badge-info">completed</span></td>
                      @break

                      

                        @default
                        <span>Something went wrong, please try again</span>
                        @endswitch

                      
                   
                    @endforeach
                    @else


                      
                  <center>
                  <span><img src="{{asset('/images/search.png')}}" style="width: 10%;"></span>
                </center><br>
                

                    @endif
                    
                    </tbody>

                  </table>
                </div>
              </div>
     <!--          <div class="card-footer clearfix"> -->
              <!--   <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Completed Rides</a> -->
              <!--   <a href="javascript:void(0)" class="btn btn-sm float-right">View all  <i class="fa fa-arrow-right"></i></a>
              </div> -->
            </div>
<!-- Today's Ride Bookings -->

<!-- Today's Service Bookings -->             
             
            
          </div>

<!-- Today's Service Bookings -->  

<!-- Ads -->  

         


         </div>




    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="{{ asset('js/app.js') }}"></script>
<script>
  Echo.private('driverchannel').listen('NewDriverRegistration', (e) => {
        // console.log(e.user);
        alert("ssss");
    });
</script>

  <script type="text/javascript">
  let slideIndex = 0;
showSlides();

// Next-previous control
function nextSlide() {
  slideIndex++;
  showSlides();
  timer = _timer; // reset timer
}

function prevSlide() {
  slideIndex--;
  showSlides();
  timer = _timer;
}

// Thumbnail image controlls
function currentSlide(n) {
  slideIndex = n - 1;
  showSlides();
  timer = _timer;
}

function showSlides() {
  let slides = document.querySelectorAll(".mySlides");
  let dots = document.querySelectorAll(".dots");

  if (slideIndex > slides.length - 1) slideIndex = 0;
  if (slideIndex < 0) slideIndex = slides.length - 1;
  
  // hide all slides
  slides.forEach((slide) => {
    slide.style.display = "none";
  });
  
  // show one slide base on index number
  slides[slideIndex].style.display = "block";
  
  dots.forEach((dot) => {
    dot.classList.remove("active");
  });
  
  dots[slideIndex].classList.add("active");
}

// autoplay slides --------
let timer = 7; // sec
const _timer = timer;

// this function runs every 1 second
setInterval(() => {
  timer--;

  if (timer < 1) {
    nextSlide();
    timer = _timer; // reset timer
  }
}, 1000); // 1sec




 

  </script>
   @endsection