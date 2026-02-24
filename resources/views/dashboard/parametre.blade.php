  @include('partials.header')

        
        <!-- Content Area -->
        <div class="container-fluid p-3 p-md-4" id="contentArea">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section">
                <!-- Stats Row -->
                
                <!-- Recent Orders -->>
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
                            <div class="card col-md-10 shadow-sm">
                                <div class="card-body">
                                    <div class="stat-card">
                                       
                                        <div class="px-2 py-2 mt-0">
                                            <h2 class="fw-bold mb-3">Nous Contactez</h2>
                                            <ul class="nav flex-column">
                                                <li>Email : bmanager@bcmgroupe.com</li>
                                                <li>Telephone : +221 76 280 88 39</li>
                                                <li>Whatsapp : <a href="https://wa.me/+221783739364" class="" target="_blank"><i class="fa-brands fa-whatsapp text-success" ></i></a></li>
                                                <li></li>
                                                <li></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
            </section>

  @include('partials.footer')
