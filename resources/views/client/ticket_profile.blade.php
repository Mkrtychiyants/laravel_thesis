@extends('client.layout.app')
@section('title','Главная')
@section('content')
@include('client.partials.header')
<main class="flex  flex-col gap-[11.75px] flex-wrap container mx-auto  text-md text-black ">
    <header class="uppercase relative text-xl py-6 px-4 bg-orange-50/90   border-dotted">
        <div class="font-bold absolute left-[0px] top-[-4px] w-full h-1  bg-[url('../../public/border-top.png')]  bg-repeat-x  "></div>                 
        <div class="font-bold text-orange-400 ">вы выбрали билеты:</div>
        <div class="font-bold w-full h-2 absolute left-[0px] bottom-[-8px] bg-[url('../../public/border-bottom.png')] bg-repeat-x  "></div>
        <div class="font-bold w-full h-2 absolute left-[0px] bottom-[-14px]  bg-[url('../../public/border-top.png')]  bg-repeat-x "></div>   
    </header> 
    
    <div class="container mx-auto border border-zinc-900 bg-orange-50/90 ">
        <section class=" text-sm py-2 px-4 ">           
            <div class="font-bold "><span class="font-normal ">На фильм: </span>{{$session->movie->title}}</div>
            <div class="font-bold "><span class="font-normal ">Места:
                    @foreach ($selectedSeats as $seat)
                        <span class="font-bold last:pb-0">{{$seat}}</span>
                        <span class="font-bold last:hidden">,</span>
                    @endforeach 
            </div>  
            <div class="font-bold "><span class="font-normal ">В зале: </span>{{$session->room_id}}</div>
            <div class="font-bold "><span class="font-normal ">Начало сеанса: </span>{{\Carbon\Carbon::parse($session->start_time)->format('H:i')}}</div>
            <div class="font-bold "><span class="font-normal ">Стоимость : </span>{{$total_price}}</div>
        </section>  
        <section class="flex flex-two justify-center py-2 ">           
            <a  href="{{route('client_ticket_qr', $session)}}" class="uppercase my-1 mx-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">Получить код бронирования</a>
        </section>
        <section class="text-xs py-6 px-4 relative">
            <span>После оплаты билет будет доступен в этом окне, а также придёт вам на почту. Покажите QR-код нашему контроллёру у входа в зал. Приятного просмотра!</span>
            <div class="font-bold w-full h-2 absolute left-[0px] bottom-[-8px] bg-[url('../../public/border-bottom.png')] bg-repeat-x  "></div>
        </section>
    </div>      
</main>
@include('partials.footer')
@endsection
