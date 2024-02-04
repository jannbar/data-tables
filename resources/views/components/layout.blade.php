@props(['title' => 'Laravel'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>

    <!-- HTMX -->
    <script src="https://unpkg.com/htmx.org@1.9.10"
        integrity="sha384-D1Kt99CQMDuVetoL1lrYwg5t+9QdHe7NLX/SoJYkXDFfX37iInKRy5xLSi8nO7UC" crossorigin="anonymous">
    </script>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    @vite('resources/js/app.js')
</head>

<body class="antialiased text-gray-700">
    <div class="max-w-4xl mx-auto p-8">
        {{ $slot }}
    </div>
</body>

</html>
