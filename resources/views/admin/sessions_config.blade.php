@extends('admin.layout.app')
@section('title','4 - Сетка сеансов')
@section('content')
@include('admin.partials.header')
<main class="container mx-auto bg-gray-300 w-9/12">
        <section class="container mx-auto ">
            <a  href="{{route('roomsList')}}" class="relative" >
                <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200 ">Управление залами
                        <div class="absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" > </div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >1</div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" > </div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px]  -rotate-90 bg-[url('../../public/switch.png')]" > </div>
                </header>
            </a>
        </section>
        <section class="container mx-auto ">
            <a  href="{{route('showRoom',1)}}" class="relative" >
                <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200 "> Конфигурация залов
                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >2</div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" ></div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-90 bg-[url('../../public/switch.png')]" ></div>
                </header>
            </a>
        </section>
        <section class="container mx-auto ">
            <a  href="{{ route('editSeatsPrices',1)}}" class="relative" >
                <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200 ">         
                        Конфигурация цен
                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >3</div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" > </div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-90 bg-[url('../../public/switch.png')]" ></div>
                </header>
            </a>
        </section>
        <section class="container mx-auto ">
            <a  href="{{url ('/admin/welcome')}}" class="relative" >
                <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200 "> Сетка сеансов
                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " > 4</div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" ></div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-90 bg-[url('../../public/switch.png')]" ></div>
                </header>
            </a>
            <div class="px-20 container relative mx-auto">
                <div class="flex flex-col items-center  gap-6 overflow-hidden rounded-lg  p-6">        
                    <div class="container w-full gap-2 items-center">
                        <div class="container w-full ">
                            <form  method="post" action="{{route('createMovie')}}"  >
                                    @csrf
                                <button type="submit" class="uppercase  rounded-md px-8 mt-6 mb-2 py-3 text-white font-bold text-sm  bg-emerald-700 shadow-lg hover:bg-emerald-500 transition-all ease-in  delay-300  duration-200">Добавить фильм </button>
                            </form>
                        </div>
                        <div class="flex flex-row items-start  gap-2 rounded-lg">      
                            @foreach ($movies as $movie)
                                    <a href="{{route('createSeansForMovie', $movie->id)}}" class="bg-amber-200 flex flex-row justify-start items-center gap-2 w-48 h-14 rounded-md border-2" >
                                        <div class="bg-gray-50 text-black/50 size-14  bg-no-repeat bg-left-bottom bg-[url('../../public/poster.jpeg')] bg-cover"></div>
                                        <div class="flex flex-col items-start gap-1">
                                            <div class="font-bold">{{ $movie->title }}</div>
                                            <div class="text-slate-400">{{ $movie->duration }} минут</div>
                                        </div>
                                    </a>  
                            @endforeach
                        </div>
                    </div>
                    <div class="container w-full gap-2 px-3 items-center">
                            @foreach ($rooms as $room)
                                <div class="rounded-lg px-4 mb-7">
                                        <div class="font-bold uppercase" >Зал {{ $room->id }}</div>  
                                        <div class="flex flex-row items-center flex-wrap gap-1 rounded-sm  border border-zinc-900 relative w-full">    
                                                @for ($i = 8; $i <= 24; $i+=2)
                                                    <div class="min-w-[10%] min-w-24">               
                                                        <span class="block -bottom-5 left-{{$i}} absolute">{{$i}}:00</span>
                                                        @foreach ($seanses as $seans)
                                                            @if (\Carbon\Carbon::parse($seans->session_datetime)->hour >= $i)
                                                                @if(\Carbon\Carbon::parse($seans->session_datetime)->hour <= $i+1)
                                                                    @if ($seans->room_id === $room->id)
                                                                        @foreach ($movies as $movie)
                                                                            @if ($seans->movie_id === $movie->id)
                                                                                    <div class=" flex items-center h-7 my-1 py-auto text-[9px] border border-zinc-900 bg-lime-500">
                                                                                    {{$movie->title}}
                                                                                    </div>    
                                                                            @endif
                                                                        @endforeach
                                                                    @endif   
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>  
                                                @endfor
                                        </div>
                                </div>
                            @endforeach
                    </div>         
                </div> 
                <div class="flex flex-two container mx-auto justify-center p-6">           
                                <a  href="{{ url ('/admin/welcome')}}" class="uppercase  rounded-md mr-4 px-8  py-3 text-slate-400 font-bold text-sm  bg-white  shadow-lg hover:bg-pink-100 transition-all ease-in  delay-300  duration-200">отмена</a>    
                                <a  href="{{ url('/admin/sales_start')}}" class="uppercase  rounded-md px-8  py-3 text-white font-bold text-sm  bg-emerald-700 shadow-lg hover:bg-emerald-500 transition-all ease-in  delay-300  duration-200">сохранить</a>
                </div>
                <div class="absolute h-full bg-purple-400 font-black text-2xl z-20 w-1 top-0 left-[57px]" ></div>
            </div>
        </section>
        <section class="container mx-auto ">
            <a  href="{{url("/admin/sales_start")}}" class="relative" >
                <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200 ">открыть продажи<div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" > </div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >5 </div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-1px] left-[57px]" ></div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-90 bg-[url('../../public/switch.png')]" ></div>
                </header>
            </a>
         
        </section>
</main>
@include('partials.footer')
@endsection
