@extends('admin.layout.app')
@section('title','Логин')
@section('content')
@include('partials.header')
<main class="w-3/5 mx-auto text-md text-black ">
        <section >
            <header class=" flex flex-col items-center bg-fuchsia-900 py-4 text-xl  text-white font-bold uppercase tracking-tighter">         
                    авторизация 
            </header>
            <div class=" flex flex-col items-center  bg-white p-6  mx-auto">
                    <form  method="post" action="{{route('login_attempt')}}"  class ="flex w-4/5 flex-col justify-center gap-1 py-2" >
                            @csrf
                            <label for="user_mail">E-mail:</label>
                            <input class=" w-full text-lg border text-slate-300 border-stone-300 rounded-sm  inline-block border-2 border-stone-300 p-4 px-2 py-1 my-1 mr-1 @error('email') border-red-500 @enderror" name="user_mail" id="user_mail" type="email" placeholder="example@domain.xyz">
                                @error('email')
                                         <p class="text-red-500">{{ $message }}</p>
                                @enderror
                            <label for="user_password">Пароль</label>
                            <input class="w-full text-lg border text-slate-300 border-stone-300 rounded-sm  inline-block border-2 border-stone-300 p-4 px-2 py-1 my-1 mr-1 @error('password') border-red-500 @enderror"  name="user_password" id="user_password" type="password" value="">
                                @error('password')
                                        <p class="text-red-500">{{ $message }}</p>
                                @enderror               
                            
                            <div class="uppercase mx-auto mt-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">
                                <a href="{{ route("register") }}" >зарегистрироваться</a>
                            </div>
                           
                            
                         
                            <button type="submit"  class="uppercase my-4 mx-2 rounded-md px-8 py-2 text-white font-bold text-sm  bg-teal-400">
                                авторизоваться
                            </button>
                    </form>
            </div>
        </section>
</main>
@include('partials.footer')
@endsection
