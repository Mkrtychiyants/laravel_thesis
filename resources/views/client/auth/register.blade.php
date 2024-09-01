@extends('client.layout.app')
@section('title','User Логин')
@section('content')
@include('client.partials.header')
<main class="w-2/5 mx-auto text-md text-black mt-8 h-screen">
        <section >
            <header class="flex items-center justify-items-center justify-center bg-fuchsia-900 h-10 indent-24 z-5  py-8 text-xl  text-white font-bold uppercase tracking-tighter transition-all ease-in  hover:tracking-wide hover:bg-fuchsia-400  delay-300  duration-200">         
                <div class="mr-24">регистрация</div>
            </header>
            <div class=" flex flex-col items-center  bg-white p-6  mx-auto">
                    <form  method="post" action="{{route('clientRegisterAttempt')}}"  class ="flex w-4/5 flex-col justify-center gap-1 py-2" >
                            @csrf
                            <label for="user_name">Имя:</label>
                            <input class="w-full text-lg border text-slate-300 border-stone-300 rounded-sm  inline-block border-2 border-stone-300 p-4 px-2 py-1 mr-1 @error('name') border-red-500 @enderror" name="user_name" id="user_name" type="text" placeholder="Иван">
                                @error('name')
                                         <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            <label for="user_mail">E-mail:</label>
                            <input class="w-full text-lg border text-slate-300 border-stone-300 rounded-sm  inline-block border-2 border-stone-300 p-4 px-2 py-1 mr-1 @error('email') border-red-500 @enderror" name="user_mail" id="user_mail" type="email" placeholder="example@domain.xyz">
                                @error('email')
                                         <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            <label for="user_password">Пароль</label>
                            <input class="w-full text-lg border text-slate-300 border-stone-300 rounded-sm  inline-block border-2 border-stone-300 p-4 px-2 py-1 mr-1 @error('password') border-red-500 @enderror"  name="user_password" id="user_password" type="password" value="">
                                @error('password')
                                        <p class="text-red-500">{{ $message }}</p>
                                @enderror               
                            
                            <button type="submit"  class="w-3/5 mx-auto mt-6 uppercase  rounded-md px-8  py-3 text-white font-bold text-sm  bg-emerald-700 shadow-lg hover:bg-emerald-500 transition-all ease-in  delay-300  duration-200 ">
                                зарегистрироваться
                            </button>
                            <button type="reset"  class="w-3/5 mx-auto mt-3 uppercase  rounded-md px-8  py-3 text-white font-bold text-sm  bg-emerald-700 shadow-lg hover:bg-emerald-500 transition-all ease-in  delay-300  duration-200 ">
                                отмена
                            </button>
                    </form>
            </div>
        </section>
</main>
@include('partials.footer')
@endsection
