@extends('template.app')

@section('content')
    @include('template.navbar')
    <div class="container mt-5">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('alert'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('alert') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <a href="{{ route('news.create') }}" class="btn btn-info mb-2 text-white">Buat Berita</a>
        <table class="table table-light table-hover text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Banner</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $article)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $article['title'] }}</td>
                        <td><img src="https://be-news-production.up.railway.app/storage/{{ $article['banner'] }}" alt="" style="height: 50px"></td>
                        <td>
                            <form action="{{ route('news.destroy', $article['id']) }}" method="post">
                                @csrf
                                <a href="{{ route('news.edit', $article['id']) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('news.detail', $article['id']) }}" class="btn btn-success">Detail</a>
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah anda ingin menghapus berita ini ?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
