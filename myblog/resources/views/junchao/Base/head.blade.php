<header class="main-header">
  <a href="javascript:void(0)" class="logo">
    <span class="logo-mini"><b>J</b>c</span>
    <span class="logo-lg"><b>Jun</b>chao</span>
  </a>
  <nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        @if (Auth::guard('admin')->guest())
          <li class="dropdown user user-menu">
            <a href="/admin/login" class="" data-toggle="">
              <img src="{{ asset('Junchao/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">请登录</span>
            </a>
          </li>
        @else
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('Junchao/dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::guard('admin')->user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="{{ asset('Junchao/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a class="btn btn-default btn-flat logout" href="/admin/logout">退出</a>
                </div>
              </li>
            </ul>
          </li>
        @endif
      </ul>
    </div>
  </nav>
  </header>