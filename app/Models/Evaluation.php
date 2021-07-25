<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = ['ecue_id', 'code', 'libelle'];

    public function etudiants()
    {
        return $this->belongsToMany(Etudiant::class);
    }

    public function ecue()
    {
        return $this->belongsTo(Ecue::class);
    }
}
