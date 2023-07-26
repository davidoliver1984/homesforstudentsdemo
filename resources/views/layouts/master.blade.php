<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homes for Students</title>
    @include('partials.styles')
</head>
<body class="antialiased">

@include('partials.header')

<div class="container mx-auto bg-white mt-56 md:mt-32 pt-16 h-screen">
    @yield('content')
</div>

@include('partials.footer')
@include('partials.scripts')

</body>
</html>
