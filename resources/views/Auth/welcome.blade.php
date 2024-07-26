@extends('Dash.layout')

@section('konten')
    <div class="w-50 text-center border rounded px-3 py-3 mx-auto">
        <h1>Selamat Datang</h1>
        <p>Silakan login atau register untuk masuk ke aplikasi</p>
        <a href="/login" class="btn btn-primary btn-lg">LOGIN</a>
        <a href="/register" class="btn btn-success btn-lg">REGISTER</a>
    </div>
@endsection
