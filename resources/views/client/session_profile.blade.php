@extends('client.layout.app')
@section('title','Главная')
@section('content')
@include('client.partials.header')
<main class="flex  flex-col flex-wrap gap-10 container mx-auto   text-md text-black ">
<div class="md:container md:mx-auto border border-zinc-900 p-5">
                        <div class="flex justify-center ">
                            <div class="flex flex-col justify-center ">
                                <div class="flex justify-center pb-4 tracking-[1.3rem] indent-[5%] text-right text-sm uppercase ">Экран</div>     
                                    <div class="grid grid-cols-{{ $session->room->rows}} gap-2 justify-items-center col-span-full ">          
                                        @foreach ($session->room->seats as $seat)
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
</main>
@include('partials.footer')
@endsection
