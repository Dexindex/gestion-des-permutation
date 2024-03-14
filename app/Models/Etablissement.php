<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;
    protected $fillable = ['etablissement', 'code', 'adresse', 'tel', 'fax','ville_id'];


    public function formateur()
    {
        return $this->hasMany(Formateur::class);
    }
    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }
}
