@extends('layout.app')
@section('title','ИдёмВКино')
@section('content')
@include('partials.header')
<main class="grid grid-cols-1 gap-0 auto-rows-max  justify-start lg:grid-cols-1">
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
            <a  href="{{route('config_room', 1)}}" class="flex w-full flex-col relative items-start" >
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
            <a  href="{{url("/rooms")}}" class="flex w-full flex-col relative items-start" >
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
        </section>
        <section class="flex  flex-col relative container mx-auto items-start bg-white">
            <a  href="{{url("/rooms")}}" class="flex w-full flex-col relative items-start" >
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
