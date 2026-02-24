  @include('partials.header')

        
        <!-- Content Area -->
        <div class="container-fluid p-3 p-md-4" id="contentArea">
            <!-- Dashboard Section -->
            <section id="dashboard" class="content-section">

                <div class="d-flex justify-content-between align-items-center mb-4">                          
                    <h3 class="mb-0">Modification client</h3>
                    <a href="{{route('clients.index')}}" class="btn btn-danger">
                        <i class="fas fa-bar me-1"></i> Annuler
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
                            <form method="post" action="{{route('clients.update', $client->id)}}" class="contact-form">
                                @csrf
                                @method('PUT')
                                <h2 class="text-center mb-4">Edit client</h2>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nom</label>
                                    <input type="text" class="form-control" name="nom" value="{{$client->nom}}">
                                </div>
                                <div class="mb-3">
                                    <label for="telephone" class="form-label">Telephone</label>
                                    <input type="text" class="form-control" name="telephone" value="{{$client->telephone}}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$client->email}}">
                                </div>
                                <div class="mb-3">
                                    <label for="adresse" class="form-label">Adresse</label>
                                    <textarea class="form-control" name="adresse" rows="5" >{{$client->adresse}}</textarea>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-warning btn-lg">Modifier</button>
                                </div>
                            </form>
                        
                    </div>
                </div>
                    
            </section>
  @include('partials.footer')
