<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Division | @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link rel="icon" type="image/x-icon" href="{{ asset('admin/img/logo/logo1.png')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin/css/style.css')}}">

    
   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
   <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

</head>
<body class="hold-transition sidebar-mini layout-fixed" id="bdy">
<div class="wrapper">
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('admin/img/logo/logo2.png')}}" alt="AdminLTELogo" style="width: 20%;">
  </div>
  <!-- Preloader -->
 
  @include('layouts.FranchiseHeader')


@yield('contents')


  <!-- /.content-wrapper -->
  <!-- <footer class="main-footer" style="background-color: #e80042;">
    <center>
    <strong style="color: #020202;">Copyright © 2022 <a href="http://ambiers.com" style="color: #0b616e;">Ambiers. </a> All right reserved.</strong>
    </center>
   
    <div class="float-right d-none d-sm-inline-block">
     
    </div>
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->


<script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->

<!-- Sparkline -->
<script src="{{ asset('admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->

<!-- jQuery Knob Chart -->
<script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('admin/dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin/dist/js/pages/dashboard.js')}}"></script>

<!-- DataTables  & Plugins -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{ asset('js/sweetalert.js') }}"></script>
 




<script>

  $(document).ready(function() {
  
  var slidesWrapperWidth, slideWidth, slideNumber, imgSrc, sliderInterval;
  //animation controls
  var pause = 4000;
  var transition = 500;
  
  //turn img into repsonsive full-bg img
  function makeBgImg() {
     $(".slides-wrapper li").each(function (i) {
       imgSrc = $(this).find('img').attr('src');
       $(this).css({'background-image': 'url('+imgSrc+')'}); 
      });
  }//end makeBgImg
  
  makeBgImg();
  
  function refreshVars() {
    slideNumber = $('.slides-wrapper li').length;
    slideWidth = $('#slider').outerWidth();
    slidesWrapperWidth = slideWidth * slideNumber;
    
    $('.slides-wrapper').css("width", slidesWrapperWidth+'px');
    $('.slides-wrapper li').css('width', slideWidth+'px');
    $('.slides-wrapper').css('left', - slideWidth);
  }//end refreshVars
  
  refreshVars();
  $(window).resize(refreshVars); 
  
  
  $('.slider-wrapper li:last-child').prependTo('.slider-wrapper');
  function ShowNextSlide() {
       $('.slides-wrapper').animate({
            marginLeft: - slideWidth
        }, transition, function () {
            $('.slides-wrapper li:first-child').appendTo('.slides-wrapper');
            $('.slides-wrapper').css('marginLeft', '');
        });//end animate
  }//end show next slide
 
    function ShowPrevSlide() {   
           $('.slides-wrapper').animate({
            marginLeft: + slideWidth
        }, transition, function () {
            $('.slides-wrapper li:last-child').prependTo('.slides-wrapper');           
            $('.slides-wrapper').css('marginLeft', '');
        });//end animate     
    
  }//end show prev slide
  
  $('.slide-right').on('click',ShowNextSlide);
  $('.slide-left').on('click',ShowPrevSlide);
  
  //autoplay 
  function startSlider() {
   sliderInterval = setInterval(ShowNextSlide, pause)
  }
  startSlider();
   $('#slider').mouseenter(function() {
      clearInterval(sliderInterval);
   });
    $('#slider').mouseleave(startSlider);
}); //end ready
   $(document).keypress(function(event){
  
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if(keycode == '13'){
    Save();  
  }
  
});

   $('#rejj1').hide();
    $('#st2').hide();
     $('#st3').hide();
         $('#st33').hide();
     $('#st4').hide();
     $('#st5').hide();
      $('#st6').hide();
      $('#st7').hide();
      $('#st8').hide();
      
$('#bt01').hide();
  $('#bt2').hide();
     $('#bt4').hide();
      $('#bbt4').hide();
     $('#bt6').hide();
     $('#bt8').hide();
      $('#bt10').hide(); 
      $('#bt12').hide();    


  $('#renewbt2').hide();
  $('#ab2').hide();
  $('#ab4').hide();
    $('#ab6').hide();
  $('#ab22').hide();
   $('#aab2').hide();
  $('#submitButton1').hide();
  
  $(function () {

    

    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      // "buttons": ["excel", "pdf" , "print",]
         // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    //   $("#example2").DataTable({
    //   "responsive": true, "lengthChange": true, "autoWidth": true,
    //   // "buttons": ["excel", "pdf" , "print",]
    //      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    // });

        $("#example3").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      // "buttons": ["excel", "pdf" , "print",]
         // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');


  //   $('#example2').DataTable({
  //     "paging": true,
  //     "lengthChange": false,
  //     "searching": false,
  //     "ordering": true,
  //     "info": true,
  //     "autoWidth": false,
  //     "responsive": true,
  //   });
  });




    


</script>

  


</body>
</html>
