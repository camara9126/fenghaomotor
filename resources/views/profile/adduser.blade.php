@include('partials.header')
                
        <!-- Content Area -->
        <div class="container-fluid p-3 p-md-4" id="contentArea">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section">
                
                <div class="d-flex justify-content-between align-items-center mb-4">                          
                    <h3 class="mb-0">Utilisateur</h3>
                    <a href="{{route('user.compte')}}" class="btn btn-danger">
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
                                <form method="post" action="{{route('user.store')}}" class="contact-form">
                                    @csrf
                                    <h2 class="text-center mb-4">Nouveau Utilisateur</h2>
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nom Utilisateur</label>
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Role</label>
                                            <select class="form-select" name="role" id="role" required>
                                                <option value="admin">Administrateur</option>
                                                <option value="gestionnaire  de stock">Gestionnaire de stock</option>
                                                <option value="caissier">Caissier</option>
                                            </select> 
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Mot de passe</label>
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirmation mot de passe</label>
                                            <input type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary btn-lg">Enregister</button>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    @include('partials.footer')
