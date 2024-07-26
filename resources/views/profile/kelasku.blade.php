@extends('Dash.layout')
@section('content')
<div class="w-auto h-auto my-3 mx-5">
    <table class="table-auto w-full mt-4 sticky ">
        <thead>
            <tr class="bg-gray-200 text-center" style="font-family: Poppins,sa">
                <th class="w-10">NO</th>
                <th class="px-2 py-2">Instruktur</th>
                <th class="px-2 py-2">Kelas</th>
                <th class="px-2 py-2">Deskripsi</th>
                <th class="w-50">Jadwal</th>
                <th class="w-5">Bulan</th>
                <th class="px-2 py-2">Harga/kelas</th>
                <th class="px-2 py-2">Harga</th>
                <th class="w-72">Aksi</th>
            </tr>
        </thead>
        <tbody class="w-" style="font-family: Poppins,sans-serif">
            @foreach($kelass as $kelas)
                <tr class="bg-white border-b hover:bg-gray-100 text-center">
                    <td class="w-auto">{{ $loop->iteration }}</td>
                    <td class="w-auto">{{ $kelas->instructor->name }}</td>
                    <td class="w-auto  bg-transparent">{{ $kelas->hargakelas->nama_kelas }}</td>
                    <td class="w-auto">{{ $kelas->description }}</td>
                    <td class="w-auto">{{ $kelas->jadwal->day }}-{{ $kelas->jadwal->jam_mulai}} s/d {{ $kelas->jadwal->jam_selesai }}</td>
                    <td class="w-auto">{{ $kelas->kuota }}</td>
                    <td class="w-auto">{{ $kelas->harga}}</td>
                    <td class="w-auto">{{ $kelas->price }}</td>
                    <td class="w-auto ml-2 justify-center flex items-center gap-2">
                        <div class="flex group justify-center h-auto w-auto items-center">
                            <div class="h-9 w-9 group-hover:w-24 transition-all duration-500 rounded-lg bg-sky-500 flex items-center justify-center overflow-hidden ">
                                <a href="{{ route('kelas.show', $kelas->id) }}" class="mr-2 h-full w-full justify-center flex items-center">
                                    <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 60.000000 60.000000" preserveAspectRatio="xMidYMid meet">
                                        <g transform="translate(0.000000,60.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                            <path d="M192 529 c-48 -14 -109 -80 -123 -131 -23 -89 12 -182 88 -229 49 -31 140 -33 196 -5 l38 19 65 -64 c50 -50 66 -61 76 -51 10 10 -1 26 -51 76 l-64 65 19 38 c28 56 26 147 -5 196 -47 76 -150 113 -239 86z m131 -43 c103 -43 128 -177 48 -257 -112 -113 -296 -12 -267 146 18 94 128 150 219 111z"/>
                                            <path d="M164 349 c-10 -17 13 -36 27 -22 12 12 4 33 -11 33 -5 0 -12 -5 -16 -11z"/>
                                            <path d="M244 349 c-10 -17 13 -36 27 -22 12 12 4 33 -11 33 -5 0 -12 -5 -16 -11z"/>
                                            <path d="M324 349 c-10 -17 13 -36 27 -22 12 12 4 33 -11 33 -5 0 -12 -5 -16 -11z"/>
                                        </g>
                                    </svg>
                                    <span class="text-black hidden opacity-0 group-hover:inline-block group-hover:opacity-100 transition-all duration-500">Detail</span>
                                    </a>
                                </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection