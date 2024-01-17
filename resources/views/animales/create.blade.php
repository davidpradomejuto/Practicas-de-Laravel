@extends('layouts.plantilla')
@section('titulo', 'Crear')
@section('contenido')
    <h1 class="text-2xl font-bold mx-8">Pagina para crear un animal</h1>


    <form action="" method="POST" enctype="multipart/form-data" class="flex flex-col gap-7 items-center justify-center">
        @csrf
        <div class="">
            <label for="especie">Especie del animal: </label>
            <input type="text" id="especie" name="especie" require>
        </div>

        <div class="">
            <label for="peso">Peso del animal: </label>
            <input type="text" id="peso" name="peso" require>
        </div>
        <div class="">
            <label>Altura del animal: </label>
            <input type="text" id="altura" name="altura" require>
        </div>
        <div class="">
            <label>Fecha de nacimiento del animal: </label>
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" require>
        </div>
        <div class="">
            <label>Imagen del animal: </label>
            <input type="file" id="imagen" name="imagen" require>
        </div>
        <div class="">
            <label>Alimentacion del animal: </label>
            <input type="text" id="alimentacion" name="alimentacion" require>
        </div>
        <div class="">
            <label class="mb-1">Descripcion del animal: </label>
            <textarea id="descripcion" name="descripcion" style="height: 150px;width: 400px;" require></textarea>
        </div>

        <div class="col-start-1 mb-10">
            <input type="submit" id="anyadir" class="bverde" name="anyadir" value="Añadir animal">
            <a href="/animales" class="bverde">ver listado de animales</a>
        </div>

    </form>


@endsection
