@extends('plantillas.layout')

@section('titulo')
    
@endsection

@section('contenido')
<div class="bg-cover bg-center  h-full text-white py-24 px-10 object-fill" style="background-image: url('{{ asset('/img/banner-padel1.jpg')}}')">
    <div class="md:w-1/2">
        
        <p class="text-8xl text-blue-100 font-bold">Bienvenido a Padelmaster</p>
        <p class=" mt-3 text-4xl mb-10 leading-none">Juega, compite y conoce nuevos amigos</p>
 </div>
</div>
<div class="mt-5" id="app">
<pagina-inicio></pagina-inicio>
</div>

@endsection


