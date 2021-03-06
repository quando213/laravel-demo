<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{url('css/admin.css')}}">
    @yield('extraCss')
</head>

<body>

@include('admin.layout.sidebar')
<main>
    <div class="container">
        @yield('content')
    </div>
</main>

@yield('modal')

<script src="{{url('js/app.js')}}"></script>
@yield('extraJs')
</body>

</html>
