<!-- banner -->
<div class="banner_top innerpage" id="home">
    <div class="wrapper_top_w3layouts">
        <div class="header_agileits">
            <div class="logo inner_page_log">
                <h1><a class="navbar-brand" href="{{ route('home.index') }}"><span>Siesta</span> <i>Shoes</i></a></h1>
            </div>
            <div class="overlay overlay-contentpush">
                <button type="button" class="overlay-close"><i class="fa fa-times" aria-hidden="true"></i></button>

                <nav>
                    <ul>
                        <li><a href="{{ route('home.index') }}" class="active">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="404.html">Team</a></li>
                        <li><a href="{{ route('shop.index') }}">Shop Now</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        @if (Auth::check())
                            <li>
                                <a href="{{ route('account.logout') }}">Log out</a>
                            </li>
                            <li>{{ auth()->user()->name }}</li>
                        @else
                            <li><a href="{{ route('account.login') }}">Log In</a></li>
                            <li><a href="{{ route('account.register') }}">Sign Up</a></li>
                        @endif
                        
                    </ul>
                </nav>
            </div>
            <div class="mobile-nav-button">
                <button id="trigger-overlay" type="button"><i class="fa fa-bars" aria-hidden="true"></i></button>
            </div>
            <!-- cart details -->
            <div class="top_nav_right">
                <div class="shoecart shoecart2 cart cart box_1 last">
                    {{-- <form action="#" method="post" class="last">
                        <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="display" value="1">
                        <button class="top_shoe_cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                    </form> --}}
                    <button class="top_shoe_cart"><a href="{{ route('cart.index') }}"><i style="color: aliceblue" class="fa fa-cart-arrow-down" aria-hidden="true"></i></a></button>
                </div>
            </div>
        </div>
    </div>
    <!-- //cart details -->
    <!-- search -->
    <div class="search_w3ls_agileinfo">
        <div class="cd-main-header">
            <ul class="cd-header-buttons">
                <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
            </ul>
        </div>
        <div id="cd-search" class="cd-search">
            <form action="#" method="post">
                <input name="Search" type="search" placeholder="Click enter after typing...">
            </form>
        </div>
    </div>
    <!-- //search -->
    <div class="clearfix"></div>
    <!-- /banner_inner -->
    <div class="services-breadcrumb_w3ls_agileinfo">
        <div class="inner_breadcrumb_agileits_w3">

            <ul class="short">
                <li><a href="{{ route('home.index') }}">Home</a><i>|</i></li>
                <li><a href="{{ route('shop.index') }}">Shop</a></li>
                
            </ul>
        </div>
    </div>
    <!-- //banner_inner -->
</div>

<!-- //banner -->