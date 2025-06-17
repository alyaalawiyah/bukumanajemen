<h2>Buku dalam kategori: {{ $kategori->nama_kategori }}</h2>

@forelse ($kategori->bukus as $buku)
    <p>{{ $buku->judul }} - {{ $buku->penulis }}</p>
@empty
    <p>Tidak ada buku dalam kategori ini.</p>
@endforelse
