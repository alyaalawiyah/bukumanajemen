@extends('layouts.app')

@section('title', 'Tambah pengguna')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tambah pengguna</h5>

                <form action="{{ route('user.store')}}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>

                     <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                     <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection