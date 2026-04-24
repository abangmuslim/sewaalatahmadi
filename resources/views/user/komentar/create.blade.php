@extends('layouts.appuser')

@section('content')
<div class="content p-2">
    <div class="container-fluid">

        <h4>Tambah Komentar</h4>

        <div class="card">
            <div class="card-body">

                <form action="{{ route('komentar.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Artikel</label>
                        <select name="idartikel" class="form-control" required>
                            <option value="">-- Pilih Artikel --</option>
                            @foreach($artikel as $a)
                                <option value="{{ $a->idartikel }}">{{ $a->judul }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Penyewa (opsional)</label>
                        <select name="idpenyewa" class="form-control">
                            <option value="">-- Tanpa Penyewa --</option>
                            @foreach($penyewa as $p)
                                <option value="{{ $p->idpenyewa }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Isi Komentar</label>
                        <textarea name="isi" class="form-control" rows="4" required></textarea>
                    </div>

                    <button class="btn btn-primary">Simpan</button>
                    <a href="{{ route('komentar.index') }}" class="btn btn-secondary">Kembali</a>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection