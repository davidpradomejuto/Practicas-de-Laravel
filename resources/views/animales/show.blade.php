@extends('layouts.plantilla')
@section('titulo','Mostrar')
@section('contenido')
<div class="mx-5 my-5">
    <img class="" width="300px" height="200px" src='{{asset("assets/imagenes/$animal[imagen]")}}' alt="Imagen del animal">
    <div class="px-6 py-4">
      <div class="font-bold text-xl mb-2">{{ $animal['especie'] }}</div>
        <p>Peso: {{ $animal['peso'] }}</p>
        <p>Altura: {{ $animal['altura']}}</p>
        <p>Fecha de nacimiento: {{ $animal['fechaNacimiento'] }}</p>
        <p>Alimentacion: {{ $animal['alimentacion'] }}</p>
        <p>Descripcion: {{ $animal['descripcion'] }}</p>
    </div>
    <button class="btn btn-green"><a>Editar este animal</a></button>

</div>
@endsection
