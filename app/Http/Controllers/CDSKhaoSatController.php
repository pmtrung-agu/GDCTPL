<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\CDSKhaoSat;
class CDSKhaoSatController extends Controller
{
    //
    function du_lieu(Request $request) {
        $so_luong = CDSKhaoSat::count();
        $danhsach = CDSKhaoSat::paginate(30);
        return view('Admin.KhaoSatCDS.du-lieu')->with(compact('so_luong', 'danhsach'));
    }

    function chi_tiet(Request $request, $id = '') {
        $ds = CDSKhaoSat::find($id);
        return view('Admin.KhaoSatCDS.chi-tiet')->with(compact('ds'));
    }

    function phan_tich(Request $request) {
        $so_luong = CDSKhaoSat::count();
        $huyen = CDSKhaoSat::groupBy(6)->get();
        $bang_1 = Config::get('data_phan_tich.bang_1');
        $bang_3 = Config::get('data_phan_tich.bang_3');
        return view('Admin.KhaoSatCDS.phan-tich')->with(compact('so_luong','huyen', 'bang_1','bang_3'));
    }
}
