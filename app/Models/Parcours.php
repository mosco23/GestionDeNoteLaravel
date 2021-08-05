<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcours extends Model
{
    protected $fillable = ['code', 'libelle', 'niveau_id', 'mention_id', 'semestre_id', 'specialite_id'];
    
    use HasFactory;

    public function annees()
    {
        return $this->belongsToMany(Annee::class);
    }

    public function ues()
    {
        return $this->belongsToMany(Ue::class);
    }

    public function mention()
    {
        return $this->belongsTo(Mention::class);
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

    public function semestre()
    {
        return $this->belongsTo(Semestre::class);
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }

}
