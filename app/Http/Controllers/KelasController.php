<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Instructor;
use App\Models\Jadwal;
use App\Models\Kelasharga;
use App\Models\Member;


class KelasController extends Controller
{
    public function index()
    {
        $user = session('user');
        $listKelas = Kelas::all();
        return view('kelas.index', compact('user', 'listKelas'));
    }

    public function create()
    {
        $user = session('user');
        $listInstructors = Instructor::all();
        $jadwals = Jadwal::all();
        $kelasharga = Kelasharga::all();
        $members = Member::all();
        return view('kelas.create', compact('user', 'listInstructors', 'jadwals', 'kelasharga', 'members'));    
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_user'=>'required|integer|exists:members,id',
            'description' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'kuota' => 'required|numeric',
            'price' => 'required|numeric',
            'harga_id' => 'required|exists:kelas_harga,id',
            'id_instruktor' => 'required|exists:instructors,id',
            'id_jadwal' => 'required|exists:jadwals,id'
        ]);
            $user = Member:: findOrFail($request->id_user);
        If(!$request->id_user){
            return redirect()->route('kelas.create')->with('info', 'Id User Tidak Boleh Kosong');
        }else if($user){    
            Kelas::create([
                'member_id' => $request->id_user,
                'description' => $request->description,
                'kuota' => $request->kuota,
                'harga' => $request->harga,
                'price' => $request->price,
                'id_jadwal' => $request->id_jadwal,
                'id_instruktor' => $request->id_instruktor,
                'harga_id' => $request->harga_id,
            ]);
            return redirect()->route('kelas.index')->with('info', 'Kelas Berhasil');
        }
        return redirect()->route('kelas.crate')->with('info', 'user tIdak ditemukan');
    }

    public function show($id)
    {
        $user = session('user');
        $kelas = Kelas::findOrFail($id);
        return view('kelas.show', compact('kelas', 'user'));
    }

    public function edit($id)
    {
        $user = session('user');
        $kelas = Kelas::findOrFail($id);
        $listInstructor = Instructor::all();
        $kelasharga = Kelasharga::all();
        $jadwals = Jadwal::all();
        return view('kelas.edit', compact('kelas', 'listInstructor', 'jadwals', 'user', 'kelasharga'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_user'=>'required|integer|exists:members,id',
            'description' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'kuota' => 'required|numeric',
            'price' => 'required|numeric',
            'harga_id' => 'required|exists:kelas_harga,id',
            'id_instruktor' => 'required|exists:instructors,id',
            'id_jadwal' => 'required|exists:jadwals,id'
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->description = $request->description;
        $kelas->kuota = $request->kuota;
        $kelas->harga = $request->harga;
        $kelas->price = $request->price;
        $kelas->harga_id = $request->harga_id;
        $kelas->id_jadwal=$request->id_jadwal;
        $kelas->id_instruktor = $request->id_instruktor;
        $kelas->member_id = $request->id_user;
        $kelas->save();

        return redirect()->route('kelas.index')->with('info', 'Kelas berhasil diperbarui');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas.index')->with('info', 'Kelas berhasil dihapus');
    }
}
