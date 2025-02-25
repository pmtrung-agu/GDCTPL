<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DMVanBan;
class DMVanBanController extends Controller
{
    //
    function list(){
    	$namhoc = DMVanBan::orderBy('created_at', 'desc')->get()->toArray();
    	return view('Admin.DanhMuc.VanBan.list')->with(compact('namhoc'));
    }

    function add(){
    	return view('Admin.DanhMuc.VanBan.add');
    }

    function create(Request $request){
    	$data = $request->all();
    	$db = new DMVanBan();
    	$db->ten = $data['ten'];
		$db->slug = $data['slug'];
		$db->ghi_chu = $data['ghi_chu'];
		$db->thu_tu = intval($data['thu_tu']);
    	$db->save();
    	return redirect(env('APP_URL').'admin/danh-muc/van-ban');
    }

    function edit(Request $request, $id = ''){
    	$ct = DMVanBan::find($id);
    	return view('Admin.DanhMuc.VanBan.edit')->with(compact('ct'));
    }

    function update(Request $request){
    	$data = $request->all();
    	$db = DMVanBan::find($data['id']);
    	$db->ten = $data['ten'];
    	$db->slug = $data['slug'];
		$db->ghi_chu = $data['ghi_chu'];
		$db->thu_tu = intval($data['thu_tu']);
    	$db->save();
    	return redirect(env('APP_URL').'admin/danh-muc/van-ban');
    }

    function delete(Request $request, $id = '') {
        DMVanBan::destroy($id);
        return redirect(env('APP_URL').'admin/danh-muc/van-ban');
    }
}
