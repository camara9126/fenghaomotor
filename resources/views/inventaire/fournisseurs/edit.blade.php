@include('partials.header')
        
        <!-- Content Area -->
        <div class="container-fluid p-3 p-md-4" id="contentArea">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section">

                <div class="d-flex justify-content-between align-items-center mb-4">                          
                    <h3 class="mb-0">Fournisseurs</h3>
                    <a href="{{route('fournisseurs.index')}}" class="btn btn-danger">
                        <i class="fas fa-bar me-1"></i> Annuler
                    </a>
                </div>
                <div class="row justify-content-center">
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
                                    <form method="post" action="{{route('fournisseurs.update', $fournisseur)}}" class="contact-form">
                                        @csrf
                                        @method('PUT')
                                        <h2 class="text-center mb-4">Edit fournisseur ({{$fournisseur->statut ? 'Active' : 'Inactive'}})</h2>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nom</label>
                                            <input type="text" class="form-control" name="nom" value="{{$fournisseur->nom}}" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="telephone" class="form-label">Telephone</label>
                                            <input type="text" class="form-control" name="telephone" value="{{$fournisseur->telephone}}" >
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" name="email" value="{{$fournisseur->email}}" >
                                                </div>
                                                <div class="col-6">
                                                    <label for="email" class="form-label">Statut</label>
                                                    <select class="form-select" name="statut">
                                                        <option value="{{$fournisseur->statut ? 0 : 1}}" class="badge {{$fournisseur->statut ? 'bg->success' : 'bg-danger'}}" >{{$fournisseur->statut ? 'Active' : 'Inactive'}}</option>
                                                        <option value="1" class="badge bg-success">Active</option>
                                                        <option value="0" class="badge bg-danger">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="mb-3">
                                            <label for="adresse" class="form-label">Adresse</label>
                                            <textarea class="form-control" name="adresse" rows="5" >{{$fournisseur->adresse}}</textarea>
                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-warning btn-lg">Modifier</button>
                                        </div>
                                    </form>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </section>
@include('partials.footer')