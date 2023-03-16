
@extends('layouts.Home')
@section('title')
 About
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
                        <a href="/about" class="nav-link active">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="/services" class="nav-link">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- TEAM -->
    <section class="girokab-team">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-4" data-aos="fade-up">
                    <h2>Our Team</h2>
                    <p class="phead">Our talented team delivers exceptional results with passion, innovation, and
                        collaboration</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <div class="team-photo" data-aos="fade-up">
                        <img src="{{asset('homepage/images/team01.jpg')}}" alt="team photo">
                        <h4>Muhammed<br>Hasbeer</h4>
                        <p>Founder & CEO</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="team-photo" data-aos="fade-up">
                        <img src="{{asset('homepage/images/team02.jpg')}}" alt="team photo">
                        <h4>Mohammed<br>Nihal</h4>
                        <p>Chief Operating Officer</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="team-photo" data-aos="fade-up">
                        <img src="{{asset('homepage/images/team03.jpg')}}" alt="team photo">
                        <h4>Muhammed<br>Shabeeb.P</h4>
                        <p>Chief Operating Officer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- WHAT ARE WE -->
    <section class="whatarewe">
        <div class="container">
            <div class="row">
                <div class="col-md-6 order-md-2">
                    <div class="what-image text-center" data-aos="fade-up">
                        <img class="img-fluid mb-5" src="{{asset('homepage/images/what-car.svg')}}" alt="car image">
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="what-info" data-aos="fade-up">
                        <h2>What Are We?</h2>
                        <p>Giro Kab is a cab booking app focused on delivering cab booking services to its passengers.
                            Giro Kab is based in Kannur,
                            Kerala and our initial services are available Kannur town, and we plan to
                            expand our operations in the
                            future. We aim to become one of the leading travel booking apps in the coming years.
                        </p>
                        <p>
                            We hope to include the latest travel app features on our app. The Giro Kab app will have a
                            visually appealing design and
                            a user-friendly interface, in order to make our app suitable for all types of users and
                            drivers.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- OFFER-->
    <section class="offer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="offer-image text-center" data-aos="fade-up">
                        <img class="img-fluid" src="{{asset('homepage/images/offer-car.svg')}}" alt="car image">
                    </div>
                </div>
                <div class="col-md-5 offset-md-1">
                    <div class="offer-info" data-aos="fade-up">
                        <h2><span class="big-text">
                                50% OFF
                            </span><br>
                            ON YOUR FIRST DRIVE</h2>
                        <p>Don't miss out on this amazing opportunity to elevate your travel experience. Book now and
                            experience the difference!</p>
                        <a href="https://api.whatsapp.com/send?phone=+919895065567 &text=Hello">
                            <button class="btngray maincta btn btn-primary btn-large shadow-none mb-3"
                                data-aos="fade-up">Book
                                Now</button>
                        </a>
                        <!-- <a href="#">
                            <button class="btn btn-outline-primary btn-large shadow-none mb-3" data-aos="fade-up"
                                >Contact
                                Us</button>
                        </a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- WHYCHOOSE-->
    <!-- <section class="whyus">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="why-image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="offer-info">
                        <h2>Why Choose Us</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard
                            dummy text ever since the 1500s, when an unknown printer took a galley of type & scrambled
                            it to make a type specimen
                            book.</p>
                        <a href="#">
                            <button class="btn btn-outline-primary btn-large shadow-none mb-3" data-aos="fade-up"
                                >Contact
                                Us</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->














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
                                    <a href="/contact">
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



     @endsection