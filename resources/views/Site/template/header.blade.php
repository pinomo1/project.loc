@section("NavBar")
<style>

    .searchbar{
        display: inline;
        padding:10px;
        border-radius: 10px;
        width: 60%
    }

    button{
        display: inline-block
    }
</style>

<header class="header header-two">

    <div class="nav">
        <div class="container">
            <div class="nav-wrap">
                <div id="site-logo">
                    <a href="/">
                <img src="{{asset('assets/img/logo.png')}}" alt="Site Logo">
            </a>
                </div>
                <ul class="tim-nav text-right">
                    <li class="menu-item">
                        <a href="{{ route('index') }}">Forum</a>
                    </li>
                    @if(Auth::check())
                    <li class="menu-item menu-item-has-children">
                        <a>{{ Auth::user()->name }}</a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('author', ['id' => Auth::user()->id]) }}">Author page</a></li>
                            <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                            <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                            <li>
                                <a>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button style="all:unset" type="submit">Logout</button>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="menu-item">
                        <a href="{{route('login')}}">Login</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('register')}}">Sign Up</a>
                    </li>
                    @endif
                    <li class="menu-item">
                        <a href="{{route('about')}}">About</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{route('faq')}}">FAQ</a>
                    </li>
                    <li class="tim-nav text-right">
                        <form action="{{ route('search') }}" method="GET" class="searchbar">
                            @csrf
                            <input type="search" name="search" placeholder="Search..." class="form-control searchbar" required>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </li>
                </ul>
            </div>
            <!-- /.nav-wrap -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.nav -->
</header>
<!-- /#header -->

<!--================================-->
<!--=        Mobile Navbar         =-->
<!--================================-->
<header id="mobile-nav-wrap">
    <div class="mob-header-inner d-flex justify-content-between">
        <div id="mobile-logo" class="d-flex justify-content-start">
            <a href="#"><img src="assets/img/logo.png" alt="Site Logo"></a>
        </div>

        <ul class="user-link nav justify-content-end">
            <li>
                <a href="#" data-toggle="modal" data-target="#signInModal">
            <i class="fa fa-user"></i>
            Login
        </a>
            </li>
            <li>
                <a href="#" data-toggle="modal" data-target="#signUpModal">
            <i class="fa fa-sign-in"></i>
            Sign Up
        </a>
            </li>
        </ul>

        <div id="nav-toggle" class="nav-toggle hidden-md">
            <div class="toggle-inner">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /.mob-header-inner -->
</header>
<!-- /#mobile-header -->

<div class="mobile-menu-inner">

    <div class="close-menu">
        <span class="bar"></span>
        <span class="bar"></span>
    </div>

    <nav id="accordian">
        <ul class="accordion-menu">
            <li>
                <a href="#0" class="dropdownlink">Home</a>
                <ul class="submenuItems">
                    <li><a href="index.html">Home Shooter</a></li>
                    <li><a href="index-clan.html">Home Clan</a></li>
                    <li><a href="index-zoombie.html">Home Zoombie</a></li>
                    <li><a href="404.html">404 Page</a></li>
                </ul>
            </li>
            <li>
                <a href="overview.html">Overview</a>
            </li>
            <li>
                <a href="game.html">Game</a>
            </li>

            <li>
                <a href="strategy.html">Strategy</a>
            </li>
            <li>
                <a href="community.html">Community</a>
            </li>
            <li>
                <a href="#0" class="dropdownlink">Store</a>
                <ul class="submenuItems">
                    <li><a href="store.html">Four Column</a></li>
                    <li><a href="store-three-column-right.html">Three Column Right</a></li>
                    <li><a href="store-three-column-left.html">Three Column Left</a></li>
                </ul>
            </li>
            <li>
                <a href="#0" class="dropdownlink">Blog</a>
                <ul class="submenuItems">
                    <li><a href="blog-fullwidth.html">Full Width</a></li>
                    <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                    <li><a href="blog-masonry.html">Masonry</a></li>
                    <li><a href="blog-single-right.html">Details</a></li>
                    <li><a href="blog-single-fullwidth.html">Details Fullwidth</a></li>
                </ul>
            </li>
            <li>
                <a href="community.html">Team</a>
            </li>
            <li>
                <a href="community.html">Tournament</a>
            </li>
        </ul>
    </nav>

    <form action="#" id="moble-search">
        <input type="text" placeholder="Search....">
        <button type="submit"><i class="fa fa-search"></i></button>
    </form>
    <!-- /#moble-search -->

    <ul class="footer-social-link">
        <li class="fb-bg"><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li class="in-bg"><a href="#"><i class="fa fa-instagram"></i></a></li>
        <li class="tw-bg"><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li class="gp-bg"><a href="#"><i class="fa fa-google-plus"></i></a></li>
    </ul>
</div>
<!-- /.mobile-menu-inner -->
@show