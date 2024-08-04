@extends('client.layout.app')
@section('title','Главная')
@section('content')
@include('client.partials.header')
<main class="flex flex-col flex-wrap gap-10 container mx-auto text-md text-black ">
    <div class="container mx-auto border border-zinc-900 bg-orange-50/90 ">
        <header class="capitalize text-sm py-2 px-8 ">           
            <div class="font-bold ">{{$session->movie->title}}</div>
            <div class="my-2 "> начало сеанса {{\Carbon\Carbon::parse($session->start_time)->format('H:i')}}</div>
            <div class="font-bold  "> Зал {{$session->room->id}}</div>
        </header> 
        <section class="grid bg-black mx-auto justify-center py-3 ">
                <div class=" pb-4 h-1.5 mb-2 text-right text-sm uppercase  bg-no-repeat bg-center bg-[url('../../public/screen.png')] bg-contain">Экран</div>     
                <div class="grid  place-content-center mx-auto ">          
                     <table class="table-auto">
                            <tbody class=" ">   
                                @php $nubmerSeats=0; @endphp
                                @for ($i = 1; $i<=$session->room->rows; $i+=1)
                                    <tr> 
                                        @for ($j = 1; $j<=$session->room->columns; $j+=1)
                                            <td>
                                                @if ($tickets[$nubmerSeats]->is_blocked)
                                                    <p class="inline-block text-white size-5 rounded bg-black  mr-1 mb-1"><span></span></p>
                                                    @php $nubmerSeats++; @endphp
                                                @elseif (($tickets[$nubmerSeats]->is_purchased))
                                                <p class="inline-block text-white size-5 rounded bg-black border border-gray-400 mr-1 mb-1"><span></span></p>
                                                </a>
                                                @php $nubmerSeats++; @endphp
                                                @elseif ($tickets[$nubmerSeats]->is_selected)
                                                <a href="{{route('clientSeatSelect', $tickets[$nubmerSeats]->id)}}"  class="inline-block text-white size-5 rounded bg-teal-400 border border-gray-400 mr-1 mb-1"><span ></span>
                                                </a>
                                                @php $nubmerSeats++; @endphp
                                                @elseif ($tickets[$nubmerSeats]->is_vip)
                                                    <a href="{{route('clientSeatSelect', $tickets[$nubmerSeats]->id)}}"  class="inline-block text-white size-5 rounded bg-orange-400 border border-gray-400 mr-1 mb-1"><span ></span>
                                                    </a>
                                                    @php $nubmerSeats++; @endphp
                                                
                                                @else
                                                    <a href="{{route('clientSeatSelect', $tickets[$nubmerSeats]->id)}}"   class="inline-block text-black size-5 rounded bg-zinc-50 border border-gray-400 rounded mr-1 mb-1"><span ></span>
                                                    @php $nubmerSeats++; @endphp
                                                @endif
                                            </td>   
                                        @endfor
                                    </tr>
                                @endfor
                            </tbody>
                        </table>    
                </div> 
                <div class="grid gap-2 grid-cols-2 justify-items-start pl-8   ">
                        <div > 
                            <span class="inline-block text-white size-5 rounded bg-zinc-50 border border-gray-400"></span> 
                            <span class="text-white capitalize  m-1">свободно </span>
                            <span class="text-white  capitalize ">({{$regularPrice}}руб) </span>
                        </div>
                        <div> 
                            <span class="inline-block text-white size-5 rounded bg-black border border-gray-400"></span>  
                            <span class="text-white capitalize mx-1">занято </span>
                        </div>
                        <div> 
                            <span class=" inline-block text-white size-5 rounded bg-orange-400 border border-gray-400"></span> 
                            <span class="text-white capitalize mx-1">свободно VIP </span>
                            <span class="text-white  capitalize ">({{$vipPrice}}руб) </span> 
                        </div>
                        <div> 
                            <span class=" inline-block text-white size-5 rounded bg-teal-400 border border-gray-400"></span>  
                            <span class="text-white capitalize mx-1">выбрано </span>
                        </div>
                </div>  
        </section>  
        <div class="flex flex-two justify-center py-4 ">           
            <a  href="{{route('clientTicketCreate', $session)}}" class="uppercase my-4 mx-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">Забронировать</a>
        </div>   
    </div>      
</main>
@include('partials.footer')
@endsection
