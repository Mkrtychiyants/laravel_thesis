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
                <ul id="rooms_list" class="flex items-start gap-6 lg:flex-col">
                  <h2 class="text-xl font-semibold text-black dark:text-white">This is list of rooms</h2>
            
                    <li class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                        <div>This is room # {{ $room->id }}</div>
                        <div>This is room title {{ $room->title }}</div>
                        <div>It has  {{ $room->rows }} rows</div>
                        <label for="room_row">Rooms row:</label>
                        <input name="room_row" id="room_row" type="number" value="{{ $room->rows }}"><br>
                        <div>It has {{ $room-> columns }} columns</div>
                        <label for="room_columns">Room's columns:</label>
                        <input name="room_columns" id="room_columns" type="number" value="{{ $room-> columns }}"><br>
                        <a  href="{{ route("delete_room", $room->id ) }}">
                            <button class="rounded-lg bg-white border-solid border-2 border-indigo-600 px-8">
                            Delete room   
                            </button>
                        </a> 
                        <a  href="{{ url("/room/create" ) }}">
                            <button class="rounded-lg bg-white border-solid border-2 border-indigo-600 px-8">
                            Create room   
                            </button>   
                        </a> 
                    </li>

                </ul>

            </div>
        </div>  

    </div>
</main>

@include('partials.footer')
@endsection

