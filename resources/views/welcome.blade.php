@extends('layout.app')

@section('title', 'Manajemen Buku')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>Selamat Datang di Manajemen Buku</h1>
            <p class="lead">Jelajahi Buku Anda</p>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Belum punya Akun?</h5>
                    <a href="{{ url('/registrasi') }}" class="btn btn-success">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
@endsection