@extends('template.app')

@section('content')
    @include('template.navbar')
    <div class="container mt-5">
        <a href="{{ route('home') }}" class="btn btn-warning mb-2">Kembali</a>
        <div class="card">
            <div class="card-body">
                <img src="https://be-news-production.up.railway.app/storage/{{ $news['banner'] }}" alt="" class="rounded mx-auto d-block" style="height: 300px">
                <p class="text-center text-secondary mt-2">{{ $news['title'] }}</p>
                <p class="text-center text-secondary mt-1">Tanggal Pembuatan : {{ $news['updated_at'] }}</p>
                <p class="text-black mt-5">{{ $news['content'] }}</p>
            </div>
        </div>
    </div>
@endsection
