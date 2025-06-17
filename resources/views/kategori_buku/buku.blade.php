@extends('layout.app')

@section('title', 'Daftar Buku per Kategori')

@section('content')
    <div class="container">
        <h2>Daftar Buku dalam Kategori Ini</h2>

        @if($buku->isEmpty())
            <p>Tidak ada buku dalam kategori ini.</p>
        @else
            <ul>
                @foreach ($buku as $item)
                    <li>{{ $item->judul }} - {{ $item->penulis }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
