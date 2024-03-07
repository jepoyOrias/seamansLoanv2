<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <title>Seaman Loan Express</title> --}}

        {{-- <title inertia>{{ config('app.name', 'Seaman Loan Express') }}</title> --}}

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
      
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        {{-- @inertiaHead --}}
    </head>
    <body class="font-sans antialiased dark:bg-gray-900">
        @inertia
        <div class="fixed bottom-0 right-0 mb-4 mr-4">
           
          </div>
          
    </body>
</html>
