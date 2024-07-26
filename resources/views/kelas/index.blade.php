@extends('Dash.layout')

@section('content')
<div class="container mx-auto p-6 relative">
    @if (session('info'))
        <div id="flash-message" class="absolute top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-4 py-2 rounded shadow-lg transition-opacity duration-500 opacity-100">
            {{ session('info') }}
        </div>
        <script>
            setTimeout(function() {
                const flashMessage = document.getElementById('flash-message');
                if (flashMessage) {
                    flashMessage.classList.add('opacity-0');
                    setTimeout(() => flashMessage.remove(), 500);
                }
            }, 3000); 
        </script>
    @endif
    <style>
        .custom-gym-color {
            color: #C12E38; 
        }
    </style>
    <!-- Page Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-5xl font-bold mb-3 text-left">
                <span class="custom-gym-color">GYM</span> <span class="text-white">CLASS</span>
            </h1>
            <h6 class="text-white mx-1 font-bold">| Detail All Class</h6>
        </div>
        <div class="mx-2 w-40 h-10 group shadow-lg shadow-black">
            <a href="{{ route('kelas.create') }}" class="bg-green-700 flex justify-center items-center group-hover:ring-4 group-hover:ring-green-500 group-hover:ring-offset-2 group-hover:bg-green-400 font-medium rounded-lg text-lg px-5 py-2.5 text-center gap-2 transition-all duration-500">
                <svg version="1.0" class="relative group-hover:rotate-180 transition-all duration-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 64.000000 64.000000" preserveAspectRatio="xMidYMid meet">
                    <g transform="translate(0.000000,64.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                        <path d="M226 594 c-71 -22 -159 -112 -180 -184 -34 -115 -12 -206 73 -291 85 -85 176 -107 291 -73 75 22 162 109 184 184 34 115 12 206 -73 291 -85 84 -180 108 -295 73z m226 -41 c92 -51 146 -155 135 -261 -15 -145 -149 -254 -295 -239 -145 15 -254 149 -239 295 11 102 92 201 191 232 57 17 150 5 208 -27z"/>
                        <path d="M224 526 c-84 -39 -134 -118 -134 -212 0 -40 39 -136 60 -149 19 -12 24 4 7 23 -26 29 -47 88 -47 134 1 114 99 208 218 208 17 0 32 5 32 10 0 19 -85 10 -136 -14z"/>
                        <path d="M390 530 c0 -12 28 -25 36 -17 3 3 -4 10 -15 17 -15 7 -21 7 -21 0z"/>
                        <path d="M450 494 c0 -4 13 -21 29 -40 62 -70 65 -198 7 -263 -22 -25 -22 -48 1 -30 28 24 63 111 63 159 0 49 -29 122 -62 158 -21 21 -38 29 -38 16z"/>
                        <path d="M310 380 l0 -50 -50 0 c-27 0 -50 -4 -50 -10 0 -5 23 -10 50 -10 l50 0 0 -50 c0 -27 5 -50 10 -50 6 0 10 23 10 50 l0 50 50 0 c28 0 50 5 50 10 0 6 -22 10 -50 10 l-50 0 0 50 c0 28 -4 50 -10 50 -5 0 -10 -22 -10 -50z"/>
                        <path d="M211 146 c-8 -9 -11 -19 -7 -23 9 -9 29 13 24 27 -2 8 -8 7 -17 -4z"/>
                        <path d="M410 148 c0 -18 18 -34 28 -24 3 4 -2 14 -11 23 -16 16 -17 16 -17 1z"/>
                        <path d="M260 114 c0 -8 5 -12 10 -9 6 3 10 10 10 16 0 5 -4 9 -10 9 -5 0 -10 -7 -10 -16z"/>
                        <path d="M310 110 c0 -11 5 -20 10 -20 6 0 10 9 10 20 0 11 -4 20 -10 20 -5 0 -10 -9 -10 -20z"/>
                        <path d="M360 121 c0 -6 5 -13 10 -16 6 -3 10 1 10 9 0 9 -4 16 -10 16 -5 0 -10 -4 -10 -9z"/>
                    </g>
                </svg>
                <span class="relative group-hover:translate-x-1 transition-all duration-500 h-auto w-auto text-white group-hover:text-white">Add Class</span>
            </a>
        </div>
    </div>

    <!-- Table -->
    <div class="w-full h-auto my-3 mx-5 shadow-black shadow-lg overflow-x-auto">
        <table class="table-auto w-full mt-4 sticky border-collapse">
            <thead>
                <tr class="text-center gap-6 border-b border-white bg-transparent bg-opacity-60 bg-zinc-800">
                    <th class="px-8 text-white">No</th>
                    <th class="text-white">Name</th>
                    <th class="text-white">Instructor</th>
                    <th class="text-white">Class</th>
                    <th class="text-white">Description</th>
                    <th class="text-white">Schedule</th>
                    <th class="text-white">Kuota</th>
                    <th class="text-white">Price/Class</th>
                    <th class="text-white">Price</th>
                    <th class="text-white">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listKelas as $kelas)
                    <tr class="border-b hover:bg-zinc-700 text-center h-16 bg-opacity-60 bg-zinc-800">
                        <td class="text-white">{{ $loop->iteration }}</td>
                        <td class="text-white">{{ $kelas->member->nama }}</td>
                        <td class="text-white">{{Str::limit($kelas->instructor->name, 10)}}</td>
                        <td class="text-white">{{ $kelas->hargakelas->nama_kelas }}</td>
                        <td class="text-white">{{Str::limit($kelas->description, 15)}}</td>
                        <td class="text-white">{{ $kelas->jadwal->day }} - {{ $kelas->jadwal->jam_mulai }} s/d {{ $kelas->jadwal->jam_selesai }}</td>
                        <td class="text-white">{{ $kelas->kuota }}</td>
                        <td class="text-white">{{ $kelas->harga }}</td>
                        <td class="text-white">{{ $kelas->price }}</td>
                        <td class="flex justify-center gap-2 mt-4">
                            <!-- Detail Button -->
                            <div class="group flex justify-center items-center">
                                <div class="h-9 w-9 group-hover:w-20 transition-all duration-500 rounded-lg bg-sky-500 flex items-center justify-center overflow-hidden">
                                    <a href="{{ route('kelas.show', $kelas->id) }}" class="h-full w-full flex justify-center items-center">
                                        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:rotate-180 transition-all duration-500 feather feather-eye"><circle cx="12" cy="12" r="3"></circle><path d="M22 12c-1.5-4-5.5-7-10-7S3.5 8 2 12s5.5 7 10 7 8.5-3 10-7z"></path></svg>
                                        <span class="hidden group-hover:block text-white group-hover:ml-2 transition-all duration-500">Detail</span>
                                    </a>
                                </div>
                            </div>
                            <!-- Edit Button -->
                            <div class="group flex justify-center items-center">
                                <div class="h-9 w-9 group-hover:w-20 transition-all duration-500 rounded-lg bg-yellow-500 flex items-center justify-center overflow-hidden">
                                    <a href="{{ route('kelas.edit', $kelas->id) }}" class="h-full w-full flex justify-center items-center">
                                        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:rotate-180 transition-all duration-500 feather feather-edit"><path d="M11 4.04c-1.41 0-2.73.56-3.73 1.56C6.13 6.6 5.56 7.92 5.56 9.33c0 1.41.56 2.73 1.56 3.73.54.54 1.19.97 1.91 1.24a5.5 5.5 0 0 0-1.3.22l-2.3.87L2 18l2.64-2.64.88-2.3c.13-.34.3-.66.52-.95.26-.29.57-.52.95-.7.29-.26.61-.5.95-.71l2.29-.88a5.5 5.5 0 0 0 1.55-1.37c.27-.72.7-1.37 1.24-1.91A5.501 5.501 0 0 0 19 7c.55 0 1.08.11 1.57.31a5.501 5.501 0 0 0 1.86-2.61c.14-.54.23-1.1.27-1.66a5.501 5.501 0 0 0-4.66-4.66A5.5 5.5 0 0 0 18 0c-2.77 0-5.24 1.79-6.06 4.23a5.5 5.5 0 0 0-2.47-.68c-.24 0-.48.01-.71.03a5.5 5.5 0 0 0-4.63 2.61c-.54 1.08-.64 2.34-.25 3.47A5.5 5.5 0 0 0 4.5 10c-.17 0-.34-.01-.51-.03a5.5 5.5 0 0 0-4.61 2.61c-.54 1.08-.64 2.34-.25 3.47A5.5 5.5 0 0 0 2.47 18a5.5 5.5 0 0 0-2.17 3.54 5.501 5.501 0 0 0 4.7 4.7c.61.06 1.21-.02 1.78-.24a5.5 5.5 0 0 0 3.54-2.17 5.501 5.501 0 0 0 3.54 2.17 5.5 5.5 0 0 0 1.78.24c.61 0 1.21-.02 1.78-.24a5.5 5.5 0 0 0 3.54-2.17c.54-.82.83-1.78.83-2.75 0-.82-.2-1.61-.57-2.34zM14 7.73l-1.41 1.41L7 3.55l1.41-1.41a5.51 5.51 0 0 0 1.55 1.37c.27.71.69 1.36 1.23 1.91a5.52 5.52 0 0 0 1.37 1.56l1.91-1.91z"></path></svg>
                                        <span class="hidden group-hover:block text-white group-hover:ml-2 transition-all duration-500">Edit</span>
                                    </a>
                                </div>
                            </div>
                            <!-- Delete Button -->
                            <div class="group flex justify-center items-center">
                                <form action="{{ route('kelas.destroy', $kelas->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this class?');" class="group-hover:w-20 transition-all duration-500">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="h-9 w-9 group-hover:w-20 transition-all duration-500 rounded-lg bg-red-500 flex items-center justify-center overflow-hidden">
                                        <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:rotate-180 transition-all duration-500 feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6l-2 14H7L5 6m1-3h12a1 1 0 0 1 1 1v1H4V4a1 1 0 0 1 1-1h0z"></path></svg>
                                        <span class="hidden group-hover:block text-white group-hover:ml-2 transition-all duration-500">Delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
