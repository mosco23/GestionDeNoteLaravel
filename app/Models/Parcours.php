<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcours extends Model
{
    use HasFactory;

    public function annees()
    {
        return $this->belongsToMany(Annee::class);
    }

    public function mentions()
    {
        return $this->hasMany(Mention::class);
    }

    public function niveaux()
    {
        return $this->hasMany(Niveau::class);
    }

    public function semestres()
    {
        return $this->hasMany(Semestre::class);
    }

    public function specialites()
    {
        return $this->hasMany(Specialite::class);
    }

}
