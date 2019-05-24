<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
@include('layouts.includes.head')
</head>
<body class="theme-red">
    <!-- Page Loader -->
    @include('layouts.includes.loader')
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    @include('layouts.includes.navbar')
    <!-- #Top Bar -->
    <!-- Sidebar -->
    @include('layouts.includes.sidebar')
    <!-- #END# Sidebar -->

    <section class="content">
    @yield('content')
    </section>

    @include('layouts.includes.footer')

</body>
</html>
