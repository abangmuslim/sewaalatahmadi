@extends('layouts.appuser')

@section('content')
<div class="content p-2">
    <div class="container-fluid">

        <h4 class="mb-3">Detail Penyewa</h4>

        <div class="card">
            <div class="card-body">

                <table class="table table-bordered">
                    <tr>
                        <th width="200">Nama</th>
                        <td>{{ $data->nama }}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>{{ $data->username }}</td>
                    </tr>
                    <tr>
                        <th>No HP</th>
                        <td>{{ $data->nohp }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $data->alamat }}</td>
                    </tr>
                </table>

                <a href="{{ route('penyewa.index') }}" class="btn btn-secondary">Kembali</a>

            </div>
        </div>

    </div>
</div>
@endsection