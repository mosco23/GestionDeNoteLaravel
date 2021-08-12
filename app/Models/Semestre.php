<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'libelle'];

    public function parcours()
    {
        return $this->hasMany(Parcours::class);
    }
}
