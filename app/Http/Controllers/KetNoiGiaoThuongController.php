<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\KetNoiGiaoThuong;
use App\Models\DMNganhNghe;
class KetNoiGiaoThuongController extends Controller
{
    //

    function list(Request $request) {
        $danhsach = KetNoiGiaoThuong::paginate(30);
        return view('Admin.KetNoiGiaoThuong.list')->with(compact('danhsach'));
    }

    function add() {
        $nganhnghe = DMNganhNghe::All();
        $nhu_cau = Config::get('data_phan_tich.nhu_cau_kngt');
        return view('Admin.KetNoiGiaoThuong.add')->with(compact('nganhnghe','nhu_cau'));
    }

    function create(Request $request) {
        $data = $request->all();
        $id_user = $request->session()->get('user._id');
        $noi_dung = array(
            array('noi_dung' => $data['noi_dung'], 'id_user' =>ObjectController::ObjectId($id_user))
        );
        $db = new KetNoiGiaoThuong();
        $db->ma = strtoupper(uniqid());
        $db->nganhnghe_id = ObjectController::ObjectId($data['nganhnghe_id']);
        $db->nhu_cau = $data['nhu_cau'];
        $db->noi_dung = $noi_dung;
        $db->id_user = ObjectController::ObjectId($id_user);
        $db->tinh_trang = 0;
        $db->save();
        Session::flash('msg', 'Cập nhật thành công');
        return redirect(env('APP_URL') .'admin/doanh-nghiep/ket-noi-giao-thuong');
    }
}
