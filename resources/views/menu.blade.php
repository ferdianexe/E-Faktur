<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <title>E-Faktur Panca Lima</title>
</head>
<body>
<style>

</style>
<div id='cssmenu'>
<ul>
   <li class="{{Request::is('/') ? 'active':''}}"><a href="{{ url('/') }}">Home</a></li>
   <li class="{{Request::is('data/*') || Request::is('data') ? 'active':''}}"><a href="{{ url('/data') }}">Master</a></li>
   <li class="{{Request::is('invoices/*') || Request::is('invoices') ? 'active':''}}"><a href="{{ url('/invoices') }}">Invoices</a></li>
   <li><a href="{{ url('/hutang') }}">Hutang</a></li>
   <li style="position:absolute;right:0;"><a href="{{ url('/logout') }}">Logout</a></li>   
</ul>
</div>

</body>
<main>
    @yield('content')
</main>
<html>
