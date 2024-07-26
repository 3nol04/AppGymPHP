<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class InstructorController extends Controller
{
    public function index()
    {
        $user = session('user');
        $listinstructor = Instructor::all();
        return view('instructor.index', ['listinstructor' => $listinstructor], compact('user'));
    }
    public function create()
    {
        $user = session('user');
        return view('instructor.create',compact('user'));
    }
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'nama' => 'required|min:3|max:100',
        'description' => 'required|min:30|max:1000',
        'phone' => 'required',
        'email' => 'required|email',
        'gender' => 'required|in:pria,wanita',
    ]);
    
    $instructor = new Instructor();
    $instructor->name = $validatedData['nama'];
    $instructor->description = $validatedData['description'];
    $instructor->phone = $validatedData['phone'];
    $instructor->email = $validatedData['email'];
    $instructor->gender = $validatedData['gender'];
    $instructor->save();
    
    session()->flash('info', "Data instructor $instructor->nama berhasil disimpan ke database");
    return redirect()->route('instructor.create');
    }
    public function show(Instructor $instructor)
    {
        $user = session('user');
        return view('instructor.show', compact('user', 'instructor'));
    }
    public function edit(Instructor $instructor)
    {
        $user = session('user');
        $instructor;
        return view('instructor.edit', compact('user', 'instructor'));
    }
    public function update(Request $request, Instructor $instructor)
    {
        $massage=[
            'nama.required' => ':attribute harus diisi',
            'nama.min' => ':attribute minimal 10 karakter',
            'nama.max' => ':attribute maksimal 100 karakter',
            'description.required' => ':attribute harus diisi',
            'description.min' => ':attribute minimal 3 karakter',
            'description.max' => ':attribute maksimal 1000 karakter',
            'phone.required' => ':attribute harus diisi',
            'phone.max' => ':attribute maksimal 12 karakter',
            'phone.min' => ':attribute minimal 12 karakter',
            'email.required' => ':attribute harus diisi',
            'email.email' => ':attribute harus valid',
            'gender.required' => ':attribute harus diisi',
            'gender.in' => ':attribute harus pria atau wanita',
        ];
    $validatedData = $request->validate([
        'nama' => 'required|min:3|max:100',
        'description' => 'required|min:10|max:1000',
        'phone' => 'required|min:12|max:13',
        'email' => 'required|email',
        'gender' => 'required|in:pria,wanita',
    ], $massage);

    $instructor->update([
        'name' => $validatedData['nama'],
        'description' => $validatedData['description'],
        'phone' => $validatedData['phone'],
        'email' => $validatedData['email'],
        'gender' => $validatedData['gender'],
    ]);
    session()->flash('info', "Data instructor {$validatedData['nama']} berhasil diupdate ke database");
    return redirect()->route('instructor.index');
    }
    public function destroy(Instructor $instructor)
    {
        try {
            $instructor->delete();
            return redirect()->route('instructor.index')->with('info', "Data instructor $instructor->nama berhasil dihapus");
        } catch (\Exception $e) {
            return redirect()->route('instructor.index')->with('error', "Terjadi kesalahan saat menghapus data instructor");
        }
    }
}
