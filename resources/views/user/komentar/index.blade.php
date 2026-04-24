@extends('layouts.appuser')

@section('content')
<div class="content p-2">
    <div class="container-fluid">

        <div class="d-flex justify-content-between mb-3">
            <h4>Data Komentar</h4>
            <a href="{{ route('komentar.create') }}" class="btn btn-primary btn-sm">
                + Tambah Komentar
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body table-responsive">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Artikel</th>
                            <th>Penyewa</th>
                            <th>Isi</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $i => $item)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $item->artikel->judul ?? '-' }}</td>
                            <td>{{ $item->penyewa->nama ?? '-' }}</td>
                            <td>{{ Str::limit($item->isi, 50) }}</td>
                            <td>
                                <a href="{{ route('komentar.show', $item->idkomentar) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('komentar.edit', $item->idkomentar) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('komentar.destroy', $item->idkomentar) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                        @if($data->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">Data kosong</td>
                        </tr>
                        @endif

                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
@endsection