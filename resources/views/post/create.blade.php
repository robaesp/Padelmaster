@extends('plantillas.layout')

@section('titulo')  
Crear una pista
@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route('imagenes.store') }}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md=mt:0">
            <form action="{{route('post.store')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre del club</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            placeholder="Ingresa el nombre del club"
                            class="border p-3 w-full rounded-lg @error('name') border-red-700 @enderror"
                            value="{{old ('name')}}"
                            />
                            @error('name')
                            <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ $message }}</p>
                            @enderror
                </div>
                <div class="mb-5">
                    <label for="city" class="mb-2 block uppercase text-gray-500 font-bold">
                        Ciudad</label>
                        <input
                            id="city"
                            name="city"
                            type="text"
                            placeholder="Ingresa el nombre de la ciudad o pueblo"
                            class="border p-3 w-full rounded-lg @error('city') border-red-700 @enderror"
                            value="{{old ('city')}}"
                            />
                            @error('city')
                            <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ $message }}</p>
                            @enderror
                </div>
                <div class="mb-5">
                    <label for="category_lvl_court" class="mb-2 block uppercase text-gray-500 font-bold">
                        Categor??a</label>
                              <select class="form-select appearance-none
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="category_lvl_court"
                                name="category_lvl_court"
                                
                                >
                                  <option value="1">Nivel de categor??a 1</option>
                                  <option value="2">Nivel de categor??a 2</option>
                                  <option value="3">Nivel de categor??a 3</option>
                                  <option value="4">Nivel de categor??a 4</option>
                                  <option value="5">Nivel de categor??a 5</option>
                              </select>
                            @error('category_lvl_court')
                            <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ $message }}</p>
                            @enderror
                </div>
                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripci??n</label>
                        <textarea
                            id="description"
                            name="description"
                            placeholder="No es obligatorio rellenarlo"
                            class="border p-3 w-full rounded-lg"
                            >{{old ('description')}}</textarea>
                            
                </div>
                
                <div class="mb-5">
                    <label for="date_booking" class="mb-2 block uppercase text-gray-500 font-bold">
                        Fecha</label>
                        <input
                        id="date_booking"
                        name="date_booking"
                        type="date"
                        class="border p-3 w-full rounded-lg @error('date_booking') border-red-700 @enderror"
                        value="{{old ('date_booking')}}"
                        />
                        @error('date_booking')
                        <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ $message }}</p>
                        @enderror
                  </div>

                  <div class="mb-5">
                    <label for="hour_booking" class="mb-2 block uppercase text-gray-500 font-bold">
                        Hora del partido</label>
                              <select class="form-select appearance-none
                                block
                                w-full
                                px-3
                                py-1.5
                                text-base
                                font-normal
                                text-gray-700
                                bg-white bg-clip-padding bg-no-repeat
                                border border-solid border-gray-300
                                rounded
                                transition
                                ease-in-out
                                m-0
                                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                id="hour_booking"
                                name="hour_booking"
                                
                                >
                                  <option value="07:00">07:00</option>
                                  <option value="07:30">07:30</option>
                                  <option value="08:00">08:00</option>
                                  <option value="08:30">08:30</option>
                                  <option value="09:00">09:00</option>
                                  <option value="09:30">09:30</option>
                                  <option value="10:00">10:00</option>
                                  <option value="10:30">10:30</option>
                                  <option value="11:00">11:00</option>
                                  <option value="11:30">11:30</option>
                                  <option value="12:00">12:00</option>
                                  <option value="12:30">12:30</option>
                                  <option value="13:00">13:00</option>
                                  <option value="13:30">13:30</option>
                                  <option value="14:00">14:00</option>
                                  <option value="14:30">14:30</option>
                                  <option value="15:00">15:00</option>
                                  <option value="15:30">15:30</option>
                                  <option value="16:00">16:00</option>
                                  <option value="16:30">16:30</option>
                                  <option value="17:00">17:00</option>
                                  <option value="17:30">17:30</option>
                                  <option value="18:00">18:00</option>
                                  <option value="18:30">18:30</option>
                                  <option value="19:00">19:00</option>
                                  <option value="19:30">19:30</option>
                                  <option value="20:00">20:00</option>
                                  <option value="20:30">20:30</option>
                                  <option value="21:00">21:00</option>
                                  <option value="21:30">21:30</option>
                                  <option value="22:00">22:00</option>
                              </select>
                            @error('hour_booking')
                            <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ $message }}</p>
                            @enderror
                </div>                   
            <div class="mb-5">
                        <input
                        name="img"
                        type="hidden"
                        value="{{ old('img') }}"
                        />
                        @error('img')
                            <p class="text-red-400 bg-slate-600 my-2 rounded-lg text-sm p-3 text-center">{{ $message }}</p>
                            @enderror
                  </div>
                
                <input 
                    type="submit"
                    value="Crear partido"
                    class="bg-sky-600 hover:bg-green-400 transition-colors cursor-pointer
                    uppercase font-bold w-full p-3 text-white rounded-lg"
                />
            </form>
        </div>
@endsection