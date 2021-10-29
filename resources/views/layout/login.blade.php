<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="Saquib" content="Blade">
    <title>Login</title>
    <!-- load bootstrap from a cdn -->
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap.min.css') }}">
</head>
<body>
    <header class="row">
        <!-- <nav class="nav">
            <a class="nav-link active" aria-current="page" href="#">Active</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link disabled">Disabled</a>
        </nav> -->
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