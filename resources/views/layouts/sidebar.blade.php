<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="../../index3.html" class="brand-link">
                <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="/users" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/employees" class="nav-link {{ request()->is('employees*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nhân viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/employee_types" class="nav-link {{ request()->is('employee_types*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loại nhân viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/customer_types" class="nav-link {{ request()->is('customer_types*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Loại khách hàng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/customer_packs" class="nav-link {{ request()->is('customer_packs*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Khách hàng - Dịch vụ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/services" class="nav-link {{ request()->is('services*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dịch vụ</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/attendances" class="nav-link {{ request()->is('attendances*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Checkin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/qr-code" class="nav-link {{ request()->is('qr-code*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                QR CODE
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/logout" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Logout
                            </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
