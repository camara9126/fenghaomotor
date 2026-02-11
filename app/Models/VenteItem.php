<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VenteItem extends Model
{
    protected $fillable = [
        'vente_id',
        'produit_id',
        'quantite',
        'prix_unitaire',
        'taux_tva',
        'montant_tva',
        'total_ttc',
        'total',
    ];

    public function vente()
    {
        return $this->belongsTo(Vente::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'entreprise_id');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
