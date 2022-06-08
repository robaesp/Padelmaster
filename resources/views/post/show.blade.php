@extends('plantillas.layout')

@section('titulo')
Lugar: {{ $court->name }}
@endsection

@section('contenido')

    <div class="md:flex md:justify-center md:gap-8 md:items-center">
            <div class="md:w-2/6">
                <img src="{{ asset('uploads').'/'. $court->img }}" alt="Foto del partido {{ $court->name }}">
            </div>
            <div class="md:w-2/6 ml-2">
                <div class="bg-sky-600 w-4/6 p-4 rounded-md border-2  flex items-center text-white">
                    <p class='font-bold'>Organizador: {{$court->user_create->username}}</p>
                </div>

                <div class="bg-sky-600 w-4/6 p-4 rounded-md border-2  flex items-center text-white">
                    <p class='font-bold'>Tamaño: {{$court->size}}</p>
                </div>
        
                <div class="bg-sky-600 w-4/6 p-4 rounded-md border-2  flex items-center text-white">
                    <p class='font-bold'>Participantes: @foreach($court->challengers as $u){{$u->username}}
                    @endforeach
                    </p>
                </div>

                <div class="bg-sky-600 w-4/6 p-4 rounded-md border-2  flex items-center text-white">
                    <p class='font-bold'>Fecha y hora: {{$court->date_booking}} {{$court->hour_booking}}</p>
                </div>

                <div class="bg-sky-600 w-4/6 p-4 rounded-md border-2  flex items-center text-white">
                    <p class='font-bold'>Nivel de categoria: {{$court->category_lvl_court}}</p>
                </div>

                <div class="bg-sky-600 w-4/6 p-4 rounded-md border-2  flex items-center text-white">
                    <p class='font-bold'>Ciudad: {{$court->city}}</p>
                </div>

                <div class="w-4/6 h-4/6 p-4 rounded-md border-2 shadow mt-4 bg-sky-200 ">
                    <p class='font-bold text-xl w-4/6 h-4/6'> {{$court->description}}</p>
                </div>

                @if(auth()->user()->id == $court->user_id)
                    <form action="{{ route('post.destroy', $court)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Eliminar partido" class="bg-red-400 hover:bg-red-700 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                    </form>
                @else
                    @if($court->challengers()->where('user_id', auth()->user()->id)->count() > 0)
                        <form action={{ route('post.deleteBooking', $court)}} method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Eliminar reserva" class="bg-red-400 hover:bg-red-700 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                        </form>
                     @else  
                        <form action="{{ route('post.booking', $court)}}" method="POST">
                            @csrf
                            <input type="submit" value="Inscribirme" class="bg-blue-400 hover:bg-green-500 p-2 rounded text-white font-bold mt-4 cursor-pointer">
                        </form>  
                    @endif
                 @endif
            </div>
            {{-- <div class="md:w-2/6 ml-2 shadow bg-white p-5 mb-4 rounded-lg">
                <p class="text-xl text-center mb-4">
                    Chat
                </p>
                <form action="{{ route('post.booking', $court)}}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="comment" class="mb-2 block uppercase text-gray-500 font-bold">
                            Chat de {{$court->name}}</label>
                            <textarea
                                id="comment"
                                name="comment"
                                placeholder="Escibe por el chat"
                                class="border p-3 w-full rounded-lg @error('comment') border-red-500  @enderror">
                            </textarea>
                            @error('comment')
                            <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ $message }}</p>
                            @enderror   
                    </div> 
                    <input 
                    type="submit"
                    value="Publicar comentario"
                    class="bg-sky-600 hover:bg-green-400 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                    />
                </form>
            </div> --}}
    </div>
    
@endsection