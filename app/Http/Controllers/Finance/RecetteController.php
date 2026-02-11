<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Paiements;
use App\Models\Recette;
use Illuminate\Http\Request;

class RecetteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $recettes = Recette::with('categorie')->latest()->simplePaginate(10);

        $paiements = Paiements::where('statut', 'valide')->with('vente.client')->orderBy('created_at', 'desc')->get();

        return view('finance.recettes.index', compact('recettes','paiements'));
    }
    

     public function search(Request $request)
    {
         $paiements = Paiements::where('statut', 'valide')->with('vente.client')->orderBy('created_at', 'desc')->get();

        $search = $request->query('search');

        $recettes = Recette::with('paiement')->when($search, function ($query, $search) {

                $query->where('reference', 'like', "%{$search}%")->orWhereHas('paiement', function ($q) use ($search) {

                        $q->where('reference', 'like', "%{$search}%");
                });

        })->latest()->paginate(10)->withQueryString(); // 🔑 garde ?search=;

        return view('finance.recettes.index', compact('paiements','recettes', 'search'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'montant' => 'required|numeric|min:0',
            'date_recette' => 'required|date',
            'mode_paiement' => 'required',
        ]);

        Recette::create([
            'user_id' => $request->user()->id,
            'reference' => 'REC-' . now()->timestamp,
            'libelle' => $request->libelle,
            'description' => $request->description,
            'montant' => $request->montant,
            'date_recette' => $request->date_recette,
            'paiement_id' => $request->paiement_id,
            'mode_paiement' => $request->mode_paiement,
        ]);

        return back()->with('success', 'Recette enregistrée avec succès');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
