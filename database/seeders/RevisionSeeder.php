<?php

namespace Database\Seeders;

use App\Models\Revision;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RevisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $revision = new Revision();
        $revision->descripcion='Operacion de cadera';
        $revision->animal_id = DB::table("animales")->first()->id;;
        $revision->fecha='2002-11-30';
        $revision->save();

        $revision = new Revision();
        $revision->descripcion='Operacion de cadera';
        $revision->animal_id =DB::table("animales")->first()->id;
        ;
        $revision->fecha='2002-11-30';
        $revision->save();

        $revision = new Revision();
        $revision->descripcion='Operacion de cadera';
        $revision->animal_id = 3;
        $revision->fecha='2002-11-30';
        $revision->save();

        $revision = new Revision();
        $revision->descripcion='Operacion de cadera';
        $revision->animal_id = 2;
        $revision->fecha='2002-11-30';
        $revision->save();
    }
}
