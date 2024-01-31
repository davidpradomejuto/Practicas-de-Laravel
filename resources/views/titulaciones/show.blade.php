<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
</div>
@extends('layouts.plantilla')
@section('titulo', 'Mostrar')
@section('contenido')
    <div class="mx-5 my-5">
        <div class="px-6 py-4">

            <h2 class="font-bold">vista detalle de la titulacion {{$titulacion->nombre}}</h2>
              @forelse ($titulacion->cuidadores() as $cuidador)
              <a href="{{ route('cuidadores.show', $cuidador) }}"> cuidador: {{ $cuidador->nombre }}</a>
                <hr>
            @empty
                <p>La titulacion no tiene no tiene cuidadores</p>
            @endforelse
    </div>
@endsection
