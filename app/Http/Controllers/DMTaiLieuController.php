<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DMTaiLieu;
class DMTaiLieuController extends Controller
{
    //
    function list(Request $request){
		$id_parent = $request->input('id_parent');
		if($id_parent) {
			$id_parent = ObjectController::ObjectId($id_parent);
			$danhsach = DMTaiLieu::where('id_parent', '=', $id_parent)->orderBy('thu_tu','asc')->orderBy('created_at', 'desc')->get()->toArray();
		} else {
			$danhsach = DMTaiLieu::where('id_parent',  '=', '')->orderBy('thu_tu','asc')->orderBy('created_at', 'desc')->get()->toArray();
		}
    	return view('Admin.DanhMuc.TaiLieu.list')->with(compact('danhsach','id_parent'));
    }

    function add(Request $request){
		$id_parent = $request->input('id_parent');
		$danhmuc = DMTaiLieu::where('id_parent','=', '')->get();
    	return view('Admin.DanhMuc.TaiLieu.add')->with(compact('danhmuc','id_parent'));
    }

    function create(Request $request){
    	$data = $request->all();
		$arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
          }
        }
		
    	$db = new DMTaiLieu();
    	$db->ten = $data['ten'];
		$db->slug = $data['slug'];
		$db->ghi_chu = $data['ghi_chu'];
		$db->thu_tu = intval($data['thu_tu']);
		$db->id_parent = $data['id_parent'] ? ObjectController::ObjectId($data['id_parent']) : '';
		$db->photos = $arr_photo;
    	$db->save();
    	return redirect(env('APP_URL').'admin/danh-muc/tai-lieu?id_parent='.$data['id_parent']);
    }

    function edit(Request $request, $id = ''){
		$id_parent = $request->input('id_parent');
		$danhmuc = DMTaiLieu::where('id_parent','=', '')->get();
    	$ds = DMTaiLieu::find($id);
    	return view('Admin.DanhMuc.TaiLieu.edit')->with(compact('ds','id_parent','danhmuc'));
    }

    function update(Request $request){
    	$data = $request->all();
		$arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
          }
        }

    	$db = DMTaiLieu::find($data['id']);
    	$db->ten = $data['ten'];
    	$db->slug = $data['slug'];
		$db->ghi_chu = $data['ghi_chu'];
		$db->thu_tu = intval($data['thu_tu']);
		$db->id_parent = $data['id_parent'] ? ObjectController::ObjectId($data['id_parent']) : '';
		$db->photos = $arr_photo;
    	$db->save();
    	return redirect(env('APP_URL').'admin/danh-muc/tai-lieu?id_parent='.$data['id_parent']);
    }

    function delete(Request $request, $id = '') {
		$dm = DMTaiLieu::find($id);
        DMTaiLieu::destroy($id);
        return redirect(env('APP_URL').'admin/danh-muc/tai-lieu?id_parent='.$dm['id_parent']);
    }
}
