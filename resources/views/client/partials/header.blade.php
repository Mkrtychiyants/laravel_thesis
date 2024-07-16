<header class="flex items-center gap-2 py-5">
    <div class="flex flex-col text-white items-center ">
        <div class="text-3xl uppercase tracking-tighter">
            <b>идём</b><span class="font-thin">в</span><b>кино</b>
        </div>
    </div>
    <nav class="-mx-3 flex flex-1 font-semibold justify-end">
                                @guest("web")
                                <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-xs uppercase  text-white  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Залогиниться
                                    </a>
                                   
                                @endguest
                                @auth("web")
                                    <a
                                        href="{{ route('logout') }}"
                                        class="rounded-md px-3 py-2 text-xs uppercase  text-white  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Разлогиниться
                                    </a>

                                @endauth
    </nav>  
</header>   