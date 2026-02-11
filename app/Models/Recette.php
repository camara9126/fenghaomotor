<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    protected $fillable = [
        'user_id',
        'reference',
        'libelle',
        'description',
        'montant',
        'date_recette',
        'paiement_id',
        'mode_paiement',
        'statut'
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paiement()
    {
        return $this->belongsTo(Paiements::class, 'paiement_id');
    }

    public function categorie()
    {
        return $this->belongsTo(CategorieDepense::class, 'categorie_depense_id');
    }
}
