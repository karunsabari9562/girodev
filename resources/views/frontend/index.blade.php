@extends('layouts.Home')
@section('title')
 Home
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
                        <a href="/" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/about" class="nav-link ">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="/services" class="nav-link ">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <!-- HERO -->
    <main class="hero vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 offset-md-2 order-md-2">
                    <div class="hero-screen text-center">
                        <img class="img-fluid" src="{{asset('homepage/images/giro-screen01.png')}}" alt="girokab app screen"
                            data-aos="fade-up">
                    </div>
                </div>
                <div class="col-md-5 order-md-1">
                    <div class="hero-content" data-aos="fade-up">
                        <h1>
                            Book a <span class="giro-yellow">ride</span> or <br>
                            deliver goods instantly!

                        </h1>
                        <p>GiroKab is an all-in-one platform for the
                            conveyance of people and goods safely & securely.
                        </p>
                        <a href="https://api.whatsapp.com/send?phone=+919895065567 &text=Hello">
                            <button class="maincta btn btn-primary btn-large shadow-none mb-3">Book
                                Now</button>
                        </a>
                        <a href="/contact">
                            <button class="btn btn-outline-primary btn-large shadow-none mb-3">Contact
                                Us</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <!-- ABOUT -->
    <section class="about">
        <div class="container">
            <div class="row align-items-center" data-aos="fade-up">
                <div class="col-md-6">
                    <div class="about-image">
                        <img class="img-fluid" src="{{asset('homepage/images/about-icons.svg')}}" alt="about image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-content">
                        <h2>About Giro<span class="giro-yellow">Kab</span> </h2>
                        <p>With parking becoming a nightmare, today’s motorists are having a tough time on
                            the road. And
                            the long waiting times and
                            delays for public transport do not make it a viable option as well. So, here’s GiroKab to
                            make your
                            travelling/transportation woes less stressful and exhausting.
                        </p>

                        <p class="mb-5">
                            Book a ride, schedule a pick-up or delivery in GiroKab and just relax; GiroKab would get
                            things done for you in no time.
                        </p>
                        <a href="/about">
                            <button class="btn btn-yellow  btn-large shadow-none mb-3">Read
                                More</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- SERVICES -->
    <section class="services">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-md-3">
                    <h2><span class="giro-yellow">Our</span> Services</h2>
                    <p class="phead">Here is a look at the different services that we provide.
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="50">
                    <a href="/services">
                        <div class="service-single">
                            <img src="{{asset('homepage/images/car.svg')}}" alt="service icon">
                            <h6><span class="text-bold">Cab</span><br>Ride</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <a href="/services">
                        <div class="service-single">
                            <img src="{{asset('homepage/images/auto.svg')}}" alt="service icon">
                            <h6><span class="text-bold">Auto</span><br>Ride</h6>
                        </div>
                    </a>
                </div>
                <!-- <div class="col-md-3">
                    <div class="service-single" data-aos="fade-up" data-aos-delay="150">
                        <img src="images/cycle.svg" alt="service icon">
                        <h6><span class="text-bold">Cycle</span><br>Ride</h6>
                    </div>
                </div> -->
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <a href="/services">
                        <div class="service-single">
                            <img src="{{asset('homepage/images/picup.svg')}}" alt="service icon">
                            <h6><span class="text-bold">Pickup</span><br>Ride</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="250">
                    <a href="/services">
                        <div class="service-single">
                            <img src="{{asset('homepage/images/scooter.svg')}}" alt="service icon">
                            <h6><span class="text-bold">Bike</span><br>Ride</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <a href="/services">
                        <div class="service-single">
                            <img src="{{asset('homepage/images/ambulance.svg')}}" alt="service icon">
                            <h6><span class="text-bold">Ambulance</span><br>Service</h6>
                        </div>
                    </a>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="350">
                    <a href="/services">
                        <div class="service-single">
                            <img src="{{asset('homepage/images/bus.svg')}}" alt="service icon">
                            <h6><span class="text-bold">Tourist</span><br>Bus</h6>
                        </div>
                    </a>
                </div>
                <!-- <div class="col-md-3">
                    <div class="service-single" data-aos="fade-up" data-aos-delay="200">
                        <img src="images/delivery-truck.svg" alt="service icon">
                        <h6><span class="text-bold">Goods</span><br>Delivery</h6>
                    </div>
                </div> -->
            </div>
        </div>
    </section>



    <!-- LOCATIONS -->
    <section class="locations">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4" data-aos="fade-up">
                    <!-- <img src="images/map.svg" alt="map icon" width="24px"> -->
                    <h2>Our<br><span class="giro-yellow">Availablity</span></h2>
                </div>
                <div class="col-md-7 offset-md-1" data-aos="fade-up" data-aos-delay="100">
                    <p class="location-now">
                        At present, GiroKab service is available in <span class="giro-yellow kannur">Kannur</span>.
                        But, we are
                        interested in franchising
                        GiroKab as we wish to expand our business to the whole of Kerala and India.
                    </p>
                </div>
                <!-- <div class="col-md-2">
                    <div class="location-info">
                        <ul class="location-list">
                            <li class="location-head">Dubai</li>
                            <li>Fujairah</li>
                            <li>Sharjah</li>
                            <li>Dubai</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="location-info">
                        <ul class="location-list">
                            <li class="location-head">Dubai</li>
                            <li>Fujairah</li>
                            <li>Sharjah</li>
                            <li>Dubai</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="location-info">
                        <ul class="location-list">
                            <li class="location-head">Dubai</li>
                            <li>Fujairah</li>
                            <li>Sharjah</li>
                            <li>Dubai</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="location-info">
                        <ul class="location-list">
                            <li class="location-head">Dubai</li>
                            <li>Fujairah</li>
                            <li>Sharjah</li>
                            <li>Dubai</li>
                        </ul>
                    </div>
                </div> -->
            </div>
        </div>
    </section>



    <!-- CTA -->
    <section class="cta-ad">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-12 text-center">
                    <div class="cta-image">
                        <a href="tel:+919895065567"><img class="img-fluid" src="{{asset('homepage/images/giro-ad.png')}}"
                                alt="girokab cta ad"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- CITY -->
    <section class="city-long py-0">
    </section>



    <!-- APP -->
    <section class="appscreens">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 order-md-2">
                    <div class="screen-image" data-aos="fade-up">
                        <img class="img-fluid" src="{{asset('homepage/images/giro-screen02.png')}}" alt="girokab screen">
                    </div>
                </div>
                <div class="col-md-6 order-md1">
                    <div class="screen-info" data-aos="fade-up">
                        <p class="coming-soon">COMING SOON!</p>
                        <h2>GiroKab Driver<br>& Delivery App</h2>
                        <p>GiroKab’s Driver and Delivery App is a true mate for drivers as it eases your mind while
                            ferrying people and goods
                            promptly and without delay. Just register yourself, drive on and earn handsomely.
                        </p>
                        <p>With this app, you get:</p>
                        <ul class="app-feature">
                            <li><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon"> Alerts about new rides or
                                deliveries nearby</li>
                            <li><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon"> Real-time information on
                                traffic congestion and busy areas</li>
                            <li><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon"> Assurance of smart rides
                                during traffic and rush hours</li>
                            <li><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon"> Easy access to summaries
                                of daily and weekly earnings
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="screen-image" data-aos="fade-up">
                        <img class="img-fluid" src="{{asset('homepage/images/giro-screen03.png')}}" alt="girokab screen">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="screen-info" data-aos="fade-up">
                        <p class="coming-soon">COMING SOON!</p>
                        <h2>GiroKab<br>User App</h2>
                        <p>Forget about busy roads, traffic congestion, and parking woes with GiroKab User App. Book a
                            ride or schedule a delivery
                            using the app and just enjoy a safe journey and prompt pickup /delivery.
                        </p>
                        <p>With this app, you can:</p>
                        <ul class="app-feature">
                            <li><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon"> Schedule different types
                                of rides and transport</li>
                            <li><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon"> Get picked up and dropped
                                off at the very same location you want</li>
                            <li><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon"> Get multiple options for
                                affordable rides and transport</li>
                            <li><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon"> See the profile of the
                                driver
                            </li>
                        </ul>
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