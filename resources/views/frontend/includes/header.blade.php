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
                                <a href="#">
                                    Logout
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
    <header-main></header-main>
</header>
<!--================Header Menu Area =================-->
