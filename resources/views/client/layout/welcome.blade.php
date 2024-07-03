@extends('client.layout.app')
@section('title','Главная')
@section('content')
@include('client.partials.header')
<main class="flex  flex-col flex-wrap gap-10 container mx-auto   text-md text-black ">
        <section class="flex  flex-row justify-between content-center items-center  gap-1">
                <a  href="{{ route('client_sessions_list', \Carbon\Carbon::now('Europe/Moscow'))}}" class="p-3 bg-amber-200/90 min-w-28 w-1/5 h-16 border-1 border-black rounded-sm" >
                    <p class="">         
                        Сегодня
                    </p>
                    <p class="capitalize  ">         
                      {{\Carbon\Carbon::now('Europe/Moscow')->locale('ru_RU')->isoFormat('dd, D')}}
                    </p>
                </a>
                <a  href="{{route('client_sessions_list', \Carbon\Carbon::now('Europe/Moscow')->addDay(1)) }}" class="p-3 bg-amber-200/90 w-1/5 h-16 border-1 border-black rounded-sm" >
                    <p class="capitalize  ">         
                     {{ \Carbon\Carbon::now('Europe/Moscow')->locale('ru_RU')->addDay(1)->isoFormat('dd, D')}}
                    </p>
                </a>
                <a  href="{{route('client_sessions_list', \Carbon\Carbon::now('Europe/Moscow')->addDay(2)) }}" class="p-3 bg-amber-200/90 min-w-28 w-1/5 h-16 border-1 border-black rounded-sm" >
                    <p class="capitalize  ">         
                     {{ \Carbon\Carbon::now('Europe/Moscow')->locale('ru_RU')->addDay(2)->isoFormat('dd, D')}}
                    </p>
                </a>
                <a  href="{{route('client_sessions_list', \Carbon\Carbon::now('Europe/Moscow')->addDay(3))  }}" class="p-3 bg-amber-200/90 min-w-28 w-1/5 h-16 border-1 border-black rounded-sm" >
                    <p class="capitalize  ">         
                     {{ \Carbon\Carbon::now('Europe/Moscow')->locale('ru_RU')->addDay(3)->isoFormat('dd, D')}}
                    </p>
                </a>
                <a  href="{{route('client_sessions_list', \Carbon\Carbon::now('Europe/Moscow')->addDay(4)) }}" class="p-3 bg-amber-200/90 min-w-28 w-1/5 h-16 border-1 border-black rounded-sm " >

                    <p class="capitalize  ">         
                     {{ \Carbon\Carbon::now('Europe/Moscow')->locale('ru_RU')->addDay(4)->isoFormat('dd, D')}}
                    </p>
                </a>
                <a  href="{{route('client_sessions_list', \Carbon\Carbon::now('Europe/Moscow')->addDay(5)) }}" class="p-3 bg-amber-200/90 min-w-28 w-1/5 h-16 border-1 border-black rounded-sm" >
                    <p class="capitalize  ">         
                     {{ \Carbon\Carbon::now('Europe/Moscow')->locale('ru_RU')->addDay(5)->isoFormat('dd, D')}}
                    </p>
                </a>
                <a  href="{{route('client_sessions_list', \Carbon\Carbon::now('Europe/Moscow')->addDay(6)) }}" class="flex flex-column justify-center items-center p-3 bg-amber-200/90 min-w-28 w-1/5 h-16 " >
                    <p class="  ">         
                    <i class=" fa-solid fa-chevron-right"></i>
                    </p>
                </a>    
        </section>
        @foreach ($movies as $movie)
            <section class="flex flex-col relative container mx-auto items-start bg-amber-200/90">
                <div class="bg-gray-50 text-black/50 w-36 h-52 absolute top-[-10px] left-[20px] bg-no-repeat bg-left-bottom bg-[url('../../public/poster.jpeg')] bg-cover"></div>
                <div class="w-fill ml-48 mt-5">
                    <div class="font-bold capitalize text-base">{{ $movie->title }}</div>
                    <div class=" capitalize text-sm">{{ $movie->description }}</div>
                    <div class="text-slate-400">{{ $movie->duration }} минут, {{ $movie->country }}</div>
                </div>
                <div class="mt-32 md:container  md:mx-auto">
                    <div class=" flex flex-col items-center  gap-6 overflow-hidden  bg-amber-200/90">        
                        <div class="container w-full gap-2 px-3 items-center">
                                @foreach ($rooms as $room)
                                    <div class=" px-4 mb-7">
                                            <div class="font-bold text-base capitalize mb-2" >Зал {{ $room->id }}</div>  
                                            <div class="flex flex-row  justify-start gap-1 h-11 ">                  
                                                        @foreach ($seanses as $seans)
                                                                        @if ($seans->room_id === $room->id)
                                                                                @if ($seans->movie_id === $movie->id)
                                                                                    <div class="gap-1 bg-amber-50 h-10 border border-zinc-900 w-16 text-base text-center pt-[6px] px-1 rounded-sm">
                                                                                        {{\Carbon\Carbon::parse($seans->session_datetime)->format('H:i')}}
                                                                                    </div>
                                                                                @endif 
                                                                        @endif   
                                                            @endforeach
                                            </div>
                                    </div>
                                @endforeach
                        </div>         
                    </div> 
                </div>
            </section>
        @endforeach
</main>
@include('partials.footer')
@endsection
