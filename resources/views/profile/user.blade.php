@extends('Dash.layout')
@section('content')
<div class="w-full h-screen rounded-lg">
    <ul class="w-full h-24 justify-start flex items-start border-b shadow-xl">
        <li class="w-full h-full pt-5 pl-5  text-center">
            <h1 class="text-4xl " style="font-family: Poppins, sans-serif ">Profile</h1>
        </li>
    </ul>
    <!-- Main Container -->
    @if(session('success'))
    <p>{{ session('success') }}</p>
    @endif
    <div class="w-full h-auto py-5 px-5 flex rounded-lg">
        <div class="w-full h-auto flex items-start justify-start rounded-lg border shadow-xl p-5">
            <div class=" rounded-lg flex-row items-center justify-center border shadow-md">
                <div class="w-30 h-60 p-4 md:h-50 md:w-56">
                    <img src="{{$user->profile ? asset('storage/' . $user->profile) : asset('images/user.png') }}" alt="Profile" class="w-full h-full object-cover rounded-lg">

                </div>
                <div class="flex items-center justify-center p-5"> <form action="{{ route('edit.foto') }}" method="POST" enctype="multipart/form-data" class="w-full h-full" id="uploadForm">
                    @csrf
                    @method('PUT')
                    <label for="image" class="block w-full py-2 px-4 bg-blue-500 text-white text-center rounded-lg cursor-pointer hover:bg-blue-700 transition-all duration-300">
                        <p class="text-white hover:text-black transition-transform duration-500">Ungah</p>
                        <input type="file" name="image" id="image" class="hidden" accept="image/*" onchange="handleFileSelect(event)">  
                    </label>
                    <div id="imageContainer" class="bg-gray-100 absolute hidden items-center justify-center h-screen">
                        <div id="imagePreviewContainer" class="w-auto h-auto overflow-y-auto overflow-x-hidden fixed inset-0 m-auto z-50 bg-slate-600 bg-opacity-90 rounded-lg shadow-lg flex flex-col justify-center items-center">
                            <div class="w-10 h-10 flex my-4 justify-center items-center rounded-full bg-white">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" id="close" class="cursor-pointer"
                                    width="24" height="24" viewBox="0 0 100.000000 100.000000" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                        <path d="M150 845 l-24 -26 159 -159 160 -160 -160 -160 -160 -160 28 -27 27 -28 160 160 160 160 160 -160 160 -160 27 28 28 27 -160 160 -160 160 160 160 160 160 -28 27 -27 28 -160 -160 -160 -160 -158 158 c-86 86 -160 157 -163 157 -3 0 -16 -11 -29 -25z"/>
                                    </g>
                                </svg>
                            </div>
                            <img src="#" id="previewImg" alt="Preview" class="w-auto h-72 object-contain mx-auto">
                            <button class="w-40 mt-4 text-white bg-green-500 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Upload</button>
                        </div>
                    </div>
                    
                    </form>
                </div>
                </div>
                <div class="flex flex-col w-full h-full mx-5 gap-2">
                    <P class ="font-semibold text-lg text-slate-500">Ubah Biodata Diri</P>
                    <div class="px-5 py-5 space-y-4 w-full h-auto rounded-lg text-black">
                        @if($user->role == 'fitnes')
                        <div class="grid grid-cols-5  md:grid-cols-3 gap-4">
                            <p class="font-semibold text-slate-500">ID</p>
                            <p class="text-slate-500">{{ $user->id }}</p>
                        </div>
                        @endif
                        <div class="grid grid-cols-5  md:grid-cols-3 gap-4">
                            <p class="font-semibold text-slate-500">Nama</p>
                            <p class="text-slate-500">{{ $user->nama }}</p>
                            <p data-modal-target="name" data-modal-toggle="name" class="cursor-pointer text-slate-600 hover:text-lime-500 transition-all duration-300 hover:underline  ">
                                Ubah
                                </p>
                        </div>
                        <div class="grid grid-cols-5 md:grid-cols-3 gap-4">
                            <p class="font-semibold text-slate-500">Email</p>
                            <p class="text-slate-500">{{ $user->email }}</p>
                        </div>
                        <div class="grid grid-cols-5 md:grid-cols-3 gap-4">
                            <p class="font-semibold text-slate-500">Usia</p>
                            <p class="text-slate-500">{{ $user->usia }} tahun</p>
                            <p data-modal-target="usia" data-modal-toggle="usia" class="cursor-pointer text-slate-600 hover:text-lime-500  transition-all duration-300 hover:underline  ">
                                Ubah
                                </p>
                        </div>
                        <div class="grid grid-cols-5 md:grid-cols-3 gap-4">
                            <p class="font-semibold text-slate-500">Berat</p>
                            <p class="text-slate-500">{{ $user->berat }} kg</p>
                            <p data-modal-target="berat" data-modal-toggle="berat" class="cursor-pointer text-slate-600 hover:text-lime-500 transition-all duration-300 hover:underline  ">
                                Ubah
                                </p>
                        </div>
                        <div class="grid grid-cols-5 md:grid-cols-3 gap-4">
                            <p class="font-semibold text-slate-500">Tinggi</p>
                            <p class="text-slate-500">{{ $user->tinggi }} cm</p>
                            <p data-modal-target="tinggi" data-modal-toggle="tinggi" class="cursor-pointer text-slate-600 hover:text-lime-500 transition-all duration-300 hover:underline  ">
                                Ubah
                                </p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="name" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full transition-transform duration-500">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow ">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                                Form Input Nama
                            </h3>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form class="space-y-4" action="{{ route('edit.nama') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="relative w-full h-auto">
                                    <input type="text" name="name" class="peer w-full h-10" id="name" placeholder=" " required />
                                    <label for="name" class="absolute mx-3 px-1 left-0 bg-white text-slate-500 -top-3.5 text-sm transition-all
                                    peer-placeholder-shown:text-base peer-placeholder-shown:top-2  peer-placeholder-shown:text-black
                                    peer-focus:-top-3.5 peer-focus:text-slate-500 peer-focus:text-sm peer-focus:translate-x-3" >
                                        Enter New Name
                                    </label>
                                </div>
                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="usia" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full transition-transform duration-500">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow ">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                                Form Input Usia
                            </h3>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form class="space-y-4" action="{{ route('edit.usia')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="relative w-full h-auto">
                                    <input type="text" name="umur" class="peer w-full h-10" id="name" placeholder=" " required />
                                    <label for="name" class="absolute mx-3 px-1 left-0 bg-white text-slate-500 -top-3.5 text-sm transition-all
                                    peer-placeholder-shown:text-base peer-placeholder-shown:top-2  peer-placeholder-shown:text-black
                                    peer-focus:-top-3.5 peer-focus:text-slate-500 peer-focus:text-sm peer-focus:translate-x-3" >
                                        Enter New Usia
                                    </label>
                                </div>
                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- endModal --}}
            <div id="berat" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full transition-transform duration-500">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow ">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                                Form Input Berat
                            </h3>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form class="space-y-4" action="{{ route('edit.berat')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="relative w-full h-auto">
                                    <input type="text" name="berat" class="peer w-full h-10" id="name" placeholder=" " required />
                                    <label for="name" class="absolute mx-3 px-1 left-0 bg-white text-slate-500 -top-3.5 text-sm transition-all
                                    peer-placeholder-shown:text-base peer-placeholder-shown:top-2  peer-placeholder-shown:text-black
                                    peer-focus:-top-3.5 peer-focus:text-slate-500 peer-focus:text-sm peer-focus:translate-x-3" >
                                        Enter New Berat
                                    </label>
                                </div>
                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- endModal --}}
            <div id="tinggi" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full transition-transform duration-500">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow ">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                                Form Input Tinggi
                            </h3>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form class="space-y-4" action="{{route('edit.tinggi')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="relative w-full h-auto">
                                    <input type="text" name="tinggi" class="peer w-full h-10" id="name" placeholder=" " required />
                                    <label for="name" class="absolute mx-3 px-1 left-0 bg-white text-slate-500 -top-3.5 text-sm transition-all
                                    peer-placeholder-shown:text-base peer-placeholder-shown:top-2  peer-placeholder-shown:text-black
                                    peer-focus:-top-3.5 peer-focus:text-slate-500 peer-focus:text-sm peer-focus:translate-x-3" >
                                        Enter New  Tinggi
                                    </label>
                                </div>
                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- endModal --}}
        </div>
    </div>
    <script>
          const previewImg = (event) => {
    const file = event.target.files[0];
    if (file) {
        const previewImgElement = document.getElementById("previewImg");
        const imagePreviewElement = document.getElementById("imageContainer");
        const reader = new FileReader();
        reader.onload = (e) => {
           previewImgElement.src = e.target.result; 
        }
        reader.readAsDataURL(file);
        imagePreviewElement.classList.remove("hidden");
    }
};

document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('image').addEventListener('change', previewImg);
    document.getElementById('close').addEventListener('click', () => {
        document.getElementById('imageContainer').classList.add('hidden');
    });
});
    </script>
@endsection