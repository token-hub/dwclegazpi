<!DOCTYPE html>
<html>
<head>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155390910-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-155390910-1');
  </script>
  
  <meta name="google-site-verification" content="kebT2CwK9ka3kgAhQmPdegHOxhvvrBzCzYJIY1IhaCs" />
  <meta charset="utf-8" name='viewport' content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="/storage/img/others/dwcl-Logo.ico" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">
  <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
  
 <!--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>     -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> -->
  
  <title> {{  ucfirst($prefix = (Request::segment(1) == '') ? "" : Request::segment(1)." | " ). ' Divine Word College of Legazpi' }}</title>

</head>
<body>
    @include('web.layouts.header')
      <div class='container'>
         @yield('content')
      </div>
    @include('web.layouts.footer')
</body>
</html>

<script src="{{secure_asset('js/carousel.js')}}"></script>
<script src="{{secure_asset('js/app.js')}}"></script>
@stack('scripts')
