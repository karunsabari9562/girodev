<!-- Navbar -->

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button" ><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="/admin-profile" class="nav-link"><img src="{{ asset('admin/img/'.Auth::guard('admin')->user()->profile_image)}}" class="img-circle" alt="User Image" style="width: 35px;">  {{Auth::guard('admin')->user()->name}}</a>
    </li>

   <!--  <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('admin.logout')}}" class="nav-link" ><i class='fas fa-sign-out-alt nav-icon'></i>    Logout</a>
    </li> -->
  </ul>

      

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" id="serprof" type="search" placeholder="Enter Driver Id" aria-label="Search" name="drsearch">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="button" onclick="ViewProfile()">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>


    <!--  <li class="nav-item dropdown">
     <center>
             <img src="{{ asset('admin/img/logo/logo.png')}}" alt="AdminLTE Logo" class="brand-image" style="width: 80%;">
      </center>
    </li> --> 

    <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-user"></i>
        
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        
        <div class="dropdown-divider"></div>
        <a href="/admin-profile" class="dropdown-item">
          
           <div class="media">
           
            <div class="media-body">
              <h3 class="dropdown-item-title">
             My Profile
            </div>
          </div>
          
       </a>
       <a href="/change-password" class="dropdown-item">
          
           <div class="media">
           
            <div class="media-body">
              <h3 class="dropdown-item-title">
             Change Password  
            </div>
          </div>
          
       </a>
        <a href="{{ route('admin.logout')}}" class="dropdown-item">
          
           <div class="media">
           
            <div class="media-body">
              <h3 class="dropdown-item-title">
             Logout 
            </div>
          </div>
          
       </a>
        <div class="dropdown-divider"></div>
        
      </div>
    </li>



    <!-- Notifications Dropdown Menu -->


<li class="nav-item">
      

<!-- <a href="/admin-profile" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i></a>
    </li> -->

    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>  -->
  </ul>
</nav>
<!-- /.navbar -->

<script type="text/javascript">
  function ViewProfile()
  {
    var prof_id=$('input#serprof').val();
    if(prof_id=="")
    {
      $('#serprof').css('border','1px solid red');
      return false;
    }
    else
      $('#serprof').css('border','1px solid #CCC');
    window.open('/girokab-admin/driver-search/' + prof_id);
  }
</script>