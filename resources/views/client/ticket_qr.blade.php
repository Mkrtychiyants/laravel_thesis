@extends('client.layout.app')
@section('title','Главная')
@section('content')
@include('client.partials.header')
<main class="flex  flex-col gap-[11.75px] flex-wrap container mx-auto  text-md text-black ">
    <header class="uppercase relative text-xl py-6 px-4 bg-orange-50/90   border-dotted">
        <div class="font-bold absolute left-[0px] top-[-4px] w-full h-1  bg-[url('../../public/border-top.png')]  bg-repeat-x  "></div>                 
        <div class="font-bold text-orange-400 ">электронный билет</div>
        <div class="font-bold w-full h-2 absolute left-[0px] bottom-[-8px] bg-[url('../../public/border-bottom.png')] bg-repeat-x  "></div>
        <div class="font-bold w-full h-2 absolute left-[0px] bottom-[-14px]  bg-[url('../../public/border-top.png')]  bg-repeat-x "></div>   
    </header> 
    
    <div class="container mx-auto  bg-orange-50/90 ">
        <section class=" text-sm py-2 px-4 ">           
            <div class="font-bold "><span class="font-normal ">На фильм: </span>{{$seans->movie->title}}</div>
            {{--  <div class="font-bold "><span class="font-normal ">Места:
                    @foreach ($seans->tickets as $seat)
                        <span class="font-bold last:pb-0">{{$seat}}</span>
                        <span class="font-bold last:hidden">,</span>
                    @endforeach
            </div> --}}
            <div class="font-bold "><span class="font-normal ">В зале: </span>{{$seans->room_id}}</div>
            <div class="font-bold "><span class="font-normal ">Начало сеанса: </span>{{\Carbon\Carbon::parse($seans->start_time)->format('H:i')}}</div>

        </section>  
        <section class="flex flex-two justify-center py-2 ">           
            <div  class="    m-2 rounded-md p-3 bg-white"> <span> {{$image}} </span></div>
        </section>
        <section class="text-xs py-6 px-4 relative">
            <span>Покажите QR-код нашему контролёру для подтверждения бронирования</span><br>
            <span>Приятного просмотра!</span>
            <div class="font-bold w-full h-2 absolute left-[0px] bottom-[-8px] bg-[url('../../public/border-bottom.png')] bg-repeat-x  "></div>
        </section>
 
    </div>      
</main>
@include('partials.footer')
@endsection
