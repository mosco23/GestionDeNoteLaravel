<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ue extends Model
{
    protected $fillable = ['code', 'libelle'];
    use HasFactory;

    public function etudiants()
    {
        return $this->belongsToMany(Etudiant::class);
    }

    public function ecues()
    {
        return $this->hasMany(Ecue::class);
    }

    public function parcours()
    {
        return $this->belongsToMany(Parcours::class);
    }
}
