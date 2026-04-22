<!-- resources/views/user/user/edit.blade.php -->
@extends('layouts.appuser')

@section('content')
<div class="container mt-3">
  <h4>Edit User</h4>

  <form action="{{ route('user.update',$data->iduser) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" value="{{ $data->nama }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Username</label>
      <input type="text" name="username" value="{{ $data->username }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Password (kosongkan jika tidak diubah)</label>
      <input type="password" name="password" class="form-control">
    </div>

    <div class="mb-3">
      <label>Role</label>
      <select name="role" class="form-control">
        <option value="admin" {{ $data->role=='admin'?'selected':'' }}>Admin</option>
        <option value="petugas" {{ $data->role=='petugas'?'selected':'' }}>Petugas</option>
      </select>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection
