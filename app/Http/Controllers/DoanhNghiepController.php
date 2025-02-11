<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoanhNghiep;
use App\Models\DMDiaChi;
use App\Models\DMNganhNghe;
use Illuminate\Support\Facades\Validator;
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
use App\Models\User;
use App\Models\TuVanCDS;
use App\Models\NhuCauCDS;

class DoanhNghiepController extends Controller
{
    //
    function list(Request $request){
        $so_luong = DoanhNghiep::count();
        $q = $request->input('q');
        if($q) {
            $danhsach = DoanhNghiep::where('ten', 'regex', "/".$q."/i")->paginate(30);
        } else {
            $danhsach = DoanhNghiep::paginate(30);
        }
        return view('Admin.DoanhNghiep.list')->with(compact('danhsach', 'so_luong','q'));
    }

    function chi_tiet(Request $request, $id = '') {
        $ds = DoanhNghiep::find($id);
        return view('Admin.DoanhNghiep.chi-tiet')->with(compact('ds'));
    }

    function add() {
        $address = DMDiaChi::where('matructhuoc', 'exists', false)->orWhere('matructhuoc', '=', '')->get();
        $nganhnghe = DMNganhNghe::All();
        return view('Admin.DoanhNghiep.add')->with(compact('address','nganhnghe'));
    }

