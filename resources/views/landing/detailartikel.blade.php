@extends('layouts.apptamu')
@section('title','Detail Artikel')

@section('content')

<div class="card">
    <img src="{{ $artikel['gambar'] }}" class="card-img-top">

    <div class="card-body">
        <h4>{{ $artikel['judul'] }}</h4>

        <p class="text-muted">
            Ditampilkan pada halaman detail
        </p>

        <hr>

        <p style="text-align: justify;">
            {{ $artikel['isi'] }}
        </p>

        <a href="/" class="btn btn-secondary btn-sm mt-2">
            ← Kembali
        </a>
    </div>
</div>

@endsection