<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DMDiaChi;
use App\Models\DMThongTin;
use App\Models\DMSanPham;
use App\Models\DMLinhVuc;
use App\Models\DMNganhNghe;
use App\Models\ThongTin;
class FrontendController extends Controller
{
    //
    function index()    {
        return view('Frontend.index');
    }

    function thong_tin(Request $request, $taxonomy = '') {
        $danhsach = ThongTin::where('tags', $taxonomy)->get();

        return view('Frontend.thong-tin');
    }
}
