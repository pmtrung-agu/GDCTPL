<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DMDonVi;
use App\Models\DMDiaChi;
class DMDonViController extends Controller
{
    //
    function list(){
    	$namhoc = DMDoNVi::orderBy('created_at', 'desc')->get()->toArray();
    	return view('Admin.DanhMuc.DonVi.list')->with(compact('namhoc'));
    }

    function add(){
        $address = DMDiaChi::where('matructhuoc', 'exists', false)->orWhere('matructhuoc', '=', '')->get();
    	return view('Admin.DanhMuc.DonVi.add')->with(compact('address'));
    }

    function create(Request $request){
    	$data = $request->all();
    	$db = new DMDoNVi();
    	$db->ten = $data['ten'];
		$db->dien_thoai = $data['dien_thoai'];
        $db->dia_chi = $data['address'];
    	$db->save();
    	return redirect(env('APP_URL').'admin/danh-muc/don-vi');
    }

    function edit(Request $request, $id = ''){
    	$ds = DMDoNVi::find($id);
        $address = DMDiaChi::where('matructhuoc', 'exists', false)->orWhere('matructhuoc', '=', '')->get();
    	return view('Admin.DanhMuc.DonVi.edit')->with(compact('ds','address'));
    }

    function update(Request $request){
    	$data = $request->all();
    	$db = DMDonVi::find($data['id']);
    	$db->ten = $data['ten'];
		$db->dien_thoai = $data['dien_thoai'];
        $db->dia_chi = $data['address'];
    	$db->save();
    	return redirect(env('APP_URL').'admin/danh-muc/don-vi');
    }

    function delete(Request $request, $id = '') {
        DMDonVi::destroy($id);
        return redirect(env('APP_URL').'admin/danh-muc/don-vi');
    }
}
