@extends('layouts.appuser')

@section('content')
<div class="content p-2">
    <div class="container-fluid">

        <h4>Detail Artikel</h4>

        <div class="card">
            <div class="card-body">

                <h3>{{ $data->judul }}</h3>

                <p>
                    <strong>Penulis:</strong> {{ $data->user->nama ?? '-' }} <br>
                    <strong>Tanggal:</strong> 
                    {{ optional($data->created_at)->format('d-m-Y') ?? '-' }}
                </p>

                @if($data->gambar)
                    <img src="{{ asset('uploads/artikel/'.$data->gambar) }}" width="300" class="mb-3">
                @endif

                <div>
                    {!! nl2br(e($data->isi)) !!}
                </div>

                <hr>

                <a href="{{ route('artikel.index') }}" class="btn btn-secondary">Kembali</a>

            </div>
        </div>

    </div>
</div>
@endsection