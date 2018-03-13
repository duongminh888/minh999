  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('public/public/avatar')}}/{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Auth::user()->hoten}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Tìm kiếm...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        @if(Auth::user()->rule < 5 && Auth::user()->rule !=3)
        <li class="@if(isset($menu)) @if($menu == 'dashboard') active @endif @endif">
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        @endif
        @if(Auth::user()->rule < 7)
        <li class="@if(isset($menu)) @if($menu == 'phonggiaodich') active @endif @endif">
          <a href="{{url('phonggiaodich')}}">
            <i class="fa  fa-server"></i> <span>Phòng giao dịch</span>
          </a>
        </li>
        @endif
        @if(Auth::user()->rule < 8)
        <li class="treeview @if(isset($menu)) @if($menu == 'profile' || $menu == 'thanhvien' || $menu == 'khachhang') active @endif @endif">
          <a href="#">
            <i class="fa fa-users"></i> <span> Quản lý nhân viên</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if(isset($menu)) @if($menu == 'profile') active @endif @endif">
              <a href="{{url('profile')}}/{{Auth::user()->name}}">
                <i class="fa  fa-user-secret"></i> <span>Thông tin cá nhân</span>
              </a>
            </li>
            @if(Auth::user()->rule < 5 && Auth::user()->rule != 3)
            <li class="@if(isset($menu)) @if($menu == 'thanhvien') active @endif @endif">
              <a href="{{url('thanhvien')}}">
                <i class="fa fa-user"></i> <span>Thành viên</span>
              </a>
            </li>
            @endif
          </ul>
        </li>
        @endif
        <li class="treeview @if(isset($menu)) @if($menu == 'themdonvay' || $menu == 'tatcadonvay') active @endif @endif">
          <a href="#">
            <i class="fa fa-calculator"></i> <span> Quản lý đơn vay của shop</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="@if(isset($menu)) @if($menu == 'tatcadonvay') active @endif @endif">
              <a href="{{url('tatcadonvay')}}/">
                <i class="fa fa-object-group"></i> <span>Tất cả đơn vay</span>
              </a>
            </li>
            <li class="@if(isset($menu)) @if($menu == 'themdonvay') active @endif @endif">
              <a href="{{url('themdonvay')}}/">
                <i class="fa  fa-plus-circle"></i> <span>Thêm đơn vay</span>
              </a>
            </li>
          </ul>
        </li>
        @if(Auth::user()->rule < 7)
        <li class="@if(isset($menu)) @if($menu == 'donxinvay') active @endif @endif">
          <a href="{{url('donxinvay')}}">
            <i class="fa fa-gavel"></i> <span>Đơn xin vay</span>
          </a>
        </li>
        <li class="@if(isset($menu)) @if($menu == 'demomember') active @endif @endif">
          <a href="{{url('demomember')}}">
            <i class="fa fa-object-ungroup"></i> <span>Demo form</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa  fa-history"></i> <span>Thống kê</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-institution"></i> <span>Quản lý thu chi</span>
          </a>
        </li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>