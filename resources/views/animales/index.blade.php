@extends('layouts.plantilla')
@section('titulo','Zoologico')
@section('contenido')
<h1 class="text-2xl font-bold underline">Listado de animales</h1>

<div class="flex flex-row gap-5 flex-wrap justify-center mx-5 my-2">
@foreach ($animales as $animal)

    <a class="max-w-sm rounded overflow-hidden shadow-lg" href='{{ route('animales.show',$animal['especie'])}}'>
        <img class="" width="300px" height="150px" src='{{asset("assets/imagenes/$animal[imagen]")}}' alt="Imagen del animal">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">{{ $animal['especie'] }}</div>
          <div class="text-gray-700 text-base">
            <p>Peso: {{ $animal['peso'] }}</p>
            <p>Altura: {{ $animal['altura']}}</p>
            <p>Fecha de nacimiento: {{ $animal['fechaNacimiento'] }}</p>
            <p>Alimentacion: {{ $animal['alimentacion'] }}</p>
          </div>
        </div>

    </a>
@endforeach
</div>


@endsection
