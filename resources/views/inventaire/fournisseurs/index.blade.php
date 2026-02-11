@include('partials.header')
        
        <!-- Content Area -->
        <div class="container-fluid p-3 p-md-4" id="contentArea">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section">
                <!-- Stats Row -->
                
                <!-- Recent Orders -->
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-3">

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
                                <h3 class="mb-0">Fournisseurs</h3>
                                <a href="{{route('fournisseurs.create')}}" class="btn btn-success">
                                    <i class="fas fa-plus me-1"></i> Nouveau fournisseur
                                </a>
                        </div>
                        <div class="stat-card">        
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <!--<nav class="navbar navbar-light bg-light">-->
                                                <form method="get" action="{{route('fournisseurs.search')}}" class="form-inline">
                                                    
                                                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Rechercher par nom ou telephone..." aria-label="Search">                                                            
                                                
                                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>                                                    
                                                    
                                                </form>
                                            <!--</nav> -->
                                            <table class="table data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Telephone</th>
                                                        <th>Adresse</th>
                                                        <th>Email</th>
                                                        <th>Statut</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($fournisseurs as $f)
                                                    <tr>
                                                        <td>{{$f->nom}}</td>
                                                        <td>{{$f->telephone}}</td>
                                                        <td>{{$f->adresse}}</td>
                                                        <td>{{$f->email}}</td>
                                                        <td>
                                                            @if($f->statut)
                                                                <span class="badge bg-success">Activé</span>
                                                                @else
                                                                <span class="badge bg-danger">Desactivé</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{route('fournisseurs.edit', $f->id)}}">
                                                                <i class="fa fa-eye text-primary"></i>
                                                            </a>
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
                                    </div>                                    
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@include('partials.footer')