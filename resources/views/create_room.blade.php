
@extends('layout.app')
@section('title',' Главная 11')
@section('content')
@include('partials.header')

<main class="mt-6">
    <div class="grid gap-6 lg:grid-cols-1 lg:gap-8">
        <div 
            class=" flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
        >
            <div class="relative flex items-center gap-6 lg:items-end">
            <p>Hello!</p>
                        <p>This is create room:</p>
                        <form  method="post" action="{{route('createRoom')}}"  class ="createGroupForm" >
                        @csrf
                        <label for="room">Rooms title:</label>
                        <input name="room" id="room" type="text" value="room"><br>

                        <label for="room_row">Rooms row:</label>
                        <input name="room_row" id="room_row" type="number" value="5"><br>

                        
                        <label for="room_columns">Room's columns:</label>
                        <input name="room_columns" id="room_columns" type="number" value="5"><br>
                       
                        <button class ="btn" type="submit">Submit</button>
                         </form>
            </div>
        </div>  

    </div>
</main>

@include('partials.footer')
@endsection


