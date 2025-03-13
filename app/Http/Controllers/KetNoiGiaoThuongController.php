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
use App\Models\User;
class KetNoiGiaoThuongController extends Controller
{
    //

    function list(Request $request) {
        if(UserController::is_roles('Admin,Manager,ABA')) {
            $danhsach = KetNoiGiaoThuong::paginate(30);
        } else {
            $danhsach = KetNoiGiaoThuong::where('tinh_trang','=', 1)->paginate(30);
        }
        
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
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
          }
        }
        $db = new KetNoiGiaoThuong();
        $db->ma = strtoupper(uniqid());
        $db->nganhnghe_id = ObjectController::ObjectId($data['nganhnghe_id']);
        $db->nhu_cau = $data['nhu_cau'];
        $db->noi_dung = $noi_dung;
        $db->id_user = ObjectController::ObjectId($id_user);
        $db->photos = $arr_photo;
        $db->tinh_trang = 0;
        $db->save();
        Session::flash('msg', 'Cập nhật thành công');
        return redirect(env('APP_URL') .'admin/doanh-nghiep/ket-noi-giao-thuong');
    }

    function chi_tiet(Request $request, $id = '') {
        $ds = KetNoiGiaoThuong::find($id);
        $dn = User::find($ds['id_user']);
        return view('Admin.KetNoiGiaoThuong.chi-tiet')->with(compact('ds','dn'));
    }

    function delete(Request $request, $id = '') {
        $data = KetNoiGiaoThuong::find($id);
        if($data['photos']){
            foreach($data['photos'] as $p){
                ImageController::remove($p['aliasname']);
            }
        }
        /*if($data['attachments']){
            foreach($data['attachments'] as $dk){
                FileController::remove($dk['aliasname']);
            }
        }*/
        KetNoiGiaoThuong::destroy($id);
        Session::flash('msg', 'Xóa thành công');
        return redirect(env('APP_URL').'admin/doanh-nghiep/ket-noi-giao-thuong');
    }

    function tinh_trang(Request $request, $id = '') {
        $ds = KetNoiGiaoThuong::find($id);
        if($ds['tinh_trang'] == 0) {
            $ds->tinh_trang = 1;
            echo '<span class="badge badge-success">Đã duyệt</span>';
        } else {
            $ds->tinh_trang = 0;
            echo '<span class="badge badge-danger">Chờ duyệt</span>';
        }
        $ds->save();
    }
}
