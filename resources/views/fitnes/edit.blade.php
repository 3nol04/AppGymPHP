@extends('Dash.layout')
@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="container mx-11">
                <div class="bg-white shadow-lg rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-4">Edit Role</h2>
                    <form action="{{ route('fitnes.update', $fitnes->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                            <div class="flex items-center">
                                <input type="radio" name="role" value="admin" {{ $user->role == 'admin' ? 'checked' : '' }} class="mr-2"> Admin
                            </div>
                            <div class="flex items-center mt-2">
                                <input type="radio" name="role" value="user" {{ $user->role == 'fitnes' ? 'checked' : '' }} class="mr-2"> User
                            </div>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Update Role
                        </button>
                    </form>
                </div>
            </div>
</div>
@endsection