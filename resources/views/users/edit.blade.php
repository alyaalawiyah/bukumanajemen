@extends('layout.app')

@section('title', 'Edit Buku')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit</h5>

                <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="{{ $buku->judul }}">
                    </div>

                    <div class="form-group">
                        <label for="penulis">Penulis</label>
                        <input type="text" name="penulis" id="penulis" class="form-control" value="{{ $buku->penulis }}">
                    </div>

                    <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit</label>
                        <input type="text" name="tahun_terbit" id="tahun_terbit" class="form-control" value="{{ $buku->tahun_terbit }}">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection