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
                        <h3 class="mb-0">Clients</h3>
                        <a href="{{route('clients.create')}}" class="btn btn-success">
                            <i class="fas fa-plus me-1"></i> Nouveau client
                        </a>
                        </div>
                        <div class="stat-card">        
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="stat-card">
                                        <div class="table-responsive">
                                            <!--<nav class="navbar navbar-light bg-light">-->
                                                <form method="get" action="{{route('clients.search')}}" class="form-inline">
                                                   
                                                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Rechercher par nom client.." aria-label="Search">                                                            
                                                
                                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>                                                    
                                                       
                                                </form>
                                            <!--</nav>-->
                                            <table class="table data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Telephone</th>
                                                        <th>Email</th>
                                                        <th>Adresse</th>
                                                        <th>Statut</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($clients as $c)
                                                    <tr>
                                                        <td>{{$c->nom}}</td>
                                                        <td>{{$c->telephone ?? 'Vide'}}</td>
                                                        <td>{{$c->email ?? 'Vide'}}</td>
                                                        <td>{{$c->adresse ?? 'Vide'}}</td>
                                                        <td>
                                                            <a href="{{route('clients.edit', $c->id)}}">
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
                                        <div class="d-flex justify-content-center mt-4">
                                            {{$clients->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </section>

  @include('partials.footer')
