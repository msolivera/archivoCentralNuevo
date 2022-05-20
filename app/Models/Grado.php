<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

    //Relacion N->1 Muchos grados pueden tener 1 misma fuerza.
    public function fuerzas(){
        $this->belongsTo(Fuerza::class);
    }
    public function fichasPersonales()
    {
       return $this->hasMany(FichaPersonal::class);
    }
}
