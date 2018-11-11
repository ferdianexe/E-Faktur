<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>E-Faktur Panca Lima</title>
</head>
<body>
<style>

</style>
<div id='cssmenu'>
<ul>
   <li class="{{Request::is('/') ? 'active':''}}"><a href="{{ url('/') }}">Home</a></li>
   <li class="{{Request::is('data') ? 'active':''}}"><a href="{{ url('/data') }}">Master</a></li>
   <li class="{{Request::is('invoices') ? 'active':''}}"><a href="{{ url('/invoices') }}">Invoices</a></li>
</ul>
</div>

</body>
<main>
    @yield('content')
</main>
<html>
