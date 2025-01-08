<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DMTaiLieu;
class DMTaiLieuController extends Controller
{
    //
    function list(){
    	$namhoc = DMTaiLieu::orderBy('created_at', 'desc')->get()->toArray();
    	return view('Admin.DanhMuc.TaiLieu.list')->with(compact('namhoc'));
    }

    function add(){
    	return view('Admin.DanhMuc.TaiLieu.add');
    }

    function create(Request $request){
    	$data = $request->all();
    	$db = new DMTaiLieu();
    	$db->ten = $data['ten'];
		$db->slug = $data['slug'];
		$db->ghi_chu = $data['ghi_chu'];
		$db->thu_tu = intval($data['thu_tu']);
    	$db->save();
    	return redirect(env('APP_URL').'admin/danh-muc/tai-lieu');
    }

    function edit(Request $request, $id = ''){
    	$ct = DMTaiLieu::find($id);
    	return view('Admin.DanhMuc.TaiLieu.edit')->with(compact('ct'));
    }

    function update(Request $request){
    	$data = $request->all();
    	$db = DMTaiLieu::find($data['id']);
    	$db->ten = $data['ten'];
    	$db->slug = $data['slug'];
		$db->ghi_chu = $data['ghi_chu'];
		$db->thu_tu = intval($data['thu_tu']);
    	$db->save();
    	return redirect(env('APP_URL').'admin/danh-muc/tai-lieu');
    }

    function delete(Request $request, $id = '') {
        DMTaiLieu::destroy($id);
        return redirect(env('APP_URL').'admin/danh-muc/tai-lieu');
    }
}
