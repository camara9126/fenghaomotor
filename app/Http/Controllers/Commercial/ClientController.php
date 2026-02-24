<?php

namespace App\Http\Controllers\Commercial;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ClientController extends Controller
{
     use AuthorizesRequests;


    public function index(Request $request)
    {
        $this->authorize('gerer-ventes');

        $clients = Client::latest()->simplePaginate(10);

        return view('commercial.clients.index', compact('clients'));
    }

    public function search(Request $request)
    {
        $search = $request->query('search');

        $clients = Client::when($search, function ($query, $search) {

                $query->where('nom', 'like', "%{$search}%");

        })->latest()->paginate(10)->withQueryString(); // 🔑 garde ?search=;

        return view('commercial.clients.index', compact('clients','search'));
    }


    public function create()
    {

        return view('commercial.clients.create');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'telephone' => 'nullable|string',
            'email' => 'nullable|email',
            'adresse' => 'nullable|string',
        ]);

        Client::create([
            'nom' => $request->nom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'adresse' => $request->adresse,
        ]);

        return redirect()->route('clients.index')->with('success', 'Client ajouté');
    }


    public function edit(Client $client)
    {

        return view('commercial.clients.edit', compact('client'));
    }
    

    public function update(Request $request, Client $client)
    {

        $request->validate([
            'nom' => 'required|string|max:255',
            'telephone' => 'nullable|string',
            'email' => 'nullable|email',
            'adresse' => 'nullable|string',
        ]);

        $client->update($request->only(
            'nom',
            'telephone',
            'email',
            'adresse'
        ));

        return redirect()->route('clients.index')->with('success', 'Client modifié');

    }

     /**
     * Remove the specified resource from storage.
     */
     public function destroy(string $id)
    {
         $client= Client::findOrFail($id);

         $client->destroy($id);

        return redirect()->route('clients.index')->with('success', ' client supprimé avec succès');        

    }
    

    // Creation nouveau client depuis la section 'Vente'
    public function storeAjax(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'telephone' => 'nullable|string',
            'email' => 'nullable|email',
        ]);

        Client::create([
            'nom' => $request->nom,
            'telephone' => $request->telephone,
            'email' => $request->email,
        ]);

        return redirect()->route('ventes.create')->with('success', 'Nouveau client ajouté');
    }

}
