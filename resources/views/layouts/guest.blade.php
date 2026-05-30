<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- TAILWIND --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        primary: '#79AE6F',
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans antialiased">

    {{-- BACKGROUND --}}
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-[#9FCB98] to-green-700 px-4">

        {{-- CARD --}}
        <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl p-8">

            {{-- LOGO / TITLE --}}
            <div class="text-center mb-8">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}"
                        class="w-24 h-24 object-contain mx-auto mb-4">
                </a>

                <h1 class="text-3xl font-bold text-gray-800">
                    Kebun Anggur
                </h1>

                <p class="text-gray-500 mt-2">
                    Selamat datang kembali 🍇
                </p>
            </div>

            {{-- FORM --}}
            {{ $slot }}

        </div>

    </div>

</body>
</html>