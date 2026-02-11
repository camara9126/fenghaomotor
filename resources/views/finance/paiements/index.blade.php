  @include('partials.header')

        
        <!-- Content Area -->
        <div class="container-fluid p-3 p-md-4" id="contentArea">
            <!-- Dashboard Section -->
            <section id="" class="content-section">
                <!-- Stats Row -->
                
                <!-- Recent Orders -->
                <div class="row">
                     @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('danger') }}
                        </div>
                    @endif
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-3">

                           
                    <!-- Section Produits -->
                        <h3 class="mb-0">Commandes</h3>
                        <!--<a href="{{route('ventes.create')}}" class="btn btn-success">
                            <i class="fas fa-plus me-1"></i> Nouveau commande
                        </a>-->
                        </div>
                        <div class="stat-card">        
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div style="color: red; margin-bottom: 10px;">
                                            @foreach ($errors->all() as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="table-responsive">
                                        <!--<nav class="navbar navbar-light bg-light">-->
                                            <form method="get" action="{{route('paiements.search')}}" class="form-inline">
                                               
                                                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Rechercher par reference..." aria-label="Search">                                                            
                                            
                                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>                                                    
                                            
                                            </form>
                                        <!--</nav>-->
                                        <table class="table data-table">
                                            <thead>
                                                <tr>
                                                    <th>Reference</th>
                                                    <th>Client</th>
                                                    <th>Montant</th>
                                                    <th>Date de paiement</th>
                                                    <th>Mode de paiement</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($paiements as $p)
                                                <tr>
                                                    <td>{{$p->reference}}</td>
                                                    <td>{{optional($p->vente->client)->nom ?? '-'}}</td>
                                                    <td>{{max(0, number_format($p->montant, 0, ',',' '))}} XOF</td>
                                                    <td>{{$p->date_paiement}}</td>
                                                    <td>{{$p->mode_paiement}}</td>
                                                    <td>
                                                        @if($p->statut === 'valide')
                                                            <form action="{{ route('paiements.annuler', $p->id) }}" method="POST" onsubmit="return confirm('Confirmer l’annulation du paiement ?')">
                                                                @csrf
                                                                @method('PUT')
                                                                <button class="btn btn-outline-danger btn-sm">
                                                                    Annuler le paiement
                                                                </button>
                                                            </form>
                                                        @endif                                    
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
                                        {{$paiements->links()}}
                                    </div>
                                </div>                                                                    
                            </div>
                        </div> 
                    </div>
                </div>
            </section>
  @include('partials.footer')
