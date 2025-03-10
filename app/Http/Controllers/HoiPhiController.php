<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ObjectController;
use App\Models\User;
use App\Models\Log;

use Image, Redirect;
use App\Models\HoiPhi;
use App\Models\DoanhNghiep;

class HoiPhiController extends Controller
{
    //
    function list(Request $request) {
        $danhsach = HoiPhi::orderBy('ngay_thu', 'desc')->paginate(30);
        $years = date("Y");
        $sl_doanh_nghiep = DoanhNghiep::where('hoivienhiephoi','=', 1)->count();
        $da_dong = HoiPhi::where('nam','=', intval($years))->count();
        return view('Admin.HoiPhi.list')->with(compact('danhsach','years','sl_doanh_nghiep', 'da_dong'));
    }

    function add() {
        $doanhnghiep = DoanhNghiep::All();
        $year = date("Y");
        return view('Admin.HoiPhi.add')->with(compact('doanhnghiep', 'year'));
    }

    function create(Request $request) {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'nam' => 'required:hoi_phi',
            'id_doanh_nghiep' => 'required',
            'so_tien' => 'required',
        ]);
        
        if ($validator->fails()) {
          return redirect(env('APP_URL'). 'admin/hiep-hoi-doanh-nghiep/hoi-phi/add')->withErrors(provider: $validator)->withInput();
        }

        $nam = intval($data['nam']);
        $id_doanh_nghiep = $data['id_doanh_nghiep'];        
        if($id_doanh_nghiep){
            foreach($id_doanh_nghiep as $id_dn){
                $id_dn = ObjectController::ObjectId($id_dn);
                $check = HoiPhi::where('nam','=',$nam)->where('id_doanh_nghiep','=',$id_dn)->first();
                if(!$check) {
                    //return redirect(env('APP_URL').'admin/hiep-hoi-doanh-nghiep/hoi-phi/add')->withErrors(['msg' => 'Doanh nghiệp đóng Hội phí rồi - Năm ' . $data['nam']])->withInput();
                    $arr_photo = array();
                    if(isset($data['hinhanh_aliasname'])){
                    foreach($data['hinhanh_aliasname'] as $key => $value){
                        array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
                    }
                    }
                    $dn = DoanhNghiep::find($id_dn);
                    $db = new HoiPhi();
                    $db->nam = $nam;
                    $db->id_doanh_nghiep = $id_dn;
                    $db->ten_doanh_nghiep = $dn['ten'];
                    $db->so_tien = ObjectController::convertStr2Number_1($data['so_tien']);
                    $db->ngay_thu = $data['ngay_thu'];
                    $db->noi_dung = $data['noi_dung'];
                    $db->id_user = ObjectController::ObjectId($request->session()->get('user._id'));
                    $db->photos = $arr_photo;
                    $db->save();
                }
            }
        }

        return redirect()->intended(env('APP_URL').'admin/hiep-hoi-doanh-nghiep/hoi-phi');
    }

    function edit(Request $request, $id = '') {
        $ds = HoiPhi::find($id);
        $doanhnghiep = DoanhNghiep::All();
        $year = date("Y");
        return view('Admin.HoiPhi.edit')->with(compact('doanhnghiep', 'year', 'ds'));
    }

    function update(Request $request) {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'nam' => 'required:hoi_phi',
            'id_doanh_nghiep' => 'required',
            'so_tien' => 'required',
        ]);
        
        if ($validator->fails()) {
          return redirect(env('APP_URL'). 'admin/hiep-hoi-doanh-nghiep/hoi-phi/add')->withErrors(provider: $validator)->withInput();
        }
        $nam = intval($data['nam']);
        $id_doanh_nghiep = ObjectController::ObjectId($data['id_doanh_nghiep']);        
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
          }
        }
        $dn = DoanhNghiep::find($id_doanh_nghiep);
        $db = HoiPhi::find($data['id']);
        $db->nam = $nam;
        $db->id_doanh_nghiep = $id_doanh_nghiep;
        $db->ten_doanh_nghiep = $dn['ten'];
        $db->so_tien = ObjectController::convertStr2Number_1($data['so_tien']);
        $db->ngay_thu = $data['ngay_thu'];
        $db->noi_dung = $data['noi_dung'];
        $db->id_user = ObjectController::ObjectId($request->session()->get('user._id'));
        $db->photos = $arr_photo;
        $db->save();
        return redirect()->intended(env('APP_URL').'admin/hiep-hoi-doanh-nghiep/hoi-phi');
    }

    function delete(Request $request, $id = '') {
        $data = HoiPhi::find($id);
        $logQuery = array (
            'action' => 'Xóa Hoi Phí Doanh nghiệp: ['.$data['ten_doanh_nghiep'].']',
            'id_collection' => $id,
            'name_collection' => 'hoi_phi',
            'data' => $data
        );
        if($data['photos']){
            foreach($data['photos'] as $p){
                ImageController::remove($p['aliasname']);
            }
        }

        HoiPhi::destroy($id);
        LogController::addLog($logQuery);
        Session::flash('msg', 'Xóa thành công');
        return redirect(env('APP_URL').'admin/hiep-hoi-doanh-nghiep/hoi-phi');
    }
    function thong_ke_theo_nam(Request $request) {
        $years = $request->input('nam');
        if(!$years) $years = intval(date("Y"));
        $danhsach = HoiPhi::where('nam','=', intval($years))->orderBy('ngay_thu', 'desc')->paginate(30);
        $doanh_nghiep = DoanhNghiep::where('hoivienhiephoi','=', 1)->get();
        $sl_doanh_nghiep = DoanhNghiep::where('hoivienhiephoi','=', 1)->count();
        $da_dong = HoiPhi::where('nam','=', intval($years))->count();
        $tong_thu = HoiPhi::where('nam','=', intval($years))->sum('so_tien');
        
        return view('Admin.HoiPhi.thong-ke-theo-nam')->with(compact('years','danhsach','sl_doanh_nghiep','da_dong','doanh_nghiep','tong_thu'));
    }

    static function check_hoi_phi($id_doanh_nghiep, $nam) {
        $id_doanh_nghiep = ObjectController::ObjectId($id_doanh_nghiep);
        $nam = intval($nam);
        $check = HoiPhi::where('id_doanh_nghiep','=',$id_doanh_nghiep)->where('nam','=',$nam)->first();
        if($check) return true;
        return false;
    }
}
