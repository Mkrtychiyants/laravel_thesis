
@extends('layout.app')
@section('title',' Главная 11')
@section('content')
@include('partials.header')
<main class="mt-6 text-black">
        <div class=" flex flex-col items-center   gap-6 overflow-hidden rounded-lg bg-white p-6">        
            <div class="container w-full gap-2 items-center">
                <div class="container w-full p-4">
                    <a href="{{url('/movie/create')}}"  class="rounded bg-green-200 border-solid border-2 border-indigo-600 px-10 py-3 uppercase text-[14px]">
                    Добавить фильм   
                    </a>   
                </div>
                <div class="flex flex-row items-start gap-2 rounded-lg bg-white p-3">      
                    @foreach ($movies as $movie)
                        <div class="flex flex-row  w-1/3 items-start gap-2 rounded-lg bg-white p-3">
                            <a href="{{ url("/sean/create", $movie->id )}}" class="size-20 border border-zinc-900 bg-lime-500 m-3" ><img class="size-20 border border-zinc-900 bg-lime-500 m-3"></img></a>
                            <div class="flex flex-col items-start rounded-lg bg-white p-1">
                                <div>This is movie # {{ $movie->id }}</div>
                                <div>It has  title {{ $movie->title }}</div>
                                <div>It has  duration  {{ $movie->duration }} </div>
                                <div>Its  country {{ $movie->country }} </div>
                                <div>Its  director {{ $movie->director }} </div>
                                <div>Its  created_at {{ $movie->created_at }} </div>
                                <div>It updated_at {{ $movie->updated_at }} </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="container w-full gap-2 py-10 items-center">
                <div class="container w-full p-4">    
                    @foreach ($rooms as $room)
                        <div class="flex flex-col items-start gap-1 rounded-lg bg-white p-4"> 
                                <div class="font-semibold" >This is room {{ $room->id }}</div>  
                                <div class="flex flex-row items-start gap-1 rounded-lg bg-white border border-zinc-900 relative  ">    
                                        @for ($i = 8; $i <= 24; $i+=2)
                                            <div class="w-1/12 ">   
                                                The current value is {{$i+2}}   
                                                <span class="block -bottom-5 left-{{$i}} absolute ">{{$i}}:00</span>
                                                @foreach ($seanses as $seans)
                                                    @if (\Carbon\Carbon::parse($seans->start)->hour >= $i)
                                                        @if(\Carbon\Carbon::parse($seans->start)->hour <= $i+1)
                                                            @if ($seans->room_id === $room->id)
                                                                @foreach ($movies as $movie)
                                                                    @if ($seans->movie_id === $movie->id)
                                                                        <div class="flex flex-col items-start gap-1 rounded-lg bg-white p-4">
                                                                            <p class="size-20 border border-zinc-900 bg-lime-500 m-1">
                                                                            {{$movie->title}}
                                                                            </p>  
                                                                            <div>Its  starts {{\Carbon\Carbon::parse($seans->start)->hour}}:{{\Carbon\Carbon::parse($seans->start)->minute}}</div>
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
        </div> 
</main>

@include('partials.footer')
@endsection

