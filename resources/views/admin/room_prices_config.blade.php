@extends('admin.layout.app')
@section('title','3 - Конфигурация цен')
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
            <a  href="{{ url ('/admin/welcome')}}" class="relative" >
                <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200 ">         
                        Конфигурация цен
                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >3</div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" > </div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-90 bg-[url('../../public/switch.png')]" ></div>
                </header>
            </a>
            <div class="px-20 container relative mx-auto text-lg">
                    <div class="absolute h-full bg-purple-400 font-black text-2xl z-20 w-1 top-0 left-[57px]" ></div>
                    <div class="flex  flex-col container mx-auto items-start">
                        <h2 class=" pt-5  pb-2">Выберете зал для конфигурации:</h2>
                        <ul class="flex flex-row">
                            @foreach ($rooms as $room)
                                <li class="flex border flex-wrap border-stone-300 items-start gap-1 rounded-md py-3 px-6 bg-white text-base hover:bg-gray-300 shadow-lg">
                                    <a href="{{route('editSeatsPrices',  $room->id)}}" class="uppercase font-bold">Зал {{ $room->id}}</a>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    <div class="flex  flex-col container mx-auto items-start ">  
                        <h2 class="pt-5 pb-2">Установите цены для типов кресел:</h2>
                        <form  method="post" action="{{route('updateSeatsPrices', $currentRoom)}}" class="flex  flex-col items-center gap-1 py-2 " id="room_prices_config" >
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
                                <div class="mx-auto p-6">           
                                    <button type="reset"for="updateSeatsPrices" class="uppercase  rounded-md mr-4 px-8  py-3 text-slate-400 font-bold text-sm  bg-white  shadow-lg hover:bg-pink-100  transition-all ease-in  delay-300  duration-200">
                                    отмена   
                                    </button>
                                    <button type="submit" for="updateSeatsPrices" class="uppercase  rounded-md px-8  py-3 text-white font-bold text-sm  bg-emerald-700 shadow-lg hover:bg-emerald-500  transition-all ease-in  delay-300  duration-200">
                                    далее   
                                    </button> 
                                 </div>
                        </form> 
                    </div>
                           
            </div>  
        </section>
        
        <section class="container mx-auto ">
            <a  href="{{route('sessionsList')}}" class="relative" >
                <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200 "> Сетка сеансов
                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " > 4</div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" ></div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-90 bg-[url('../../public/switch.png')]" ></div>
                </header>
            </a>
        </section>
        <section class="container mx-auto ">
            <a  href="{{url("/user/sales_start")}}" class="relative" >
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
