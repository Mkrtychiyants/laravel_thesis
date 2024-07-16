@extends('admin.layout.app')
@section('title','ИдёмВКино')
@section('content')
@include('partials.header')
<main class="container mx-auto bg-white">
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
        <section class="flex  flex-col relative container mx-auto items-start bg-white">
            <a  href="{{ route('edit_seats_prices',1)}}" class="flex w-full flex-col relative items-start" >
                <header class="w-full flex content-center   flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">         
                        Конфигурация цен
                        <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >3</div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" > </div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-90 bg-[url('../../public/switch.png')]" ></div>
                </header>
            </a>
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
            <a  href="{{url("/admin")}}" class="flex w-full flex-col relative items-start" >
                <header class="w-full flex content-center   flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">открыть продажи<div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" > </div> 
                        <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >5 </div>
                        <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-1px] left-[57px]" ></div>
                        <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px]  bg-[url('../../public/switch.png')]" ></div>
                </header>
            </a>
            <div class="px-20  md:container relative md:mx-auto">
                <div class="flex flex-col text-black items-center px-6 my-4 ">
                    <p>Всё готово, теперь можно:</p>
                <a  href="{{route('client_sessions_list', \Carbon\Carbon::now('Europe/Moscow'))}}"  class="uppercase my-4 mx-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400" >открыть продажу билетов</a>
                </div>
                
            </div>
        </section>
</main>
@include('partials.footer')
@endsection
