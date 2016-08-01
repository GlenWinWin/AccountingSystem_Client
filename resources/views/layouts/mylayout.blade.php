<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    @yield('css')
    <title>@yield('title')</title>
  </head>
  <body>
    @yield('nav')
    @yield('body-content')
  </body>
</html>
@yield('javascript')
