<div class="main-panel">
    @include('layouts.navbar')
    <div class="container">
        <div class="page-inner">
            @yield('content')
        </div>
    </div>
    @include('layouts.footer')
</div>