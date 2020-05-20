<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8" name='viewport' content="width=device-width, initial-scale=1.0">
  <meta name="google-site-verification" content="kebT2CwK9ka3kgAhQmPdegHOxhvvrBzCzYJIY1IhaCs" />
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="/storage/img/others/dwcl-Logo.png" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  
  <title> {{  ucfirst($prefix = (Request::segment(1) == '') ? "" : Request::segment(1)." | " ). ' Divine Word College of Legazpi' }}</title>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155390910-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-155390910-1');
  </script>

</head>
<body>
    @include('web.layouts.header')
      <div class='container'>
         @yield('content')
      </div>
    @include('web.layouts.footer')
</body>
</html>

<script src="{{asset('js/carousel.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
