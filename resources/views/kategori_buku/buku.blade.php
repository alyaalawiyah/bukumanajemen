@extends('layout.app')

@section('title', 'Daftar Buku per Kategori')

@section('content')
    <div class="container">
        <h2>Daftar Buku dalam Kategori Ini</h2>

        @if($buku->isEmpty())
            <p>Tidak ada buku dalam kategori ini.</p>
        @else
            <ul class="">
                @foreach ($buku as $item)
                <div class="card mt-2">
                    <div class="card-body">
                        {{ $item->judul }} - {{ $item->penulis }}
                    </div>
                </div>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
