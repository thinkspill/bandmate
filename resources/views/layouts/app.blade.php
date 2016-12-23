<!DOCTYPE html>
<html lang="en">
@include('layouts.bandmate.head')
<body>
@include('layouts.bandmate.navbar')
<div class="container push-right">
    <div class="row">
        @yield('content')
    </div>
</div>
<br>
@include('layouts.bandmate.footer')
@include('layouts.bandmate.footer-js')
</body>
</html>