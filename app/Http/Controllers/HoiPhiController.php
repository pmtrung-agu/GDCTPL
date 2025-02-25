<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HoiPhiController extends Controller
{
    //
    function list(Request $request) {
        return view('Admin.HoiPhi.list');
    }
}
