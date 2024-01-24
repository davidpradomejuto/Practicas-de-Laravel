<?php

namespace App\Http\Controllers;

use App\Models\Revision;
use App\Models\Animal;
use Exception;
use Illuminate\Http\Request;

class RevisionesController extends Controller
{
    public function create(Animal $animal){
        // $animal = Animal::where('especie', '=', $animal)->firstOrFail();
        return view('revisiones.create',["animal" => $animal]);
    }

    public function store(Request $request){
        try{
            $revision = new Revision();
            $revision->descripcion = $request->descripcion;
            $revision->fecha = $request->fecha;
            $revision->animal_id = $request->animal_id;
            $revision->save();

            $animal = Animal::where('id', '=', $request->animal_id)->firstOrFail();

            return redirect()->route('animales.show', ['animal' => $animal->especie]);

        }catch(Exception $e){
            echo ("Error general" . $e->getMessage());
        }

    }
}
