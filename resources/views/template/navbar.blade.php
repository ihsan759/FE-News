<nav class="navbar navbar-expand-lg bg-info">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ route('home') }}">Berita</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            </ul>
            <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Menu
                </button>
                <ul class="dropdown-menu">
                    <li><button type="button" class="btn btn-primary dropdown-item" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Edit Password
                        </button></li>
                    <li>
                        <form action="{{ route('logout') }}" method="post" class="d-grid dropdown-item">
                            @csrf
                            <button type="submit" class="btn btn-danger">Keluar</button>
                        </form>
                    </li>
                </ul>
            </div>
            {{-- <form action="{{ route('logout') }}" method="post" class="d-grid">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form> --}}

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Password</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('profile.update') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button class="btn btn-primary" type="submit">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
