@extends('layouts.apptamu')
@section('title','Tag')

@section('content')
@php use Illuminate\Support\Str; @endphp

<h4 class="mb-3">Tag: {{ $tag }}</h4>

<div class="row">
    @forelse($artikels as $item)
    <div class="col-md-4 col-12">
        <div class="card">
            <div class="card-body">
                <h5>{{ $item['judul'] }}</h5>
                <p>{{ Str::limit($item['isi'], 80) }}</p>
                <a href="/detailartikel/{{ $item['id'] }}" class="btn btn-primary btn-sm">
                    Baca
                </a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-warning text-center">
            Tidak ada artikel dengan tag ini
        </div>
    </div>
    @endforelse
</div>
@endsection