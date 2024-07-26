<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;


class ProfileController extends Controller
{
    public function index()
    {
        // Ambil pengguna yang diotentikasi
        $user = auth()->user();
        $user = session('user');
        return view('profile.user', compact('user'));
    }

    

    public function editnama(Request $request)
    {
        $request->validate([
            'name' => 'string|max:25'
        ]);
        $nama = $request->name;
        $user = session('user');
        $profile = Member::find($user->id);
        if ($profile) {
            $profile->update([
                'nama' => $request->name
            ]);
            session()->put('user', $profile);
        }
        return redirect()->route('profile')->with(['success' => "Nama $nama berhasil diperbarui."]); ;
    }

    public function edittinggi(Request $request)
    {
        $user = session('user');
        $profile = Member::find($user->id);
        if ($profile) {
            $profile->update([
                'tinggi' => $request->tinggi
            ]);
            session()->put('user', $profile);
        }
        return redirect()->route('profile')->with('success', 'Tinggi badan berhasil diperbarui.');
    }

    public function editberat(Request $request)
    {
        $user = session('user');
        $profile = Member::find($user->id);
        if ($profile) {
            $profile->update([
                'berat' => $request->berat
            ]);
            session()->put('user', $profile);

        }
        return redirect()->route('profile')->with('success', 'Berat badan berhasil diperbarui.');
    }
    public function editusia(Request $request)
    {
        $user = session('user');
        $profile = Member::find($user->id);
        if ($profile) {
            $profile->update([
                'usia' => $request->umur
            ]);
            session()->put('user', $profile);
        }
        return redirect()->route('profile')->with('success', 'Usia berhasil diperbarui.');
    }

    public function editfoto(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $user = session('user');
        
        $profile = Member::find($user->id);
        if($profile->profile != null){
            Storage::delete($profile->profile);
            $profile->update([
                'profile' => $request->file('image')->store('profile', 'public'),
            ]);
        }else if($profile->profile == null){
            $profile->update([
                'profile' => $request->file('image')->store('profile', 'public'),
            ]);
        }
        
        session()->put('user', $profile);
        
        return redirect()->route('profile')->with('success', 'Foto profil berhasil diperbarui. ',);
    }
}
