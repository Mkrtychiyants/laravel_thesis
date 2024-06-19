@extends('layout.app')
@section('title',' Главная 11')
@section('content')
@include('partials.header')
<main class="mt-6 text-black">
        <div class="flex flex-col items-center   gap-6 overflow-hidden rounded-lg bg-white p-6">
            <div class="container w-full gap-2 py-10">
                <div id="edit_rooms_prices" class=" relative">  
                        <h2 class="text-xl font-semibold text-black dark:text-white">Выберете зал  для конфигурации</h2>
                        <div  class="flex flex-row border">
                            <a href=""  class=" border p-6  " >
                                <div class="border " >{{ $room->title }}</div>
                            </a>
                        </div>
                    
                    <div>Установите цены для типов кресел:</div>
                    
                    <form  method="post" action="{{ route('create_prices', $room->id) }}"  id ="createPricesForm" >
                            @csrf
                            <label for="casual_seat_price">Цена, рублей</label><br>
                            <input name="casual_seat_price" id="casual_seat_price" type="number" value="0">
                            <span  class="">за</span>
                            <img class="size-8 border border-zinc-900 bg-gray-300"></img>
                            <span class="">обычные кресла</span><br>

                            <label for="vip_seat_price">Цена, рублей</label><br>
                            <input name="vip_seat_price" id="vip_seat_price" type="number" value="350">
                            <span  class="">за</span>
                            <img class="size-8 border border-zinc-900 bg-lime-500"></img>
                            <span class="">vip кресла</span><br>
                    </form>
                </div>
            </div>
                
            
            <div id="edit_rooms_prices_btns" class="flex-row  gap-6 ">
                            <button type="reset" form="createPricesForm" class="rounded bg-white border-solid border-2 border-indigo-600 px-10 py-3 uppercase text-[14px]">
                            отмена   
                            </button>
                    
                            <button type="submit" form="createPricesForm" class="rounded bg-green-200 border-solid border-2 border-indigo-600 px-10 py-3 uppercase text-[14px]">
                            сохранить   
                            </button>   
            </div>      
        </div> 
</main>

@include('partials.footer')
@endsection

