@extends('Dash.layout')

@section('content')
    <div class="container mx-auto p-4">
        <!-- Success Alert -->
        @if (session()->has('info'))
            <div id="alert" class=" bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                {{ session()->get('info') }}
            </div>
            <script>
                setTimeout(() => {
                    const alert = document.getElementById('alert');
                    if (alert) {
                        alert.classList.add('opacity-0');
                        setTimeout(() => {
                            alert.remove();
                        }, 500); 
                    }
                }, 3000);
            </script>
            
        @endif
        <!-- Form Container -->
        <div class="flex justify-center my-3">
            <div class="w-full max-w-lg bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Tambah Instructor</h2>
                
                <!-- Form -->
                <form action="{{ route('instructor.store') }}" method="POST">
                    @csrf
                    <!-- Nama Instructor -->
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 text-sm font-medium mb-2">Nama Instructor :</label>
                        <input type="text" name="nama" id="nama" class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:ring focus:ring-indigo-200 focus:border-indigo-500" value="{{ old('nama') }}">
                        @error('nama')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-gray-700 text-sm font-medium mb-2">Description :</label>
                        <input type="text" name="description" id="description" class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:ring focus:ring-indigo-200 focus:border-indigo-500" value="{{ old('description') }}">
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Phone -->
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700 text-sm font-medium mb-2">Phone :</label>
                        <input type="text" name="phone" id="phone" class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:ring focus:ring-indigo-200 focus:border-indigo-500" value="{{ old('phone') }}">
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email :</label>
                        <input type="email" name="email" id="email" class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:ring focus:ring-indigo-200 focus:border-indigo-500" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Gender -->
                    <div class="mb-4">
                        <label for="gender" class="block text-gray-700 text-sm font-medium mb-2">Gender :</label>
                        <select name="gender" id="gender" class="shadow-sm appearance-none border border-gray-300 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:ring focus:ring-indigo-200 focus:border-indigo-500">
                            <option value="pria" {{ old('gender') == 'pria' ? 'selected' : '' }}>Pria</option>
                            <option value="wanita" {{ old('gender') == 'wanita' ? 'selected' : '' }}>Wanita</option>
                        </select>
                        @error('gender')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Submit Button -->
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-gray-800 text-white font-medium py-2 px-4 rounded hover:bg-gray-900 focus:outline-none focus:ring focus:ring-indigo-200 focus:border-indigo-500">Simpan</button>
                        <a href="{{ route('instructor.index') }}" class="inline-block align-baseline font-medium text-sm text-gray-800 hover:text-gray-600">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
