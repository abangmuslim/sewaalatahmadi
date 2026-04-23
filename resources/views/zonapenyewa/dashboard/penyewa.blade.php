@extends('layouts.apppenyewa')

@section('content')

<div class="content p-3">
    <div class="container-fluid">

        <h4 class="mb-3">Dashboard Penyewa</h4>

        {{-- INFO PENYEWA --}}
        <div class="card mb-4">
            <div class="card-body">
                <b>Nama:</b> {{ session('nama') }} <br>
                <b>ID Penyewa:</b> {{ session('idpenyewa') }}
            </div>
        </div>

        {{-- RIWAYAT PENYEWAAN --}}
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Riwayat Penyewaan</h5>
            </div>

            <div class="card-body p-0">
                <table class="table table-bordered table-striped mb-0">
                    <thead>
                        <tr>
                            <th width="50">No</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($riwayat as $i => $item)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $item->created_at ?? '-' }}</td>
                                <td>{{ $item->status ?? '-' }}</td>
                                <td>{{ $item->keterangan ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    Belum ada riwayat penyewaan
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection