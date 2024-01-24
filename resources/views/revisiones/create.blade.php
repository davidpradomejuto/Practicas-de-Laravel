@extends('layouts.plantilla')
@section('titulo', 'Crear')
@section('contenido')
    <h1 class="text-2xl font-bold mx-8">Pagina para crear un animal</h1>


    <form action="{{route('revisiones.store')}}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-7 items-center justify-center">
        @csrf
        @if ($errors->any())
        <ul class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded'>
            @foreach ($errors->all() as  $error)
                <li class="text-black"> {{$error}}</li>
            @endforeach
        </ul>
        @endif
        <div class="">
            <label for="descripcion">descripcion: </label>
            <textarea id="descripcion" class="border-2" name="descripcion" style="height: 150px;width: 400px;" require></textarea>
        </div>
        <div class="">
            <label for="fecha">Fecha: </label>
            <input id="fecha" name="fecha" type="date" class="border-2" required>
            <input id="animal_id" name="animal_id" type="hidden" value="{{$animal->id}}">
        </div>

        <div class=" mb-10">
            <input type="submit" id="anyadir" class="bverde" name="anyadir" value="Añadir una revision">
        </div>

    </form>


@endsection
