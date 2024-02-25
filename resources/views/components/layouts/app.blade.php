<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    @vite(["resources/css/app.css", "resources/js/app.js"])
</head>
<body class="bg-fundy-main text-fundy-text">
<div id="app">
    {{ $slot }}
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
