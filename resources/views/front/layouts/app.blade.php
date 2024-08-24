<!doctype html>
<html>

<head>
    @include('front.includes.head')
    @yield('style')

</head>

<body>

    @include('front.includes.header')

    @yield('content')

    @include('front.includes.footer') 


    @yield('modal')

    @include('front.includes.foot')

    @yield('js')
  
</body>

</html>
