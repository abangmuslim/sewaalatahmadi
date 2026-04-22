@extends('layouts.apptamu')

@section('title','Register Penyewa')
@section('header','Daftar Penyewa')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-12">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <form action="#" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Buat username" required>
                    </div>

                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="hp" class="form-control" placeholder="Masukkan nomor HP" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Buat password" required>
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">
                        Daftar
                    </button>

                </form>

                <hr>

                <div class="text-center">
                    Sudah punya akun?
                    <a href="{{ url('loginpenyewa') }}">Login di sini</a>
                </div>

            </div>

        </div>

    </div>
</div>

@endsection