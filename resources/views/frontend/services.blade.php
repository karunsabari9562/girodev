
@extends('layouts.Home')
@section('title')
 Services
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
                        <a href="/services" class="nav-link active">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- SERVICES -->
    <section class="services-all">
        <div class="container">
            <div class="row align-items-center mt-0" id="cabbook">
                <div class="col-md-6 order-md-2">
                    <div class="what-image text-left" data-aos="fade-up">
                        <img class="img-fluid" src="{{asset('homepage/images/cab-booking.png')}}" alt="car image">
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="what-info" data-aos="fade-up">
                        <img src="{{asset('homepage/images/car.svg')}}" alt="service icon">
                        <h2><span class="giro-yellow">Cab</span> Booking</h2>
                        <p>Our cab booking service offers a convenient and reliable way to get to your destination. With
                            just a tap on your
                            smartphone, you can book a ride and have a driver at your doorstep in no time. Our focus is
                            on providing an efficient
                            and stress-free experience, so you can sit back and relax while we handle the driving.
                            Whether you need a ride for
                            personal or business purposes, we have you covered. Book with confidence, knowing that you
                            will always receive a safe,
                            comfortable, and hassle-free journey.</p>
                        <a href="https://api.whatsapp.com/send?phone=+919895065567 &text=Cab-booking">
                            <button class="maincta btn btn-primary btn-large shadow-none mb-3" data-aos="fade-up">Book
                                Now</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center" id="bikebook">
                <div class="col-md-6">
                    <div class="what-image text-left" data-aos="fade-up">
                        <img class="img-fluid" src="{{asset('homepage/images/bike-booking.png')}}" alt="bike image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="what-info" data-aos="fade-up">
                        <img src="{{asset('homepage/images/scooter.svg')}}" alt="service icon">
                        <h2><span class="giro-yellow">On Bike</span> Delivery</h2>
                        <p>Our bike delivery service offers a fast and cost-effective solution for transporting your
                            goods. Our experienced riders
                            use high-quality bikes and the latest technology to ensure the safe and efficient delivery
                            of your packages. Whether you
                            need same-day or next-day delivery, we have options to fit your schedule. With real-time
                            tracking and updates, you can
                            always stay informed about the status of your delivery. Trust us to get your goods where
                            they need to be, when they need
                            to be there</p>
                        <a href="https://api.whatsapp.com/send?phone=+919895065567 &text=Bike-Booking">
                            <button class="maincta btn btn-primary btn-large shadow-none mb-3" data-aos="fade-up">Book
                                Now</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center" id="autobook">
                <div class="col-md-6 order-md-2">
                    <div class="what-image text-left" data-aos="fade-up">
                        <img class="img-fluid" src="{{asset('homepage/images/auto-booking.png')}}" alt="auto image">
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="what-info" data-aos="fade-up">
                        <img src="{{asset('homepage/images/auto.svg')}}" alt="service icon">
                        <h2><span class="giro-yellow">Auto</span> Booking</h2>
                        <p>Our auto booking service provides a comfortable and efficient mode of transportation. With
                            just a few taps on your
                            smartphone, you can book an auto and enjoy a hassle-free ride. Our fleet of well-maintained
                            autos is available for you to
                            meet your transportation needs. Whether you're commuting, running errands, or just exploring
                            the city, our auto booking
                            service makes it easy and affordable to get around. Book now and arrive at your destination
                            in style and comfort.</p>
                        <a href="https://api.whatsapp.com/send?phone=+919895065567 &text=Auto-booking">
                            <button class="maincta btn btn-primary btn-large shadow-none mb-3" data-aos="fade-up">Book
                                Now</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center" id="pickupbook">
                <div class="col-md-6">
                    <div class="what-image text-left" data-aos="fade-up">
                        <img class="img-fluid" src="{{asset('homepage/images/pickup-booking.png')}}" alt="pickup image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="what-info" data-aos="fade-up">
                        <img src="{{asset('homepage/images/picup.svg')}}" alt="service icon">
                        <h2><span class="giro-yellow">Pickup</span> Booking</h2>
                        <p>Our pickup van booking service provides a reliable and efficient solution for transporting
                            goods and packages. With just
                            a few taps on your smartphone, you can book a van and have your items safely delivered. Our
                            fleet of well-maintained
                            pickup vans are equipped to handle a wide range of cargo, making it easy to transport even
                            the largest or most fragile
                            items. Whether you're delivering goods for your business or sending packages to friends and
                            family, our pickup van
                            booking service makes it simple to coordinate your transportation needs. Book now and ensure
                            that your items reach their
                            destination safely and securely.</p>
                        <a href="https://api.whatsapp.com/send?phone=+919895065567 &text=Pickup-Booking">
                            <button class="maincta btn btn-primary btn-large shadow-none mb-3" data-aos="fade-up">Book
                                Now</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center" id="ambulancebook">
                <div class="col-md-6 order-md-2">
                    <div class="what-image text-left" data-aos="fade-up">
                        <img class="img-fluid" src="{{asset('homepage/images/ambulance-booking.png')}}" alt="ambulance image">
                    </div>
                </div>
                <div class="col-md-6 order-md-1">
                    <div class="what-info" data-aos="fade-up">
                        <img src="{{asset('homepage/images/ambulance.svg')}}" alt="service icon">
                        <h2><span class="giro-yellow">Ambulance</span> Service</h2>
                        <p>Our emergency ambulance service provides prompt and professional medical assistance in times
                            of need. With just a few taps, you can access our highly trained medical personnel and
                            state-of-the-art ambulances. Our ambulances are equipped
                            with the latest medical equipment and staffed by experienced medical professionals, ensuring
                            that you receive the
                            highest quality of care. Whether you're facing a medical emergency or simply need to
                            transport a patient to a hospital,
                            our ambulance service is available 24/7 to meet your needs. Call us now for prompt and
                            reliable medical assistance.</p>
                        <a href="https://api.whatsapp.com/send?phone=+919895065567 &text=Auto-booking">
                            <button class="maincta btn btn-primary btn-large shadow-none mb-3" data-aos="fade-up">Book
                                Now</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center" id="busbook">
                <div class="col-md-6">
                    <div class="what-image text-left" data-aos="fade-up">
                        <img class="img-fluid" src="{{asset('homepage/images/tourist-booking.png')}}" alt="tourist bus image">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="what-info" data-aos="fade-up">
                        <img src="{{asset('homepage/images/bus.svg')}}" alt="service icon">

                        <h2><span class="giro-yellow">Tourist Bus</span> Booking</h2>
                        <p>Our tourist bus booking service offers a convenient and comfortable way to explore new
                            destinations. With just a few
                            taps on your smartphone, you can book a bus and enjoy a hassle-free journey. Our fleet of
                            well-maintained buses are
                            equipped with amenities to make your trip comfortable and enjoyable. Whether you're
                            traveling with a group or solo, our
                            tourist bus booking service makes it easy to plan your itinerary and visit all the must-see
                            attractions. Book now and
                            experience the beauty of new destinations in comfort and style.</p>
                        <a href="https://api.whatsapp.com/send?phone=+919895065567 &text=TouristBus-Booking">
                            <button class="maincta btn btn-primary btn-large shadow-none mb-3" data-aos="fade-up">Book
                                Now</button>
                        </a>
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


 @endsection