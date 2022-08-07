<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @yield('links')
    <title>@yield('title')</title>
</head>
<body>
    @include('partials.navbar')
        <div class="container">
            @yield('content')
        </div>
</body>
</html>