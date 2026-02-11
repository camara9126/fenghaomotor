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


    public function produit()
    {
        return $this->belongsTo(Produit::class);
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

    // Total recettes encaisse
    public function getTotalRecettesAttribute()
    {
        return $this->recettes()->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->where('statut','recu')->sum('montant');
    }

    // Total depense 
    public function getTotalDepensesAttribute()
    {
        return $this->depenses()->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->sum('montant');
    }

    // Tresorerie nette
    public function getTresorerieAttribute()
    {
        return $this->total_recettes - $this->total_depenses;
    }

    // Resultat (benefice/perte)
     public function getResultatAttribute()
    {
        return $this->total_recettes - $this->total_depenses;
    }

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
