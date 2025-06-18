<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'CoachConnect')</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column min-vh-100">

<main class="container content my-auto">
    @yield('content')
</main>

@include('partials.footer')
</body>
</html>



