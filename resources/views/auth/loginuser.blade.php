@extends('layouts.apptamu')

@section('title','Login User')
@section('header','Login User')

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

                    <button type="submit" class="btn btn-primary btn-block">
                        Login
                    </button>

                </form>

                <hr>

                <div class="text-center">
                    <a href="{{ url('loginpenyewa') }}">Login sebagai Penyewa</a>
                </div>

            </div>

        </div>

    </div>
</div>

@endsection