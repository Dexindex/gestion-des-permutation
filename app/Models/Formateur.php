<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    use HasFactory;
    protected $fillable = ['matricule', 'nom', 'prenom', 'photo', 'grade', 'date_naissance', 'date_recrutement', 'poste', 'tel', 'email', 'password', 'etablissement_id', 'metier_id'];


    public function permutation()
    {
        return $this->hasMany(Permutation::class);
    }
    public function metier()
    {
        return $this->belongsTo(Metier::class);
    }
    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }


}

