<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca Municipal - Acceso</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&family=playfair-display:400,700" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

    <style>
        * { font-family: 'Inter', sans-serif; }
        .playfair { font-family: 'Playfair Display', serif; }
        .form-input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.05);
            outline: none;
        }
        .social-button:hover {
            background-color: #f9fafb;
            border-color: #d1d5db;
        }
    </style>
</head>
<body class="bg-gray-50">
   
    @yield('content')

    @include('partials.auth.footer')

</body>
</html>