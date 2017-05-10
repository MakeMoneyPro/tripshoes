

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">{{ trans('lang_admin.f') }}<b></b>{{ trans('lang_admin.ood') }}</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{ trans('lang_admin.sharing') }}</b>{{ trans('lang_admin.food') }}</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">{{ trans('lang_admin.toggle_navigation') }}</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">{{ trans('lang_admin.0') }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">{{ trans('lang_admin.you_messages') }}</li>
              <li class="footer"><a href="#">{{ trans('lang_admin.see_all_messages') }}</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">{{ trans('lang_admin.0') }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">{{ trans('lang_admin.you_notifications') }}</li>
              <li class="footer"><a href="#">{{ trans('lang_admin.view_all') }}</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">{{ trans('lang_admin.0') }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">{{ trans('lang_admin.you_tasks') }}</li>
              <li class="footer">
                <a href="#">{{ trans('lang_admin.view_all_tasks') }}</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">

              <span class="hidden-xs">{{Auth::user()->username}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">

                <p>
                  {{Auth::user()->username}} {{ trans('lang_admin.developer') }}
                  <small>{{ trans('lang_admin.member_signin') }}</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <div class="box box-success">
                      <a href="#">{{ trans('lang_admin.followers') }}</a>
                    </div>
                  </div>
                  <div class="col-xs-4 text-center">
                    <div class="box box-info">
                      <a href="#">{{ trans('lang_admin.sales') }}</a>
                    </div>
                  </div>
                  <div class="col-xs-4 text-center">
                    <div class="box box-danger">
                      <a href="#">{{ trans('lang_admin.friends') }}</a>
                    </div>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{asset('/profile')}}" class="btn btn-default btn-success">{{ trans('lang_admin.profile') }}</a>
                </div>
                <div class="pull-right">
                  <a href="{{asset('/logout')}}" class="btn btn-default btn-danger">{{ trans('lang_admin.sign_out') }}</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">{{ trans('lang_admin.title_admin') }}</li>
        <li class="treeview">
          <a href="#"><i class="fa fa-dashboard"></i> <span>{{ trans('lang_admin.dashboard') }}</span></a>
        </li>
        <li class="treeview">
          <a href="{{ route('admin.user.index') }}">
            <i class="fa fa-users"></i>
            <span>{{ trans('lang_admin.user_manager') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.user.index') }}"><i class="fa fa-user"></i> {{ trans('lang_admin.list_users') }}</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-meh-o"></i> <span>{{ trans('lang_admin.foods_manager') }}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('admin.blog.index') }}"><i class="fa fa-heart"></i> {{ trans('lang_admin.list_foods') }}</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="{{ route('admin.packages.index') }}">
            <i class="fa fa-folder"></i> <span>Package</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
