<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('tslogo.png') }}">
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.sidebar')
    @include('components.navbar')

    <main class="sm:ml-64 p-4">
        @yield('content')
    </main>

</body>

</html>
