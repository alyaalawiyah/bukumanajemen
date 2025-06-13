@extends('layout.app')

@section('title', 'Data Buku')

@section('content')
<div class="row">
    <div class="col-md-12">

        <div class="mb-3">
                    <form action="{{ route('buku.index') }}" method="GET" class="d-flex">
                        <input type="text" name="search" class="form-control me-2" placeholder="Cari Judul..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-outline-primary">Cari</button>
                    </form>
        </div>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Buku</h5>

                <div class="text-end mb-3">
                    <a href="{{ route('buku.create') }}" class="btn btn-success">Tambah</a>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Tahun Terbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $buku)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $buku->judul }}</td>
                            <td>{{ $buku->penulis }}</td>
                            <td>{{ $buku->tahun_terbit }}</td>
                            <td>
                                <a href="{{ route('buku.edit', $buku->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                 <ul class="pagination pagination-sm d-flex justify-content-center">
                <div class="mt-3">
                    {{ $books->appends(['search' => request('search')])->links() }}
                </div>
                </ul>

                <style>
                    .pagonation .page-link {
                        padding: 0.3rem 0.6rem;
                        font-size: 0.8rem;
                    }
                </style>

            </div>
        </div>
    </div>
</div>
@endsection
