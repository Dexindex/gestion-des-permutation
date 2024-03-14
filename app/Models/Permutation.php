<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permutation extends Model
{
    use HasFactory;
    protected $fillable = ['date','ville_id','formateur_id','valide'];

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }

    public function formateur()
    {
        return $this->belongsTo(Formateur::class);
    }

}
