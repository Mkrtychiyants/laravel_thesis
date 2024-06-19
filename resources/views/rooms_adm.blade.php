@extends('layout.app')
@section('title','1 - Управление залами')
@section('content')
@include('partials.header')
<main class="grid grid-cols-1 gap-0 auto-rows-max  justify-start lg:grid-cols-1">
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
            <div class="px-20">
                <div class="flex flex-col items-start px-6 ">
                    <ul class="flex  flex-col items-start gap-0 ">
                        <h2 class="text-md  text-black py-2 ">Доступные залы:</h2>
                        @foreach ($rooms as $room)
                        <li class="flex items-start gap-2 rounded-lg bg-white">
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
        <a  href="{{route('config_room', 1)}}" class="flex bg-gray  flex-col relative items-start rounded-lg bg-white " >
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
