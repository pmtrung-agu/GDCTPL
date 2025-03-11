<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\DeXuatKienNghi;


class DeXuatKienNghiController extends Controller
{
    //
    function list(Request $request) {
        $id_user = $request->session()->get('user._id');
        $id_user = ObjectController::ObjectId($id_user);
        if(UserController::is_roles('Admin,Manager,ABA,Expert')){
            $danhsach = DeXuatKienNghi::All();
        } else if(UserController::is_roles('Business')){
            $danhsach = DeXuatKienNghi::where('id_user', '=', $id_user)->get();
        } else {
            $danhsach = '';
        }
        return view('Admin.DeXuatKienNghi.list')->with(compact('danhsach'));
    }

    function add() {
        return view('Admin.DeXuatKienNghi.add');
    }

    function create(Request $request) {
        $data = $request->all();
        $id_user = $request->session()->get('user._id');

        $arr_dinhkem = array();
        if(isset($data['file_aliasname']) && $data['file_aliasname']){
            foreach($data['file_aliasname'] as $k => $v){
              array_push($arr_dinhkem, array('aliasname' => $v, 'filename' => $data['file_filename'][$k], 'title' => $data['file_title'][$k], 'size' => $data['file_size'][$k], 'type' => $data['file_type'][$k]));
            }
        }
        
        $noi_dung = array(
            array('noi_dung' => $data['noi_dung'], 'attachments' => $arr_dinhkem, 'id_user' =>ObjectController::ObjectId($id_user))
        );
        
        $db = new DeXuatKienNghi();
        $db->ma = strtoupper(uniqid());
        $db->noi_dung = $noi_dung;
        $db->id_user = ObjectController::ObjectId($id_user);
        $db->tinh_trang = 0;
        $db->save();
        Session::flash('msg', 'Cập nhật thành công');
        return redirect(env('APP_URL') .'admin/doanh-nghiep/de-xuat-kien-nghi');
    }

    function chi_tiet(Request $request, $id = '') {
        $ds = DeXuatKienNghi::find($id);
        return view('Admin.DeXuatKienNghi.chi-tiet')->with(compact('ds'));
    }

    function tinh_trang(Request $request, $id = '') {
        $ds = DeXuatKienNghi::find($id);
        if($ds['tinh_trang'] == 0) {
            $ds->tinh_trang = 1;
            echo '<span class="badge badge-success">Hoàn thành</span>';
        } else {
            $ds->tinh_trang = 0;
            echo '<span class="badge badge-danger">Đang diễn ra</span>';
        }
        $ds->save();
    }

    function update(Request $request) {
        $data = $request->all();
        $id_user = $request->session()->get('user._id');
        $noi_dung =  array('noi_dung' => $data['noi_dung'], 'id_user' =>ObjectController::ObjectId($id_user));
        $id = ObjectController::ObjectId($data['id']);
        DeXuatKienNghi::where('_id','=',$id)->push('noi_dung', $noi_dung);
        Session::flash('msg', 'Cập nhật thành công');
        return redirect(env('APP_URL') .'admin/doanh-nghiep/nhu-cau-chuyen-doi-so/chi-tiet/'.$data['id']);
    }

}
