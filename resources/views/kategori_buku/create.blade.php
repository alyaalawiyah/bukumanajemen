@extends('layout.app')

@section('title', 'Tambah kategori buku')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah kategori buku</h5>
                <form action="{{ route('users.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nama Kategori</label>
                        <input type="text" name="nama" id="name" class="form-control" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection