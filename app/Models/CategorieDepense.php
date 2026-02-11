<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategorieDepense extends Model
{
    protected $fillable = [
        'nom',
    ];

    public function depense()
    {
        return $this->hasMany(Depense::class);
    }

    public function recette()
    {
        return $this->hasMany(Recette::class);
    }
}
