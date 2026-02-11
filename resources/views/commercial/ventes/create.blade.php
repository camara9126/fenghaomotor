  @include('partials.header')

        <!-- Content Area -->
        <div class="container-fluid p-3 p-md-4" id="contentArea">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section">

                <div class="d-flex justify-content-between align-items-center mb-4">                          
                    <h3 class="mb-0">Nouvelle vente</h3>
                    <a href="{{route('ventes.index')}}" class="btn btn-danger">
                        <i class="fas fa-bar me-1"></i> Annuler
                    </a>
                </div>
                <div class="row justify-content-center">
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('danger') }}
                        </div>
                    @endif
                    <div class="col-8">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div style="color: red; margin-bottom: 10px;">
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                @endif
                                <h2>Nouvelle vente</h2>

                                <form action="{{ route('ventes.store') }}" method="POST" class="contact-form">
                                    @csrf
                                    {{-- CLIENT --}}
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Client</label><br>
                                                <select name="client_id" class="form-select" required>
                                                    <option value="">-- Sélectionner un client --</option>
                                                    @foreach($clients as $client)
                                                        <option value="{{ $client->id }}">
                                                            {{ ucfirst($client->nom) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>                                
                                        </div>
                                        <div class="col-4 mt-4">
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#clientModal">
                                                + Nouveau client
                                            </button>
                                        </div>
                                    </div>

                                    <hr>

                                    {{-- PRODUITS --}}
                                    
                                    <div class="row">
                                        <div class="col-6">
                                            <h4>Produits</h4>
                                        </div>
                                        <div class="col-6">
                                            <b>TVA ({{$entreprise->taux_tva}} %)</b>
                                        </div>
                                    </div>

                                    <table border="1" cellpadding="8" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Produit</th>
                                                <th>Quantité</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            {{-- PRODUIT --}}
                                            <tr>
                                                <td>
                                                    <select name="produits[0][produit_id]" class="form-select" required>
                                                        <option value="">-- Choisir --</option>
                                                        @foreach($produits as $produit)
                                                            <option value="{{ $produit->id }}">
                                                                {{ $produit->nom }} : prix de vente({{number_format($produit->prix_vente, 0, ',',' ')}} XOF)
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" name="produits[0][quantite]" class="form-control" min="1" value="1" required>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        Enregistrer la vente
                                    </button>
                                </form>
                               
                                <!-- Nouveau client -->
                                <div class="modal fade" id="clientModal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form method="post" action="{{route('clients.ajax.store')}}">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Nouveau client</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label>Nom du client</label>
                                                        <input type="text" name="nom" class="form-control" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Téléphone</label>
                                                        <input type="text" name="telephone" class="form-control">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label>Email</label>
                                                        <input type="email" name="email" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>

            </section>
   @include('partials.footer')
