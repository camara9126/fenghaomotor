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
                            <h3 class="mb-0">Utilisateurs</h3>
                            <a href="{{route('user.adduser')}}" class="btn btn-success">
                                <i class="fas fa-plus me-1"></i> Nouveau utilisateur
                            </a>
                        </div>
                        <div class="card shadow-sm">
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table class="table data-table">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($users as $u)
                                            <tr>
                                                <td>{{$u->name}}</td>
                                                <td>{{$u->email}}</td>
                                                <td>{{$u->role}}</td>
                                                <td>
                                                    <form action="{{ route('user.destroy', $u) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm">
                                                            <i class="fa fa-trash text-danger"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                
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
            </section>
  @include('partials.footer')