<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ThongBao;
use Illuminate\Support\Str;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class ThongBaoController extends Controller
{
    //
    function list(Request $request) {
        $danhsach = ThongBao::paginate(30);
        return view('Admin.ThongBao.list')->with(compact('danhsach'));
    }

    function add() {
        return view('Admin.ThongBao.add');
    }

    function create(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'tieu_de' => 'required:thong_bao',
            'noi_dung' => 'required'
        ]);
        if ($validator->fails()) {
          return redirect(env('APP_URL').'admin/hiep-hoi-doanh-nghiep/thong-bao/add')->withErrors($validator)->withInput();
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

        $id_user = $request->session()->get('user._id');
        $db = new ThongBao();
        $db->tieu_de = $data['tieu_de'];
        $db->noi_dung = $data['noi_dung'];
        $db->photos = $arr_photo;
        $db->attachments = $arr_dinhkem;
        $db->id_user = ObjectController::ObjectId($id_user);
        $db->save();
        Session::flash('msg', 'Cập nhật thành công');
        return redirect(env('APP_URL') .'admin/hiep-hoi-doanh-nghiep/thong-bao');
    }

    function edit(Request $request, $id = '') {
        $ds = ThongBao::find($id);
        return view('Admin.ThongBao.edit')->with(compact('ds'));
    }

    function chi_tiet(Request $request, $id = '') {
        $ds = ThongBao::find($id);
        return view('Admin.ThongBao.chi-tiet')->with(compact('ds'));
    }

    function update(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'tieu_de' => 'required:thong_bao',
            'noi_dung' => 'required'
        ]);
        if ($validator->fails()) {
          return redirect(env('APP_URL').'admin/hiep-hoi-doanh-nghiep/thong-bao/edit/'.$data['id'])->withErrors($validator)->withInput();
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

        $id_user = $request->session()->get('user._id');
        $db = ThongBao::find($data['id']);
        $db->tieu_de = $data['tieu_de'];
        $db->noi_dung = $data['noi_dung'];
        $db->photos = $arr_photo;
        $db->attachments = $arr_dinhkem;
        $db->id_user = ObjectController::ObjectId($id_user);
        $db->save();
        Session::flash('msg', 'Cập nhật thành công');
        return redirect(env('APP_URL') .'admin/hiep-hoi-doanh-nghiep/thong-bao');
    }

    function download(Request $request, $id='', $key = 0) {
        $ds = ThongBao::find($id);
        $key = intval($key);
        $file_path = storage_path('app/public/files/' . $ds['attachments'][$key]['aliasname']);
        $name  = Str::slug($ds['attachments'][$key]['title'], '-') . '.' . $ds['attachments'][$key]['type'];
        return response()->download($file_path, $name);
    }

    function delete(Request $request, $id = ''){
        $data = ThongBao::find($id);
        if($data['photos']){
            foreach($data['photos'] as $p){
                ImageController::remove($p['aliasname']);
            }
        }

        if($data['attachments']) {
            foreach($data['attachments'] as $dk) {
                FileController::remove($dk['aliasname']);
            }
        }
        ThongBao::destroy($id);
        Session::flash('msg', 'Xóa thành công');
        return redirect(env('APP_URL').'admin/hiep-hoi-doanh-nghiep/thong-bao');
    }
}
