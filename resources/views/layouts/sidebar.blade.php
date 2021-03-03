    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MiniPos</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item @if($dashboard == 'dashboard') active @endif ">
        <a class="nav-link" href="{{ url('dashboard')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Users Pages Collapse Menu -->
      <li class="nav-item @if($main_menu == 'User') active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-users"></i>
          <span>Users</span>
        </a>
        <div id="collapseOne" class="collapse @if($main_menu == 'User') show @endif"" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item @if($sub_menu == 'groups') active @endif" href="{{ route('group-view')}}">Groups</a>
            <a class="collapse-item @if($sub_menu == 'users') active @endif" href="{{ route('users.index')}}">Users</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Product Pages Collapse Menu -->
      <li class="nav-item @if($main_menu == 'Product') active @endif ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Products</span>
        </a>
        <div id="collapseTwo" class="collapse @if($main_menu == 'Product') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item @if($sub_menu == 'product') active @endif" href="{{ route('categories.index')}}"> Categories</a>
            <a class="collapse-item @if($sub_menu == 'category') active @endif" href="{{ route('product.index')}}">Products</a>
            <a class="collapse-item @if($sub_menu == 'stock') active @endif" href="{{ route('product.stock')}}">Stock</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Reports Pages Collapse Menu -->
      <li class="nav-item @if($main_menu == 'Reports') active @endif">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReport" aria-expanded="true" aria-controls="collapseReport">
          <i class="fas fa-fw fa-cog"></i>
          <span>Reports</span>
        </a>
        <div id="collapseReport" class="collapse @if($main_menu == 'Reports') show @endif" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item @if($sub_menu == 'Sale') active @endif " href="{{ route('reports.sale')}}"> Sale Reports</a>
            <a class="collapse-item @if($sub_menu == 'Purchase') active @endif" href="{{ route('reports.purchase')}}">Purchase Reports</a>
            <a class="collapse-item @if($sub_menu == 'Payment') active @endif " href="{{ route('reports.payment')}}">Payment Reports</a>
            <a class="collapse-item @if($sub_menu == 'Receipt') active @endif " href="{{ route('reports.receipt')}}">Receipts Reports</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
