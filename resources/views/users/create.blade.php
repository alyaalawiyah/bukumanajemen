@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@extends('layout.app')

@section('title', 'Tambah Buku')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah Buku</h5>

                <form action="{{ route('buku.store') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="penulis">Penulis</label>
                        <input type="text" name="penulis" id="penulis" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="tahun_terbit">Tahun terbit</label>
                        <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
