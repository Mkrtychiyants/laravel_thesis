<header class="flex items-center justify-end gap-2 py-5 ml-40">
                        <div class="flex flex-col text-white items-center ">
                            <div class="text-3xl uppercase tracking-tighter">
                                <b>идём</b><span class="font-thin">в</span><b>кино</b>
                            </div>
                            <div class="text-xs uppercase tracking-widest">
                                администраторская
                            </div>
                        </div>
                        <nav class="-mx-3 flex flex-1 font-semibold justify-end mr-16">
                                @guest("admin")
                                   <a
                                        href="{{ route('clientLogin') }}"
                                        class="rounded-md py-2 text-base lowercase  text-white  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Залогиниться как обычный пользователь
                                    </a>
                                    <a
                                        href="{{ route('adminRegister') }}"
                                        class="rounded-md py-2 ml-4 text-base  lowercase  text-white  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Зарегистрироваться
                                    </a>
                                   
                                @endguest
                                @auth("admin")
                                    <a
                                        href="{{ route('adminLogout') }}"
                                        class="rounded-md px-3 py-2 text-base  lowercase  text-white  ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Разлогиниться
                                    </a>

                                @endauth
                        </nav>    
</header>       