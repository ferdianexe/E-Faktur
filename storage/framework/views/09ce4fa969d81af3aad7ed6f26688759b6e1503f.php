<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <title>E-Faktur Panca Lima</title>
</head>
<body>
<style>

</style>
<div id='cssmenu'>
<ul>
   <li class="<?php echo e(Request::is('/') ? 'active':''); ?>"><a href="<?php echo e(url('/')); ?>">Home</a></li>
   <li class="<?php echo e(Request::is('data/*') || Request::is('data') ? 'active':''); ?>"><a href="<?php echo e(url('/data')); ?>">Master</a></li>
   <li class="<?php echo e(Request::is('invoices/*') || Request::is('invoices') ? 'active':''); ?>"><a href="<?php echo e(url('/invoices')); ?>">Invoices</a></li>
   <li><a href="<?php echo e(url('/hutang')); ?>">Hutang</a></li>
   <li style="position:absolute;right:0;"><a href="<?php echo e(url('/logout')); ?>">Logout</a></li>   
</ul>
</div>

</body>
<main>
    <?php echo $__env->yieldContent('content'); ?>
</main>
<html>
