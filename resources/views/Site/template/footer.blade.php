@section('Footer')
<style>
    .footer-links a {
        color: #fff;
        font-size: 24px;
        font-weight: 500;
        text-transform: capitalize;
        margin-right: 20px;
        display: inline-block;
        padding: 10px 0;
    }
    .footer-links a:hover {
        color: #e09000;
    }
</style>
<br>
<footer id="footer-three">
    <div class="container">
        <div class="footer-links">
            <a href="{{ route('index') }}">Forum</a><br>
            @if(Auth::check())
            <a href="{{ route('author', ['id' => Auth::user()->id]) }}">Author page</a><br>
            <a href="{{ route('profile.edit') }}">Profile</a><br>
            <a href="{{route('dashboard')}}">Dashboard</a><br>
            <a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button style="all:unset" type="submit">Logout</button>
                </form>
            </a><br>
            @else
            <a href="{{route('login')}}">Login</a><br>
            <a href="{{route('register')}}">Sign Up</a><br>
            @endif
            <a href="{{route('about')}}">About</a><br>
            <a href="{{route('faq')}}">FAQ</a><br>
        </div>
        <div class="footer-inner">
            <div class="copy-right">
                <p>Copyright &copy;  2023-<script>document.write(new Date().getFullYear());</script> Cool company LLC. All Rights Reserved</p>
            </div>
        </div>
        <!-- /.footer-inner -->
    </div>
    <!-- /.container -->
    <!-- <div class="fire-bg-wrap">
<div class="footer-fire"></div>
</div> -->
    <!-- /.fire-bg-wrap -->
</footer>
@show