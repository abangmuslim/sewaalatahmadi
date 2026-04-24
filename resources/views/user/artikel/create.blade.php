@extends('layouts.appuser')

@section('content')
<div class="content p-2">
    <div class="container-fluid">

        <h4>Tambah Artikel</h4>

        <div class="card">
            <div class="card-body">

                <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Isi</label>
                        <textarea name="isi" rows="5" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>

                    <button class="btn btn-primary">Simpan</button>
                    <a href="{{ route('artikel.index') }}" class="btn btn-secondary">Kembali</a>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection