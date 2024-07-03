@extends('admin.layout.app')
@section('title','2 - Конфигурация залов')
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
            <div class="px-20  md:container relative md:mx-auto">
                <div class="flex flex-col items-start px-6 ">
                    <ul class="flex  flex-col items-start gap-0 ">
                        <h2 class=" py-2" >Доступные залы:</h2>
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
                <div class="absolute h-full bg-purple-400 font-black text-2xl z-20 w-1 top-0 left-[57px]" ></div>
            </div> 
        </section>
        <section class="flex  flex-col container mx-auto items-start bg-white">
            <a  href="{{url ('/')}}" class="flex  w-full flex-col relative items-start " >
                <div class="w-full flex content-center   flex-wrap bg-purple-700  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">         
                     Конфигурация залов
                    <div class=" absolute  bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                    <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " > 2 </div>
                    <div class="absolute bg-purple-400 font-black text-2xl  h-8 w-1 top-[-2px] left-[57px]" > </div>
                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                    <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] bg-[url('../../public/switch.png')]" > </div>
                </div>
            </a>
            <div class="px-20 md:container relative md:mx-auto">
                    <div class="absolute h-full bg-purple-400 font-black text-2xl z-20 w-1 top-0 left-[57px]" ></div>
                    <div class="flex  flex-col container mx-auto items-start">
                        <h2 class=" py-2 ">Выберете зал для конфигурации:</h2>
                        <ul class="flex flex-row">
                            @foreach ($rooms as $room)
                                <li class="flex border flex-wrap border-stone-300 items-start gap-1 rounded-sm py-2 px-3 bg-white text-xs">
                                    <a href="{{route('show_room',  $room->id)}}" class="uppercase font-bold">Зал {{ $room->id }}</a>
                                </li>
                            @endforeach
                            </ul>
                        </div>
                    <div class="flex  flex-col container mx-auto items-start ">  
                        <h2 class="py-2 ">Укажите количество рядов и максимальное количество кресел в ряду:</h2>
                        <form  method="post" action="{{route('update_room', Request::segments()[1])}}" class="flex  flex-row items-center gap-3" id="config_room_form" >
                        @csrf
                        @method('PUT')
                            <div class="flex  flex-col w-20">
                                <label for="room_row" class="text-xs text-slate-400">Рядов, шт</label>
                                <input name="room_row" id="room_row" type="number" value="{{ $currentRoom->rows }}" class="p-1 border-2 border-stone-300" >
                            </div>
                            <p>X</p>
                            <div class="flex  flex-col w-20">
                                <label for="room_columns" class="text-xs text-slate-400">Мест, шт:</label>
                                <input name="room_columns" id="room_columns" type="number" value="{{$currentRoom-> columns }}" class="p-1 border-2 border-stone-300">
                            </div>
                            <button type="reset"for="config_room_form" class="uppercase my-4 mx-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">
                            отмена   
                            </button>
                            
                            <button type="submit" for="config_room_form" class="uppercase my-4 mx-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">
                            сохранить   
                            </button>   
                                
                        </form>

                    </div> 
                    <div class="flex  flex-col container mx-auto items-start py-2   ">
                        <h2 class="py-2 ">Теперь вы можете указать типы кресел на схеме зала:</h2>
                            <div class="flex items-center gap-2 text-xs text-slate-400">
                                <span class="inline-block  size-6 bg-slate-300 border border-slate-600 rounded-md" ></span><span class="lowercase">- Обычные кресла</span>
                                <span class="inline-block  size-6 bg-emerald-300 border border-slate-600 rounded-md" ></span><span  class="uppercase"> - Vip</span> <span class="lowercase">кресла</span>
                                <span class="inline-block  size-6 bg-neutral-100 border border-slate-600 rounded-md" ></span><span class="lowercase"> - Заблокированные (нет кресла)</span>
                            </div>
                        <p class=" py-2 text-xs text-slate-400">Чтобы изменить вид кресла, кликните по нему левой кнопкой мыши:</p>
                    </div> 
                    
                    <div class="md:container mx-auto border border-zinc-900 p-5 ">
                        <div class=" pb-4 tracking-[1.3rem] text-center text-sm uppercase ">Экран</div>     
                            <div class="grid grid-cols-{{$currentRoom->columns}} gap-2 justify-items-center mx-auto w-1/4 ">          
                                @foreach ($seats as $seat)
                                <a href="{{route('update_seat_type', $seat->id)}}"  @class([
                                'flex-initial',
                                'size-5',
                                'rounded',
                                'border',
                                'border-zinc-900',
                                'bg-neutral-100' => $seat->is_blocked && $seat->is_vip,
                                'bg-slate-400'=> !$seat->is_blocked && !$seat->is_vip ,
                                'bg-emerald-300' =>  !$seat->is_blocked && $seat->is_vip,
                                ])><span >{{$seat->id}}</span></a>
                                @endforeach 
                            </div> 
                    </div>        
                    
                        
                    <div class="flex flex-two justify-center py-4 ">           
                        <button type="reset"for="config_room_form" class="uppercase my-4 mx-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">
                        отмена   
                        </button>
                        
                        <button type="submit" >
                        <a  href="{{route('rooms_list')}}" class="uppercase my-4 mx-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">далее</a>
                        </button>   
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
