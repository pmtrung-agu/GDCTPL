<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DMLinhVuc;
class DMLinhVucController extends Controller
{
    //
    function list(){
    	$namhoc = DMLinhVuc::orderBy('created_at', 'desc')->get()->toArray();
    	return view('Admin.DanhMuc.LinhVuc.list')->with(compact('namhoc'));
    }

    function add(){
    	return view('Admin.DanhMuc.LinhVuc.add');
    }

    function create(Request $request){
    	$data = $request->all();
    	$db = new DMLinhVuc();
    	$db->ten = $data['ten'];
		$db->ghi_chu = $data['ghi_chu'];
    	$db->save();
    	return redirect(env('APP_URL').'admin/danh-muc/linh-vuc');
    }

    function edit(Request $request, $id = ''){
    	$ct = DMLinhVuc::find($id);
    	return view('Admin.DanhMuc.LinhVuc.edit')->with(compact('ct'));
    }

    function update(Request $request){
    	$data = $request->all();
    	$db = DMLinhVuc::find($data['id']);
    	$db->ten = $data['ten'];
    	$db->ghi_chu = $data['ghi_chu'];
    	$db->save();
    	return redirect(env('APP_URL').'admin/danh-muc/linh-vuc');
    }

    function delete(Request $request, $id = '') {
        DMLinhVuc::destroy($id);
        return redirect(env('APP_URL').'admin/danh-muc/linh-vuc');
    }
}
