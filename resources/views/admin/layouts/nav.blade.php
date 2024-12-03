<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="./index.html" class="text-nowrap logo-img">
          <img src="{{asset('image/logohub.png')}}"  style="width: 130px; height: 130px;" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('dashboard')}}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Pages</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('admin.orders')}}" aria-expanded="false">
              <span>
                <i class="ti ti-truck-delivery"></i>
              </span>
              <span class="hide-menu">Orders</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('admin.products')}}" aria-expanded="false">
              <span>
                <i class="ti ti-building-store"></i>
              </span>
              <span class="hide-menu">Products</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('admin.users')}}" aria-expanded="false">
              <span>
                <i class="ti ti-users"></i>
              </span>
              <span class="hide-menu">Users</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{route('admin-ticket')}}" aria-expanded="false">
              <span>
          @if ($ticketpendingforadmin >= 1)
          <span class="badge" style="background-color: #f0ad4e; width: 30px">{{$ticketpendingforadmin}}</span>

          @endif
                <i class="ti ti-headset"></i>
              </span>
              <span class="hide-menu">Tickets                   
            </span>
            </a>
          </li>
          
         
        </ul>
   
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>