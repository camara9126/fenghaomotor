@include('partials.header')
        
        <!-- Content Area -->
        <div class="container-fluid p-3 p-md-4" id="contentArea">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section">   

                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('success') }}
                            </div>
                        @elseif(Session::has('danger'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('danger') }}
                            </div>
                        @endif
                        <!-- Section Produits -->
                         <div class="d-flex justify-content-between align-items-center mb-4">                          
                            <h3 class="mb-0">Produits</h3>
                            <a href="{{route('produits.create')}}" class="btn btn-success">
                                <i class="fas fa-plus me-1"></i> Nouveau produit
                            </a>
                        </div>
                        <div class="card shadow-sm">
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <!--<nav class="navbar navbar-light bg-light">-->
                                        <form method="get" action="{{route('produits.search')}}" class="form-inline">
                                            
                                            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Rechercher par nom produit ou fournisseur..." aria-label="Search">                                                            
                                        
                                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>                                                    
                                               
                                        </form>
                                    <!--</nav> -->
                                    <table class="table data-table">
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Nom</th>
                                                <th>Fournisseur</th>
                                                <th>Prix d'achat</th>
                                                <th>Prix de vente</th>
                                                <th>Stock</th>
                                                <th>Statut</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($produits as $p)
                                            <tr>
                                                <td>{{$p->code}}</td>
                                                <td>{{$p->nom}}</td>
                                                <td>{{$p->fournisseur->nom}}</td>
                                                <td>{{number_format($p->prix_achat, 0,'',' ')}} XOF</td>
                                                <td>{{number_format($p->prix_vente, 0,'',' ')}} XOF</td>
                                                <td>
                                                    @if($p->stock_min >= $p->stock)
                                                        <span class="badge bg-danger">Stock faible</span>
                                                    @else
                                                        {{$p->stock}}
                                                    @endif
                                                </td>
                                                <th>
                                                     @if($p->statut)
                                                        <span class="badge bg-success">Actif</span>
                                                    @else
                                                        <span class="badge bg-danger">Inactif</span>
                                                    @endif
                                                </th>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <a href="{{route('produits.edit', $p->id)}}">
                                                                <i class="fa fa-eye text-primary"></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-4">
                                                             @if($p->statut)
                                                                <form action="{{route('produits.destroy', $p->id)}}" type="button" method="post" onsubmit="return confirm('Desactiver ?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-outline-danger" title="desactiver">
                                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                                    </button>
                                                                </form>
                                                             @else
                                                                <form action="{{route('produits.destroy', $p->id)}}" type="button" method="post" onsubmit="return confirm('Activer ?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-outline-success" title="activer">
                                                                        <i class="fa-solid fa-check" aria-hidden="true"></i>
                                                                    </button>
                                                                </form>
                                                                @endif 
                                                        </div>
                                                    </div>   
                                                </td>                                                        
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" align="center">Donnee vide !</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-center mt-4">
                                    {{$produits->links()}}
                                </div>                                 
                            </div>
                        </div>
            </section>
  @include('partials.footer')