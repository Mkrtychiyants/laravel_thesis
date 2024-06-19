<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">  
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="font-sans"> 
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50  bg-[url('../../public/background_5.jpg')] bg-contain">
            <div class=" relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white bg-[url('../../public/background_3.jpg')"  >
                <div class="container mx-auto w-full max-w-2xl px-28 lg:max-w-7xl">
                    

                    @yield('content')


                </div>
            </div>
        </div>
    </body>
</html>