    function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'slug' => 'required|unique:doanh_nghiep',
            'ten' => 'required',
            'dienthoai' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect(env('APP_URL').'admin/danh-nghiep/add')->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
            foreach($data['hinhanh_aliasname'] as $key => $value){
                array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
            }
        }

        $arr_dinhkem = array();
        if(isset($data['file_aliasname']) && $data['file_aliasname']){
            foreach($data['file_aliasname'] as $k => $v){
                array_push($arr_dinhkem, array('aliasname' => $v, 'filename' => $data['file_filename'][$k], 'title' => $data['file_title'][$k], 'size' => $data['file_size'][$k], 'type' => $data['file_type'][$k]));
            }
        }
        $db = new DoanhNghiep();
        $db->ten = $data['ten'];
        $db->nguoidaidien = $data['nguoidaidien'];
        $db->slug = $data['slug'];
        $db->mota = $data['mota'];
        $db->masothue = $data['masothue'];
        $db->email = $data['email'];
        $db->diachi = $data['address'];
        $db->dienthoai = $data['dienthoai'];
        $db->website = $data['website'];
        $db->trangthai = isset($data['trangthai']) ? intval($data['trangthai']) : 0;
        $db->hoivienhiephoi = isset($data['hoivienhiephoi']) ? intval($data['hoivienhiephoi']) : 0;
        $db->ngaygianhaphiephoi = Carbon::createFromFormat('d/m/Y', $data['ngaygianhaphiephoi']);
        $db->ngayduyetdoanhnghiep = Carbon::now();
        $db->nganhnghe_id = $data['nganhnghe_id'];
        $db->ngayhuyhoivien = '';
        $db->photos = $arr_photo;
        $db->attachments = $arr_dinhkem;
        $db->save();
        Session::flash('msg', 'Cập nhật thành công');
        return redirect(env('APP_URL') .'admin/doanh-nghiep');
    }

    function edit(Request $request, $id = '') {
        $ds = DoanhNghiep::find($id);
        $address = DMDiaChi::where('matructhuoc', 'exists', false)->orWhere('matructhuoc', '=', '')->get();
        $nganhnghe = DMNganhNghe::All();
        return view('Admin.DoanhNghiep.edit')->with(compact('ds','address','nganhnghe'));
    }

    function update(Request $request) {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'slug' => 'required|unique:doanh_nghiep,_id,'.$data['id'],
            'ten' => 'required',
            'dienthoai' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect(env('APP_URL').'admin/danh-nghiep/add')->withErrors($validator)->withInput();
        }
        
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
            foreach($data['hinhanh_aliasname'] as $key => $value){
                array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
            }
        }

        $arr_dinhkem = array();
        if(isset($data['file_aliasname']) && $data['file_aliasname']){
            foreach($data['file_aliasname'] as $k => $v){
                array_push($arr_dinhkem, array('aliasname' => $v, 'filename' => $data['file_filename'][$k], 'title' => $data['file_title'][$k], 'size' => $data['file_size'][$k], 'type' => $data['file_type'][$k]));
            }
        }

        $db = DoanhNghiep::find($data['id']);
        $db->ten = $data['ten'];
        $db->nguoidaidien = $data['nguoidaidien'];
        $db->slug = $data['slug'];
        $db->mota = $data['mota'];
        $db->masothue = $data['masothue'];
        $db->email = $data['email'];
        $db->diachi = $data['address'];
        $db->dienthoai = $data['dienthoai'];
        $db->website = $data['website'];
        $db->trangthai = isset($data['trangthai']) ? intval($data['trangthai']) : 0;
        $db->hoivienhiephoi = isset($data['hoivienhiephoi']) ? intval($data['hoivienhiephoi']) : 0;
        $db->ngaygianhaphiephoi = Carbon::createFromFormat('d/m/Y', $data['ngaygianhaphiephoi']);
        $db->ngayduyetdoanhnghiep = Carbon::now();
        $db->nganhnghe_id = $data['nganhnghe_id'];
        $db->ngayhuyhoivien = '';
        $db->photos = $arr_photo;
        $db->attachments = $arr_dinhkem;
        $db->save();
        Session::flash('msg', 'Cập nhật thành công');
        return redirect(env('APP_URL') .'admin/doanh-nghiep');
    }

    function delete(Request $request, $id = '') {
        $data = DoanhNghiep::find($id);
        if($data['photos']){
            foreach($data['photos'] as $p){
                ImageController::remove($p['aliasname']);
            }
        }
        if($data['attachments']){
            foreach($data['attachments'] as $dk){
                FileController::remove($dk['aliasname']);
            }
        }
        DoanhNghiep::destroy($id);
        Session::flash('msg', 'Xóa thành công');
        return redirect(env('APP_URL').'admin/doanh-nghiep');
    }

    function hoi_vien(Request $request, $id = '') {
        $ds = DoanhNghiep::find($id);
        if($ds['hoivienhiephoi'] == 1 || $ds['hoivienhiephoi'] == true) {
            $ds->hoivienhiephoi = 0;
            echo '<i class="fas fa-user-times"></i>';
        } else {
            $ds->hoivienhiephoi = 1;
            echo '<i class="fas fa-user-check text-success"></i>';
        }
        $ds->save();
    }

    function tao_tai_khoan(Request $request, $id = '') {
        $data = DoanhNghiep::find($id);
        $id_doanh_nghiep = ObjectController::ObjectId($id);
        $user = User::where('id_doanh_nghiep', '=', $id_doanh_nghiep)->first();
        if($user) {
            $db = User::find($user['_id']);
        } else {
            $db = new User();
        }
        $db->fullname = $data['ten'];
        $db->username = $data['dienthoai'];
        $db->password = Hash::make($data['dienthoai']);
        $db->roles = ['Business'];
        $db->phone = $data['dienthoai'];
        $db->address = $data['diachi'];
        $db->active = 1;
        $db->ghi_chu = '';        
        $db->photos = [];
        $db->id_doanh_nghiep = $id_doanh_nghiep;
        $db->id_user  = ObjectController::ObjectId($request->session()->get('user._id'));
        $db->save();
        echo '<i class="fas fa-users text-danger"></i>';
    }

    function tu_van(Request $request) {
        $id_user = $request->session()->get('user._id');
        $id_user = ObjectController::ObjectId($id_user);
        if(UserController::is_roles('Admin,Manager,ABA,Expert')){
            $danhsach = TuVanCDS::All();
        } else if(UserController::is_roles('Business')){
            $danhsach = TuVanCDS::where('id_user', '=', $id_user)->get();
        } else {
            $danhsach = '';
        }
        return view('Admin.DoanhNghiep.tu-van')->with(compact('danhsach'));
    }

    function tu_van_add() {
        $nganhnghe = DMNganhNghe::All();
        return view('Admin.DoanhNghiep.tu-van-add')->with(compact('nganhnghe'));
    }

    function tu_van_create(Request $request) {
        $data = $request->all();
        $id_user = $request->session()->get('user._id');
        $noi_dung = array(
            array('noi_dung' => $data['noi_dung'], 'id_user' =>ObjectController::ObjectId($id_user))
        );
        $db = new TuVanCDS();
        $db->ma = strtoupper(uniqid());
        $db->nganhnghe_id = ObjectController::ObjectId($data['nganhnghe_id']);
        $db->noi_dung = $noi_dung;
        $db->id_user = ObjectController::ObjectId($id_user);
        $db->tinh_trang = 0;
        $db->save();
        Session::flash('msg', 'Cập nhật thành công');
        return redirect(env('APP_URL') .'admin/doanh-nghiep/tu-van-chuyen-doi-so');
    }

    function tu_van_chi_tiet(Request $request, $id = '') {
        $ds = TuVanCDS::find($id);
        return view('Admin.DoanhNghiep.tu-van-chi-tiet')->with(compact('ds'));
    }

    function tu_van_update(Request $request) {
        $data = $request->all();
        $id_user = $request->session()->get('user._id');
        $noi_dung =  array('noi_dung' => $data['noi_dung'], 'id_user' =>ObjectController::ObjectId($id_user));
        $id = ObjectController::ObjectId($data['id']);
        TuVanCDS::where('_id','=',$id)->push('noi_dung', $noi_dung);
        Session::flash('msg', 'Cập nhật thành công');
        return redirect(env('APP_URL') .'admin/doanh-nghiep/tu-van-chuyen-doi-so/chi-tiet/'.$data['id']);
    }

    function tu_van_tinh_trang(Request $request, $id = '') {
        $ds = TuVanCDS::find($id);
        if($ds['tinh_trang'] == 0) {
            $ds->tinh_trang = 1;
            echo '<span class="badge badge-success">Hoàn thành</span>';
        } else {
            $ds->tinh_trang = 0;
            echo '<span class="badge badge-danger">Đang diễn ra</span>';
        }
        $ds->save();
    }

    function nhu_cau(Request $request) {
        $danhsach = NhuCauCDS::All();
        return view('Admin.DoanhNghiep.nhu-cau')->with(compact('danhsach'));
    }

    function nhu_cau_add() {
        $nganhnghe = DMNganhNghe::All();
        $nhu_cau = Config::get('data_phan_tich.nhu_cau');
        return view('Admin.DoanhNghiep.nhu-cau-add')->with(compact('nganhnghe', 'nhu_cau'));
    }

    function nhu_cau_create(Request $request) {
        $data = $request->all();
        $id_user = $request->session()->get('user._id');
        $noi_dung = array(
            array('noi_dung' => $data['noi_dung'], 'id_user' =>ObjectController::ObjectId($id_user))
        );
        $db = new NhuCauCDS();
        $db->ma = strtoupper(uniqid());
        $db->nganhnghe_id = ObjectController::ObjectId($data['nganhnghe_id']);
        $db->nhu_cau = $data['nhu_cau'];
        $db->noi_dung = $noi_dung;
        $db->id_user = ObjectController::ObjectId($id_user);
        $db->tinh_trang = 0;
        $db->save();
        Session::flash('msg', 'Cập nhật thành công');
        return redirect(env('APP_URL') .'admin/doanh-nghiep/nhu-cau-chuyen-doi-so');
    }

    function nhu_cau_chi_tiet(Request $request, $id = '') {
        $ds = NhuCauCDS::find($id);
        return view('Admin.DoanhNghiep.nhu-cau-chi-tiet')->with(compact('ds'));
    }

    function nhu_cau_update(Request $request) {
        $data = $request->all();
        $id_user = $request->session()->get('user._id');
        $noi_dung =  array('noi_dung' => $data['noi_dung'], 'id_user' =>ObjectController::ObjectId($id_user));
        $id = ObjectController::ObjectId($data['id']);
        NhuCauCDS::where('_id','=',$id)->push('noi_dung', $noi_dung);
        Session::flash('msg', 'Cập nhật thành công');
        return redirect(env('APP_URL') .'admin/doanh-nghiep/nhu-cau-chuyen-doi-so/chi-tiet/'.$data['id']);
    }

    function nhu_cau_tinh_trang(Request $request, $id = '') {
        $ds = NhuCauCDS::find($id);
        if($ds['tinh_trang'] == 0) {
            $ds->tinh_trang = 1;
            echo '<span class="badge badge-success">Hoàn thành</span>';
        } else {
            $ds->tinh_trang = 0;
            echo '<span class="badge badge-danger">Đang diễn ra</span>';
        }
        $ds->save();
    }
}
