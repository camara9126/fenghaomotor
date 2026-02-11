<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Fournisseur;
use App\Models\Pack;
use App\Models\Produit;
use App\Models\Recette;
use App\Models\StockMouvement;
use App\Models\Vente;
use App\Models\VenteItem;
use Carbon\Carbon;
use Illuminate\Http\Request;

//use function Symfony\Component\Clock\now;

class DashboardController extends Controller
{
    // Accueil
    public function index()
    {
        $entreprise = request()->user()->entreprise;

        $fournisseurs = Fournisseur::limit(3)->latest()->get();
        $produits = Produit::with('fournisseur')->limit(3)->latest()->get();
        $mouvements_ent = StockMouvement::where('type', 'entree')->limit(3)->latest()->get();
        $mouvements_sor = StockMouvement::where('type', 'sortie')->limit(3)->latest()->get();

        $clients = Client::limit(3)->latest()->get();
        $ventes = Vente::with('client')->limit(3)->latest()->get();

        return view('dashboard.index', compact('produits','fournisseurs','mouvements_ent','mouvements_sor','clients','ventes','entreprise')); 
    }

    // Comptabilite
    public function comptabilite()
    {
        return view('dashboard.comptabilite');
    }


    // Calcule des rapport
    public function rapport(Request $request)
    {

        $entreprise = request()->user()->entreprise;

        /* Changement de mois */ 
        $mois = $request->mois ?? now()->month;
        $annee = $request->annee ?? now()->year;


        /* 1️⃣ Commandes par mois */
        $commandesParJour = Vente::selectRaw('DAY(created_at) jour, COUNT(*) total')->whereMonth('created_at', $mois)->whereYear('created_at', $annee)->groupBy('jour')->orderBy('jour')->get();

        $commandesMoisLabels = $commandesParJour->pluck('jour');
        $commandesMoisData = $commandesParJour->pluck('total');


        /* 2️⃣ Chiffre d’affaires par mois */
        $caParMois = Recette::selectRaw('MONTH(created_at) as mois, SUM(montant) as total')->whereMonth('created_at', $mois)->whereYear('created_at', $annee)->where('statut', 'recu')->groupBy('mois')->orderBy('mois')->get();

        $caLabels = $caParMois->pluck('mois')->map(fn ($m)=>
            Carbon::create()->month($m)->translatedFormat('M')
        );
        $caData = $caParMois->pluck('total');


        /* 3️⃣ Top produits du mois */
        $topProduits = VenteItem::selectRaw('produit_id, SUM(quantite) as total')->whereMonth('created_at', $mois)->whereYear('created_at', $annee)->groupBy('produit_id')->orderByDesc('total')->with('produit:id,nom')->limit(5)->get();

        $topProduitsLabels = $topProduits->pluck('produit.nom');
        $topProduitsData = $topProduits->pluck('total');


        /* 4️⃣ Statut des commandes */
        $statutCommandes = Vente::selectRaw('statut, COUNT(*) as total')->whereMonth('created_at', $mois)->whereYear('created_at', $annee)->groupBy('statut')->get();

        $statutLabels = $statutCommandes->pluck('statut');
        $statutData = $statutCommandes->pluck('total');


        return view('dashboard.rapport', compact('commandesMoisLabels','commandesMoisData','caLabels','caData','topProduitsLabels','topProduitsData','statutLabels','statutData', 'entreprise'));
    }


    // Changement de mois
    public function stats(Request $request)
    {
        $mois = $request->month;
        $annee = $request->year;

        /* 1️⃣ Commandes par jour du mois */
        $commandes = Vente::selectRaw('DAY(created_at) jour, COUNT(*) total')->whereMonth('created_at', $mois)->whereYear('created_at', $annee)->groupBy('jour')->orderBy('jour')->get();


        /* 2️⃣ Chiffre d'affaires */
        $ca = Recette::whereMonth('created_at', $mois)->whereYear('created_at', $annee)->sum('montant');


        /* 3️⃣ Top produits */
        $produits = VenteItem::selectRaw('produit_id, SUM(quantite) total')->whereMonth('created_at', $mois)->whereYear('created_at', $annee)->groupBy('produit_id')->with('produit:id,nom')->orderByDesc('total')->limit(5)->get();


        /* 4️⃣ Statut commandes */
        $statuts = Vente::selectRaw('statut, COUNT(*) total')->whereMonth('created_at', $mois)->whereYear('created_at', $annee)->groupBy('statut')->get();

        return response()->json(['commandes' => $commandes,'ca' => $ca,'produits' => $produits,'statuts' => $statuts,]);
    }

    
}
