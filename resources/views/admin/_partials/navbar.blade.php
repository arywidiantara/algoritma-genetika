<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        <b>
          ADM
          IN
        </b>
          Penjadwalan
        </b>
      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        <b>
          ADMIN
        </b>
        Penjadwalan
        </b>
      </span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">
          Toggle navigation
        </span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ URL('images/avatar.png') }}" class="user-image" alt="User Image"/>
              <span class="hidden-xs">
               {{ isset(Auth::user()->name) ? Auth::user()->name : '' }}
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ URL('images/avatar.png') }}" class="img-circle" alt="User Image"/>
                <p>
                  {{ isset(Auth::user()->name) ? Auth::user()->name : '' }}
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">
                    Profile
                  </a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat">
                    Sign out
                  </a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
