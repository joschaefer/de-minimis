<html lang="en" class="auth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/js/app.js'])
</head>
<body class="text-center">
    {{ $slot }}
</body>
</html>
