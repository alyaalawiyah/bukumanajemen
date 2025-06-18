@extends('layout.app')

@section('title', 'Buku per Kategori')

@section('content')
    <div class="container">
        <h2>Daftar Buku dalam Kategori: {{ $kategori->nama_kategori }}</h2>

        @forelse ($kategori->bukus as $buku)
            <div>
                <strong>{{ $buku->judul }}</strong> - {{ $buku->penulis }}
            </div>
        @empty
            <p>Tidak ada buku dalam kategori ini.</p>
        @endforelse
    </div>
@endsection
