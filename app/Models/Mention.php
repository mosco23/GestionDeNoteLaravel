<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mention extends Model
{
    protected $fillable = ['libelle', 'code'];
    use HasFactory;

    public function parcours()
    {
        return $this->hasMany(Parcours::class);
    }
}
