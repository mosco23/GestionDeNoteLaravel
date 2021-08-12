<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'libelle'];

    public function parcours()
    {
        return $this->hasMany(Parcours::class);
    }
}
