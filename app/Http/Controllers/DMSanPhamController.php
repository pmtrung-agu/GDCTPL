<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DMSanPham;
class DMSanPhamController extends Controller
{
    //
    function list(){
    	$danhsach = DMSanPham::orderBy('thu_tu', 'asc')->get();
    	return view('Admin.DanhMuc.SanPham.list')->with(compact('danhsach'));
    }

    function add(){
    	return view('Admin.DanhMuc.SanPham.add');
    }

    function create(Request $request){
    	$data = $request->all();
    	$db = new DMSanPham();
    	$db->ten = $data['ten'];
		$db->slug = $data['slug'];
		$db->ghi_chu = $data['ghi_chu'];
		$db->thu_tu = intval($data['thu_tu']);
    	$db->save();
    	return redirect(env('APP_URL').'admin/danh-muc/san-pham');
    }

    function edit(Request $request, $id = ''){
    	$ct = DMSanPham::find($id);
    	return view('Admin.DanhMuc.SanPham.edit')->with(compact('ct'));
    }

    function update(Request $request){
    	$data = $request->all();
    	$db = DMSanPham::find($data['id']);
    	$db->ten = $data['ten'];
		$db->slug = $data['slug'];
    	$db->ghi_chu = $data['ghi_chu'];
		$db->thu_tu = intval($data['thu_tu']);
    	$db->save();
    	return redirect(env('APP_URL').'admin/danh-muc/san-pham');
    }

    function delete(Request $request, $id = '') {
        DMSanPham::destroy($id);
        return redirect(env('APP_URL').'admin/danh-muc/san-pham');
    }
}
