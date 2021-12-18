<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="https://assets.turbologo.com/blog/en/2020/12/19084212/fitness-2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Gym Fitness Center</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                @if(\Auth::check())
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                            <img src="/images/{{ \Auth::user()->image }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ \Auth::user()->name }}</a>
                    </div>
                </div>
                @endif


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
                        <!-- <li class="nav-item">
                            <a href="/employees" class="nav-link {{ request()->is('employees*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nhân viên</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="/employee_types" class="nav-link {{ request()->is('employee_types*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Employee Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/customer_types" class="nav-link {{ request()->is('customer_types*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer Type</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/customer_packs" class="nav-link {{ request()->is('customer_packs*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customer - Service</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/services" class="nav-link {{ request()->is('services*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Service</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/exercises" class="nav-link {{ request()->is('exercises*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Exercises</p>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a href="/health_statuses" class="nav-link {{ request()->is('health_statuses*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Health Status</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/attendances" class="nav-link {{ request()->is('attendances*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Checkin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/recommend-system" class="nav-link {{ request()->is('recommend-system*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Shop</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/qr-code" class="nav-link {{ request()->is('qr-code*') ? 'active' : '' }}">
                            <i class="nav-icon far fa-circle"></i>
                            <p>
                                QR CODE
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/logout" class="nav-link">
                            <i class="nav-icon far fa-circle"></i>
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
