@extends('admin.layout.app')
@section('title','3 - Конфигурация цен')
@section('content')
@include('partials.header')
<main class="grid grid-cols-1 gap-0 auto-rows-max  justify-start text-md text-black ">
        <section class="flex  flex-col relative container mx-auto items-start ">
            <a  href="{{route('rooms_list')}}" class="flex w-full flex-col relative items-start" >
                <header class="w-full flex content-center   flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">Управление залами
                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" > </div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >1</div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" > </div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-90 bg-[url('../../public/switch.png')]" > </div>
                </header>
            </a>
        </section>
        <section class="flex  flex-col relative container mx-auto items-start bg-white">
            <a  href="{{route('show_room',1)}}" class="flex w-full flex-col relative items-start" >
                <header class="w-full flex content-center   flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter"> Конфигурация залов
                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >2</div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" ></div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-90 bg-[url('../../public/switch.png')]" ></div>
                </header>
            </a>
        </section>
        <section class="flex  flex-col container mx-auto items-start bg-white">
            <a  href="{{url ('/')}}" class="flex  w-full flex-col relative items-start " >
                <header class="w-full flex content-center   flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">         
                        Конфигурация цен
                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >3</div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" > </div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] bg-[url('../../public/switch.png')]" ></div>
                </header>
            </a>
            <div class="px-20 md:container relative md:mx-auto">
                    <div class="absolute h-full bg-purple-400 font-black text-2xl z-20 w-1 top-0 left-[57px]" ></div>
                    <div class="flex  flex-col container mx-auto items-start">
                        <h2 class=" py-2 ">Выберете зал для конфигурации:</h2>
                        <ul class="flex flex-row">
                            @foreach ($rooms as $room)
                                <li class="flex border flex-wrap border-stone-300 items-start gap-1 rounded-sm py-2 px-3 bg-white text-xs">
                                    <a href="{{route('edit_seats_prices',  $room->id)}}" class="uppercase font-bold">Зал {{ $room->id}}</a>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    <div class="flex  flex-col container mx-auto items-start ">  
                        <h2 class="py-2 ">Установите цены для типов кресел:</h2>
                        <form  method="post" action="{{route('update_seat_sprices', $currentRoom)}}" class="flex  flex-col items-center gap-1 py-2 " id="room_prices_config" >
                        @csrf
                        @method('PUT')
                            <div class="w-full">
                                <label for="regular_seat_price" class="block text-xs text-slate-400">Цена, руб</label>
                                <input name="regular_seat_price" id="regular_seat_price" type="number-to-text" value="100" class="w-20 inline-block border-2 border-stone-300 px-2 py-1 my-1 mr-1" ><span class="py-1" >за</span>
                                <span class="inline-block size-6 bg-slate-300 border border-slate-600 rounded-md align-middle"></span><span class="inline-block lowercase px-2"> обычные кресла</span>
                            </div> 
                            <div class="w-full">
                                <label for="vip_seat_price" class="block text-xs text-slate-400">Цена, руб</label>
                                <input name="vip_seat_price" id="vip_seat_price" type="number-to-text" value="250" class="w-20 inline-block border-2 border-stone-300 px-2 py-1 my-1 mr-1  "><span class="py-1 ">за</span>
                                <span class="inline-block  size-6 bg-emerald-300 border border-slate-600 rounded-md align-middle"></span><span  class="uppercase px-1">VIP</span> <span class="lowercase">кресла</span>
                            </div>
                        
                            <div class="flex  flex-two container mx-auto justify-center ">  
                                    <button type="reset"for="room_prices_config" class="uppercase my-4 mx-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">
                                        отмена   
                                    </button>
                                    <button type="submit" for="room_prices_config" class="uppercase my-4 mx-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">
                                        сохранить   
                                    </button>
                            </div> 
                        </form> 
                    </div> 
            </div>
        </section>
        <section class="flex  flex-col relative container mx-auto items-start bg-white">
            <a  href="{{route('sessions_list')}}" class="flex w-full flex-col relative items-start" >
                <header class="w-full flex content-center   flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter"> Сетка сеансов
                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " > 4</div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" ></div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-90 bg-[url('../../public/switch.png')]" ></div>
                </header>
            </a>
        </section>
        <section class="flex  flex-col relative container mx-auto items-start bg-white">
            <a  href="{{url("/")}}" class="flex w-full flex-col relative items-start" >
                <header class="w-full flex content-center   flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">открыть продажи<div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" > </div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >5 </div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-1px] left-[57px]" ></div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-90 bg-[url('../../public/switch.png')]" ></div>
                </header>
            </a>
        </section>
</main> 
@include('partials.footer')
@endsection
