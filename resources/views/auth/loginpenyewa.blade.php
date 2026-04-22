@extends('layouts.apptamu')

@section('title','Login Penyewa')
@section('header','Login Penyewa')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6 col-12">

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <form action="#" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>

                    <button type="submit" class="btn btn-success btn-block">
                        Login
                    </button>

                </form>

                <hr>

                <div class="text-center">
                    Belum punya akun?
                    <a href="{{ route('auth.penyewa.register') }}">Daftar di sini</a>
                </div>

            </div>

        </div>

    </div>
</div>

@endsection