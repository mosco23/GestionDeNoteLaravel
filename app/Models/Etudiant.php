<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = ['nce', 'nom', 'prenom'];

    public function ues()
    {
        return $this->belongsToMany(Ue::class);
    }

    public function evaluations()
    {
        return $this->belongsToMany(Evaluation::class)->withPivot('note');
    }

    
}
