@extends('layouts.Home')
@section('title')
 Privacy-Policy
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
                        <a href="/contact" class="nav-link">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>



    <!-- HERO -->
    



    <!-- ABOUT -->
    



    <!-- SERVICES -->
   



    <!-- LOCATIONS -->
    



    <!-- CTA -->
    



    <!-- CITY -->
    <section class="city-long py-0">
    </section>



    <!-- APP -->
    <section class="appscreens">
        <div class="container">
           
            <div class="row align-items-center">
                
                <div class="col-md-12">
                    <div class="screen-info" data-aos="fade-up">
                     
                        <h2>Privacy Policy</h2>
                        <p>Giro Kab is committed to protecting the privacy of our users. The privacy policy explains how we collect, use and disclose information about our customers while they are using our app.
                        </p>
                        <p><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon">Information We Collect<br>We collect information about you when you use our App, such as:</p>
                        <p>
                            •   Personal Information: We may collect personal information such as your name, email address, phone number, and payment information (such as your credit card number) when you create an account or make a booking.<br>
•   Location Information: We collect your device's location when you use our App to book a ride.<br>
•   Communications: We may keep a record of any communication between you and us, such as emails or chat messages.

                        </p>


                        
                        <p><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon">How We Use Your Information<br>We use the information we collect about you to:</p>
                        <p>
                           •    Provide and improve our services, including processing and fulfilling your ride bookings.<br>
•   Communicate with you about your bookings and other App-related information.<br>
•   Personalize your App experience and provide you with content and offers tailored to your interests.
•   Protect our App and our users from fraud and other illegal activities.


                        </p>


                       
                        <p><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon">How We Share Your Information<br>We may share your information with third parties in the following ways:</p>
                        <p>
                            •   Service Providers: We may share your information with third-party service providers who help us operate our App, such as payment processors and customer support providers.<br>
•   Legal Requirements: We may disclose your information to third parties if we believe that disclosure is necessary to comply with the law or protect our rights, property, or safety.<br>
•   Business Transfers: If we are involved in a merger, acquisition, or sale of all or a portion of our assets, your information may be transferred as part of that transaction.

                        </p>

                         <p><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon">Your Choices<br>You can control your information by:</p>
                        <p>
                            •   Updating your account information in the App.<br>
•   Opting out of marketing communications by following the instructions in the communication or contacting us at [contact email].<br>
•   Changing your device's location settings to prevent us from collecting your location information.


                        </p>

                          <p><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon">Security</p>
                        <p>
                           We take reasonable measures to protect your information from unauthorized access, use, or disclosure. However, no security measure is completely foolproof, and we cannot guarantee the security of your information.
                        </p>

                          <p><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon">Changes to this Privacy Policy</p>
                        <p>
                          We hereby declare that we may update the privacy policy from time to time. If we make significant changes in the policy, we may notify our customers via email or through app.

                        </p>

                        <p><img class="tick-icon" src="{{asset('homepage/images/tick.svg')}}" alt="tick icon">Contact Us</p>
                        <p>
                         If you have any questions or concerns about this Privacy Policy, you can contact us through email or call.

                        </p>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- FEATURES -->
    



        @endsection