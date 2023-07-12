<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head class="relative">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- CSS de Font Awesome -->
        <link rel="stylesheet" href="{{ asset('css/FontAwesome.css') }}">



        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script>
            // Attendre que le document soit prêt
            document.addEventListener("DOMContentLoaded", function() {
                // Récupérer l'élément avec la classe .success
                var successElement = document.querySelector('.success');
                var errorElement = document.querySelector('.error');

                // Vérifier si l'élément existe
                if (successElement) {
                    // Définir un délai de 5 secondes avant de modifier l'opacité
                    setTimeout(function() {
                        successElement.style.opacity = 0;
                    }, 2000); // 5000 millisecondes = 5 secondes

                    // Définir un délai supplémentaire de 7 secondes avant d'ajouter display: none
                    setTimeout(function() {
                        successElement.style.display = 'none';
                    }, 4000); // 7000 millisecondes = 7 secondes
                }
                if (errorElement) {
                    // Définir un délai de 5 secondes avant de modifier l'opacité
                    setTimeout(function() {
                        successElement.style.opacity = 0;
                    }, 5000); // 5000 millisecondes = 5 secondes

                    // Définir un délai supplémentaire de 7 secondes avant d'ajouter display: none
                    setTimeout(function() {
                        successElement.style.display = 'none';
                    }, 7000); // 7000 millisecondes = 7 secondes
                }
            });
        </script>


    </body>
</html>
