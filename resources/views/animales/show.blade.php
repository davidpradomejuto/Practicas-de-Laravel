@extends('layouts.plantilla')
@section('titulo', 'Mostrar')
@section('contenido')
    <div class="mx-5 my-5">
        <img class="" width="300px" height="200px" src='{{ asset("assets/imagenes/$animal->imagen") }}'
            alt="Imagen del animal">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ $animal->especie }}</div>
            <p>Peso: {{ $animal->peso }}</p>
            <p>Altura: {{ $animal->altura }}</p>
            <p>Fecha de nacimiento: {{ $animal->fechaNacimiento }}</p>
            <p>Alimentacion: {{ $animal->alimentacion }}</p>
            <p>Descripcion: {{ $animal->descripcion }}</p>
            <p>Revisiones :{{$animal->revisiones->count()}}</p>
            <hr>
            <h2 class="font-bold">Revisiones</h2>

            @forelse ($animal->revisiones as $revision)
                <p>El animal ha tenido una revision "{{ $revision->descripcion }}" el dia "{{ $revision->fecha }}"</p>
            @empty
                <p>El animal no tiene revisiones</p>
            @endforelse

            <hr>
            <h2 class="font-bold">Cuidadores</h2>

            @forelse ($animal->cuidadores as $cuidador)
                <p>{{ $cuidador->nombre }}</p>
            @empty
                <p>El animal no tiene Cuidadores</p>
            @endforelse

        </div>
        <button class="bverde"><a href="{{ route('animales.edit', $animal) }}">Editar este animal</a></button>
        <button class="bverde"><a href="{{ route('revisiones.create', $animal) }}">Crear una revision para este animal</a></button>

    </div>
@endsection
