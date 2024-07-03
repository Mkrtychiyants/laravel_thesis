@extends('admin.layout.app')
@section('title','Создать сеанс')
@section('content')
@include('partials.header')
<main class="grid grid-cols-1 gap-0 auto-rows-max  justify-start text-md text-black ">
        <section class="flex  flex-col container mx-auto items-start bg-white">
            <a  href="{{url ('/')}}" class="flex  w-full flex-col relative items-start " >
                <div class="w-full flex content-center   flex-wrap bg-purple-700  indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">         
                     Cоздать сеанс
                    <div class=" absolute  bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[27px] left-[40px]" ></div> 
                    <div class="absolute text-black font-black text-2xl top-[30px] left-[-42px] " > 6 </div>
                    <div class="absolute bg-purple-400 font-black text-2xl  h-8 w-1 top-[-2px] left-[57px]" > </div>
                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-6 w-1 top-[67px] left-[57px]" ></div>
                    <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[37px] bg-[url('../../public/switch.png')]" > </div>
                </div>
            </a>
            <div class="px-20 md:container relative md:mx-auto">
                <div class=" flex flex-col items-center   gap-6 overflow-hidden rounded-lg bg-white p-6">        
                <div class="container w-full gap-2 items-center">
                <div class="container w-full p-4">
                    <form  method="post" action="{{route('create_seans', $movie_id )}}"  class ="flex  flex-col items-center gap-1 py-2" >
                            @csrf
                            <label for="room_id">Номер зала:</label>
                            <input class=" border border-stone-300 rounded-sm  w-20 inline-block border-2 border-stone-300 px-2 py-1 my-1 mr-1" name="room_id" id="room_id" type="number" value="1"><br>
                            <label for="movie_id">Номер фильма:</label>
                            <input class=" border border-stone-300 rounded-sm  w-20 inline-block border-2 border-stone-300 px-2 py-1 my-1 mr-1"  name="movie_id" id="movie_id" type="number" value="{{$movie_id}}"><br>

                            <label for="start"> Дата и время начала сеанса:</label>
                            <input class=" border border-stone-300 rounded-sm  w-20 inline-block border-2 border-stone-300 px-2 py-1 my-1 mr-1" name="start" id="start" type="datetime-local" ><br>
                            <!-- <label for="finish">Дата и время конца сеанса:</label>
                            <input  class=" border border-stone-300 rounded-sm  w-20 inline-block border-2 border-stone-300 px-2 py-1 my-1 mr-1" name="finish" id="finish" type="datetime-local"><br> -->

                            <div class="flex  flex-two container mx-auto justify-center ">  
                                    <button type="reset" class="uppercase my-4 mx-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">
                                        отмена   
                                    </button>
                                    <button type="submit"   class="uppercase my-4 mx-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">
                                        сохранить   
                                    </button>
                            </div> 
                    </form>
                </div>
                <div class="absolute h-full bg-purple-400 font-black text-2xl z-20 w-1 top-0 left-[57px]" ></div>   
            </div>
                    
        </div> 
            </div>
        </section>
    
</main>
@include('partials.footer')
@endsection
