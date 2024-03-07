<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Exception;
use PDOException;
use App\Models\Animal;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CrearAnimalRequest;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
{
    public function index()
    {
        $animales = Animal::all();
        return view('animales.index', ['animales' => $animales]);
    }

    public function destroy(Animal $animal)
    {
        try {
            DB::beginTransaction();

            // Obtener la imagen asociada al animal
            $imagen = $animal->imagen;

            // Si el animal tiene imagen la eliminamos del disco
            if ($imagen) {
                Storage::disk('imagenes')->delete($imagen->nombre);
            }
            $animal->delete();
            DB::commit();

        } catch (PDOException $e) {
            DB::rollBack();

            return redirect()->route('animales.index')->with('error', 'Error al eliminar el animal. Detalles: ' . $e->getMessage());
        }
        return redirect()->route('animales.index')->with('success', 'Animal Borrado');
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
            DB::beginTransaction();

            $a = new Animal();

            $a->especie = $request->especie;
            $a->slug = Str::slug($request->especie);
            $a->peso = $request->peso;
            $a->altura = $request->altura;
            $a->fechaNacimiento = $request->fechaNacimiento;
            $a->alimentacion = $request->alimentacion;
            $a->descripcion = $request->descripcion;

            if ($request->hasFile('imagen')) {
                /*
                    $imagen = $request->file('imagen');
                    $nombreImagen= uniqId().'-'.$imagen->getClientOriginalName();
                    $imagen->move( public_path('assets/imagenes'),$nombreImagen);
                */

                //$a->imagen = $request->imagen->store('', 'imagenes');
                /* Añado la imagen con el modelo*/
                $imagen = new Imagen();
                $nombre = $request->imagen->store('', 'imagenes');
                $imagen->url = 'assets/imagenes/' . $nombre;
                $imagen->nombre = $nombre;
                $imagen->save();
                //pongo el id de la imagen en la tabla animales
                $a->imagen_id = $imagen->id;
                $a->save();
                // y pongo el id del animal en la tabla imagenes
                $imagen->animal_id = $a->id;
                $imagen->save();
            }
            DB::commit();

            return redirect()->route('animales.show', ['animal' => $a])->with('success', 'Animal creado');
        } catch (PDOException $e) {
            DB::rollBack();
            return redirect()->route('animales.index')->with('error', 'Error al crear el aniaml. Detalles: ' . $e->getMessage());
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
            DB::beginTransaction();

            $animal->especie = $request->especie;
            $animal->slug = Str::slug($request->especie);
            $animal->peso = $request->peso;
            $animal->altura = $request->altura;
            $animal->fechaNacimiento = $request->fechaNacimiento;
            $animal->alimentacion = $request->alimentacion;
            $animal->descripcion = $request->descripcion;

            if ($request->hasFile('imagen') && !empty($request->imagen) && $request->imagen->isValid()) {
                /*//elimino la anterior
                $imagenAntigua=$animal->imagen;
                    //subo la imagen nueva
                    $imagen = $request->file('imagen');$nombreImagen= uniqId().'-'.$imagen->getClientOriginalName();$imagen->move( public_path('assets/imagenes'),$nombreImagen);*/
                //elimino la imagen anterior

                    //elimino la imagen anterior de animal
                Storage::disk('imagenes')->delete($animal->imagen->nombre);
                $animal->imagen->delete();
                /* Añado la imagen con el modelo*/
                $imagen = new Imagen();
                $nombre = $request->imagen->store('', 'imagenes');
                $imagen->url = 'assets/imagenes/' . $nombre;
                $imagen->nombre = $nombre;
                $imagen->animal_id= $animal->id;
                $imagen->save();
                //$path = $request->imagen->store('', 'imagenes');
                $animal->imagen_id = $imagen->id;
            }

            $animal->save();

            DB::commit();
            return redirect()->route('animales.show', ['animal' => $animal])->with('success', 'Animal editado');
        } catch (PDOException $e) {
            DB::rollBack();
            return redirect()->route('animales.show', compact('animal'))->with('error', 'Error al actualizar los datos del animal. Detalles: ' . $e->getMessage());

        }
    }
}
