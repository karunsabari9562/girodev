@extends('layouts.Home')
@section('title')
 Contact
  @endsection
 
@section('contents')

 <!-- NAVIGATION -->
    <nav class="navbar navbar-expand-lg bg-tranparent navbar-light">
        <div class="container">
            <a href="/" class="navbar-brand"><img src="{{asset('homepage/images/logo.svg')}}" width="130" alt="Girokab Logo"
                    title="GiroKab"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/about" class="nav-link ">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="/services" class="nav-link ">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact" class="nav-link active">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <section class="contactmain" data-aos="fade-up">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="contactinside">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-3 col-lg-3 mb-5">
                                <div>
                                    <h2>Get in touch!<br>
                                        or Say Hi</h2>
                                    <p>Do you have questions?
                                        Contact us today! We are here to help!
                                    </p>
                                </div>
                                <hr>
                                <div class="contactinfo">
                                    <div class="contactsingle d-flex">
                                        <div>
                                            <img src="{{asset('homepage/images/mobile.svg')}}">
                                        </div>
                                        <div>
                                            <h6>Mobile</h6>
                                            <p>+91 9895 065 567</p>
                                        </div>
                                    </div>
                                    <div class="contactsingle d-flex">
                                        <div>
                                            <img src="{{asset('homepage/images/location-map.svg')}}">
                                        </div>
                                        <div>
                                            <h6>Location</h6>
                                            <p>AL NOOR TOWER, Kannur City, near D.I.S.G.H School, Kannur, 670003</p>
                                           
                                        </div>
                                    </div>
                                    <div class="contactsingle d-flex">
                                        <div>
                                            <img src="{{asset('homepage/images/time.svg')}}">
                                        </div>
                                        <div>
                                            <h6>Work Hours</h6>
                                            <p>SUN - SAT</p>
                                            <p>8:00 AM - 10:00 PM</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-9 col-lg-7 offset-lg-1">
                                <div class="submit-form contact-us-from" data-aos="fade-up" data-aos-delay="200">

                                    <form id="contact-form" role="form">
                                        <div class="messages"></div>
                                        <div class="form-group">
                                            <label for="name" class="form-label">Your Name</label>
                                            <input id="form_name" type="text" name="name" class="form-control"
                                                required="required" data-error="Full name is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>


                                        <div class="form-group">
                                            <label for="mobilenumber" class="form-label">Mobile Number</label>
                                            <input id="form_tel" class="form-control" type="tel" name="phone"
                                                required="required" data-error="Valid Mobile is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>

                                        <div class="form-group">
                                            <label for="emailid" class="form-label">Email address</label>
                                            <input id="form_email" class="form-control" type="email" name="email"
                                                required="required" data-error="Valid email is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="message">Your Message</label>
                                            <textarea id="form_message" name="message" class="form-control" rows="4"
                                                required="required" data-error="Please, leave us a message."
                                                style="height: 100px; padding-top: 16px; resize: none;"></textarea>
                                            <div class="help-block with-errors"></div>

                                        </div>

                                        
            <button class="btn-black btn btn-outline-primary my-3  btn btn-primary btn-sm" id="ab1" 
                                            style="margin-top: 5px;" onclick="SendMailResponse()">Send
                                            Now</button>
                                            <button class="btn-black btn btn-outline-primary my-3  btn btn-primary btn-sm" id="ab2" 
                                            style="margin-top: 5px;"><i class="fas fa-spinner fa-spin"></i>  Please wait..
                                            </button>
                                        
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- FEATURES -->
    <section class="features">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-12 text-center">
                    <div class="why-head">
                        <h2>Why Giro<span class="giro-yellow">Kab?</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="feature-single" data-aos="fade-up" data-aos-delay="50">
                        <img src="{{asset('homepage/images/booking.svg')}}" alt="feature icon">
                        <h5>Instant <br>Booking</h5>
                        <p>Call/Book a ride or schedule transport of parcels and packages at any time.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-single" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{asset('homepage/images/id.svg')}}" alt="feature icon">
                        <h5>Good <br>Drivers</h5>
                        <p>Get the services of well-behaved professional drivers who treat you with courtesy.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-single" data-aos="fade-up" data-aos-delay="150">
                        <img src="{{asset('homepage/images/location.svg')}}" alt="feature icon">
                        <h5>Prompt <br>Assistance</h5>
                        <p>We guarantee the availability of services for carrying goods and passengers.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="feature-single" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{asset('homepage/images/rating.svg')}}" alt="feature icon">
                        <h5>Safe <br>Journey</h5>
                        <p>We take good care of people and goods and ensure a safe and secure journey.</p>
                    </div>
                </div>
            </div>
            <div class="row" data-aos="fade-up">
                <div class="col-12">
                    <div class="main-cta">
                        <div class="row">
                            <div class="col-md-7"></div>
                            <div class="col-md-5">
                                <div class="cta-info">
                                    <h3>Professional Drivers<br>
                                        You Can <span class="giro-yellow">Rely On.</span></h3>
                                    <p>Get the services of well-behaved professional drivers who treat you with
                                        courtesy.</p>
                                    <a href="https://api.whatsapp.com/send?phone=+919895065567 &text=Hello">
                                        <button class="maincta btn btn-primary btn-large shadow-none">Book
                                            Now</button>
                                    </a>
                                    <a href="contact.html">
                                        <button class="btn btn-outline-primary btn-large shadow-none">Contact
                                            Us</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script type="text/javascript">
        
        function SendMailResponse()
{
     
   
    var form_name=$('input#form_name').val();
    var form_tel=$('input#form_tel').val();
    var form_email=$('input#form_email').val();
    var form_message=$('#form_message').val();

   
    $('#ab1').hide();
    $('#ab2').show();
    
    data = new FormData();


   data.append('form_name', form_name);
   data.append('form_tel', form_tel);
   data.append('form_email', form_email);
   data.append('form_message', form_message);
   data.append('_token', @json(csrf_token()));
 $.ajax({

type:"POST",
url:"/enquiry-mail",
data:data,
dataType:"json",
contentType: false,
//cache: false,
processData: false,

success:function(data)
{
  if(data['success'])
  {
     $('#ab2').hide();
    $('#ab1').show();
    swal({
                                  title: "Thank you for your time. We will contact you soon",
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



    </script>


   @endsection