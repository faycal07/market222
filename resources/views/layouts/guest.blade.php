<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
<<<<<<< HEAD
        <style>
        @keyframes gradientAnimation {
            0% {
                background-position: top left;
            }
            50% {
                background-position: bottom right;
            }
            100% {
                background-position: top left;
            }
        }

        @keyframes snow {
            0% {
                transform: translateY(0) translateX(0);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) translateX(50px);
                opacity: 0;
            }
        }

        .snowflake {
            position: absolute;
            top: -10px;
            width: 10px;
            height: 10px;
            background: #ffc300;
            border-radius: 50%;
            box-shadow: 0 0 10px #ffc300;
            animation: snow 10s linear infinite;
        }

        .snowflake:nth-child(odd) {
            background: #001d3d;
            box-shadow: 0 0 10px #001d3d;
            animation-duration: 12s;
            animation-delay: -2s;
        }

        .animated-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, #001d3d, #ffc300, #001d3d, #ffc300,#001d3d);

            background-size: 400% 400%;
            animation: gradientAnimation 20s ease-in-out infinite;
            z-index: -1;
        }

        .snow-container {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            pointer-events: none;
        }

        .snowflake:nth-child(1) { left: 10%; animation-delay: 0s; }
        .snowflake:nth-child(2) { left: 20%; animation-delay: 2s; }
        .snowflake:nth-child(3) { left: 30%; animation-delay: 4s; }
        .snowflake:nth-child(4) { left: 40%; animation-delay: 6s; }
        .snowflake:nth-child(5) { left: 50%; animation-delay: 8s; }
        .snowflake:nth-child(6) { left: 60%; animation-delay: 10s; }
        .snowflake:nth-child(7) { left: 70%; animation-delay: 12s; }
        .snowflake:nth-child(😎 { left: 80%; animation-delay: 14s; }
        .snowflake:nth-child(9) { left: 90%; animation-delay: 16s; }
        .snowflake:nth-child(10) { left: 15%; animation-delay: 18s; }
        .snowflake:nth-child(11) { left: 25%; animation-delay: 20s; }
        .snowflake:nth-child(12) { left: 35%; animation-delay: 22s; }
        .snowflake:nth-child(13) { left: 45%; animation-delay: 24s; }
        .snowflake:nth-child(14) { left: 55%; animation-delay: 26s; }
        .snowflake:nth-child(15) { left: 65%; animation-delay: 28s; }
        .snowflake:nth-child(16) { left: 75%; animation-delay: 30s; }
        .snowflake:nth-child(17) { left: 85%; animation-delay: 32s; }
        .snowflake:nth-child(18) { left: 95%; animation-delay: 34s; }
        </style>
=======

>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="animated-background"></div>
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10">
            <div class="snow-container">
                <div class="snowflake"></div>
                <div class="snowflake"></div>
                <div class="snowflake"></div>
                <div class="snowflake"></div>
                <div class="snowflake"></div>
                <div class="snowflake"></div>
                <div class="snowflake"></div>
                <div class="snowflake"></div>
                <div class="snowflake"></div>
                <div class="snowflake"></div>
                <div class="snowflake"></div>
                <div class="snowflake"></div>
                <div class="snowflake"></div>
                <div class="snowflake"></div>
                <div class="snowflake"></div>
                <div class="snowflake"></div>
                <div class="snowflake"></div>
                <div class="snowflake"></div>
            </div>

            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-transparent  overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
