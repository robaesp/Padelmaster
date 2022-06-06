@extends('plantillas.layout')

@section('titulo')  
Admin: Crear una pista
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
            <form action="{{route('admin.createCourt')}}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre del club</label>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            
                            class="border p-3 w-full rounded-lg  "
                            
                            />
                            
                </div>
                <div class="mb-5">
                    <label for="city" class="mb-2 block uppercase text-gray-500 font-bold">
                        Ciudad</label>
                        <input
                            id="city"
                            name="city"
                            type="text"
                            
                            class="border p-3 w-full rounded-lg "
                            
                            />
                <div class="mb-5">
                    <label for="size" class="mb-2 block uppercase text-gray-500 font-bold">
                        Tamaño</label>
                        <input
                            id="size"
                            name="size"
                            type="number"
                            
                            class="border p-3 w-full rounded-lg "
                            
                            />
                            
                </div>
                <div class="mb-5">
                    <label for="category_lvl_court" class="mb-2 block uppercase text-gray-500 font-bold">
                        Categoría de nivel</label>
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
                                  <option value="1">Nivel de categoría 1</option>
                                  <option value="2">Nivel de categoría 2</option>
                                  <option value="3">Nivel de categoría 3</option>
                                  <option value="4">Nivel de categoría 4</option>
                                  <option value="5">Nivel de categoría 5</option>
                              </select>
                              <div class="mb-5">
                    <label for="category" class="mb-2 block uppercase text-gray-500 font-bold">
                        Tipo de partido</label>
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
                                id="category"
                                name="category"
                                
                                >
                                  <option value="normal">Normal</option>
                                  <option value="tournament">Torneo</option>
                                  
                              </select>
                            
                </div>
                <div class="mb-5">
                    <label for="description" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripción</label>
                        <textarea
                            id="description"
                            name="description"
                            
                            class="border p-3 w-full rounded-lg"
                            ></textarea>
                            
                </div>
                
                <div class="mb-5">
                    <label for="date_booking" class="mb-2 block uppercase text-gray-500 font-bold">
                        Fecha</label>
                        <input
                        id="date_booking"
                        name="date_booking"
                        type="date"
                        class="border p-3 w-full rounded-lg "
                        
                        />
                        
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
                            
                </div>
                <div class="mb-5">
                        <input
                        name="img"
                        type="hidden"
                        
                        />
                       
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