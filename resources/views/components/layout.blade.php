<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    {{-- <link rel="icon" href="{{ asset('build/assets/ts.png') }}"> --}}
    @vite('resources/css/app.css')
</head>

<body>

    <main>
        {{ $slot }} <!-- This is where the content will be injected -->
    </main>

</body>

</html>
