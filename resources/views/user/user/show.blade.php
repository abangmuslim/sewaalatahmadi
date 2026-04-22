
<!-- resources/views/user/user/show.blade.php -->
@extends('layouts.appuser')

@section('content')
<div class="container mt-3">
  <h4>Detail User</h4>

  <div class="card">
    <div class="card-body">
      <p><b>Nama:</b> {{ $data->nama }}</p>
      <p><b>Username:</b> {{ $data->username }}</p>
      <p><b>Role:</b> {{ $data->role }}</p>
    </div>
  </div>

  <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection