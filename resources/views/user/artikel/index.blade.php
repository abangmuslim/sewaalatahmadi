@extends('layouts.appuser')

@section('content')
<div class="content p-2">
    <div class="container-fluid">

        <div class="d-flex justify-content-between mb-3">
            <h4>Data Artikel</h4>
            <a href="{{ route('artikel.create') }}" class="btn btn-primary btn-sm">
                + Tambah Artikel
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
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Gambar</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $i => $item)
                        <tr>
                            <td>{{ $i+1 }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->user->nama ?? '-' }}</td>
                            <td>
                                @if($item->gambar)
                                    <img src="{{ asset('uploads/artikel/'.$item->gambar) }}" width="80">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('artikel.show', $item->idartikel) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('artikel.edit', $item->idartikel) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('artikel.destroy', $item->idartikel) }}" method="POST" style="display:inline;">
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