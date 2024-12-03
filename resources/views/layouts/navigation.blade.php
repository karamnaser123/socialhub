<div class="app-sidebar">
    <div class="close-sidebar-btn" onclick="dashMenuToggle()">
        <i class="fas fa-bars"></i>
    </div>
    <div class="sidebar-header">
        <div class="sh-bg"></div>
        <div class="app-logo">
            <a href="/">
                <img style="width: 100px; height: 80px" src="{{ asset('image/logohub.png') }}" alt="Social Hub.COM"
                    class="logo-lg" title="Social Hub.COM">
                <img src="{{ asset('image/logohub.png') }}" class="logo-sm" alt="">
            </a>
        </div>
        <div class="app-user">
            <div class="app-user-box">
                <div class="app-user-img">
                    <a href="/">
                        <img src="https://cdn.mypanel.link/t1bi1n/0ud8netcrhmh0jqg.png">
                    </a>
                </div>
                <div class="app-user-info">
                    <h4 class="app-user-name">{{ auth()->user()->name }} <img
                            src="https://cdn.mypanel.link/08ed14/2behggr3l6cn74dd.png" width="16" /></h4>
                    <div class="app-user-blnce">${{ auth()->user()->balance }}</div>
                </div>
            </div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="{{ route('profile.edit') }}"><i class="fal fa-user-alt"></i></a>
                </li>
                <li class="list-inline-item"><a href="{{ route('tickets') }}"><i class="fal fa-envelope-open"></i></a></li>
                <li class="list-inline-item">
                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                        <i class="fal fa-power-off"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <div class="sidebar-content">
        <ul class="sidebar-menu">
            {{-- <li class="menu-link" >
          <a href="/massorder" class="menu-link"   >
                         <i class="far fa-box-full m-icon"></i>
                         <span class="menu-text">Mass order</span>
          </a>
          </li> --}}
            <li class="menu-link {{ Request::is('/') ? 'active' : '' }}">
                <a href="{{ route('main') }}" class="menu-link">
                    <i class="far fa-tachometer-alt-slowest m-icon"></i>
                    <span class="menu-text"> @lang('messages.New Order')</span>
                </a>
            </li>
            <li class="menu-link {{ Request::is('orders') ? 'active' : '' }}">
                <a href="{{ route('orders') }}" class="menu-link">
                    <i class="far fa-box-heart m-icon"></i>
                    <span class="menu-text"> @lang('messages.Orders')</span>
                </a>
            </li>
            <li class="menu-link {{ Request::is('tickets') ? 'active' : '' }}">
                <a href="{{ route('tickets') }}" class="menu-link">
                    <i class="far fa-headset m-icon"></i>
                    <span class="menu-text"> @lang('messages.Tickets')

                        @if ($ticketpending >= 1)
                            <span class="badge" style="background-color: #f0ad4e">{{ $ticketpending }}</span>
                        @endif

                    </span>
                </a>
            </li>
            <li class="menu-link {{ Request::is('payment') ? 'active' : '' }}">
                <a href="{{ route('payment') }}" class="menu-link">
                    <i class="far fa-wallet m-icon"></i>
                    <span class="menu-text">
                        @lang('messages.Payment')
                    </span>
                </a>
            </li>




            {{-- <li class="menu-link" >
          <a href="/services" class="menu-link"   >
                         <i class="far fa-list-ul m-icon"></i>
                         <span class="menu-text">Services</span>
          </a>
          </li>
                         <li class="menu-link" >
          <a href="/addfunds" class="menu-link"   >
                         <i class="far fa-wallet m-icon"></i>
                         <span class="menu-text">Add funds</span>
          </a>
          </li>
                         <li class="menu-link" >
          <a href="/tickets" class="menu-link"   >
                         <i class="far fa-headset m-icon"></i>
                         <span class="menu-text">Tickets</span>
          </a>
          </li>
                         <li class="menu-link" >
          <a href="/affiliates" class="menu-link"   >
                         <i class="far fa-user-friends m-icon"></i>
                         <span class="menu-text">Affiliates</span>
          </a>
          </li>
                         <li class="menu-link" >
          <a href="/child-panel" class="menu-link"   >
                         <i class="far fa-store m-icon"></i>
                         <span class="menu-text">Child panel</span>
          </a>
          </li>
                         <li class="menu-link" >
          <a href="/terms" class="menu-link"   >
                         <i class="far fa-scroll-old m-icon"></i>
                         <span class="menu-text">Terms</span>
          </a>
          </li>
                         <li class="menu-link" >
          <a href="/api" class="menu-link"   >
                         <i class="far fa-code m-icon"></i>
                         <span class="menu-text">API</span>
          </a>
          </li>
                         <li class="menu-link" >
          <a href="/faq" class="menu-link"   >
                         <i class="far fa-comment-exclamation m-icon"></i>
                         <span class="menu-text">FAQ</span>
          </a>
          </li>
                         <li class="menu-link" >
          <a href="/updates" class="menu-link"   >
                         <i class="fa-solid fa-bell m-icon"></i>
                         <span class="menu-text">Updates</span>
          </a>
          </li> --}}

        </ul>
    </div>
</div>
