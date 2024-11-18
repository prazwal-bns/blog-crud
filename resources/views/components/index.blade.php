<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
        <!-- Other meta tags -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        rel="stylesheet"
    />

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <title>Blog Post</title>
</head>
<body class="text-gray-800 bg-gray-100">

    <!-- Navigation Bar -->
    @include('nav-bar')

    <!-- Slot for Page Content -->
    <main class="container pt-2 mx-auto overflow-auto">
        {{ $slot }}
    </main>


</body>
</html>
