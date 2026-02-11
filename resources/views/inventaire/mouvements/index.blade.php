@include('partials.header')
        
        <!-- Content Area -->
        <div class="container-fluid p-3 p-md-4" id="contentArea">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section">
            
                <!-- Historiques Mouvements -->

                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @elseif(Session::has('danger'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('danger') }}
                    </div>
                @endif

                <div class="row mb-4">
                    <h5 class="mb-4">Historique des mouvements</h5>
                        <div class="col-lg-6">
                             
                            <button type="button" class="btn btn-success " data-bs-toggle="modal" data-bs-target="#entreeModal">
                                + Nouveau mouvement entree
                            </button>

                            <!-- Liste mouvement entree-->
                            <div class="list-group list-group-flush">
                                <div class="table-responsive">
                                    <table class="table data-table">
                                        <thead>
                                            <tr>
                                                <th>Reference</th>
                                                <th>Produit</th>
                                                <th>Quantite</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($mouvements_ent as $m)
                                            <tr>
                                                <td><strong>{{$m->reference}}</strong></td>
                                                <td>{{$m->produit->nom}}</td>
                                                <td>{{$m->quantite}}</td>
                                                <td>{{$m->created_at->format('j / F / Y')}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                 <div class="d-flex justify-content-center mt-4">
                                    {{$mouvements_ent->links()}}
                                </div>
                            </div>
                             <!-- Modal Nouveau mouvement entree-->
                            <div class="modal fade" id="entreeModal" tabindex="-1">
                                <div class="modal-dialog">
                                    <form method="post" action="{{route('stock.entree')}}">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Mouvement Entree</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label>Produit</label>
                                                    <select class="form-control" name="produit_id" id="exampleFormControlSelect1">
                                                        <option value="">-- Veuillez choisir un produit --</option>
                                                        @foreach($produits as $p)
                                                        <option value="{{$p->id}}">{{$p->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Quantite</label>
                                                    <input type="number" name="quantite" min="1" class="form-control" id="exampleInputquantity1">
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
                    <div class="col-lg-6">
                            <button type="button" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#sortieModal">
                                + Nouveau mouvement sortie
                            </button>
                        
                            <!-- Liste mouvement sortie-->
                            <div class="list-group list-group-flush">
                                <div class="table-responsive">
                                    <table class="table data-table">
                                        <thead>
                                            <tr>
                                                <th>Reference</th>
                                                <th>Produit</th>
                                                <th>Quantite</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($mouvements_sor as $m)
                                            <tr>
                                                <td><strong>{{$m->reference}}</strong></td>
                                                <td>{{$m->produit->nom}}</td>
                                                <td>{{$m->quantite}}</td>
                                                <td>{{$m->created_at->format('j / F / Y')}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                 <div class="d-flex justify-content-center mt-4">
                                    {{$mouvements_sor->links()}}
                                </div>
                            </div>
                            
                            
                            <!-- Modal Nouveau mouvement sortie-->
                            <div class="modal fade" id="sortieModal" tabindex="-1">
                                <div class="modal-dialog">
                                    <form method="post" action="{{route('stock.sortie')}}">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Mouvement Sortie</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label>Produit</label>
                                                    <select class="form-control" name="produit_id" id="exampleFormControlSelect1">
                                                        <option value="">-- Veuillez choisir un produit --</option>
                                                        @foreach($produits as $p)
                                                        <option value="{{$p->id}}">{{$p->nom}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label>Quantite</label>
                                                    <input type="number" name="quantite" min="1" class="form-control" id="exampleInputquantity1">
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
            </section>

@include('partials.footer')