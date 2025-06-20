<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body>
@if(!Auth::check())
    @include('partials.navbar')
@else
    @include('partials.navbarLogged')
@endif

<main class="main-content">
    <div class="container mx-auto mt-6">
        @yield('content')
    </div>
</main>

@include('partials.footer')
</body>
</html>
