<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'fournisseur_id',
        'nom',
        'code',
        'prix_achat',
        'prix_vente',
        'stock',
        'stock_min',
        'statut',
    ];

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
