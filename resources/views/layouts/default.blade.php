<!DOCTYPE html>
<html>
<head>
@include('includes.head')
</head>
<body>
    
    <div class="container">
        @include('includes.menu')
        @yield('content')
        @include('includes.footer')
    </div>
</body>
</html>
