<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    protected $fillable = ['libelle'];
    use HasFactory;

    public function parcours()
    {
        return $this->belongsToMany(Parcours::class);
    }
}
