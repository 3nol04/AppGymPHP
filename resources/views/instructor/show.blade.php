@extends('Dash.layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="mb-4">
        <strong class="block text-gray-700">Nama :</strong>
        <p class="text-gray-900">{{ $instructor->name }}</p>
    </div>
    <div class="mb-4">
        <strong class="block text-gray-700">Description :</strong>
        <p class="text-gray-900">{{ $instructor->description }}</p>
    </div>
    <div class="mb-4">
        <strong class="block text-gray-700">Phone :</strong>
        <p class="text-gray-900">{{ $instructor->phone }}</p>
    </div>
    <div class="mb-4">
        <strong class="block text-gray-700">Email :</strong>
        <p class="text-gray-900">{{ $instructor->email }}</p>
    </div>
    <div class="mb-4">
        <strong class="block text-gray-700">Gender :</strong>
        <p class="text-gray-900">{{ $instructor->gender }}</p>
    </div>
    <a class="inline-block bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700" href="{{ route('instructor.index') }}">Kembali</a>
</div>
@endsection
