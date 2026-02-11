<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use DB;
use App\Models\Produit;
use App\Models\Recette;
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

        /* Changement de mois */ 
        $mois = $request->mois ?? now()->month;
        $annee = $request->annee ?? now()->year;

        $produits = Produit::with('fournisseur')->limit(5)->latest()->get();

        $ventes = Vente::with('client')->limit(3)->latest()->get();

        /* 1️⃣ Commandes par mois */
        $commandesParJour = Vente::selectRaw('DAY(created_at) jour, COUNT(*) total')->whereMonth('created_at', $mois)->whereYear('created_at', $annee)->groupBy('jour')->orderBy('jour')->get();

        $commandesMoisLabels = $commandesParJour->pluck('jour');
        $commandesMoisData = $commandesParJour->pluck('total');

        return view('dashboard.index', compact('commandesMoisLabels','commandesMoisData','produits','ventes','entreprise','mois','annee')); 
    }

    // Comptabilite
    public function comptabilite()
    {
        $entreprise = request()->user()->entreprise;

        /* Changement de mois */ 
        $mois = $request->mois ?? now()->month;
        $annee = $request->annee ?? now()->year;


        /* 1️⃣ Commandes par mois */
        $commandesParJour = Vente::selectRaw('DAY(created_at) jour, COUNT(*) total')->whereMonth('created_at', $mois)->whereYear('created_at', $annee)->groupBy('jour')->orderBy('jour')->get();

        $commandesMoisLabels = $commandesParJour->pluck('jour');
        $commandesMoisData = $commandesParJour->pluck('total');

               /* 3️⃣ Top produits du mois */
        $topProduits = VenteItem::selectRaw('produit_id, SUM(quantite) as total')->whereMonth('created_at', $mois)->whereYear('created_at', $annee)->groupBy('produit_id')->orderByDesc('total')->with('produit:id,nom')->limit(5)->get();

        $topProduitsLabels = $topProduits->pluck('produit.nom');
        $topProduitsData = $topProduits->pluck('total');

        return view('dashboard.comptabilite', compact('commandesMoisLabels','commandesMoisData','topProduitsData','topProduitsLabels'));
    }


    // Calcule des rapport
    public function rapports(Request $request)
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



    public function rapport()
    {
        $entreprise = request()->user()->entreprise;

        $recettes = Vente::selectRaw('MONTH(created_at) as mois, COUNT(*) total')->whereYear('created_at', now()->year)->groupBy('mois')->pluck('total','mois');

        $depenses = Depense::selectRaw('MONTH(created_at) as mois, SUM(montant) as total')->whereYear('created_at', now()->year)->groupBy('mois')->pluck('total','mois');

        $labels = [];
        $dataRecettes = [];
        $dataDepenses = [];
        $dataBenefices = [];

        for ($i = 1; $i <= 12; $i++) {

            $labels[] = Carbon::create()->month($i)->translatedFormat('F');

            $r = $recettes[$i] ?? 0;
            $d = $depenses[$i] ?? 0;

            $dataRecettes[] = $r;
            $dataDepenses[] = $d;
            $dataBenefices[] = $r - $d;
        }

        return view('rapport', compact('labels','dataRecettes','dataDepenses','dataBenefices'));
    }
    
}
