@extends('layouts.appuser')

@section('content')
<div class="content p-2">
    <div class="container-fluid">

        <div class="d-flex justify-content-between mb-3">
            <h4>Data Penyewa</h4>
            <a href="{{ route('penyewa.create') }}" class="btn btn-primary">
                + Tambah Penyewa
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>No HP</th>
                            <th>Alamat</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $no => $row)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->hp }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>
                                <a href="{{ route('penyewa.show', $row->idpenyewa) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('penyewa.edit', $row->idpenyewa) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('penyewa.destroy', $row->idpenyewa) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        @if($data->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">Data kosong</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection