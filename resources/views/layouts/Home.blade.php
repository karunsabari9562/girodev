<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | GiroKab</title>
    <meta name="description"
        content="GiroKab is an all-in-one platform for the conveyance of people and goods safely & securely." />
    <meta name="keywords" content="cab service in Kannur" />
    <meta name="distribution" content="GiroKab Easy way to book your ride!" />
    <meta name="contact" content="info@girokab.com, +919895065567" />
    <meta name="reply-to" content="info@girokab.com">
    <meta name="address" content="Kannur">
    <meta name="rating" content="General" />
    <meta name="robots" content="index, follow" />
    <meta name="revisit-after" content="21 days" />
    <meta name="publisher" content="girokab.com" />
    <meta property="og:type" content="business.business">
    <link rel="canonical" href="https://www.girokab.com/" />
    <meta property="og:title" content="GiroKab: Easy way to book your ride!" />
    <meta property="og:description"
        content="GiroKab is an all-in-one platform for the conveyance of people and goods safely & securely." />
    <meta property="og:url" content="https://www.girokab.com">
    <meta property="og:image" content="https://www.girokab.com/images/logo.svg">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- AOS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('homepage/css/style.css')}}">
    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{asset('homepage/images/favicon.ico')}}">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-70JKW6QP41"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-70JKW6QP41');
    </script>
</head>

<body>


   


@yield('contents')



    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-info">
                        <img src="{{asset('homepage/images/logo-white.svg')}}" alt="girokab logo">
                        <p>GiroKab is an all-in-one platform for the conveyance of people and goods safely & securely.
                        </p>

                    </div>
                </div>
                <div class="col-md-2 offset-md-1">
                    <div class="contact-info">
                        <h6 class="mb-4">Company</h6>
                        <ul>
                            <!-- <li><a href="/">Home</a></li> -->
                            <!-- <li><a href="/about">About Us</a></li> -->
                          <!--   <li><a href="/services">Services</a></li> -->
                           
                            <li><a href="/terms&conditions">Terms & Conditions</a></li>
                            <li><a href="/privacy-policy">Privacy Policy</a></li>
                            <li><a href="/refund-policy">Refund Policy</a></li>
                            <!--  <li><a href="/contact">Contact</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-app">
                        <h6 class="mb-4">App Launching Soon</h6>
                        <div class="mb-3"><a href="#"><img src="{{asset('homepage/images/apple-store.svg')}}" alt="apple store"></a></div>
                        <div><a href="#"><img src="{{asset('homepage/images/play-store.svg')}}" alt="play store"></a></div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="contact-info">
                        <h6 class="mb-4">Contact Us</h6>
                        <ul>
                            <li><a href="mailto:girokabservices@gmail.com "><img src="{{asset('homepage/images/mail.svg')}}"
                                        alt="mail icon">girokabservices@gmail.com</a></li>
                            <li><a href="https://api.whatsapp.com/send?phone=+919895065567 &text=Hello"><img
                                        src="{{asset('homepage/images/phone.svg')}}" alt="phone icon">+919895 065 567</a></li>

                             <li><a><img
                                        src="{{asset('homepage/images/location-map.svg')}}" alt="phone icon">AL NOOR TOWER<br> kannur city, near D.I.S.G.H SCHOOL<br> KANNUR, 670003</a></li>            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p class="copyright">© 2023 GiroKab</p>
                </div>
            </div>
        </div>
        </div>
    </footer>


    <!-- JAVASCRIPT -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
    <!-- JavaScript -->
    <script src="{{asset('homepage/js/script.js')}}"></script>
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
</body>

</html>

<script type="text/javascript">
    $('#ab2').hide();

</script>