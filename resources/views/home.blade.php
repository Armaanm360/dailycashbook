<!DOCTYPE html>
<html lang="en">

@include('layouts.admin.headerlink')

<body class="layout-1" data-luno="theme-blue">
    <!-- start: sidebar -->

    @if (Auth::user()->id == 12)
        @include('layouts.admin.sidebar')
    @endif

    <!-- start: body area -->
    <div class="wrapper">
        <!-- start: page header -->
        @include('layouts.admin.header')
        <!-- start: page toolbar -->
        @yield('content')
        <!-- start: page footer -->
        @include('layouts.admin.footer')
        <!-- Jquery Page Js -->
        @include('layouts.admin.footerlink')
</body>

</html>
