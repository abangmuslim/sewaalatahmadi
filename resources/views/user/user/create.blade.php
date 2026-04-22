
<!-- resources/views/user/user/create.blade.php -->
@extends('layouts.appuser')

@section('content')
<div class="container mt-3">
  <h4>Tambah User</h4>

  <form action="{{ route('user.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Username</label>
      <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Role</label>
      <select name="role" class="form-control">
        <option value="admin">Admin</option>
        <option value="petugas">Petugas</option>
      </select>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection
