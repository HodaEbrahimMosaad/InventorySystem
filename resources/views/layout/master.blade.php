<!doctype html>
<html lang="en">
    @include('layout.header')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    @include('layout.nav')
    @include('layout.aside')

    @yield('content')

    @include('layout.footer')
</div>
</body>
</html>