@extends('Dash.layout')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Detail Kelas Gym</h1>
                <div class ="grid grid-cols-2  gap-4 my-7">
                    <div class="pl-6 space-y-3">
                        <div class="">
                            <p class="font-bold">Nama:</p>
                            <p class="pl-3 "> {{$fitnes->nama}}</p>
                        </div>
                        <div>
                            <img src="{{$fitnes->profile ? asset('storage/' . $fitnes->profile) : asset('images/user.png')}}" class="w-48 h-56 ring-8 ring-offset-gray-600">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div>
                            <p class="font-bold">Email:</p>
                            <p>{{$fitnes->email}}</p>
                        </div>
                        <div>
                            <p class="font-bold">Role:</p>
                            <p>{{$fitnes->role}}</p>
                        </div>
                        <div>  
                        <p class="font-bold">Usia:</p>
                        <p>{{$fitnes->usia}} Tahun</p>
                        </div>
                        <div>
                            <p class="font-bold">Berat:</p>
                            <p>{{$fitnes->berat}} kg</p>
                        </div>
                        <div> 
                            <p class="font-bold">Tinggi:</p>
                            <p>{{$fitnes->tinggi}} cm</p>
                        </div>
                    </div>
                </div>
            <a href="{{ route('fitnes.index') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Kembali
            </a>
        </div>
    </div>
@endsection
