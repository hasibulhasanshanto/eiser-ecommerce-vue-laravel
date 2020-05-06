<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="top_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="float-left">
                        <p>Phone: +01 256 25 235</p>
                        <p>email: info@eiser.com</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="float-right">
                        <ul class="right_side">
                            <li>
                                <a href="cart.html">
                                    gift card
                                </a>
                            </li>
                            @if (Session::get('customerId'))
                            <li>
                                <a>
                                    Welcome {{ Session::get('customerName') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout-customer') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout

                                    <form id="logout-form" action="{{ route('logout-customer') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                            </li>
                            @else
                            <li>
                                <a href="{{ route('checkout')}}">
                                    Login
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('checkout')}}">
                                    Register
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light w-100">
                <!-- Brand and hrefggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html">
                    <img src="/frontend/img/logo.png" alt />
                </a>
                <buthrefn class="navbar-hrefggler" type="buthrefn" data-hrefggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="hrefggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </buthrefn>
                <!-- Collect the nav links, forms, and other content for hrefggling -->
                <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                    <div class="row w-100 mr-0">
                        <div class="col-lg-7 pr-0">
                            <ul class="nav navbar-nav center_nav pull-right">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/shop">Shop</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/blog">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/track">Track Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/contact">Contact</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-5 pr-0">
                            <ul class="nav navbar-nav navbar-right right_nav pull-right">
                                <li class="nav-item">
                                    <a href="#" class="icons">
                                        <i class="ti-search" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="icons">
                                        <i class="ti-shopping-cart"></i>
                                        <span class="badge">0</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="icons">
                                        <i class="ti-heart" aria-hidden="true"></i>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="icons">
                                        <i class="ti-user" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--================Header Menu Area =================-->
