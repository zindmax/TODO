<html>
<head>
    <title>App Name - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
    @include('header')
    <main>
        <div class="d-flex align-items-centre">
            <div class="container d-flex flex-column">
                <div class="mx-auto">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
</body>
<script src="../js/logout.js"></script>
<script src="../js/app.js"></script>
</html>
