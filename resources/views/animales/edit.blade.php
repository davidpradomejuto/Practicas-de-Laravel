@extends('layouts.plantilla')
@section('titulo','Editar')
@section('contenido')
<h1 class="text-2xl font-bold underline">Pagina para editar un animal llamado {{$animal['especie']}}</h1>

    <form action="" method="POST" enctype="multipart/form-data" class="flex flex-col gap-7 items-center justify-center">
        @csrf
        @method("put")
        <div class="mb-1">
            <p>
                <a>Especie del animal: </a>
                <input type="text" id="especie" name="especie" value="{{$animal['especie']}}" require>
            </p>
        </div>
        <div class="mb-1">
            <p>
                <a>Peso del animal: </a>
                <input type="text" id="peso" name="peso" value="{{$animal['peso']}}" require>
            </p>
        </div>
        <div class="mb-1">
            <p>
                <a>Altura del animal: </a>
                <input type="text" id="altura" name="altura" value="{{$animal['altura']}}" require>
            </p>
        </div>
        <div class="mb-1">
            <p>
                <a>Fecha de nacimiento del animal: </a>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="{{$animal['fechaNacimiento']}}" require>
            </p>
        </div>
        <div class="mb-1">
            <p>
                <a>Imagen del animal: </a>
                <input type="file" id="imagen" name="imagen" value="{{$animal['imagen']}}" require>
            </p>
        </div>
        <div class="mb-1">
            <p>
                <a>Alimentacion del animal: </a>
                <input type="text" id="alimentacion" name="alimentacion" value="{{$animal['alimentacion']}}" require>
            </p>
        </div>
        <div class="mb-1">
            <p>
                <p class="mb-1">Descripcion del animal: </p>
                <textarea id="descripcion" name="descripcion" style="height: 150px;width: 400px;" require>{{$animal['descripcion']}}</textarea>
            </p>

        </div>

        <div class="col-start-1 mb-10">
            <input type="submit" id="anyadir" class="bverde" name="anyadir" value="editar animal">
            <a href="{{ route('animales.index')}}" class="bverde">ver listado de animales</a>
        </div>
    </form>



@endsection
