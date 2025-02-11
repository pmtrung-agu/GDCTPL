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
        $nganh = CDSKhaoSat::groupBy(groups: 4)->get();
        $linhvuc = CDSKhaoSat::groupBy(3)->get();
        $bang_1 = Config::get('data_phan_tich.bang_1');
        $bang_3 = Config::get('data_phan_tich.bang_3');
        $bang_10 = Config::get('data_phan_tich.bang_10');
        $bang_11 = Config::get('data_phan_tich.bang_11');
        $danhsach = CDSKhaoSat::All();
        return view('Admin.KhaoSatCDS.phan-tich')->with(compact('so_luong','huyen', 'bang_1','bang_3', 'nganh', 'linhvuc', 'danhsach','bang_10','bang_11'));
    }

    function doanh_nghiep(Request $request) {
        $so_luong = CDSKhaoSat::count();
        $linhvuc = CDSKhaoSat::groupBy(3)->get();
        $bang_1 = Config::get('data_phan_tich.bang_1');
        $bang_3 = Config::get('data_phan_tich.bang_3');
        $danhsach = CDSKhaoSat::All();
        $dn = $request->input('doanh_nghiep');
        $lv = $request->input('linh_vuc');
        if($lv) {
            $doanh_nghiep = CDSKhaoSat::where(3,'=', $lv)->get();
        } else {
            $doanh_nghiep = '';
        }
        return view('Admin.KhaoSatCDS.doanh-nghiep')->with(compact('so_luong', 'bang_1','bang_3', 'linhvuc', 'danhsach', 'doanh_nghiep','lv', 'dn'));
    }
    function doanh_nghiep_linh_vuc(Request $request, $lv = '') {
        $danhsach = CDSKhaoSat::where(3,'=', $lv)->get();
        foreach($danhsach as $ds){
            echo '<option value="'.$ds[1].'">'.$ds[1].'</option>';
        }
    }

    function bieu_do(){
        $so_luong = CDSKhaoSat::count();
        $linhvuc = CDSKhaoSat::groupBy(3)->get();
        $bang_1 = Config::get('data_phan_tich.bang_1');
        $bang_3 = Config::get('data_phan_tich.bang_3');
        $bang_10 = Config::get('data_phan_tich.bang_10');
        $bang_11 = Config::get('data_phan_tich.bang_11');
        $danhsach = CDSKhaoSat::All();
        $huyen = CDSKhaoSat::groupBy(6)->get();
        $nganh = CDSKhaoSat::groupBy(groups: 4)->get();
        $linhvuc = CDSKhaoSat::groupBy(3)->get();
        return view('Admin.KhaoSatCDS.bieu-do')->with(compact('so_luong', 'bang_1','bang_3', 'linhvuc', 'danhsach', 'huyen','nganh','linhvuc','bang_10', 'bang_11'));
    }

    function nganh_nghe(Request $request) {
        $so_luong = CDSKhaoSat::count();
        $nn = $request->input('nganh_nghe');
        $bang_3 = Config::get('data_phan_tich.bang_3');
        $bang_1 = Config::get('data_phan_tich.bang_1');
        $nganh = CDSKhaoSat::groupBy(groups: 4)->get();
        return view('Admin.KhaoSatCDS.nganh-nghe')->with(compact('so_luong', 'nn','bang_3','nganh','bang_1'));
    }

    function linh_vuc(Request $request) {
        $so_luong = CDSKhaoSat::count();
        $lv = $request->input('linh_vuc');
        $bang_3 = Config::get('data_phan_tich.bang_3');
        $bang_1 = Config::get('data_phan_tich.bang_1');
        $linhvuc = CDSKhaoSat::groupBy(3)->get();
        return view('Admin.KhaoSatCDS.linh-vuc')->with(compact('so_luong', 'lv','bang_3','linhvuc','bang_1'));
    }

    function dn_doanh_nghiep(){
        $so_luong = CDSKhaoSat::count();
        $danhsach = CDSKhaoSat::paginate(30);
        return view('Admin.DoanhNghiep.list')->with(compact('danhsach','so_luong'));
    }

    function dn_doanh_nghiep_chi_tiet(Request $request, $id = '') {
        $ds = CDSKhaoSat::find($id);
        return view('Admin.DoanhNghiep.chi-tiet')->with(compact('ds'));
    }
}
