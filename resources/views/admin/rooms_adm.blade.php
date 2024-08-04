@extends('admin.layout.app')
@section('title','1 - Управление залами')
@section('content')
@include('admin.partials.header')
<main class="container mx-auto bg-gray-300 w-9/12">
    <section class="container mx-auto ">
        <a  href="{{url ('/admin/welcome')}}" class="relative" >
            <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200 ">Управление залами
                    <div class="absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" > </div> 
                    <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >1</div>
                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" > </div>
                    <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px]  -rotate-0 bg-[url('../../public/switch.png')]" > </div>
            </header>
        </a>
        <div class="px-20 relative">
            <div class="flex flex-col items-start px-6 pt-6 ">
                <ul class="flex  flex-col items-start ">
                    <h2 class="text-lg  text-black py-2 ">Доступные залы:</h2>
                    @foreach ($rooms as $room)
                    <li class="flex items-start gap-2 rounded-lg">
                        <div class="text-sm font-bold uppercase text-black ">- Зал  {{ $room->id }}</div>
                        <a  href="{{ route("deleteRoom", $room->id ) }}" >
                            <button class="rounded-lg bg-[length:25px_15px] bg-[bottom_3.5px_left_3.5px] bg-no-repeat bg-white hover:bg-slate-300 border-solid border-2 border-indigo-600 size-6  bg-[url('../../public/trash-sprite.png')]">
                            </button>
                        </a> 
                    </li>
                    @endforeach
                </ul>
            </div>
            <form  method="post" action="{{route('createRoom')}}"  >
                    @csrf
                <button type="submit" class="uppercase my-4 rounded-md px-8  ml-6 mb-10 py-2 text-white font-bold text-sm  bg-emerald-700 shadow-lg hover:bg-emerald-500  transition-all ease-in  delay-300  duration-200">Создать зал</button>
            </form>
            <div class="absolute h-full bg-purple-400 font-black text-2xl z-20 w-1 top-0 left-[57px]" ></div>
        </div> 
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
        <a  href="{{ route('editSeatsPrices',1)}}" class="relative" >
            <header class="w-full flex content-center  flex-wrap bg-fuchsia-900  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200 ">         
                    Конфигурация цен
                    <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                    <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " >3</div>
                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-8 w-1 top-[-2px] left-[57px]" > </div>
                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                    <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] -rotate-90 bg-[url('../../public/switch.png')]" ></div>
            </header>
        </a>
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
