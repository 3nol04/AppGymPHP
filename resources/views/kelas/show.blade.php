@extends('Dash.layout')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Detail Kelas Gym</h1>
            <div class="mb-4">
                <p class="text-lg font-semibold">Nama:</p>
                <p class="text-gray-700">{{ $kelas->member->nama }}</p>
            </div>
            <div class="mb-4">
                <p class="text-lg font-semibold">Kelas:</p>
                <p class="text-gray-700">{{ $kelas->hargakelas->nama_kelas }}</p>
            </div>
            <div class="mb-4">
                <p class="text-lg font-semibold">Deskripsi:</p>
                <p class="text-gray-700">{{ $kelas->description }}</p>
            </div>
            <div class="mb-4">
                <p class="text-lg font-semibold">Instruktur:</p>
                <p class="text-gray-700">{{ $kelas->instructor->name }}</p>
            </div>
            <div class="mb-4">
                <p class="text-lg font-semibold">Jadwal:</p>
                <p class="text-gray-700">{{ $kelas->jadwal->day }} - {{ $kelas->jadwal->jam_mulai }} s/d {{ $kelas->jadwal->jam_selesai }}</p>
            </div>
            <div class="mb-4">
                <p class="text-lg font-semibold">Kuota:</p>
                <p class="text-gray-700">{{ $kelas->kuota }}</p>
            </div>
            <div class="mb-4">
                <p class="text-lg font-semibold">Harga:</p>
                <p class="text-gray-700">Rp{{ number_format($kelas->harga, 0, ',', '.') }}</p>
            </div>
            @if($user->role == 'admin')
            <a href="{{ route('kelas.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Kembali
            </a>
            @else
            <a href="{{ route('kelasku') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Kembali
            </a>
            @endif
        </div>
    </div>
@endsection
