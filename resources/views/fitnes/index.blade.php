@extends('Dash.layout')
@section('content')
<div class="w-auto h-auto my-4 mx-6">
    <table class="table-auto w-full mt-4 sticky ">
        <thead>
            <tr class="bg-gray-200 text-center" style="font-family: Poppins,sa">
                <th class="w-16">NO</th>
                <th class="w-32">Profile</th>
                <th class="w-44">nama</th>
                <th class="w-44">Email</th>
                <th class="w-44">Role</th>
                <th class="w-44">Dibaut</th>
                <th class="w-60">Action</th>
            </tr>
        </thead>
        <tbody class="text-center justify-center items-center" style="font-family: Poppins,sans-serif">
            @foreach($fitness as $fitnes)
                <tr class="bg-white border-b hover:bg-gray-100 text-center">
                    <td class="w-auto">{{ $loop->iteration }}</td>
                    <td class="w-auto justify-center flex items-center pt-3">
                        <img src="{{$fitnes->profile ? asset('storage/' . $fitnes->profile) : asset('images/user.png')}}" class="w-16 h-24">
                    </td>
                    <td class="w-auto ">{{ $fitnes->nama }}</td>
                    <td class="w-auto">{{$fitnes->email}}</td>
                    <td class="w-auto">{{$fitnes->role}}</td>
                    <td class="w-auto">{{$fitnes->created_at}}</td>
                    <td class="w-auto flex-cols  ">
                </div>
                        <div class="flex group justify-center h-auto w-auto items-center">
                            <div class="h-9 w-9 group-hover:w-24 transition-all duration-500 rounded-lg bg-sky-500 flex items-center justify-center overflow-hidden ">
                                <a href="{{route('fitnes.show',$fitnes->id)}}" class="mr-2 h-full w-full justify-center flex items-center">
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
                            <div class="flex group justify-center h-auto w-auto items-center">
                                <div class="h-9 w-9 group-hover:w-24 transition-all duration-500 rounded-lg bg-yellow-300 flex items-center justify-center overflow-hidden ">
                                    <a href="{{route('fitnes.edit',$fitnes->id)}}" class="mr-2 h-full w-full justify-center flex items-center">
                                        <?xml version="1.0" standalone="no"?>
                                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN" "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd"> <svg version="1.0" xmlns="http://www.w3.org/2000/svg" class="ml-2"
                                        width="20" height="20" viewBox="0 0 96.000000 96.000000" preserveAspectRatio="xMidYMid meet"> <g transform="translate(0.000000,96.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none"> 
                                        <path d="M604 668 c-147 -148 -173 -179 -179 -211 l-6 -38 38 7 c32 5 63 31 206 173 92 91 170 176 173 189 8 27 -11 52 -39 52 -14 0 -81 -60 -193 -172z"/>
                                        <path d="M198 804 c-54 -29 -58 -50 -58 -324 0 -361 -21 -340 340 -340 355 0 342 -10 338 276 -3 165 -5 188 -20 198 -13 8 -23 8 -35 0 -16 -10 -19 -34 -23 -200 l-5 -189 
                                        -255 0 -255 0 0 255 0 255 189 5 c166 4 190 7 200 23 8 12 8 22 0 35 -10 15 -32 17 -200 19 -152 2 -194 0 -216 -13z"/> </g>
                                        </svg>
                                        <span class="text-black hidden opacity-0 group-hover:inline-block group-hover:opacity-100 transition-all duration-500">Edit</span>
                                        </a>
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
                                        <form action="#" method="POST" onsubmit="return confirm('Are you sure you want to delete this instructor?');">
                                            @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <span class="text-black hidden opacity-0 group-hover:opacity-100 group-hover:inline-block transition-all duration-500">
                                                    Delete</span></button>
                                            </form>
                                    </div>
                                </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection