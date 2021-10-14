<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link
    href="{{ asset('https://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css')}}"
    rel="stylesheet">
  <link href="{{ asset('https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('../../css/vendor/vendor.min.css')}}">
  <link rel="stylesheet" href="{{ asset('../../plugins/plugins.min.css')}}">
  <link rel="stylesheet" href="{{ asset('../../css/style.min.css')}}">
  <title>Document</title>
</head>

<body>
  <div class="main-wrap">
    @include('layouts.header')
    @yield('content')
    <h3>This is the body, other components will override this parts</h3>
    @include('layouts.footer')
  </div>
</body>

</html>