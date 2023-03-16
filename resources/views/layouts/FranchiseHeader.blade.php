<!-- Navbar -->
<style type="text/css">
  .nav-icon{
    color: #fab60b;
  }
</style>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button" ><i class="fas fa-bars"></i></a>
    </li>
    <!-- <li class="nav-item d-none d-sm-inline-block">
      <a href="/admin-profile" class="nav-link"><i class="fa fa-user" aria-hidden="true"></i>   Profile</a>
    </li> -->

    <!-- <li class="nav-item d-none d-sm-inline-block">
      <a href="/franchise-profile" class="nav-link">Profile</a>
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
            <input class="form-control form-control-navbar" type="search" placeholder="Enter Driver Id" aria-label="Search" name="drsearch" id="serprof">
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
        <a href="/franchise-profile" class="dropdown-item">
          
           <div class="media">
           
            <div class="media-body">
              <h3 class="dropdown-item-title">
             My Profile
            </div>
          </div>
          
       </a>
       <a href="/franchise-change-password" class="dropdown-item">
          
           <div class="media">
           
            <div class="media-body">
              <h3 class="dropdown-item-title">
             Change Password  
            </div>
          </div>
          
       </a>
        <a href="{{ route('franchise.logout')}}" class="dropdown-item">
          
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



      <li class="nav-item dropdown">
      <!-- <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">3</span>
      </a> -->
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <a href="#" class="dropdown-item">
         
          <div class="media">
            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Brad Diesel
                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">Call me whenever you can...</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
        
          <div class="media">
            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                John Pierce
                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">I got your message bro</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          
         </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item"> -->
          
           <div class="media">
            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
            <div class="media-body">
              <h3 class="dropdown-item-title">
                Nora Silvester
                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm">The subject goes here</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
            </div>
          </div>
          
       </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
   


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

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary">
  <!-- Brand Logo -->

<!--   <a href="{{route('franchise.dashboard')}}" class="brand-link">
    <img src="{{ asset('admin/img/logo/logo.png')}}" alt="AdminLTE Logo" style="width: 100%;height: 70px;">
    
  </a> -->


<a href="/franchise-dashboard" class="brand-link text-center">
  <!--  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <!--<span class="brand-text font-weight-light"><img src="{{ asset('admin/img/logo/logo.png')}}" style="width: 200px;"> </span>-->
      <span class="logo-icon font-weight-light mr-2"><img src="{{ asset('admin/img/logo/giro-kab-logo-icon.svg')}}" style="width: 44px;"> </span>
      <span class="brand-text font-weight-light"><img src="{{ asset('admin/img/logo/giro-kab-logo-text.svg')}}" style="width: 130px;" > </span>
    </a>
    
  <!-- Sidebar -->
 <!--  -->
  <div class="sidebar" style="overflow-y: hidden;">
    
   

    <!-- SidebarSearch Form -->
 

    <!-- Sidebar Menu -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="cursor: pointer;" onclick="window.location.href='/franchise-profile'">
        <div class="image">
          <img src="{{asset(Auth::guard('franchise')->user()->photo)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block" style="color: white;font-weight: bold;">{{Auth::guard('franchise')->user()->franchise_id}}</a>
        </div>
      </div>


        
       <!--  <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
 -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" >
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

             <li class="nav-item" >
              <a href="/franchise-dashboard" class="nav-link" style="color: white;">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                  
                </p>
              </a>
            </li>

<!--  <li class="nav-item" >
              <a href="/franchise-profile" class="nav-link" style="color: white;">
                <i class="nav-icon fa fa-user"></i>
                <p>
                  My Profile
                  
                </p>
              </a>
            </li> -->
            

       
  <li class="nav-item" >
              <a href="/franchise-division/driver-approval-pending" class="nav-link" style="color: white;">
                <i class="nav-icon fa fa-user-check"></i>
                <p>
                   Approval
                  
                </p>
              </a>
            </li>

            <li class="nav-item" >
              <a href="/driver-area" class="nav-link" style="color: white;">
                <i class="nav-icon fa fa-id-card"></i>
                <p>
                   Drivers
                  
                </p>
              </a>
            </li>
        
      


        <li class="nav-item">
          <a href="#" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-history"></i>
            <p>
             Rides

              <i class="fas fa-angle-left right"></i>
             
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="/todays-bookings/All" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Todays</p>  

              </a>

            </li>
             <li class="nav-item">
              <a href="/all-bookings-filter" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>All</p>  

              </a>

            </li>
            
            
            
          </ul>
        </li>

         <li class="nav-item">
          <a href="#" class="nav-link" style="color: white;">
            <i class="nav-icon fas fa-money-bill-wave"></i>
            <p>
             Collection

              <i class="fas fa-angle-left right"></i>
             
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="/todays-collection" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Todays</p>  

              </a>

            </li>
             <li class="nav-item">
              <a href="/all-collection-filter" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>All</p>  

              </a>

            </li>
            
            
            
          </ul>
        </li>

           <li class="nav-item" >
              <a href="/payments" class="nav-link" style="color: white;">
                <i class="nav-icon fa fa-credit-card"></i>
                <p>
                  Payments
                  
                </p>
              </a>
            </li>

        <li class="nav-item">
          <a href="#" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-file"></i>
            <p>
             Reuploads

              <i class="fas fa-angle-left right"></i>
             
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="/documents-reuploads" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Approval Pending</p>  

              </a>

            </li>
             <li class="nav-item">
              <a href="/rejected-documents" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Rejected</p>  

              </a>

            </li>
            
            
            
          </ul>
        </li>



       


    <li class="nav-item">
          <a href="#" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-cog"></i>
            <p>
              Settings

              <i class="fas fa-angle-left right"></i>
             
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/franchise-change-password" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p> Change Password</p>  

              </a>

            </li>
            <li class="nav-item">
              <a href="{{ route('franchise.logout')}}" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Logout</p>
                <span class="badge badge-info right" style="background-color: green;"></span>
              </a>

            </li>
            
          </ul>
        </li>


      <!--   <li class="nav-item">
          <a href="/change-password" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-lock"></i>
            <p>
              Change Password
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('admin.logout')}}" class="nav-link" style="color: white;">
            <i class='fas fa-sign-out-alt nav-icon'></i>
            <p>
              Logout
            </p>
          </a>
        </li>
 -->

        
      
        
       
        
      </ul>
    </nav>
    <br><br> <br>    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


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
    window.open('/driver-search/' + prof_id);
  }
</script>