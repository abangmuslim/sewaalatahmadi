@extends('layouts.appuser')

@section('content')

<div class="content p-2">
  <div class="container-fluid">

    <!-- HEADER -->
    <div class="mb-3">
      <h4><b>Dashboard Petugas</b></h4>
      <small>Ringkasan operasional sewa alat</small>
    </div>

    <!-- INFO BOX -->
    <div class="row">

      <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ $totalAlat ?? 0 }}</h3>
            <p>Data Alat</p>
          </div>
          <div class="icon">
            <i class="fas fa-tools"></i>
          </div>
          <a href="#" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ $totalPenyewa ?? 0 }}</h3>
            <p>Penyewa</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-tag"></i>
          </div>
          <a href="#" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{ $totalPemesanan ?? 0 }}</h3>
            <p>Pemesanan</p>
          </div>
          <div class="icon">
            <i class="fas fa-shopping-cart"></i>
          </div>
          <a href="#" class="small-box-footer">Transaksi <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>

    <!-- TRANSAKSI TERBARU -->
    <div class="card mt-3">
      <div class="card-header">
        <h3 class="card-title">Pemesanan Terbaru</h3>
      </div>
      <div class="card-body table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Penyewa</th>
              <th>Tanggal</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @forelse($pemesananTerbaru ?? [] as $i => $p)
            <tr>
              <td>{{ $i+1 }}</td>
              <td>{{ $p->penyewa->nama ?? '-' }}</td>
              <td>{{ $p->tanggalpesan }}</td>
              <td>
                <span class="badge badge-info">{{ $p->status }}</span>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" class="text-center">Belum ada data</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>

@endsection