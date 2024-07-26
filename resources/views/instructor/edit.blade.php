@extends('Dash.layout')

@section('content')
    <div class="container mx-auto p-4">
        <div class="flex justify-center">
            <div class="w-full max-w-lg">
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="bg-gray-800 text-white p-4 text-lg font-semibold">Edit Instructor</div>
                    <div class="p-4">
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('instructor.update', $instructor->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="mb-4">
                                <label for="nama" class="block text-gray-700 font-medium mb-1">Nama</label>
                                <input type="text" name="nama" class="w-full p-2 border border-gray-300 rounded" id="nama"
                                    value="{{ $instructor->name }}">
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="block text-gray-700 font-medium mb-1">Description</label>
                                    <input type="text" name="description" class="w-full p-2 border border-gray-300 rounded" id="description"
                                    value="{{ $instructor->description }}">
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                                    <input type="email" name="email" class="w-full p-2 border border-gray-300 rounded" id="email"
                                    value="{{ $instructor->email }}">
                                </div>
                                <div class="mb-4">
                                    <label for="phone" class="block text-gray-700 font-medium mb-1">Phone</label>
                                    <input type="phone" name="phone" class="w-full p-2 border border-gray-300 rounded" id="phone"
                                    value="{{ $instructor->phone }}">
                            </div>
                            <div class="mb-4">
                                <label for="gender" class="block text-gray-700 font-medium mb-1">Gender</label>
                                <select name="gender" class="w-full p-2 border border-gray-300 rounded" id="gender">
                                    <option value="pria" {{ $instructor->gender == 'pria' ? 'selected' : '' }}>Pria</option>
                                    <option value="wanita" {{ $instructor->gender == 'wanita' ? 'selected' : '' }}>Wanita</option>
                                </select>
                            </div>
                            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
