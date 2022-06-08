<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('styles')
        
        <link href="{{ asset('css/app.css')}}" rel="stylesheet">
        <title>Padelmaster @yield('titulo')</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    
    <body class="bg-gray-100 ">
       
       <header class="p-5 border bg-blue-700 shadow">
            <div class="container mx-auto flex justify-between" item-center>    
                <h1  class="text-3xl font-black text-white">
                    <a href="{{route('inicio')}}">PadelMaster</a>
                </h1>
                @guest
                    <nav class="flex gap-2 items-center">
                        <a class="font-bold uppercase text-white  
                            text-sm" href="{{ route('login') }}">Login</a>
                        <a class="font-bold uppercase text-white  
                            text-sm" href="{{ route('register') }}">Crear cuenta</a>
                    </nav>
                @endguest

                @auth
                <nav class="flex gap-2 items-center">
                    
                    <a class="flex items-center gap-2 bg-white border p-2 text-white rounded text-sm 
                    uppercase font-bold cursor-pointer" href="{{ route('post.create') }}"
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                        <p class="text-black">Crear partido</p>
                    </a>
                    <a class="font-bold  text-white mr-6  
                        text-sm" href="{{ route('profile.index', auth()->user()->username) }}">
                        Cuenta: <span class="font-bold">{{ auth()->user()->username}}</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    <button type="submit" class="font-bold uppercase text-white  
                        text-sm" >Cerrar sesión</button>
                    </form>
                </nav>
                @endauth
               
            </div>
       </header>
       <main class="container mx-auto mt-10">
           <h2 class="font-black text-center text-3xl mb-10">
               @yield('titulo')
           </h2>

           @yield('contenido')
       </main>
       
       <footer class="text-center text-white mt-8" style="background-color: #0a4275;">
        <div class="container p-6">
          <div class="">
            
          </div>
        </div>
      
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.2);">
          © {{now()->year}} Copyright:
          <a class="text-white" href="https://padelmaster.works/">PadelMaster</a>
        </div>
      </footer>
       
    </body>
    
</html>