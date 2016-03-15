<!DOCTYPE html>
<html class="grad">
<head>
<meta charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="icon" type="image/x-ong" href="{{ asset('leadmaster/img/favicon.png') }}" />
{!! HTML::style('leadmaster/css/base.css') !!}
{!! HTML::script('leadmaster/js/jquery.min.js') !!}
<title>@if(isset($modtitle)) {{$modtitle}} | @endif {{ Config::get('custom.apptitle') }}</title>
</head>
<body>
    @yield('content')
</body>
</html>