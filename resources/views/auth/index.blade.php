@extends('layout/app')

@section('title', 'Data Pengguna')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Pengguna</h5>

                <div class="text-end mb-3">
                    <a href="{{ route('user.create') }}" class="btn btn-success">Tambah</a>
                </div>

                <!-- tabel untuk menampilkan pengguna -->
                 <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->created_at}}</td>
                            <td>
                                <!-- tombol edit -->
                                 <a href="{{ route('auth.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                 <!-- tombol hapus -->
                                  <form action="{{ route('auth.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus pengguna ini?');">Hapus</button>
                                  </form>
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