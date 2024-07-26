<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function prosesLogin(Request $request)
{
        $messages = [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus valid',
            'email.max' => 'Email maksimal 255 karakter',
            'password.required' => 'Password harus diisi',
        ];

        $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ],$messages);

        $user = Member::where('email', $request->email)->first();
        if($user && Hash::check($request->password, $user->password)){
            session(['user' => $user]);
            if($user->role === 'admin'){
                return redirect()->route('dashboard'); 
            } elseif($user->role === 'fitnes'){
                return redirect()->route('profile');
            }

        }else if(!$user){
            return redirect()->route('login')->with('error', 'Maaf email tidak terdaftar');
        }

    return redirect()->route('login')->with('error', 'Maaf password atau email anda salah');
}



public function prosesregister(Request $request)
{
    $messages = [
        'name.required' => 'Nama harus diisi',
        'name.max' => 'Nama maksimal 20 karakter',
        'name.min' => 'Nama minimal 3 karakter',
        'email.required' => 'Email harus diisi',
        'email.max' => 'Email maksimal 255 karakter',
        'email.email' => 'Email harus valid',
        'email.unique' => 'Email sudah terdaftar',
        'password.required' => 'Password harus diisi',
        'password.confirmed' => 'Password tidak sama',
        'passworsd.min' => 'Password minimal 8 karakter',
        'password_confirmation.required' => 'Konfirmasi password harus diisi',
        'password_confirmation.min' => 'Konfirmasi password minimal 8 karakter',
    ];

    $request->validate([
        'name' => 'required|string|max:20|min:3',
        'email' => 'required|email:rfc,dns|max:255|unique:members,email', 
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required|min:8'
    ], $messages);
    $password = bcrypt($request->password);

    if($request->password == $request->password_confirmation){
    $user = Member::create([
        'nama' => $request->name,
        'email' => $request->email,
        'password' => $password,
        'role' => 'fitnes',
        'usia' => '0',
        'tinggi' => '0',
        'berat' => '0',
    ]);
        }
    $token = $user->createToken('auth_token')->plainTextToken;
    session()->put('auth_token', $token);

    return  redirect()->route('login')->with('success', 'Registrasi Berhasilus');
}

    public function edit(Request $request, $id)
    {
        $user = Member::find($id);
        $user->update($request->all());

        return redirect('from.edit')->compect('user');
        }
    public function formLogin(){
        return view('Auth.login');
    }

    public function formRegister(){
        return view('Auth.register');
    }

    public function logout(){
        Auth::logout();
        session()->forget('user');
        return redirect()->route('login');
    }

    public function dashboard()
    {
        $user = session('user'); // Ambil data pengguna dari sesi
            return view('Dash.layout')->with('user', $user);

    }
}
