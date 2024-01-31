<div>
    <!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
</div>
@extends('layouts.plantilla')
@section('titulo', 'Mostrar')
@section('contenido')
    <div class="mx-5 my-5">
        <div class="px-6 py-4">

            <h2 class="font-bold">vista detalle del cuidador {{$cuidador->nombre}}</h2>
              @forelse ($cuidador->titulaciones() as $titulacion)
                <a href="{{ route('titulaciones.show', $titulacion) }}"> Titulacion: {{ $titulacion->nombre }}</a>

                <hr>
            @empty
                <p>El Cuidador no tiene titulaciones</p>
            @endforelse
    </div>
@endsection
