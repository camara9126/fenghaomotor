<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'telephone',
        'adresse',
        'devise',
        'logo',
        'statut',
        'taux_tva',
        'pack_id',
        'trial_fin',
        'trial_actif',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }


    public function produits()
    {
        return $this->hasMany(Produit::class,'fournisseur_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    //Recette
    public function recettes()
    {
        return $this->hasMany(Recette::class);
    }

    public function items()
    {
        return $this->hasMany(VenteItem::class);
    }

    // Depense
    public function depenses()
    {
        return $this->hasMany(Depense::class);
    }

     // Rendre les indicateurs accessibles partout
    protected $appends = [
        'total_depenses',
        'total_recettes',
        'tresorerie',
        'resultat',
        'statut_solvabilite',
    ];
 

    // Statut solvabilite
    public function getStatutSolvabiliteAttribute()
    {
        if($this->tresorerie > 0) {
            return 'solvable';
        }

        if($this->tresorerie == 0) {
            return 'equilibre';
        }

        return 'insolvable';
    }

   
}
