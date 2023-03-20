<!-- Main Sidebar Container -->
<style type="text/css">
  .nav-icon{
    color: #fab60b;
  }
</style>
<aside class="main-sidebar sidebar-dark-primary" style="background-image: url({{asset('admin/img/logo/bg1.jpeg')}});background-repeat: inherit;">
  <!-- Brand Logo -->

 <!--  <a href="{{route('admin.dashboard')}}" class="brand-link">
    <img src="{{ asset('admin/img/logo/logo.png')}}" alt="AdminLTE Logo" style="width: 100%;height: 70px;">
    
  </a> -->

<a href="/admin-dashboard" class="brand-link text-center">
  <!--  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <!--<span class="brand-text font-weight-light"><img src="{{ asset('admin/img/logo/logo.png')}}" style="width: 200px;"> </span>-->
      <span class="logo-icon font-weight-light mr-2"><img src="{{ asset('admin/img/logo/giro-kab-logo-icon.svg')}}" style="width: 44px;"> </span>
      <span class="brand-text font-weight-light"><img src="{{ asset('admin/img/logo/giro-kab-logo-text.svg')}}" style="width: 130px;" > </span>
    </a>

    
  <!-- Sidebar -->
  
  <div class="sidebar" style="overflow-y: hidden;">
<!--     
   
<br>
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

    <!-- Sidebar Menu -->
 

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" >
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

             <li class="nav-item" >
              <a href="/admin-dashboard" class="nav-link" style="color: white;">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                  
                </p>
              </a>
            </li>

        
      <li class="nav-item">
          <a href="#" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-user-check"></i>
            <p>
              Driver Approval

              <i class="fas fa-angle-left right"></i>
             
            </p>
          </a>
          <ul class="nav nav-treeview">
            <!-- <li class="nav-item">
              <a href="/admin/new-driverslist" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Submission Pending</p>  

              </a>

            </li> -->
            <li class="nav-item">
              <a href="/girokab-admin/drivers-final-approval" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Approval Pending</p>
                <span class="badge badge-info right" style="background-color: green;"></span>
              </a>

            </li>

             <!-- <li class="nav-item">
              <a href="/rejected-driverslist" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Rejected</p>
                <span class="badge badge-info right" style="background-color: green;"></span>
              </a>

            </li> -->
            
            
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-id-card"></i>
            <p>
              Active Drivers

              <i class="fas fa-angle-left right"></i>
             
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/girokab-admin/driver-account-renewal" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Account Renewals</p>  

              </a>

            </li>
            <li class="nav-item">
              <a href="/girokab-admin/driver-profile-updates" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Profile Updates</p>  

              </a>

            </li>
            <li class="nav-item">
              <a href="/girokab-drivers/driver-area" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Driver Area</p>
                <span class="badge badge-info right" style="background-color: green;"></span>
              </a>

            </li>
            
            
          </ul>
        </li>

           <li class="nav-item">
          <a href="#" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Customers

              <i class="fas fa-angle-left right"></i>
             
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/girokab-admin/customer-area" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Customers Area</p>
                <span class="badge badge-info right" style="background-color: green;"></span>
              </a>

            </li>
            <li class="nav-item">
              <a href="/girokab-admin/disability-certificates" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Disability Certificate</p>  

              </a>

            </li>
            
            
            
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-industry"></i>
            <p>
              Divisions

              <i class="fas fa-angle-left right"></i>
             
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/add-franchise" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New</p>  

              </a>

            </li>
            <li class="nav-item">
              <a href="/franchise-area" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Division Area</p>
                <span class="badge badge-info right" style="background-color: green;"></span>
              </a>

            </li>
            
            
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-history"></i>
            <p>
             Ride History

              <i class="fas fa-angle-left right"></i>
             
            </p>
          </a>
          <ul class="nav nav-treeview">
            
            <li class="nav-item">
              <a href="/girokab-admin/todays-bookings/All" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Todays</p>  

              </a>

            </li>
             <li class="nav-item">
              <a href="/girokab-admin/all-bookings-filter" class="nav-link" style="color: white;">
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
              <a href="/girokab-admin/todays-collection" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Todays</p>  

              </a>

            </li>
             <li class="nav-item">
              <a href="/girokab-admin/all-collection-filter" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>All</p>  

              </a>

            </li>

            <li class="nav-item">
              <a href="/girokab-admin/refund-requests" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Refunds</p>  

              </a>

            </li>
            
            
            
          </ul>
        </li>

         <li class="nav-item" >
              <a href="/girokab-admin/payments" class="nav-link" style="color: white;">
                <i class="nav-icon fa fa-credit-card"></i>
                <p>
                  Payments
                  
                </p>
              </a>
            </li>
            


          <li class="nav-item">
          <a href="#" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-car"></i>
            <p>
              Vehicles

              <i class="fas fa-angle-left right"></i>
             
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/vehicle-categories" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Categories</p>  
              </a>

            </li>
         
                 
          </ul>
        </li>

<!-- <li class="nav-item" >
              <a href="/advertisement" class="nav-link" style="color: white;">
                <i class="nav-icon fas fa-ad"></i>
                <p>
                  Advertisements
                  
                </p>
              </a>
            </li> -->

<li class="nav-item">
          <a href="#" class="nav-link" style="color: white;">
            <i class="nav-icon fas fa-ad"></i>
            <p>
              Advertisements

              <i class="fas fa-angle-left right"></i>
             
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/advertisement" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Active</p>  

              </a>

            </li>
            <li class="nav-item">
              <a href="/blocked-advertisement" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Blocked</p>
                <span class="badge badge-info right" style="background-color: green;"></span>
              </a>

            </li>
            
            
          </ul>
        </li>


    <li class="nav-item">
          <a href="#" class="nav-link" style="color: white;">
            <i class="nav-icon fa fa-plus"></i>
            <p>
              Add On

              <i class="fas fa-angle-left right"></i>
             
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/fee-details" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p>Fee & Fare Settings</p>  

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
              <a href="/change-password" class="nav-link" style="color: white;">
                <i class="far fa-circle nav-icon"></i>
                <p> Change Password</p>  

              </a>

            </li>
            <li class="nav-item">
              <a href="{{ route('admin.logout')}}" class="nav-link" style="color: white;">
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