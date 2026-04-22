@extends('layouts.apptamu')
@section('title','Daftar Kategori')

@section('content')

<div class="text-center mb-3">
    <h4>Daftar Kategori</h4>
    <p class="text-muted">Pilih kategori alat yang Anda butuhkan</p>
</div>

<div class="row">

    @forelse($kategori as $item)
    <div class="col-md-3 col-6">
        <div class="card text-center">
            <div class="card-body p-2">

                <h6 class="mb-2">
                    {{ $item['nama'] }}
                </h6>

                <a href="/kategori/{{ $item['id'] }}" class="btn btn-primary btn-sm btn-block">
                    Lihat
                </a>

            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info text-center">
            Data kategori belum tersedia
        </div>
    </div>
    @endforelse

</div>

@endsection