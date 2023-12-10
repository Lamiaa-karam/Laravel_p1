<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('includes.head')
</head>
<body>
    @include('includes.header')
    @include('includes.topArea')
    @yield('content')
    @include('includes.footer')
    @include('includes.footerJs')
</body>
</html>