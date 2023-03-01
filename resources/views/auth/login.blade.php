@extends('template.app')

@section('content')
    <div class="container mt-5 col-lg-6 mx-auto">
        @if (session('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Berita</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="Silahkan masukkan email" autocomplete="off" autofocus name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password"
                            placeholder="Silahkan Masukkan Password anda" name="password">
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <a href="https://github.com/ihsan759/BE-News" class="text-primary">Tekan untuk melihat akun</a>
            </div>
        </div>
    </div>
@endsection
