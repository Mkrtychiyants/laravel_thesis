@extends('layout.app')
@section('title','1 - Управление залами')
@section('content')
@include('partials.header')
<main class="grid grid-cols-1 gap-0 auto-rows-max  justify-start text-md text-black ">
        <section class="flex  flex-col relative container mx-auto items-start bg-white">
            <a  href="{{url ('/')}}" class="flex  w-full flex-col relative items-start " >
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
            <div class="px-20  md:container md:mx-auto">
                <div class="flex flex-col items-start px-6 ">
                    <ul class="flex  flex-col items-start gap-0 ">
                        <h2 class=" py-2 ">Доступные залы:</h2>
                        @foreach ($rooms as $room)
                        <li class="flex items-start gap-2 rounded-lg bg-white ">
                            <div class="text-sm font-bold uppercase text-black ">- Зал  {{ $room->id }}</div>
                            <a  href="{{ route("delete_room", $room->id ) }}">
                                <button class="rounded-lg bg-[length:25px_15px] bg-[bottom_3.5px_left_3.5px] bg-no-repeat bg-white border-solid border-2 border-indigo-600 size-6  bg-[url('../../public/trash-sprite.png')]">
                                </button>
                            </a> 
                        </li>
                        @endforeach
                    </ul>
                </div>
                <form  method="post" action="{{route('create_room')}}"  >
                        @csrf
                    <button type="submit" class="uppercase my-4 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">Создать зал</button>
                </form>
                <div class="absolute h-full bg-purple-400 font-black text-2xl z-20 w-1 top-[92px] left-[57px]" ></div>
            </div> 
        </section>
        <section class="flex  flex-col relative container mx-auto items-start bg-white">
            <a  href="{{url ('/')}}" class="flex  w-full flex-col relative items-start " >
                <div class="w-full flex content-center   flex-wrap bg-purple-700  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">         
                     Конфигурация залов
                    <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                    <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " > 2 </div>
                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" > </div>
                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                    <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] bg-[url('../../public/switch.png')]" > </div>
                </div>
            </a>
                        <div class="px-20 md:container md:mx-auto">
                                <div class="flex  flex-col relative container mx-auto items-start">
                                    <h2 class=" py-2 ">Выберете зал для конфигурации:</h2>
                                    <ul class="flex flex-row">
                                        @foreach ($rooms as $room)
                                            <li class="flex border flex-wrap border-stone-300 items-start gap-1 rounded-sm py-2 px-3 bg-white text-xs">
                                                <a href="{{route('config_room',  $room->id)}}" class="uppercase font-bold">Зал {{ $room->id }}</a>
                                            </li>
                                        @endforeach
                                        </ul>
                        </div>
                        <div class="flex  flex-col relative container mx-auto items-start ">  
                            <h2 class="py-2 ">Укажите количество рядов и максимальное количество кресел в ряду:</h2>
                            <form  method="post" action="{{route('create_room')}}" class="flex  flex-row items-center gap-3" id="config_room_form" >
                            @csrf
                            <div class="flex  flex-col w-20">
                                <label for="room_row" class="text-xs text-slate-400">Рядов, шт</label>
                                <input name="room_row" id="room_row" type="number" value="{{ $room->rows }}" class=" border-2 border-stone-300" >
                            </div>
                            <p>X</p>
                            <div class="flex  flex-col w-20">
                                <label for="room_columns" class="text-xs text-slate-400">Мест, шт:</label>
                                <input name="room_columns" id="room_columns" type="number" value="{{ $room-> columns }}" class="border-2 border-stone-300">
                            </div>
                            </form>

                        </div> 
                        <div class="flex  flex-col relative container mx-auto items-start py-2   ">
                             <h2 class="py-2 ">Теперь вы можете указать типы кресел на схеме зала:</h2>
                                <div class="flex items-center gap-2 text-xs text-slate-400">
                                    <span class="inline-block  size-6 bg-slate-300 border border-slate-600 rounded-md" ></span><span class="lowercase">- Обычные кресла</span>
                                    <span class="inline-block  size-6 bg-emerald-300 border border-slate-600 rounded-md" ></span><span  class="uppercase"> - Vip</span> <span class="lowercase">кресла</span>
                                    <span class="inline-block  size-6 bg-neutral-100 border border-slate-600 rounded-md" ></span><span class="lowercase"> - Заблокированные (нет кресла)</span>
                                </div>
                            <p class="text-xs text-slate-400">Чтобы изменить вид кресла, кликните по нему левой кнопкой мыши:</p>
                        </div> 
                        <div class="md:container md:mx-auto border border-zinc-900 p-6">
                            <div class="flex justify-center ">
                                <div class="flex flex-col justify-center ">
                                    <div class="flex justify-center py-2 tracking-[2.5rem] indent-[8%] text-right text-xl uppercase ">Экран</div>
                                    <div class="inline-grid grid-cols-{{ $room->columns }} gap-4 justify-items-center">
                                        @foreach ($seats as $seat)
                                        <a href="" class="flex-initial size-8 rounded bg-slate-400  border border-zinc-900"><span ></span></a>
                                        @endforeach
                                    </div>
                                </div>        
                            </div>
                        </div>
                        
                        <div class="flex flex-two justify-center ">
                                <a  href="{{ route("delete_room", $room->id ) }}">
                                <button for="config_room_form" class="rounded bg-white border-solid border-2 border-indigo-600 px-10 py-3 uppercase text-[14px]">
                                отмена   
                                </button>
                                </a> 
                                <a  href="{{ url("/room/create") }}">
                                    <button for="config_room_form" class="rounded bg-green-200 border-solid border-2 border-indigo-600 px-10 py-3 uppercase text-[14px]">
                                    сохранить   
                                    </button>   
                                </a> 
                            </div>
                        </div>
        </section>
        <a  href="{{route('rooms_list')}}" class="flex bg-gray  flex-col relative items-start rounded-lg bg-white " >
            <div class="w-full flex content-center   flex-wrap bg-purple-700  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">         
                     Конфигурация цен
                    
                    <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" >
                    
                    </div> 
                    <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >
                    3
                    </div>
                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" >
                    
                    </div>
                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" >
                    
                    </div>
                    <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] bg-[url('../../public/switch.png')]" >
                    
                    </div>
            </div>
        </a>
        <a  href="{{route('rooms_list')}}" class="flex bg-gray  flex-col relative items-start rounded-lg bg-white " >
            <div class="w-full flex content-center   flex-wrap bg-purple-700  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">         
                    Сетка сеансов
                    
                    <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" >
                    
                    </div> 
                    <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >
                    4
                    </div>
                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" >
                    
                    </div>
                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" >
                    
                    </div>
                    <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] bg-[url('../../public/switch.png')]" >
                    
                    </div>
            </div>
        </a>
        <a  href="{{route('rooms_list')}}" class="flex bg-gray  flex-col relative items-start rounded-lg bg-white " >
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

</main>
@include('partials.footer')
@endsection
