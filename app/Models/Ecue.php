<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecue extends Model
{
    protected $fillable = ['nbreCredit', 'ue_id', 'libelle'];
    use HasFactory;

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function ue()
    {
        return $this->belongsTo(Ue::class);
    }
}
