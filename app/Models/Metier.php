<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metier extends Model
{
    use HasFactory;

    protected $fillable = ['metier'];


    public function formateur()
    {
        return $this->hasMany(Formateur::class);
    }
}
