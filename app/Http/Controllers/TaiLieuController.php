<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\FileController;
use App\Models\TaiLieu;
use App\Models\DMTaiLieu;

class TaiLieuController extends Controller
{
    //
    static function get_tags(){
        $tags = DMTaiLieu::All();
        return $tags;
    }
    function list(Request $request, $taxonomy = '') {
        $keywords = $request->input('keywords');
        $tags = self::get_tags();
        $danhsach = TaiLieu::where('_id', 'exists', true);
        if($keywords){
            $danhsach = $danhsach->where('ten', 'regexp', '/.*'.$keywords.'/i');
        }
        $danhsach = $danhsach->orderBy('thu_thu', 'asc')->orderBy('date_post', 'desc')->paginate(30);
        return view('Admin.TaiLieu.list')->with(compact('danhsach', 'keywords', 'tags', 'taxonomy'));
    }

    function add(Request $request){
        $tags = self::get_tags();
        return view('Admin.TaiLieu.add')->with(compact('tags'));
    }

    function create(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'slug' => 'required|unique:tai_lieu',
            'ten' => 'required',
            'mo_ta' => 'required',
            'noi_dung' => 'required'
        ]);
        if ($validator->fails()) {
          return redirect(env('APP_URL').'admin/tai-lieu/add')->withErrors($validator)->withInput();
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

        $id = ObjectController::Id();
        $id_user = $request->session()->get('user._id');
        $db = new TaiLieu();
        $db->_id = $id;
        $db->ten = $data['ten'];
        $db->slug = $data['slug'];
        $db->mo_ta = $data['mo_ta'];
        $db->noi_dung = $data['noi_dung'];
        $db->thu_tu = intval($data['thu_tu']);
        $db->tags = isset($data['tags']) ? $data['tags'] : [];
        $db->photos = $arr_photo;
        $db->attachments = $arr_dinhkem;
        $db->date_post = $data['date_post'];
        $db->tin_moi = isset($data['tin_moi']) ? intval($data['tin_moi']) : 0;
        $db->id_user = ObjectController::ObjectId($id_user);
        $db->save();
        /*$logQuery = array (
            'action' => 'Thêm Thông tin: ['.$data['ten'].']',
            'id_collection' => $id,
            'name_collection' => 'tai_lieu',
            'data' => $data
        );
        LogController::addLog($logQuery);*/
        Session::flash('msg', 'Cập nhật thành công');
        return redirect(env('APP_URL') .'admin/tai-lieu');
    }

    function edit(Request $request, $id = ''){
        $ds = TaiLieu::find($id);
        $tags = self::get_tags();
        return view('Admin.TaiLieu.edit')->with(compact('ds','tags'));
    }

    function update(Request $request, $id = ''){
        $data = $request->all();
        $validator = Validator::make($data, [
            'slug' => 'required|unique:tai_lieu,_id,'.$data['id'],
            'ten' => 'required',
            'mo_ta' => 'required',
            'noi_dung' => 'required'
        ]);
        if ($validator->fails()) {
          return redirect(env('APP_URL').'admin/tai-lieu/edit/'.$data['id'])->withErrors($validator)->withInput();
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
        $db = TaiLieu::find($data['id']);
        $db->ten = $data['ten'];
        $db->slug = $data['slug'];
        $db->mo_ta = $data['mo_ta'];
        $db->noi_dung = $data['noi_dung'];
        $db->thu_tu = intval($data['thu_tu']);
        $db->tags = isset($data['tags']) ? $data['tags'] : [];
        $db->photos = $arr_photo;
        $db->attachments = $arr_dinhkem;
        $db->date_post = $data['date_post'];
        $db->tin_moi = isset($data['tin_moi']) ? intval($data['tin_moi']) : 0;
        $db->id_user = ObjectController::ObjectId($id_user);
        $db->save();

        /*$logQuery = array (
            'action' => 'Chỉnh sửa Tin tức Sự kiện ['.$data['ten'].']',
            'id_collection' => $data['id'],
            'collection' => 'tai_lieu',
            'data' => $data
        );
        LogController::addLog($logQuery);*/
        Session::flash('msg', 'Cập nhật thành công');
        return redirect(env('APP_URL').'admin/tai-lieu');
    }

    function delete(Request $request, $id = ''){
        $data = TaiLieu::find($id);
        /*$logQuery = array (
            'action' => 'Xóa Tin tức Sự kiện ['.$data['ten'].']',
            'id_collection' => $id,
            'collection' => 'tai_lieu',
            'data' => $data
        );*/
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
        TaiLieu::destroy($id);
        //LogController::addLog($logQuery);
        Session::flash('msg', 'Xóa thành công');
        return redirect(env('APP_URL').'admin/tai-lieu');
    }

    function download(Request $request, $id='', $key = 0) {
        $ds = TaiLieu::find($id);
        $key = intval($key);
        $file_path = storage_path('app/public/files/' . $ds['attachments'][$key]['aliasname']);
        $name  = Str::slug($ds['attachments'][$key]['title'], '-') . '.' . $ds['attachments'][$key]['type'];
        return response()->download($file_path, $name);
    }
}
