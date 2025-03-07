<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\FileController;
use App\Models\VanBan;
use App\Models\DMVanBan;
use App\Models\DMDonVi;
use App\Models\SendEmail;
use Illuminate\Support\Facades\Mail;

class VanBanController extends Controller
{
    //
    static function get_tags(){
        $tags = DMVanBan::All();
        return $tags;
    }
    function list(Request $request) {
        $keywords = $request->input('keywords');
        $id_don_vi = $request->input('id_don_vi');
        $taxonomy = $request->input('taxonomy');
        $tags = self::get_tags();
        $don_vi = DMDonVi::All();
        $danhsach = VanBan::where('_id', 'exists', true);
        if($keywords){
            $danhsach = $danhsach->orWhere('so_hieu', 'regexp', '/.*'.$keywords.'/i')
                                ->orWhere('trich_yeu', 'regexp', '/.*'.$keywords.'/i')
                                ->orWhere('trich_yeu_kho_dau', 'regexp', '/.*'.$keywords.'/i')
                                ->orWhere('mo_ta', 'regexp', '/.*'.$keywords.'/i')
                                ->orWhere('mo_ta_khong_dau', 'regexp', '/.*'.$keywords.'/i')
                                ->orWhere('nguoi_ky', 'regexp', '/.*'.$keywords.'/i');

        }
        if($taxonomy) {
            $danhsach = $danhsach->where('id_don_vi', $taxonomy);
        }
        $danhsach = $danhsach->orderBy('thu_thu', 'asc')->paginate(30);
        return view('Admin.VanBan.list')->with(compact('danhsach', 'keywords', 'tags', 'taxonomy','id_don_vi','don_vi'));
    }

    function add(Request $request){
        $tags = self::get_tags();
        $don_vi = DMDonVi::All();
        return view('Admin.VanBan.add')->with(compact('tags','don_vi'));
    }

