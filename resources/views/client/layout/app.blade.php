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
        <script src="https://kit.fontawesome.com/78f0e13aaa.js" crossorigin="anonymous"></script>   
    </head>
    <body> 
        <div class=" font-sans text-black  text-xs text-black/50  bg-[url('../../public/background_6.jpg')] bg-cover ">
                <div class="container mx-auto flex flex-col justify-between ">
                    @yield('content')
                </div>
         </div>

    </body>
</html>
