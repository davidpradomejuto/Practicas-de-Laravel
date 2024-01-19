@extends('layouts.plantilla')
@section('titulo', 'Crear')
@section('contenido')
    <h1 class="text-2xl font-bold mx-8">Pagina para crear un animal</h1>


    <form action="{{route('animales.store')}}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-7 items-center justify-center">
        @csrf
        <div class="">
            <label for="especie">Especie del animal: </label>
            <input type="text" class="border-2" id="especie" name="especie" require>
        </div>

        <div class="">
            <label for="peso">Peso del animal: </label>
            <input type="text" class="border-2" id="peso" name="peso" require>
        </div>
        <div class="">
            <label>Altura del animal: </label>
            <input type="text" class="border-2" id="altura" name="altura" require>
        </div>
        <div class="">
            <label>Fecha de nacimiento del animal: </label>
            <input type="date" class="border-2" id="fechaNacimiento" name="fechaNacimiento" require>
        </div>
        <div class="">
            <label>Imagen del animal: </label>
            <input type="file" class="border-2" id="imagen" name="imagen" require>
        </div>
        <div class="">
            <label>Alimentacion del animal: </label>
            <input type="text" class="border-2" id="alimentacion" name="alimentacion" require>
        </div>
        <div class="">
            <label class="mb-1">Descripcion del animal: </label>
            <textarea id="descripcion" class="border-2" name="descripcion" style="height: 150px;width: 400px;" require></textarea>
        </div>

        <div class="col-start-1 mb-10">
            <input type="submit" id="anyadir" class="bverde" name="anyadir" value="Añadir animal">
            <a href="/animales" class="bverde">ver listado de animales</a>
        </div>

    </form>


@endsection
