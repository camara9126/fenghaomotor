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
                        <a href="{{route('ventes.create')}}" class="btn btn-success">
                            <i class="fas fa-plus me-1"></i> Nouveau commande
                        </a>
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
                                            <form method="get" action="{{route('ventes.search')}}" class="form-inline">
                                               
                                                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Rechercher par reference ou client..." aria-label="Search">                                                            
                                            
                                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>                                                    
                                            
                                            </form>
                                        <!--</nav>-->
                                        <table class="table data-table">
                                            <thead>
                                                <tr>
                                                    <th>Reference</th>
                                                    <th>Client</th>
                                                    <th>Total TTC</th>
                                                    <th>Montant Payer</th>
                                                    <th>Montant Restant</th>
                                                    <th>Date</th>
                                                    <th>Statut</th>
                                                    <th>Actions</th>
                                                    <th>Facture</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($ventes as $v)
                                                <tr>
                                                    <td>{{$v->reference}}</td>
                                                    <td>{{$v->client->nom ?? 'Client supprimee'}}</td>
                                                    <td>{{number_format($v->total_ttc, 0, ',',' ')}} XOF</td>
                                                    <td>{{number_format($v->montant_paye, 0, ',', ' ')}} XOF</td>
                                                    <td>{{number_format($v->montant_restant, 0, ',',' ')}} XOF</td>
                                                    <td>{{$v->created_at->format('d/m/y')}}</td>
                                                    <td>
                                                        @if($v->statut == 'payee')
                                                            <span class="status-badge badge-paid">{{$v->statut}}</span>
                                                        @elseif($v->statut == 'partielle')
                                                            <span class="status-badge badge-pending">{{$v->statut}}</span>
                                                        @else
                                                            <span class="status-badge badge bg-danger">{{$v->statut}}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($v->montant_restant == 0)
                                                            <button type="button" class="btn">
                                                                 Payée
                                                            </button>
                                                        @else
                                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-id="{{$v->id}}" data-bs-target="#paiementModal">
                                                            + Payer
                                                        </button>
                                                        @endif
                                                    </td>
                                                    @if($v->statut == 'payee')
                                                        <td>
                                                                <div class="row">
                                                                    <div class="col-3">
                                                                        <a href="{{route('ventes.show', $v->id)}}" class="btn btn-outline-warning mr-2" title="afficher la facture">
                                                                            <i class="fa fa-eye text-warning"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <a href="{{route('ventes.facture', $v->id)}}" class="btn btn-outline-primary ml-2" title="telecharger la facture">
                                                                            <i class="fas fa-file-invoice text-primary"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                        </td>
                                                    @else
                                                        <td>
                                                            <marquee behavior="" direction="">Pas encore disponnible !</marquee>
                                                        </td>
                                                    @endif                                                                  
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
                                        {{$ventes->links()}}
                                    </div>
                                </div>                                                                    
                            </div>
                        </div>
                        <!-- Modal paiement -->
                        <div class="modal fade" id="paiementModal" tabindex="-1">
                            <div class="modal-dialog">
                                <form action="{{ route('paiements.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Paiement</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="vente_id" id="vente_id">

                                            <div class="mb-3">
                                                <label>Montant à payer</label>
                                                <input type="number" name="montant" class="form-control" required>
                                            </div>

                                            <div class="mb-3">
                                                <label>Mode de paiement</label>
                                                <select name="mode_paiement" class="form-select" required>
                                                    <option value="cash">Cash</option>
                                                    <option value="wave">Wave</option>
                                                    <option value="orange_money">Orange Money</option>
                                                    <option value="banque">Banque</option>
                                                </select>
                                            </div>

                                            <button class="btn btn-success">
                                                Enregistrer le paiement
                                            </button>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>     
                    </div>
                </div>
            </section>
 <script>
        // Recuperation de l'ID de la vente
        document.addEventListener('DOMContentLoaded', function () {

            const modal = document.getElementById('paiementModal');

            modal.addEventListener('show.bs.modal', function (event) {

                const button = event.relatedTarget;

                const id = button.getAttribute('data-id');

                modal.querySelector('#vente_id').value = id;
            });
        });

        
    </script>
    @include('partials.footer')