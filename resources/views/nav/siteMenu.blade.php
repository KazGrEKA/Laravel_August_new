<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <ul class="nav navbar-nav">
            <li class="navbar-li active"><a href="{{ route('root') }}">Home</a></li>
            <li class="navbar-li"><a href="{{ route('about') }}">About</a></li>
            <li class="navbar-li"><a href="{{ route('news::categories') }}">News</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="navbar-li"><a href="{{ route('auth') }}">Sign in</a></li>
            <li class="navbar-li"><a href="{{ route('admin::panel') }}">Admin</a></li>
        </ul>
    </div>
</nav>
