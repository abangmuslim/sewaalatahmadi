@extends('layouts.appuser')

@section('content')
<div class="content p-2">
    <div class="container-fluid">

        <h4>Edit Komentar</h4>

        <div class="card">
            <div class="card-body">

                <form action="{{ route('komentar.update', $data->idkomentar) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Artikel</label>
                        <select name="idartikel" class="form-control" required>
                            @foreach($artikel as $a)
                                <option value="{{ $a->idartikel }}"
                                    {{ $data->idartikel == $a->idartikel ? 'selected' : '' }}>
                                    {{ $a->judul }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Penyewa</label>
                        <select name="idpenyewa" class="form-control">
                            <option value="">-- Tanpa Penyewa --</option>
                            @foreach($penyewa as $p)
                                <option value="{{ $p->idpenyewa }}"
                                    {{ $data->idpenyewa == $p->idpenyewa ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Isi Komentar</label>
                        <textarea name="isi" class="form-control" rows="4" required>{{ $data->isi }}</textarea>
                    </div>

                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('komentar.index') }}" class="btn btn-secondary">Kembali</a>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection