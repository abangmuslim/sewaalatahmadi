@extends('layouts.appuser')

@section('content')
<div class="content p-2">
    <div class="container-fluid">

        <h4>Edit Artikel</h4>

        <div class="card">
            <div class="card-body">

                <form action="{{ route('artikel.update', $data->idartikel) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" value="{{ $data->judul }}" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Isi</label>
                        <textarea name="isi" rows="5" class="form-control" required>{{ $data->isi }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Gambar Lama</label><br>
                        @if($data->gambar)
                            <img src="{{ asset('uploads/artikel/'.$data->gambar) }}" width="120">
                        @else
                            <span>Tidak ada gambar</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Gambar Baru</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>

                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('artikel.index') }}" class="btn btn-secondary">Kembali</a>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection