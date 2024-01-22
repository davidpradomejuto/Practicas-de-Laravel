@extends('layouts.plantilla')
@section('titulo','Editar')
@section('contenido')
<h1 class="text-2xl font-bold underline">Pagina para editar un animal llamado {{$animal['especie']}}</h1>

    <form action="{{route('animales.update',$animal)}}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-7 items-center justify-center">


            @if ($errors->any())
                @foreach ($errors->all() as  $error)
                    <p class='bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded'> {{$error}}</p>
                @endforeach
            @endif

        @csrf
        @method("put")
        <div class="mb-1">
            <p>
                <a>Especie del animal: </a>
                <input type="text" id="especie" name="especie" value="{{$animal['especie']}}" require>
                @if($errors->has('especie'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">{{ $errors->first('especie') }}</div>
                @endif
            </p>
        </div>
        <div class="mb-1">
            <p>
                <a>Peso del animal: </a>
                <input type="text" id="peso" name="peso" value="{{$animal['peso']}}" require>
                @if($errors->has('peso'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">{{ $errors->first('peso') }}</div>
                @endif
            </p>
        </div>
        <div class="mb-1">
            <p>
                <a>Altura del animal: </a>
                <input type="text" id="altura" name="altura" value="{{$animal['altura']}}" require>
                @if($errors->has('altura'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">{{ $errors->first('altura') }}</div>
                @endif
            </p>
        </div>
        <div class="mb-1">
            <p>
                <a>Fecha de nacimiento del animal: </a>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="{{$animal['fechaNacimiento']}}" require>
                @if($errors->has('fechaNacimiento'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">{{ $errors->first('fechaNacimiento') }}</div>
                @endif
            </p>
        </div>
        <div class="mb-1">
            <p>
                <a>Imagen del animal: </a>
                <input type="file" id="imagen" name="imagen" value="{{$animal->imagen}}" require>
                @if($errors->has('imagen'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">{{ $errors->first('imagen') }}</div>
                @endif
            </p>
        </div>
        <div class="mb-1">
            <p>
                <a>Alimentacion del animal: </a>
                <input type="text" id="alimentacion" name="alimentacion" value="{{$animal->alimentacion}}" require>
                @if($errors->has('alimentacion'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">{{ $errors->first('alimentacion') }}</div>
                @endif
            </p>
        </div>
        <div class="mb-1">
            <p>
                <p class="mb-1">Descripcion del animal: </p>
                <textarea id="descripcion" name="descripcion" style="height: 150px;width: 400px;" require>{{$animal->descripcion}}</textarea>
                @if($errors->has('descripcion'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">{{ $errors->first('descripcion') }}</div>
                @endif
            </p>

        </div>

        <div class="col-start-1 mb-10">
            <input type="submit" id="anyadir" class="bverde" name="anyadir" value="editar animal">
            <a href="{{ route('animales.index')}}" class="bverde">ver listado de animales</a>
        </div>
    </form>



@endsection
