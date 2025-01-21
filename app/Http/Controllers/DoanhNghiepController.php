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
use Carbon\Carbon;
class DoanhNghiepController extends Controller
{
    //
    function list(){
        $so_luong = DoanhNghiep::count();
        $danhsach = DoanhNghiep::paginate(30);
        return view('Admin.DoanhNghiep.list')->with(compact('danhsach', 'so_luong'));
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
}
