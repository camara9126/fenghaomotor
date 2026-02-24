@include('partials.header')
        
        <!-- Content Area -->
        <div class="container-fluid p-3 p-md-4" id="contentArea">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section"> 

                <div class="d-flex justify-content-between align-items-center mb-4">                          
                    <h3 class="mb-0">Produits</h3>
                    <a href="{{route('produits.index')}}" class="btn btn-danger">
                        <i class="fas fa-bar me-1"></i> Retour
                    </a>
                </div>
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('danger') }}
                        </div>
                    @endif
                    <div class="card col-md-10 shadow-sm">
                        <div class="card-body">
                            @if ($errors->any())
                                <div style="color: red; margin-bottom: 10px;">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                                <form method="post" action="{{route('produits.store')}}" class="contact-form">
                                    @csrf
                                    <h2 class="text-center mb-4">Nouveau produit</h2>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nom produit</label>
                                                <input type="text" class="form-control" name="nom" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="stock_min" class="form-label">Stock Minimum</label>
                                                <input type="number" class="form-control" name="stock_min" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6 d-center">
                                            <label for="fournisseur" class="form-label">Fournisseur</label>
                                            <select class="form-select" name="fournisseur_id" id="type_maison">
                                                <option value="">-- Fournisseur --</option>
                                                @foreach($fournisseurs as $f)
                                                <option value="{{$f->id}}">{{ucfirst($f->nom)}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-4 mt-4">
                                        <button type="button" class="form-control text-white bg-success" data-bs-toggle="modal" data-bs-target="#fournisseurModal">
                                            + Nouveau
                                        </button>
                                    </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="prix achat" class="form-label">Prix d'achat</label>
                                                <input type="text" class="form-control" name="prix_achat" >
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="prix de vente" class="form-label">Prix de vente</label>
                                                <input type="text" class="form-control" name="prix_vente" >
                                            </div>
                                        </div>
                                    </div>                                        
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary btn-lg">Enregister</button>
                                    </div>
                                </form>
                            
                                <!-- Nouveau client -->
                                <div class="modal fade" id="fournisseurModal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <form method="post" action="{{route('fournisseurs.ajax.store')}}">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Nouveau fournisseur</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label>Nom du fournisseur</label>
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
                                                    <div class="mb-3">
                                                        <label>Adresse</label>
                                                        <textarea class="form-control" name="adresse" rows="5" ></textarea>
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