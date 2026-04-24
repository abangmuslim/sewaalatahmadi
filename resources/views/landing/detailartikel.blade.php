@extends('layouts.apptamu')
@section('title','Detail Artikel')

@section('content')

<div class="card shadow-sm" style="border-radius:12px; overflow:hidden;">

```
{{-- GAMBAR --}}
<img
    src="{{ !empty($artikel->gambar) 
            ? asset('uploads/artikel/'.$artikel->gambar) 
            : asset('dist/img/no-image.png') }}"
    class="card-img-top"
    style="max-height:400px; object-fit:cover;">

<div class="card-body">

    {{-- JUDUL --}}
    <h4 class="font-weight-bold mb-2">
        {{ $artikel->judul }}
    </h4>

    {{-- TANGGAL --}}
    <small class="text-muted mb-3 d-block">
        {{ $artikel->created_at ? $artikel->created_at->format('d M Y') : '-' }}
    </small>

    <hr>

    {{-- ISI --}}
    <p style="text-align: justify; line-height:1.8;">
        {!! nl2br(e($artikel->isi)) !!}
    </p>

    <a href="{{ url('/') }}" class="btn btn-secondary btn-sm mt-3">
        ← Kembali
    </a>

</div>
```

</div>

{{-- ================= KOMENTAR ================= --}}

<div class="card mt-3 shadow-sm">
    <div class="card-body">

```
    <h5 class="mb-3">Komentar</h5>

    {{-- LIST KOMENTAR --}}
    @forelse($artikel->komentars as $komen)
        <div class="mb-3 border-bottom pb-2">
            <strong>
                {{ $komen->nama ?? 'User' }}
            </strong>
            <br>
            <small class="text-muted">
                {{ $komen->created_at->format('d M Y H:i') }}
            </small>

            <p class="mb-1 mt-1">
                {{ $komen->isi }}
            </p>
        </div>
    @empty
        <p class="text-muted">Belum ada komentar</p>
    @endforelse

    <hr>

    {{-- FORM KOMENTAR --}}
    @if(session('user') || session('penyewa'))

        <form action="{{ route('landing.komentar.store') }}" method="POST">
            @csrf

            <input type="hidden" name="idartikel" value="{{ $artikel->idartikel }}">

            <div class="form-group">
                <textarea name="isi" class="form-control" rows="3" placeholder="Tulis komentar..." required></textarea>
            </div>

            <button class="btn btn-primary btn-sm mt-2">
                Kirim Komentar
            </button>
        </form>

    @else
        <div class="alert alert-warning mt-2">
            Silakan login terlebih dahulu untuk memberikan komentar.
        </div>
    @endif

</div>
```

</div>

@endsection
