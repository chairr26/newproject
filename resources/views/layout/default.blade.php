<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="Saquib" content="Blade">
    <title>Product</title>
    <!-- load bootstrap from a cdn -->
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}">
</head>
<body>
    <header class="row">
        <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
            <div class="container">
                <a class="navbar-brand mr-auto" href="#">Product</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/">Home</span></a>
                        </li>
                        @if(auth()->user()->role =='admin') 
                        <li class="nav-item">
                            <a class="nav-link" href="/users">Users</a>
                        </li>
                        @endif
                    </ul>
                    <ul class="navbar-nav">
                        <li>Logged As,
                            @if (auth()->user()->name)
                            {{ auth()->user()->name }}
                            @else
                            Guest
                            @endif. <a href="{{ route('login.signout') }}">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div id="main" class="row">
            @yield('content')
        </div>
        <footer class="row">
        </footer>
    </div>
</body>

<script src="{{ URL::asset('/js/bootstrap.bundle.min.js') }}"></script>
</html>