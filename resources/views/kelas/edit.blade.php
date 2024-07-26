@extends('Dash.layout')

@section('content')
    <div class="container mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg p-6 max-w-3xl mx-auto">
            <h2 class="text-2xl font-semibold mb-6 text-center">Edit Kelas</h2>
            <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="Id_user" class="block text-sm font-medium text-gray-700">ID User:</label>
                    <input type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" id="Id_user" name="id_user">
                    @error('name')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="harga_id" class="block text-sm font-medium text-gray-700">Kelas:</label>
                    <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" id="harga_kelas" name="harga_id" required>
                        @foreach($kelasharga as $harga)
                            <option value="{{ $harga->id }}" data-price="{{ $harga->price }}">{{ $harga->nama_kelas }}</option>
                        @endforeach
                    </select>
                    @error('harga_id')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi:</label>
                    <textarea class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" id="description" name="description" required></textarea>
                    @error('description')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="kuota" class="block text-sm font-medium text-gray-700">Bulan:</label>
                    <input type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" id="kuota" name="kuota" required>
                    @error('kuota')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="harga" class="block text-sm font-medium text-gray-700">Harga:</label>
                    <input type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" id="harga" name="harga" readonly>
                    @error('harga')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-4">
                    <label for="id_instruktor" class="block text-sm font-medium text-gray-700">Instruktor:</label>
                    <select class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" id="id_instruktor" name="id_instruktor" required>
                        @foreach($listInstructor as $instructor)
                            <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                        @endforeach
                    </select>
                    @error('id_instruktor')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="id_jadwal" class="block text-sm font-medium text-gray-700">Jadwal:</label>
                    <select name="id_jadwal" id="id_jadwal" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @foreach ($jadwals as $jadwal)
                            <option value="{{ $jadwal->id }}">{{ $jadwal->day }} - {{ $jadwal->jam_mulai }} s/d {{ $jadwal->jam_selesai }}</option>
                        @endforeach
                    </select>
                    @error('id_jadwal')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-4">
                    <label for="total" class="block text-sm font-medium text-gray-700">Total:</label>
                    <input type="number" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" id="total" name="price" readonly>
                    @error('price')
                        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Simpan</button>
                    <a href="{{ route('kelas.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kelasSelect = document.getElementById('harga_kelas');
            const hargaInput = document.getElementById('harga');
            const totalInput = document.getElementById('total');
            const bulanInput = document.getElementById('kuota');
    
            function updatePriceAndTotal() {
                const selectedOption = kelasSelect.options[kelasSelect.selectedIndex];
                const price = selectedOption.getAttribute('data-price');
                const kuota = parseInt(bulanInput.value)||0;
                const total = price * kuota;
                
                hargaInput.value = price;
                totalInput.value = total;
            }
    
            kelasSelect.addEventListener('change', updatePriceAndTotal);
            bulanInput.addEventListener('input', updatePriceAndTotal);
    
            if (kelasSelect.options.length > 0) {
                updatePriceAndTotal();
            }
        });
    </script>
@endsection
