@extends('Dash.layout')
    @section('content')
    @if (session('info'))
        <div id="session-message" class="bg-blue-500 text-white p-4 rounded shadow-md flex items-center justify-between transition transform duration-500 ease-in-out" role="alert">
            <div class="flex items-center">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 18h0M12 18v.01M4 6a9 9 0 0118 0v4a9 9 0 01-18 0V6z"></path>
                </svg>
                {{ session('info') }}
            </div>
            <button type="button" class="text-white hover:text-gray-200 focus:outline-none ml-4" onclick="this.parentElement.remove();">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <script>
            setTimeout(() => {
                const messageElement = document.getElementById('session-message');
                if (messageElement) {
                    messageElement.classList.add('opacity-0');
                    messageElement.classList.add('translate-x-10');
                    setTimeout(() => {
                        messageElement.remove();
                    }, 500); 
                }
            }, 3000);
        </script>
    @endif
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded shadow-md mt-3 flex items-center justify-between" role="alert">
            <div>
                <svg class="inline w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
            <button type="button" class="text-white focus:outline-none" onclick="this.parentElement.remove();">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    @endif
    @php
        use Illuminate\Support\Str;
    @endphp
            <div class="w-full h-20  justify-center flex items-center ">
                <h1 class="text-3xl text-slate-800" style="font-family: 'Poppins', sans-serif">Daftar Instructor</h1>
            </div>
            <div class="mx-6 my-5 w-60 h-10 group">
                <a href="{{ route('instructor.create') }}" class="bg-sky-500 h-auto w-full flex justify-center items-center group-hover:ring-4 group-hover:ring-indigo-500 group-hover:ring-offset-2  group-hover:bg-sky-500 group-hover: font-medium rounded-lg text-lg  px-5 py-2.5 text-center gap-2 transition-all duration-500">
                    <?xml version="1.0" standalone="no"?><!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
                    <svg version="1.0" class="relative group-hover:rotate-180  transition-all duration-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 64.000000 64.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,64.000000) scale(0.100000,-0.100000)"
                    fill="#000000" stroke="none"> <path d="M226 594 c-71 -22 -159 -112 -180 -184 -34 -115 -12 -206 73 -291 85 -85 176 -107 291 -73 75 22 162 109 184 184 34 115 12 206 -73 291 -85 84 -180 108 -295 73z m226 -41 c92 -51 146 -155 135 -261 -15 -145 -149 -254
                    -295 -239 -145 15 -254 149 -239 295 11 102 92 201 191 232 57 17 150 5 208
                    -27z"/> <path d="M224 526 c-84 -39 -134 -118 -134 -212 0 -40 39 -136 60 -149 19 -12 24 4 7 23 -26 29 -47 88 -47 134 1 114 99 208 218 208 17 0 32 5 32 10 0 19 -85 10 -136 -14z"/>
                    <path d="M390 530 c0 -12 28 -25 36 -17 3 3 -4 10 -15 17 -15 7 -21 7 -21 0z"/> <path d="M450 494 c0 -4 13 -21 29 -40 62 -70 65 -198 7 -263 -22 -25 -22 -48 1 -30 28 24 63 111 63 159 0 49 -29 122 -62 158 -21 21 -38 29 -38 16z"/> <path d="M310 380 l0 -50 -50 0 c-27 0 -50 -4 -50 -10 0 -5 23 -10 50 -10 l50
                    0 0 -50 c0 -27 5 -50 10 -50 6 0 10 23 10 50 l0 50 50 0 c28 0 50 5 50 10 0 6
                    -22 10 -50 10 l-50 0 0 50 c0 28 -4 50 -10 50 -5 0 -10 -22 -10 -50z"/><path d="M211 146 c-8 -9 -11 -19 -7 -23 9 -9 29 13 24 27 -2 8 -8 7 -17 -4z"/><path d="M410 148 c0 -18 18 -34 28 -24 3 4 -2 14 -11 23 -16 16 -17 16 -17 1z"/><path d="M260 114 c0 -8 5 -12 10 -9 6 3 10 10 10 16 0 5 -4 9 -10 9 -5 0 -10
                    -7 -10 -16z"/> <path d="M310 110 c0 -11 5 -20 10 -20 6 0 10 9 10 20 0 11 -4 20 -10 20 -5 0 -10 -9 -10 -20z"/> <path d="M360 121 c0 -6 5 -13 10 
                    -16 6 -3 10 1 10 9 0 9 -4 16 -10 16 -5 0 -10 -4 -10 -9z"/>
                    </g>
                    </svg>
                    <div class ="relative group-hover:translate-x-1 transition-all duration-500 h-auto w-auto">
                        <span class="group-hover:text-white transition-all duration-500">Tambah Instructor</span>
                    </div>
                </a>
            </div>
            <div class="w-auto h-auto mx-4">
                <table class="table-full w-full sticky">
                    <thead >
                        <tr class="bg-gray-100 gap-6p">
                            <th class="w-24">ID</th>
                            <th>Nama</th>
                            <th class="w-64">Description</th>
                            <th>Phone</th>
                            <th class="w-50">Email</th>
                            <th class="w-32">Gender</th>
                            <th class="w-52">Action</th>
                        </tr>
                    </thead>
                    @foreach ($listinstructor as $instructor)
                    <tbody>
                        <tr class="bg-white border-b text-center h-16">
                            <td class="w-4">{{$loop->iteration }}</td>
                            <td class="w-auto">{{Str::limit($instructor->name,10)}}</td>
                            <td class="w-auto text-left">{{Str::limit($instructor->description,50)}}.</td>
                            <td class="w-auto">{{ $instructor->phone ? $instructor->phone : '-' }}</td>
                            <td class="w-auto">{{ $instructor->email }}</td>
                            <td class="w-40">{{ $instructor->gender}}</td>
                            <td class="w-auto ml-2 justify-center flex items-center gap-2">
                                <div class="flex group justify-center h-auto w-auto items-center">
                                    <div class="h-9 w-9 group-hover:w-24 transition-all duration-500 rounded-lg bg-sky-500 flex items-center justify-center overflow-hidden">
                                        <a id="Link" class="mr-2 h-full w-full justify-center flex items-center" href="{{ route('instructor.show', $instructor->id) }}">
                                            <svg class="ml-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 60.000000 60.000000" preserveAspectRatio="xMidYMid meet">
                                                <g transform="translate(0.000000,60.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                                    <path d="M192 529 c-48 -14 -109 -80 -123 -131 -23 -89 12 -182 88 -229 49 -31 140 -33 196 -5 l38 19 65 -64 c50 -50 66 -61 76 -51 10 10 -1 26 -51 76 l-64 65 19 38 c28 56 26 147 -5 196 -47 76 -150 113 -239 86z m131 -43 c103 -43 128 -177 48 -257 -112 -113 -296 -12 -267 146 18 94 128 150 219 111z"/>
                                                    <path d="M164 349 c-10 -17 13 -36 27 -22 12 12 4 33 -11 33 -5 0 -12 -5 -16 -11z"/>
                                                    <path d="M244 349 c-10 -17 13 -36 27 -22 12 12 4 33 -11 33 -5 0 -12 -5 -16 -11z"/>
                                                    <path d="M324 349 c-10 -17 13 -36 27 -22 12 12 4 33 -11 33 -5 0 -12 -5 -16 -11z"/>
                                                </g>
                                            </svg>
                                            <span class="text-black hidden opacity-0 group-hover:opacity-100 group-hover:inline-block transition-all duration-500">Detail</span>
                                        </a>
                                    </div>
                                </div>
                                <div class=" flex group justify-center h-auto w-auto items-center ">
                                            <div class="h-9 w-9 group-hover:w-24 transition-all duration-500 rounded-lg bg-yellow-300 flex items-center justify-center overflow-hidden">
                                                <a class="mr-2 h-full w-full justify-center flex items-center" href="{{ route('instructor.edit', $instructor->id) }}">
                                                <?xml version="1.0" standalone="no"?>
                                                    <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd"> <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="ml-2"
                                                    width="20" height="20" viewBox="0 0 96.000000 96.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,96.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none"> 
                                                    <path d="M604 668 c-147 -148 -173 -179 -179 -211 l-6 -38 38 7 c32 5 63 31 206 173 92 91 170 176 173 189 8 27 -11 52 -39 52 -14 0 -81 -60 -193 -172z"/>
                                                    <path d="M198 804 c-54 -29 -58 -50 -58 -324 0 -361 -21 -340 340 -340 355 0 342 -10 338 276 -3 165 -5 188 -20 198 -13 8 -23 8 -35 0 -16 -10 -19 -34 -23 -200 l-5 -189 
                                                    -255 0 -255 0 0 255 0 255 189 5 c166 4 190 7 200 23 8 12 8 22 0 35 -10 15 -32 17 -200 19 -152 2 -194 0 -216 -13z"/> </g>
                                                    </svg>
                                                    <span class="text-black hidden opacity-0 group-hover:opacity-100 group-hover:inline-block transition-all duration-500">Edit</span></a>
                                                </div>
                                            </div>
                                        <div class=" flex group justify-center h-auto w-auto items-center ">
                                            <div class="h-9 w-9 group-hover:w-24 transition-all duration-500 rounded-lg bg-red-500 flex items-center justify-center overflow-hidden">
                                                <?xml version="1.0" standalone="no"?> <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd"> <svg version="1.0" 
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 96.000000 96.000000" preserveAspectRatio="xMidYMid meet">
                                                <g transform="translate(0.000000,96.000000) scale(0.100000,-0.100000)"
                                                fill="#000000" stroke="none"> <path d="M383 860 c-4 -16 -14 -20 -45 -20 -54 0 -91 -22 -124 -74 -22 -35 -35 -46 -59 -48 -25 -2 -30 -7 -30 -28 l0 -25 301 -3 300 -2 -12 -113 c-18
                                                -160 -18 -206 2 -214 29 -11 40 22 54 165 7 77 15 144 19 150 3 5 15 11 26 13 14 3 20 12 20 29 0 20 -5 26 -30 28 -24 2 -37 13 -59 48 -33 52 -70 74 -124  74 -31 0 -41 4 -45 20 -5 
                                                18 -14 20 -97 20 -83 0 -92 -2 -97 -20z m297 -107 l22 -28 -111 -3 c-61 -1 -161 -1 -222 0 l-111 3 22 28 21 27 179 0 179 0 21 -27z"/>
                                                <path d="M192 597 c-8 -9 -6 -65 8 -197 33 -311 23 -300 278 -300 196 0 224 7 248 65 20 48 19 124 -2 132 -23 9 -44 -23 -44 -67 0 -65 -14 -70 -202 -70 
                                                -145 0 -167 2 -180 18 -11 12 -22 77 -37 216 -19 186 -26 215 -52 216 -4 0 -11 -6 -17 -13z"/>
                                            </g>
                                        </svg>
                                        <form action="{{ route('instructor.destroy', $instructor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this instructor?');">
                                            @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                        <span class="text-black hidden opacity-0 group-hover:opacity-100 group-hover:inline-block transition-all duration-500">
                                                        Delete</span></button>
                                                    </form>
                                                </div>
                                        </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
@endsection