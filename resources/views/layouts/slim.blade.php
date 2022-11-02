<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/js/app.js'])
</head>
<body>
<header class="p-3 mb-5 border-bottom bg-light"></header>

<div class="container">
    {{ $slot }}

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top d-print-none">
        <small class="text-muted">© {{ date('Y') }}</small>
    </footer>
</div>

</body>
</html>
