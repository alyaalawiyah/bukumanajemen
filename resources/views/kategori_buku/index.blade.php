@extends('layout.app')

@section('title', 'Kategori Buku')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Kategori Buku</h5>

                    <!-- <div class="text-end mb-3">
                        <a href="{{ route('kategori_buku.create') }}" class="btn btn-success">Tambah</a>
                    </div> -->

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $kategori_buku as $kategori )
                            <tr>
                                <td>{{ $kategori->id }}</td>
                                <td>{{ $kategori->nama_kategori }}</td>
                                <td>
                                    <a href="{{ route('kategori.buku', '$kategori->id') }}" class="btn btn-info btn-sm">Lihat</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
