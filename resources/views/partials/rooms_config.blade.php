<section class="flex  flex-col relative items-start overflow-hidden rounded-lg bg-white bg-gray ">
            <details class="w-full flex content-center   flex-wrap open:bg-white   marker:content-['']">         
                    <summary  class="bg-purple-700 indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter">
                    
                    Конфигурация залов
                    <div class=" absolute bg-white bg-no-repeat border-purple-400 rounded-full bg-contain  border-4  size-10 top-[25px] left-[40px]" >
                    
                    </div> 
                    <div class="absolute text-black font-black text-2xl top-[28px] left-[-42px] " >
                    2
                    </div>
                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-7 w-1 top-[64px] left-[56px]" >
                    
                    </div>
                    <div class="absolute bg-purple-400 font-black text-2xl z-20 h-7 w-1 top-[0px] left-[56px]" >
                    
                    </div>
                    <div class=" absolute bg-contain bg-no-repeat size-6 z-3  right-[60px] top-[38px] bg-[url('../../public/switch.png')]" >
                    
                    </div>
                    
                    </summary>         
                    <div class="px-20">
                        <div class="flex flex-col items-start px-6 py-3">
                            <ul class="flex  flex-col items-start gap-3 ">
                                <h2 class="text-md  text-black ">Доступные залы</h2>
                                @foreach ($rooms as $room)
                                <li class="flex items-start gap-4 rounded-lg bg-white py-3">
                                    <div class="text-md font-bold uppercase text-black ">- Зал  {{ $room->id }}</div>
                                    <a  href="{{ route("delete_room", $room->id ) }}">
                                        <button class="rounded-lg bg-[length:35px_20px] bg-[bottom_2.5px_left_3.5px] bg-no-repeat bg-white border-solid border-2 border-indigo-600 size-7  bg-[url('../../public/trash-sprite.png')]">
                                        </button>
                                    </a> 
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <form  method="post" action="{{route('createRoom')}}"  >
                             @csrf
                            <button type="submit" class="uppercase m-6 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">Создать зал</button>
                        </form>
                    </div>
            </details>
</section>