    function create(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'so_hieu' => 'required|unique:van_ban',
            'trich_yeu' => 'required',
            'tags' => 'required'
        ]);
        if ($validator->fails()) {
          return redirect(env('APP_URL').'admin/hiep-hoi-doanh-nghiep/van-ban/add')->withErrors($validator)->withInput();
        }
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
          }
        }

        $arr_dinhkem = array();
        if(isset($data['file_aliasname']) && $data['file_aliasname']){
            foreach($data['file_aliasname'] as $k => $v){
              array_push($arr_dinhkem, array('aliasname' => $v, 'filename' => $data['file_filename'][$k], 'title' => $data['file_title'][$k], 'size' => $data['file_size'][$k], 'type' => $data['file_type'][$k]));
            }
        }

        $id = ObjectController::Id();
        $id_user = $request->session()->get('user._id');
        $db = new VanBan();
        $db->_id = $id;
        $db->so_hieu = $data['so_hieu'];
        $db->trich_yeu = $data['trich_yeu'];
        $db->trich_yeu_khong_day = Str::Slug($data['trich_yeu'], " ");
        $db->id_don_vi = $data['id_don_vi'] ? ObjectController::ObjectId($data['id_don_vi']) : '';
        $db->ngay_ky = $data['ngay_ky'];
        $db->nguoi_ky = $data['nguoi_ky'];
        $db->mo_ta = $data['mo_ta'];
        $db->mo_ta_khong_dau = Str::Slug($data['mo_ta'], " ");
        $db->tags = isset($data['tags']) ? $data['tags'] : [];
        $db->photos = $arr_photo;
        $db->attachments = $arr_dinhkem;
        $db->date_post = $data['date_post'];
        $db->id_user = ObjectController::ObjectId($id_user);
        $db->save();
        Session::flash('msg', 'Cập nhật thành công');
        return redirect(env('APP_URL') .'admin/hiep-hoi-doanh-nghiep/van-ban');
    }

    function edit(Request $request, $id = ''){
        $ds = VanBan::find($id);
        $tags = self::get_tags();
        $don_vi = DMDonVi::All();
        return view('Admin.VanBan.edit')->with(compact('ds','tags','don_vi'));
    }

    function update(Request $request, $id = ''){
        $data = $request->all();
        $validator = Validator::make($data, [
            'so_hieu' => 'required|unique:van_ban,_id,'.$data['id'],
            'trich_yeu' => 'required',
            'tags' => 'required'
        ]);
        if ($validator->fails()) {
          return redirect(env('APP_URL').'admin/hiep-hoi-doanh-nghiep/van-ban/edit/'.$data['id'])->withErrors($validator)->withInput();
        }
        $arr_photo = array();
        if(isset($data['hinhanh_aliasname'])){
          foreach($data['hinhanh_aliasname'] as $key => $value){
            array_push($arr_photo, array('aliasname' => $value, 'filename' => $data['hinhanh_filename'][$key], 'title' => $data['hinhanh_title'][$key]));
          }
        }

        $arr_dinhkem = array();
        if(isset($data['file_aliasname']) && $data['file_aliasname']){
            foreach($data['file_aliasname'] as $k => $v){
              array_push($arr_dinhkem, array('aliasname' => $v, 'filename' => $data['file_filename'][$k], 'title' => $data['file_title'][$k], 'size' => $data['file_size'][$k], 'type' => $data['file_type'][$k]));
            }
        }
        $id_user = $request->session()->get('user._id');
        $db = VanBan::find($data['id']);
        $db->so_hieu = $data['so_hieu'];
        $db->trich_yeu = $data['trich_yeu'];
        $db->trich_yeu_khong_day = Str::Slug($data['trich_yeu'], " ");
        $db->id_don_vi = $data['id_don_vi'] ? ObjectController::ObjectId($data['id_don_vi']) : '';
        $db->ngay_ky = $data['ngay_ky'];
        $db->nguoi_ky = $data['nguoi_ky'];
        $db->mo_ta = $data['mo_ta'];
        $db->mo_ta_khong_dau = Str::Slug($data['mo_ta'], " ");
        $db->tags = isset($data['tags']) ? $data['tags'] : [];
        $db->photos = $arr_photo;
        $db->attachments = $arr_dinhkem;
        $db->date_post = $data['date_post'];
        $db->id_user = ObjectController::ObjectId($id_user);
        $db->save();
        Session::flash('msg', 'Cập nhật thành công');
        return redirect(env('APP_URL') .'admin/hiep-hoi-doanh-nghiep/van-ban');
    }

    function delete(Request $request, $id = '') {
        $data = VanBan::find($id);
        if($data['photos']){
            foreach($data['photos'] as $p){
                ImageController::remove($p['aliasname']);
            }
        }
        if($data['attachments']) {
            foreach($data['attachments'] as $dk) {
                FileController::remove($dk['aliasname']);
            }
        }
        VanBan::destroy($id);
        Session::flash('msg', 'Xóa thành công');
        return redirect(env('APP_URL').'admin/hiep-hoi-doanh-nghiep/van-ban');
    }

    function chi_tiet(Request $request, $id = '') {
        $ds = VanBan::find($id);
        return view('Admin.VanBan.chi-tiet')->with(compact('ds'));
    }

    function send_email(Request $request) {
        $data = $request->all();
        $id_van_ban = $data['id_van_ban'];
        $noi_dung = $data['noi_dung'];
        $email_list = $data['email_list']; //array

        $vb = VanBan::find($id_van_ban);
        $trich_yeu = $vb['trich_yeu'];
        
        $to_name = 'HIỆP HỘI DOANH NGHIỆP TỈNH AN GIANG';
        $from_email = env('MAIL_FROM_ADDRESS');
        $data = array('data' => $data, 'van_ban' => $vb);

        foreach($email_list as $email) {
            $e = new SendEmail();
            $e->id_van_ban = ObjectController::ObjectId($id_van_ban);
            $e->email = $email;
            $e->noi_dung = $noi_dung;
            $e->dinh_kem = $vb['attachments'];
            $e->save();
        }

        Mail::send('Admin.VanBan.email', $data, function($message) use ($email_list, $trich_yeu, $vb) {
            $message->to($email_list)->subject('[HHDNAG] - ' . $trich_yeu);
            $message->from('trungminhphan@gmail.com', 'HIỆP HỘI DOANH NGHIỆP TỈNH AN GIANG');
            
            /*foreach ($vb['attachments'] as $dk){
                $file = Storage::disk('public')->path('files/' . $dk['aliasname']);
                $message->attach($file);
            }*/
            //echo 'Đã gởi mail thành công';
        });
        return view('Admin.VanBan.send')->with(compact('email_list'));
    }

}
