<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
  </head>
  <body>
    <a href="logout" style="float:right" onclick=" return confirm('Are you sure you want to logout?')">Logout</a>
    @yield('body-content')
  </body>
</html>
