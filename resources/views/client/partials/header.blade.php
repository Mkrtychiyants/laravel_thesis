<header class="flex items-center justify-end gap-2 py-5 ml-32">
    <div class="flex flex-col text-white items-center ">
        <div class="text-3xl uppercase tracking-tighter">
             <a href="{{ route("clientSessionsList",  \Carbon\Carbon::now('Europe/Moscow')->locale('ru_RU')->format('Y-m-d'))}}" 
              >
              <b>идём</b><span class="font-thin">в</span><b>кино</b>
             </a>
            
        </div>
    </div>
    <nav class="-mx-3 flex flex-1 font-semibold justify-end mr-16">
                                @guest("web")
                                    <!-- <a
                                        href="{{ route("adminLogin")}}"
                                        class="rounded-md py-2 text-base lowercase  text-white  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                    авторизоваться как админ
                                    </a> -->
                                    <a
                                        href="{{ route('clientRegister') }}"
                                        class="rounded-md ml-4 py-2 text-base lowercase  text-white  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Зарегистрироваться
                                    </a>
                                @endguest
                                @auth("web")
                                    <a
                                        href="{{ route('clientLogout') }}"
                                        class="rounded-md px-3 py-2 text-base lowercase text-white  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        выйти
                                    </a>

                                @endauth
    </nav>  
</header>   