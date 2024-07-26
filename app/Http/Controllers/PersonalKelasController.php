<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;


class PersonalKelasController extends Controller
{
    public function kelas() {
        $user = session('user');
        $kelass = Kelas::where('member_id', $user->id)->get();
        return view('profile.kelasku', compact('kelass', 'user')); // Menampilkan data ke tampilan
    }
    
}
