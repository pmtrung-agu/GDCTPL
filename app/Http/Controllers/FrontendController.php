<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DMDiaChi;
use App\Models\DMThongTin;
use App\Models\DMSanPham;
use App\Models\DMLinhVuc;
use App\Models\DMNganhNghe;
use App\Models\ThongTin;
use App\Models\NhuCauCDS;
use App\Models\TuVanCDS;
use App\Models\CDSKhaoSat;
class FrontendController extends Controller
{
    //
    function index()    {
        $thong_tin = ThongTin::orderBy('updated_at', 'desc')->paginate(6);
        return view('Frontend.index')->with(compact('thong_tin'));
    }

    function thong_tin(Request $request, $taxonomy = '') {
        $danhsach = ThongTin::where('tags', $taxonomy)->get();
        $tax = DMThongTin::where('slug', '=', $taxonomy)->first();
        return view('Frontend.thong-tin')->with(compact('danhsach', 'tax'));
    }

    function thong_tin_chi_tiet(Request $request, $slug = '') {
        $ds = ThongTin::where('slug', '=', $slug)->first();
        $bai_viet_moi = ThongTin::orderBy('updated_at', 'desc')->paginate(6);
        return view('Frontend.thong-tin-chi-tiet')->with(compact('ds', 'bai_viet_moi'));
    }
    function goi_yeu_cau(){
        return view('Frontend.goi-yeu-cau');
    }
    function goi_yeu_cau_submit(Request $request){
        $ho_ten = $request->input('ho_ten');
        $email = $request->input('email');
        $dien_thoai = $request->input('dien_thoai');
        $nhu_cau = $request->input('nhu_cau');
        $noi_dung = $request->input('noi_dung');
        
        $db = new NhuCauCDS();
        $db->ho_ten = $ho_ten;
        $db->email = $email;
        $db->dien_thoai = $dien_thoai;
        $db->nhu_cau = $nhu_cau;
        $db->noi_dung = $noi_dung;
        $db->save();
        return "Gởi nhu cầu chuyển đồi số thành công!\nChuyên gia sẽ liên hệ giải đáp sớm nhất có thể.\nCám ơn đã gởi thông tin.";
    }

    function tu_van_chuyen_doi_so(){
        return view('Frontend.tu-van-cds');
    }

    function tu_van_chuyen_doi_so_submit(Request $request){
        $id_group = $request->input('id_group');
        $ho_ten = $request->input('ho_ten');
        $email = $request->input('email');
        $dien_thoai = $request->input('dien_thoai');
        $nhu_cau = $request->input('nhu_cau');
        $noi_dung = $request->input('noi_dung');
        
        

        $db = new TuVanCDS();
        $db->id_group = $id_group ? ObjectController::ObjectId($id_group) : ObjectController::Id();
        $db->ho_ten = $ho_ten;
        $db->email = $email;
        $db->dien_thoai = $dien_thoai;
        $db->nhu_cau = $nhu_cau;
        $db->noi_dung = $noi_dung;
        $db->save();
        return "Gởi câu hỏi chuyển đồi số thành công!\nChuyên gia sẽ liên hệ giải đáp sớm nhất có thể.\nCám ơn đã gởi thông tin.";
    }

}
