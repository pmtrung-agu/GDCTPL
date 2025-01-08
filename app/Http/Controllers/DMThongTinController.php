<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DMThongTin;
class DMThongTinController extends Controller
{
    //
    function list(){
    	$danhsach = DMThongTin::orderBy('thu_tu', 'asc')->get();
    	return view('Admin.DanhMuc.ThongTin.list')->with(compact('danhsach'));
    }

    function add(){
    	return view('Admin.DanhMuc.ThongTin.add');
    }

    function create(Request $request){
    	$data = $request->all();
    	$db = new DMThongTin();
    	$db->ten = $data['ten'];
		$db->slug = $data['slug'];
		$db->ghi_chu = $data['ghi_chu'];
		$db->thu_tu = intval($data['thu_tu']);
    	$db->save();
    	return redirect(env('APP_URL').'admin/danh-muc/thong-tin');
    }

    function edit(Request $request, $id = ''){
    	$ct = DMThongTin::find($id);
    	return view('Admin.DanhMuc.ThongTin.edit')->with(compact('ct'));
    }

    function update(Request $request){
    	$data = $request->all();
    	$db = DMThongTin::find($data['id']);
    	$db->ten = $data['ten'];
		$db->slug = $data['slug'];
    	$db->ghi_chu = $data['ghi_chu'];
		$db->thu_tu = intval($data['thu_tu']);
    	$db->save();
    	return redirect(env('APP_URL').'admin/danh-muc/thong-tin');
    }

    function delete(Request $request, $id = '') {
        DMThongTin::destroy($id);
        return redirect(env('APP_URL').'admin/danh-muc/thong-tin');
    }
}
