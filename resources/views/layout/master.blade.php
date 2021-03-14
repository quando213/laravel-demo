<!doctype html>
<html lang="en">
<head>
@include('layout.SEO')
@include('layout.style')

<!-- Document Title
    ============================================= -->
    <title>@yield('title')</title>
</head>

<body class="stretched">

<div id="wrapper" class="clearfix">
    @include('layout.header')
    @yield('slider')
    @yield('page_title')
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                @yield('content')
            </div>
        </div>
    </section>
    @include('layout.footer')
</div>

<div id="gotoTop" class="icon-angle-up"></div>

@include('layout.script')
</body>

</html>
