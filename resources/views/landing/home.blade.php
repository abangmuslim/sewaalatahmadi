@extends('layouts.apptamu')
@section('title','Home')

@section('content')
@php use Illuminate\Support\Str; @endphp

{{-- ================= SECTION TITLE ================= --}}
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Artikel & Informasi</h5>
</div>

{{-- ================= LIST ARTIKEL ================= --}}
<div class="row">

    @forelse($artikels as $item)
    <div class="col-md-4 col-12 mb-3">

        <div class="card h-100 shadow-sm" style="border-radius: 12px; overflow:hidden;">

            {{-- GAMBAR --}}
            <img
                src="{{ !empty($item->gambar) 
                        ? asset('uploads/artikel/'.$item->gambar) 
                        : asset('dist/img/no-image.png') }}"
                class="card-img-top"
                style="height:180px; object-fit:cover;">

            <div class="card-body d-flex flex-column">

                {{-- JUDUL --}}
                <h6 class="font-weight-bold mb-2">
                    {{ $item->judul }}
                </h6>

                {{-- TANGGAL --}}
                <small class="text-muted mb-2">
                    {{ $item->created_at ? $item->created_at->format('d M Y') : '-' }}
                </small>

                {{-- ISI --}}
                <p class="text-muted small flex-grow-1">
                    {{ Str::limit(strip_tags($item->isi), 80) }}
                </p>

                {{-- BUTTON --}}
                <a href="{{ route('landing.detailartikel', $item->idartikel) }}"
                    class="btn btn-primary btn-sm mt-auto">
                    Baca Selengkapnya
                </a>

            </div>
        </div>

    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info text-center">
            Belum ada artikel tersedia
        </div>
    </div>
    @endforelse

</div>

@endsection