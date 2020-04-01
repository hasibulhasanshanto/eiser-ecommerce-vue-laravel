<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('backend/images')}}/logo.png" alt="Profile Logo" class="brand-image img-circle elevation-1"
            style="opacity: .8">
        <span class="brand-text font-weight-light d-flex justify-content-center" style="font-size:25px">Eiser
            Online</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-2 mb-2 d-flex justify-content-center">
            <div class="info">
                <a href="{{ route('home') }}" class="d-block">
                    <h4 class="user-role">
                        @if (Auth::user()->role ==1)
                        Super Admin
                        @elseif (Auth::user()->role ==2)
                        Admin
                        @elseif (Auth::user()->role ==3)
                        Vendor
                        @else
                        User
                        @endif
                    </h4>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if (Auth::user()->role == 1 )
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index')}}" class="nav-link active">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        @endif

                        <li class="nav-item ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-tags"></i>
                        <p>Tags</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Categories
                            <span class="right badge badge-danger">{{ $category_count }}</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.brand.index')}}" class="nav-link">
                        <i class="fas fa-user-tag nav-icon"></i>
                        <p>
                            Brands
                            <span class="right badge badge-danger">{{ $brand_count }}</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.product.index')}}" class="nav-link">
                        <i class="fas fa-tshirt nav-icon"></i>
                        <p>
                            Products
                            <span class="right badge badge-danger">{{ $product_count }}</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.coupon.index')}}" class="nav-link">
                        <i class="nav-icon fa fa-donate"></i>
                        <p>
                            Coupons
                            <span class="right badge badge-danger">{{ $coupon_count}}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-layer-group"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>

                @endif

                @if (Auth::user()->role == 3)
                <li class="nav-item">
                    <a href="{{ route('admin.product.index')}}" class="nav-link">
                        <i class="fas fa-tshirt nav-icon"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                @endif

                @if (Auth::user()->role == 4)

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Wishlist
                            <span class="right badge badge-danger">3</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Order
                            <span class="right badge badge-danger">1</span>
                        </p>
                    </a>
                </li>
                @endif


                <li class="nav-item">
                    <hr style="border-top: 2px solid rgba(255, 255, 255, 0.5);">
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
