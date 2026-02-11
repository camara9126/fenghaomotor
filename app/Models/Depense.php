<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    protected $fillable = [
        'user_id',
        'reference',
        'libelle',
        'description',
        'montant',
        'date_depense',
        'categorie_depense_id',
        'mode_paiement',
        'statut',
    ];

    public function categorie()
    {
        return $this->belongsTo(CategorieDepense::class, 'categorie_depense_id');
    }
}
