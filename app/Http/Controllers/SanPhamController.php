<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\ImageController;
use App\Models\DMSanPham;
use App\Models\SanPham;
use App\Models\User;
use App\Models\DoanhNghiep;

class SanPhamController extends Controller
{
    //
    static function get_tags(){
        $tags = DMSanPham::All();
        return $tags;
    }

    function list(Request $request, $status = '') {
    	if(UserController::is_roles('Admin,Manager')){
            if($status == ''){
                $danhsach = SanPham::orderBy('updated_at', 'desc')->paginate(20);
            } else if($status == 1){
                $danhsach = SanPham::where('status','=',1)->orderBy('updated_at', 'desc')->paginate(20);
            } else {
                $danhsach = SanPham::where('status','=',0)->orderBy('updated_at', 'desc')->paginate(20);
            }
        } else {
            $id_seller = ObjectController::ObjectId(Session::get('user._id'));
            if($status == ''){
                $danhsach = SanPham::where('id_seller','=',$id_seller)->orderBy('updated_at', 'desc')->paginate(20);
            } else if($status == 1){
                $danhsach = SanPham::where('id_seller','=',$id_seller)->where('status','=',1)->orderBy('updated_at', 'desc')->paginate(20);
            } else {
                $danhsach = SanPham::where('id_seller','=',$id_seller)->where('status','=',0)->orderBy('updated_at', 'desc')->paginate(20);
            }
        }
    	return view('Admin.SanPham.list')->with(compact('danhsach'));
    }

    function add(){
        $product_categories = DMSanPham::All();
        $id_user = ObjectController::ObjectId(Session::get('user._id'));
        if(UserController::is_roles('Admin, Manager')){
            $sellers = User::where('roles', 'Business')->get();
        } else {
            $sellers = User::where('_id', '=', $id_user)->orderBy('created_at','desc')->get();
        }
    	return view('Admin.SanPham.add')->with(compact('product_categories', 'sellers', 'id_user'));
    }

    function create(Request $request){
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:san_pham',
            'slug' => 'required|unique:san_pham'
        ]);
        if ($validator->fails()) {
          return redirect('admin/product/add')->withErrors($validator)->withInput();
        }
        $data = $request->all();
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
          }
        }
        $db = new SanPham();
        $db->code = $data['code'];
        $db->title = $data['title'];
        $db->author = isset($data['author']) ? $data['author'] : '';
        $db->slug = $data['slug'];
        $db->id_product_category = $data['id_product_category'];
        $db->description = $data['description'];
        $db->contents = $data['contents'];
        $db->prices = ObjectController::convertStr2Number_1($data['prices']);
        $db->status = isset($data['status']) ? intval($data['status']) : 0;
        $db->hot = isset($data['hot']) ? intval($data['hot']) : 0;
        $db->id_seller = ObjectController::ObjectId($data['id_seller']);
        $db->id_user = ObjectController::ObjectId($request->session()->get('user._id'));
        $db->photos = $arr_photo;
        $db->save();
        return redirect()->intended('admin/san-pham');
    }

    public function edit(Request $request, $id = ''){
        $product = SanPham::find($id);
        $product_categories = DMSanPham::All()->toArray();
        if(UserController::is_roles('Admin, Manager')){
            $sellers = User::where('roles','=', 'Business')->get();
        } else {
            $id_user = ObjectController::ObjectId(Session::get('user._id'));
            $sellers = User::where('_id', '=', $id_user)->first();
        }
        if($product_categories){
            foreach($product_categories as $key => $value){
              $child_1 = DMSanPham::where('id_parent', '=', $value['_id'])->get()->toArray();
              $product_categories[$key]['level_1'] = $child_1;
              if($child_1) {
                foreach ($child_1 as $key_1 => $value_1) {
                  $child_2 = DMSanPham::where('id_parent', '=', $value_1['_id'])->get()->toArray();
                  $product_categories[$key]['level_1'][$key_1]['level_2'] = $child_2;
                }
              }
            }
          }
        return view('Admin.SanPham.edit')->with(compact('product','product_categories', 'sellers'));
    }

    function update(Request $request){
        $data = $request->all();
        $validator = Validator::make($request->all(), [
        'code' => 'required|unique:san_pham,_id'.$data['id'],
        'slug' => 'required|unique:san_pham,_id'.$data['id']
        ]);
        if ($validator->fails()) {
          return redirect('admin/san-pham/edit')->withErrors($validator)->withInput();
        }
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
          }
        }
        $db = SanPham::find($data['id']);
        $db->code = $data['code'];
        $db->title = $data['title'];
        $db->slug = $data['slug'];
        $db->id_product_category = $data['id_product_category'];
        $db->description = $data['description'];
        $db->contents = $data['contents'];
        $db->prices = ObjectController::convertStr2Number_1($data['prices']);
        $db->status = isset($data['status']) ? intval($data['status']) : 0;
        $db->hot = isset($data['hot']) ? intval($data['hot']) : 0;
        $db->id_seller = ObjectController::ObjectId($data['id_seller']);
        $db->id_user = ObjectController::ObjectId($request->session()->get('user._id'));
        $db->photos = $arr_photo;
        $db->save();
        return redirect()->intended('admin/san-pham');
    }

    function update_status(Request $request, $id = ''){
        $product = SanPham::find($id);
        if($product['status'] == 1){ $status = 0; } else { $status = 1;}
        $product->status = intval($status);
        $product->save();
    }

    function delete(Request $request, $id=null){
      $product = SanPham::find($id)->toArray();
      if($product['photos']){
        foreach($product['photos'] as $photo){
          ImageController::remove($photo['aliasname']);
        }
      }
      SanPham::destroy($id);
      Session::flash('msg', 'Đã xóa thành công');
      return redirect('admin/san-pham');
    }
}
