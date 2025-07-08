@include('user.layouts.head')

<!-- Navbar -->
    @include('user.layouts.navbar')

    <!-- Hero Section -->
    @include('user.layouts.hero')

    <!-- Featured Fruits -->
    @yield('content')

    @include('user.layouts.footer')
