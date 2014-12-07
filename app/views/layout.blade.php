<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Music player @yield('title')</title>
  {{ HTML::style('css/styles.css') }}
  @yield('css')
</head>
<body>
    @yield('content') 

    @yield('javascript')
</body>
</html>