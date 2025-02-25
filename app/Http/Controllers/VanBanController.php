<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VanBanController extends Controller
{
    //

    function list(Request $request) {
        return view('Admin.VanBan.list');
    }
}
