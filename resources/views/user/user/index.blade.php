<!-- resources/views/user/user/index.blade.php -->
@extends('layouts.appuser')

@section('content')
<div class="content p-2">
  <div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
      <h4>Data User</h4>
      <a href="{{ route('user.create') }}" class="btn btn-primary">+ Tambah User</a>
    </div>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Role</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($data as $i => $d)
            <tr>
              <td>{{ $i+1 }}</td>
              <td>{{ $d->nama }}</td>
              <td>{{ $d->username }}</td>
              <td>
                <span class="badge {{ $d->role == 'admin' ? 'bg-danger' : 'bg-info' }}">
                  {{ $d->role }}
                </span>
              </td>
              <td>
                <a href="{{ route('user.show',$d->iduser) }}" class="btn btn-info btn-sm">Detail</a>
                <a href="{{ route('user.edit',$d->iduser) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('user.delete',$d->iduser) }}" method="POST" style="display:inline">
                  @csrf @method('DELETE')
                  <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">Hapus</button>
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




