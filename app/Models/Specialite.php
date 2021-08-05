<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    protected $fillable = ['code', 'libelle'];
    use HasFactory;

    public function parcours()
    {
        return $this->hasMany(Parcours::class);
    }
    
}
