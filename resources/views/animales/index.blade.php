@extends('layouts.plantilla')
@section('titulo', 'Zoologico')
@section('contenido')
    <h1 class="text-2xl font-bold underline ml-8">Listado de animales</h1>
    <div style="margin: 1% 10%; border: 1px solid black;border-radius:5px">
    @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 ml-4 mb-6" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4 ml-4 mb-6"
            role="alert">
            {{ session('success') }}
        </div>
    @endif
        <select id="filtro">
            <option value="herbívoro">herbívoro</option>
            <option value="carnívoro">carnívoro</option>
            <option value="todos">todos</option>
        </select>
        <input type="button" id="filtrar" value="filtrar" class="bverde">
    </div>

    <script>
        var filtro = document.getElementById('filtrar');
        var select = document.getElementById('filtro');

        filtro.addEventListener("click", function() {
            let enlaces = document.querySelectorAll('.max-w-sm');

            enlaces.forEach(element => {
                if (select.value == 'todos') {
                    element.style.display = 'inline';

                } else {
                    if (element.querySelector('#alimentacion').innerText != select.value) {
                        element.style.display = 'none';
                        console.log('se ha eliminado el elemento' + element);
                    } else {
                        element.style.display = 'inline';
                    }
                }

            });
        });
    </script>


    <div class="flex flex-row gap-5 flex-wrap justify-center mx-5 my-2">

        @forelse ($animales as $animal)
            {{-- Hay que crear un storage por ejemplo "app/public/imagenes" , y luego linkarlo con la carpeta public con el comando php artisan storage:link --}}
            <a class="max-w-sm rounded overflow-hidden shadow-lg" href='{{ route('animales.show', $animal) }}'>
                <img class="" width="300px" height="150px" src='{{ asset($animal->imagen->url) }}'
                    alt="Imagen del animal">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $animal->especie }}</div>
                    <div class="text-gray-700 text-base">
                        <p>Peso: {{ $animal->peso }}</p>
                        <p>Altura: {{ $animal->altura }}</p>
                        <p>Edad: {{ $animal->getEdad() }} años</p>
                        <p> Alimentacion: <span id="alimentacion">{{ $animal->alimentacion }}</span></p>
                        <p>ID del anmimal: {{$animal->id}}</p>
                        <p>UD_Imagen del animal: {{$animal->id_imagen}}</p>
                        <p>id de la imagen de la relacion: {{$animal->imagen->id}}</p>


                    </div>
                </div>
            </a>
        @empty
            <p>No existen animales</p>
        @endforelse
    </div>


@endsection
