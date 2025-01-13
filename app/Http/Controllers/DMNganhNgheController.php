<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ObjectController;
use App\Models\DMNganhNghe;
use App\Models\DMLinhVuc;

class DMNganhNgheController extends Controller
{
    //
    function list(Request $request){
        $id_linh_vuc = $request->input('id_linh_vuc');
        if($id_linh_vuc){
            $danhsach = DMNganhNghe::where('id_dm_linh_vuc', '=', $id_linh_vuc)->orderBy('created_at', 'desc')->get()->toArray();
        } else {
    	    $danhsach = DMNganhNghe::orderBy('created_at', 'desc')->get()->toArray();
        }
    	return view('Admin.DanhMuc.NganhNghe.list')->with(compact('danhsach'));
    }

    function add(){
        $dm_linh_vuc = DMLinhVuc::All();
    	return view('Admin.DanhMuc.NganhNghe.add')->with(compact('dm_linh_vuc'));
    }

    function create(Request $request){
    	$data = $request->all();
    	$db = new DMNganhNghe();
    	$db->ten = $data['ten'];
        $db->id_dm_linh_vuc = $data['id_dm_linh_vuc'] ? ObjectController::ObjectId($data['id_dm_linh_vuc']) : '';
		$db->ghi_chu = $data['ghi_chu'];
    	$db->save();
    	return redirect(env('APP_URL').'admin/danh-muc/nganh-nghe');
    }

    function edit(Request $request, $id = ''){
    	$ct = DMNganhNghe::find($id);
        $dm_linh_vuc = DMLinhVuc::All();
    	return view('Admin.DanhMuc.NganhNghe.edit')->with(compact('ct', 'dm_linh_vuc'));
    }

    function update(Request $request){
    	$data = $request->all();
    	$db = DMNganhNghe::find($data['id']);
    	$db->ten = $data['ten'];
        $db->id_dm_linh_vuc = $data['id_dm_linh_vuc'] ? ObjectController::ObjectId($data['id_dm_linh_vuc']) : '';
    	$db->ghi_chu = $data['ghi_chu'];
    	$db->save();
    	return redirect(env('APP_URL').'admin/danh-muc/nganh-nghe');
    }

    function delete(Request $request, $id = '') {
        DMNganhNghe::destroy($id);
        return redirect(env('APP_URL').'admin/danh-muc/nganh-nghe');
    }
}
