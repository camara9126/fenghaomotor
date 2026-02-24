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
               
                <div class="card col-md-10 shadow-sm">
                    <div class="card-body">
                        @if ($errors->any())
                            <div style="color: red; margin-bottom: 10px;">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                            <form method="post" action="{{route('produits.update', $produit->id)}}" class="contact-form">
                                @csrf
                                @method('PUT')
                                <h2 class="text-center mb-4">Modification produit</h2>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nom produit</label>
                                            <input type="text" class="form-control" name="nom" value="{{$produit->nom }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="stock_min" class="form-label">Stock Minimum</label>
                                            <input type="number" class="form-control" name="stock_min" value="{{$produit->stock_min }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6 mb-3 d-center">
                                        <label for="fournisseur" class="form-label">Fournisseur</label>
                                        <select class="form-select" name="fournisseur_id" id="">
                                            <option value="{{$produit->fournisseur->id}}">{{$produit->fournisseur->nom}}</option>
                                            
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3 d-center">
                                        <label for="fournisseur" class="form-label">Stock</label>
                                        <input type="text" readonly class="form-control" name="prix_achat" value="{{$produit->stock}}">
                                    </div>
                                    
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="prix achat" class="form-label">Prix d'achat</label>
                                            <input type="text" class="form-control" name="prix_achat" value="{{$produit->prix_achat }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="prix de vente" class="form-label">Prix de vente</label>
                                            <input type="text" class="form-control" name="prix_vente" value="{{$produit->prix_vente }}">
                                        </div>
                                    </div>
                                </div>                                        
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-warning btn-lg">Modifier</button>
                                </div>
                            </form>
                    </div>
                </div>
                   
            </section>

 @include('partials.footer')