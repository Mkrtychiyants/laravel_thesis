@extends('admin.layout.app')
@section('title','4 - Сетка сеансов')
@section('content')
@include('partials.header')
<main class="grid grid-cols-1 gap-0 auto-rows-max  justify-start text-md text-black ">
         <section class="flex  flex-col relative container mx-auto items-start bg-white">
                <a  href="{{route('rooms_list')}}" class="flex w-full flex-col relative items-start" >
                    <div class="w-full flex content-center   flex-wrap bg-purple-700  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">         
                            Управление залами
                            
                            <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" >
                            
                            </div> 
                            <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >
                            1
                            </div>
                            <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" >
                            
                            </div>
                            <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] bg-[url('../../public/switch.png')]" >
                            
                            </div>
                    </div>
                </a>
            </section>
        <section class="flex  flex-col relative container mx-auto items-start bg-white">
            <a  href="{{route('show_room',1)}}" class="flex w-full flex-col relative items-start" >
                <div class="w-full flex content-center   flex-wrap bg-purple-700  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">         
                        Конфигурация залов
                        
                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" >
                        
                        </div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >
                        2
                        </div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" >
                        
                        </div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" >
                        
                        </div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] bg-[url('../../public/switch.png')]" >
                        
                        </div>
                </div>
            </a>
        </section>
        <section class="flex  flex-col relative container mx-auto items-start bg-white">
            <a  href="{{ route('edit_seats_prices',1)}}" class="flex w-full flex-col relative items-start" >
                <div class="w-full flex content-center   flex-wrap bg-purple-700  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">         
                        Конфигурация цен
                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >3</div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" > </div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] bg-[url('../../public/switch.png')]" ></div>
                </div>
            </a>
        </section>
        <section class="flex  flex-col container mx-auto items-start bg-white">
            <a  href="{{url ('/')}}" class="flex  w-full flex-col relative items-start " >
                <div class="w-full flex content-center   flex-wrap bg-purple-700  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">         
                     Сетка сеансов
                    <div class=" absolute  bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                    <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " > 4 </div>
                    <div class="absolute bg-purple-400 font-black text-2xl  h-8 w-1 top-[-2px] left-[57px]" > </div>
                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                    <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] bg-[url('../../public/switch.png')]" > </div>
                </div>
            </a>
            <div class="px-20 md:container relative md:mx-auto">
                <div class=" flex flex-col items-center  gap-6 overflow-hidden rounded-lg bg-white p-6">        
                    <div class="container w-full gap-2 items-center">
                        <div class="container w-full ">
                            <form  method="post" action="{{route('create_movie')}}"  >
                                    @csrf
                                <button type="submit" class="uppercase my-4 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">Добавить фильм </button>
                            </form>
                        </div>
                        <div class="flex flex-row items-start  gap-2 rounded-lg bg-white">      
                            @foreach ($movies as $movie)
                                    <a href="{{ url("/sean/create", $movie->id )}}" class="bg-amber-200 flex flex-row justify-start items-center gap-2 w-48 h-16 rounded-md border-2" >
                                        <div class="bg-gray-50 text-black/50 size-16  bg-no-repeat bg-left-bottom bg-[url('../../public/poster.jpeg')] bg-cover"></div>
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
                                <div class="rounded-lg bg-white px-4 mb-7">
                                        <div class="font-bold uppercase" >Зал {{ $room->id }}</div>  
                                        <div class="flex flex-row items-start gap-1 rounded-sm bg-white border border-zinc-900 relative w-full h-11 ">    
                                                @for ($i = 8; $i <= 24; $i+=2)
                                                    <div class="min-w-[10%] min-w-24 block">               
                                                        <span class="block -bottom-5 left-{{$i}} absolute ">{{$i}}:00</span>
                                                        @foreach ($seanses as $seans)
                                                            @if (\Carbon\Carbon::parse($seans->session_datetime)->hour >= $i)
                                                                @if(\Carbon\Carbon::parse($seans->session_datetime)->hour <= $i+1)
                                                                    @if ($seans->room_id === $room->id)
                                                                        @foreach ($movies as $movie)
                                                                            @if ($seans->movie_id === $movie->id)
                                                                                <div class="gap-1 rounded-lg bg-white">
                                                                                    <p class=" border border-zinc-900 bg-lime-500 m-1">
                                                                                    {{$movie->title}}
                                                                                    Its  starts {{\Carbon\Carbon::parse($seans->session_datetime)->hour}}:{{\Carbon\Carbon::parse($seans->session_datetime)->minute}}
                                                                                    </p>    
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
                <div class="flex  flex-two container mx-auto justify-center ">  
                                    <button type="reset"    >
                                        отмена   
                                    </button>
                                    <button type="submit"   class="uppercase my-4 mx-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">
                                        сохранить   
                                    </button>
                </div>
                <div class="absolute h-full bg-purple-400 font-black text-2xl z-20 w-1 top-0 left-[57px]" ></div>
            </div>
        </section>
        <section class="flex  flex-col relative container mx-auto items-start bg-white">
            <a  href="{{url("/rooms")}}" class="flex w-full flex-col relative items-start" >
                <div class="w-full flex content-center   flex-wrap bg-purple-700  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">         
                        открыть продажи
                        
                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" >
                        
                        </div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >
                        5
                        </div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-1px] left-[57px]" >
                        
                        </div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] bg-[url('../../public/switch.png')]" >
                        
                        </div>
                </div>
            </a>
        </section>
</main>
@include('partials.footer')
@endsection
