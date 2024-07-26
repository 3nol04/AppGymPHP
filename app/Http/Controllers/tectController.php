<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class tectController extends Controller
{
    public function index( Member $member)
    {
      $member = Member::all();
        dd($member);
        return view('test');
    }
}
