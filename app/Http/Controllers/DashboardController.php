<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Models\Member;


class DashboardController extends Controller
{
    public function index()
    {
        $user = session('user');
        $listKelas = Kelas::all();
        $subtotal = $listKelas->sum('price');
        $member = Member::where ('role','fitnes')->get();
        $fitnes =$member->count();
        $totalinstructor = Instructor::count();
        return view('dashboard', compact('listKelas', 'fitnes','totalinstructor', 'user','subtotal'));
    }
    public function fitnes()
    {
        $user = session('user');
        $fitness = Member::where ('role','fitnes')->get();
        return view ('fitnes.index',compact('fitness','user'));
    }
    public function show($id)
    {
        $user = session('user');
        $fitnes = Member::findOrFail($id);
        return view('fitnes.show', compact('fitnes', 'user'));
    }
    public function edit($id)
    {
        $user = session('user');
        $fitnes = Member::findOrFail($id);
        return view('fitnes.edit', compact('fitnes', 'user'));
    }
    public function update(Request $request, $id)
    {
        $user = session('user');
        $fitnes = Member::findOrFail($id);
        $fitnes->update($request->all());
        return redirect()->route('fitnes.index', compact('fitnes', 'user'));
    }
    public function destroy($id)    
    {
        $fitnes = Member::findOrFail($id);
        $fitnes->delete();
        return redirect('/dashboard/fitnes');
    }   
}
