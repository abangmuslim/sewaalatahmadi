@extends('layouts.appuser')

@section('content')
<div class="content p-2">
    <div class="container-fluid">

        <h4>Detail Komentar</h4>

        <div class="card">
            <div class="card-body">

                <p><strong>Artikel:</strong> {{ $data->artikel->judul ?? '-' }}</p>
                <p><strong>Penyewa:</strong> {{ $data->penyewa->nama ?? '-' }}</p>
                <p><strong>Tanggal:</strong> {{ $data->created_at->format('d-m-Y H:i') }}</p>

                <hr>

                <p>{{ $data->isi }}</p>

                <a href="{{ route('komentar.index') }}" class="btn btn-secondary">Kembali</a>

            </div>
        </div>

    </div>
</div>
@endsection