@extends('layout.app')
@section('title','ИдёмВКино')
@section('content')
@include('partials.header')
<main class="mt-2">
    <div class="grid grid-cols-1 gap-0 grid-rows-5 justify-start lg:grid-cols-1">
        <section class="flex  flex-col relative items-start gap-6 overflow-hidden rounded-lg bg-white p-6 bg-gray ">
            <details class="w-full flex content-center   flex-wrap open:bg-white   marker:content-['']">         
                    <summary  class="bg-purple-700 indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">Управление залами
                    <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[50px] left-[60px]" >
                    
                    </div> 
                    <div class="absolute text-black font-black text-2xl top-[53px] left-[-23px] " >
                    1
                    </div>
                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[88px] left-[78px]" >
                    
                    </div>
                    <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[60px] bg-[url('../../public/switch.png')]" >
                    
                    </div>
                    
                    </summary>         
                    <p>1 Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
            </details>
        </section>
        <section class="flex  flex-col relative items-start gap-6 overflow-hidden rounded-lg bg-white p-6 bg-gray ">
         
            <details class="w-full flex content-center   flex-wrap open:bg-white   marker:content-['']">         
                    <summary  class="bg-purple-700 indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">Управление залами
                    <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[50px] left-[60px]" >
                    
                    </div> 
                    <div class="absolute text-black font-black text-2xl top-[53px] left-[-23px] " >
                    1
                    </div>
                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[88px] left-[78px]" >
                    
                    </div>
                    <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[60px] bg-[url('../../public/switch.png')]" >
                    
                    </div>
                    
                    </summary>         
                    <p>1 Epcot is a theme park at Walt Disney World Resort featuring exciting attractions, international pavilions, award-winning fireworks and seasonal special events.</p>
            </details>
        </section>
       
</main>
@include('partials.footer')
@endsection
