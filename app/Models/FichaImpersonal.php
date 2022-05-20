<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaImpersonal extends Model
{
    use HasFactory;
    public function fichasPersonales(){
        return $this->belongsToMany(FichaPersonal::class);
    }
}
