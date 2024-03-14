<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = ["ville","region_id"];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    public function etablissement()
    {
        return $this->hasMany(Etablissement::class);
    }

    public function permutation()
    {
        return $this->hasMany(Permutation::class);
    }
}
