<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Animal extends Model
{
    use HasFactory;

    protected $table = 'animales';
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function getEdad(){
        $fechaFormateada = Carbon::parse($this->fechaNacimiento);
        return $fechaFormateada->diffInYears(Carbon::now());
    }

    public function revisiones(){
        return $this->hasMany(Revision::class);
    }

    public function cuidadores(){
        return $this->belongsToMany(Cuidador::class);
    }

    public function imagenes(){
        return $this->hasOne(Imagen::class,'id');
    }
}
