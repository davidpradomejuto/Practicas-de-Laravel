<?php

namespace App\Http\Controllers;

use Exception;
use PDOException;
use App\Models\Animal;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CrearAnimalRequest;

class AnimalController extends Controller
{
    public function index()
    {
        $animales = Animal::all();
        return view('animales.index', ['animales' => $animales]);
    }

    public function show(Animal $animal)
    {

        // try {
        //     $animal = Animal::where('especie', '=', $animal)->firstOrFail();
        // } catch (Exception $e) {
        //     echo ("Error general " . $e->getMessage());
        // }

        return view('animales.show', ['animal' => $animal]);
    }

    public function create()
    {
        return view('animales.create');
    }

    public function edit(Animal $animal)
    {
        // try {
        //     $animal = Animal::where('especie', '=', $animal)->firstOrFail();
        // } catch (Exception $e) {
        //     echo ("Error general" . $e->getMessage());
        // }

        return view('animales.edit', ['animal' => $animal]);
    }

    public function store(CrearAnimalRequest $request)
    {
        try {
            $a = new Animal();
            $a->especie = $request->especie;
            $a->slug = Str::slug($request->especie);
            $a->peso = $request->peso;
            $a->altura = $request->altura;
            $a->fechaNacimiento = $request->fechaNacimiento;
            if ($request->hasFile('imagen')) {
                /*
                    $imagen = $request->file('imagen');
                    $nombreImagen= uniqId().'-'.$imagen->getClientOriginalName();
                    $imagen->move( public_path('assets/imagenes'),$nombreImagen);
                */

                $a->imagen = $request->imagen->store('', 'imagenes');
            }
            $a->alimentacion = $request->alimentacion;
            $a->descripcion = $request->descripcion;
            $a->save();
            return redirect()->route('animales.show', ['animal' => $a->especie]);
        } catch (PDOException $e) {
            return "<p> " . $e->getMessage() . "</p>";
        }
    }
    public function update(Animal $animal, Request $request)
    {

        $request->validate(
            [
                'especie' => 'required|min:3',
                'altura' => 'required',
                'peso' => 'required',
                'fechaNacimiento' => 'required',
                'imagen' => 'image|mimes:jpg,jpeg,png,svg',
            ],
            [
                'especie.required' => 'el nombre es obligatorio',
                'altura.required' => 'La altura es obligatoria',
                'peso.required' => 'El peso es obligatorio',
                'fechaNacimiento.required' => 'La fecha de nacimiento es obligatoria',
                'imagen.required' => 'La imagen es obligatoria',
                'imagen.mimes' => 'El formato de la imagen no es valido',
            ]
        );


        try {
            $animal->especie = $request->especie;
            $animal->slug = Str::slug($request->especie);
            $animal->peso = $request->peso;
            $animal->altura = $request->altura;
            $animal->fechaNacimiento = $request->fechaNacimiento;
            if ($request->hasFile('imagen') && !empty($request->imagen) && $request->imagen->isValid()) {
                /*
                //elimino la anterior
                    $imagenAntigua=$animal->imagen;

                    //subo la imagen nueva
                    $imagen = $request->file('imagen');
                    $nombreImagen= uniqId().'-'.$imagen->getClientOriginalName();
                    $imagen->move( public_path('assets/imagenes'),$nombreImagen);
                */
                $path = $request->imagen->store('', 'imagenes');
                if ($animal->imagen) {
                    //elimino la imagen anterior de animal
                    Storage::disk('imagenes')->delete($animal->imagen);
                }
                $animal->imagen = $path;
            }
            $animal->alimentacion = $request->alimentacion;
            $animal->descripcion = $request->descripcion;
            $animal->save();
            return redirect()->route('animales.show', ['animal' => $animal->especie]);
        } catch (PDOException $e) {
            return "<p> " . $e->getMessage() . "</p>";
        }
    }
}
