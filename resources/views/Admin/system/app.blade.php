@include('Admin.layout.header')
@include('Admin.layout.nav')
@include('Admin.layout.sidebar')


<div class="content-wrapper">
    <div class="container-fluid">       
        @yield('system')
    </div>
</div>


@include('Admin.layout.footer')
