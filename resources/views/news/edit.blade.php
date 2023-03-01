@extends('template.app')

@section('content')
    @include('template.navbar')
    <div class="container mt-5 col-md-6 mx-auto">
        @if (session('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <a href="{{ route('home') }}" class="btn btn-warning mb-2">Kembali</a>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('news.update', $news['id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $news['title'] }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="banner" class="form-label">Banner</label>
                        <input class="form-control" type="file" id="banner" name="banner">
                        <div id="emailHelp" class="form-text">Hanya menerima file dengan extensi jpg,jpeg,png</div>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" rows="3" name="content" required>{{ $news['content'] }}</textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
