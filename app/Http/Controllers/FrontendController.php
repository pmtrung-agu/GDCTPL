<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\DMDiaChi;
use App\Models\DMThongTin;
use App\Models\DMLinhVuc;
use App\Models\DMNganhNghe;
use App\Models\ThongTin;
use App\Models\DMTaiLieu;
use App\Models\TaiLieu;
use App\Models\User;
use App\Models\NhuCauCDS;
use App\Models\TuVanCDS;
use App\Models\CDSKhaoSat;
use App\Models\DMSanPham;
use App\Models\SanPham;
use App\Models\DoanhNghiep;
use App\Models\KetNoiGiaoThuong;
use App\Models\ThongBao;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    //
    function index()    {
        $thong_tin = ThongTin::orderBy('updated_at', 'desc')->paginate(6);
        $tai_lieu = TaiLieu::orderBy('updated_at', 'desc')->paginate(6);
        $chuyen_gia = User::where('roles','Expert')->get();
        return view('Frontend.index')->with(compact('thong_tin','tai_lieu', 'chuyen_gia'));
    }

    function qrcode() {
        return \QrCode::size(500)->generate('https://tuicobangangiang.com');
    }

    function thong_tin(Request $request, $taxonomy = '') {
        $danhsach = ThongTin::where('tags', $taxonomy)->orderBy('updated_at', 'desc')->get();
        $tax = DMThongTin::where('slug', '=', $taxonomy)->first();
        return view('Frontend.thong-tin')->with(compact('danhsach', 'tax'));
    }

    function thong_tin_chi_tiet(Request $request, $slug = '') {
        $ds = ThongTin::where('slug', '=', $slug)->first();
        $bai_viet_moi = ThongTin::orderBy('updated_at', 'desc')->paginate(6);
        return view('Frontend.thong-tin-chi-tiet')->with(compact('ds', 'bai_viet_moi'));
    }

    function tai_lieu(Request $request, $taxonomy = '') {
        $danhsach = TaiLieu::where('tags', $taxonomy)->get();
        $tax = DMTaiLieu::where('slug', '=', $taxonomy)->first();
        return view('Frontend.tai-lieu')->with(compact('danhsach', 'tax'));
    }
    function tai_lieu_chi_tiet(Request $request, $slug = '') {
        $ds = TaiLieu::where('slug', '=', $slug)->first();
        $bai_viet_moi = TaiLieu::orderBy('updated_at', 'desc')->paginate(6);
        return view('Frontend.tai-lieu-chi-tiet')->with(compact('ds', 'bai_viet_moi'));
    }

    function san_pham(Request $request, $taxonomy = '') {
        $tax = DMSanPham::where('slug', '=', $taxonomy)->first();
        if($taxonomy) {
            $danhsach = SanPham::where('status','=', 1)->where('id_product_category',$tax['_id'])->paginate(30);
        } else {
            $danhsach = SanPham::where('status','=', 1)->paginate(30);
        }
        
        return view('Frontend.san-pham')->with(compact('danhsach', 'tax', 'taxonomy'));
    }
    function san_pham_chi_tiet(Request $request, $slug = '') {
        $ds = SanPham::where('slug', '=', $slug)->first();
        return view('Frontend.san-pham-chi-tiet')->with(compact('ds'));
    }

    function goi_yeu_cau(){
        return redirect(env('APP_URL').'admin/doanh-nghiep/nhu-cau-chuyen-doi-so/add');
        //return view('Frontend.goi-yeu-cau');
    }
    function goi_yeu_cau_submit(Request $request){
        $ho_ten = $request->input('ho_ten');
        $email = $request->input('email');
        $dien_thoai = $request->input('dien_thoai');
        $nhu_cau = $request->input('nhu_cau');
        $noi_dung = $request->input('noi_dung');
        
        $db = new NhuCauCDS();
        $db->ho_ten = $ho_ten;
        $db->email = $email;
        $db->dien_thoai = $dien_thoai;
        $db->nhu_cau = $nhu_cau;
        $db->noi_dung = $noi_dung;
        $db->save();
        return "Gởi nhu cầu chuyển đồi số thành công!\nChuyên gia sẽ liên hệ giải đáp sớm nhất có thể.\nCám ơn đã gởi thông tin.";
    }

    function tu_van_chuyen_doi_so(){
        return redirect(env('APP_URL').'admin/doanh-nghiep/tu-van-chuyen-doi-so');
        //return view('Frontend.tu-van-cds');
    }

    function tu_van_chuyen_doi_so_submit(Request $request){
        $id_group = $request->input('id_group');
        $ho_ten = $request->input('ho_ten');
        $email = $request->input('email');
        $dien_thoai = $request->input('dien_thoai');
        $nhu_cau = $request->input('nhu_cau');
        $noi_dung = $request->input('noi_dung');
        
        $db = new TuVanCDS();
        $db->id_group = $id_group ? ObjectController::ObjectId($id_group) : ObjectController::Id();
        $db->ho_ten = $ho_ten;
        $db->email = $email;
        $db->dien_thoai = $dien_thoai;
        $db->nhu_cau = $nhu_cau;
        $db->noi_dung = $noi_dung;
        $db->save();
        return "Gởi câu hỏi chuyển đồi số thành công!\nChuyên gia sẽ liên hệ giải đáp sớm nhất có thể.\nCám ơn đã gởi thông tin.";
    }

    function chuyen_gia(Request $request) {
        $danhsach = User::where('roles', 'Expert')->get();
        return view('Frontend.chuyen-gia')->with(compact('danhsach'));
    }

    function doanh_nghiep_tham_gia(Request $request) {
        $q = $request->input('q');
        if($q) {
            $danhsach = DoanhNghiep::where('ten','regex', '/.*'.$q.'/i')->paginate(15);
        } else {
            $danhsach = DoanhNghiep::paginate(30);
        }
       return view('Frontend.doanh-nghiep-tham-gia')->with(compact('danhsach','q'));
    }

    function doanh_nghiep_chi_tiet(Request $request, $slug = '') {
        $ds = DoanhNghiep::where('slug', '=', $slug)->first();
        return view('Frontend.doanh-nghiep-chi-tiet')->with(compact('ds'));
    }

    function ket_noi_giao_thuong(Request $request) {
        $nc = $request->input('nc');
        $danhsach = KetNoiGiaoThuong::where('_id', 'exists', true);
        if($nc) {
            $danhsach = $danhsach->where('nhu_cau', '=', $nc);
        }
        $danhsach = $danhsach->where('tinh_trang','=', 1)->orderBy('updated_at', 'desc')->paginate(30);
        $nhu_cau = Config::get('data_phan_tich.nhu_cau_kngt');
        return view('Frontend.ket-noi-giao-thuong')->with(compact('danhsach','nhu_cau','nc'));
    }

    function mo_hinh_cds(Request $request, $mo_hinh = '') {
        return view('Frontend.mo-hinh-cds');
    }

    function thong_bao_hhdn(Request $request){
        $q = $request->input('q');
        if($q) {
            $danhsach = ThongBao::where('tieu_de', 'regexp', '/.*'.$q.'/i')
                        ->orWhere('noi_dung', 'regexp', '/.*'.$q.'/i')
                        ->orderBy('updated_at', 'desc')
                        ->paginate(20);
        } else {
            $danhsach = ThongBao::orderBy('updated_at', 'desc')->paginate(20);
        }
        
        return view('Frontend.thong-bao-hhdn')->with(compact('danhsach', 'q'));
    }

    function dang_ky_thanh_vien() {
        return view('Frontend.dang-ky-thanh-vien');
    }

    function dang_ky_thanh_vien_submit(Request $request) {
        $data = $request->all();
        
        $check = DoanhNghiep::where('ten', '=', $data['ten'])
                ->orWhere('dienthoai', '=', $data['dien_thoai'])
                ->orWhere('email', '=', $data['email'])
                ->first();
        $check1 = User::where('username','=',$data['dien_thoai'])->orWhere('username','=',$data['email'])->orWhere('phone','=',$data['dien_thoai'])->first();
        $blnRegis = false;
        if(!$check && !$check1) {
            $id = ObjectController::Id();
            $db = new DoanhNghiep();
            $db->_id = $id;
            $db->ten = $data['ten'];
            $db->nguoidaidien = '';
            $db->slug = Str::slug($data['ten']);
            $db->mota = '';
            $db->masothue = '';
            $db->email = $data['email'];
            $db->diachi = array(89,883,"","");
            $db->dienthoai = $data['dien_thoai'];
            $db->website = '';
            $db->trangthai =  1;
            $db->hoivienhiephoi = 0;
            $db->ngaygianhaphiephoi = '';
            $db->ngayduyetdoanhnghiep = '';
            $db->nganhnghe_id = '';
            $db->ngayhuyhoivien = '';
            $db->photos = array();
            $db->attachments = array();
            $db->save();

            //TAO TAI KHOAN NGUOI DUNG
            $u = new User();
            $u->fullname = $data['ten'];
            $u->username = $data['dien_thoai'];
            $u->password = Hash::make($data['dien_thoai']);
            $u->roles = ['Business'];
            $u->phone = $data['dien_thoai'];
            $u->address = array();
            $u->active = 1;
            $u->ghi_chu = '';        
            $u->photos = [];
            $u->id_doanh_nghiep = $id;
            $u->id_user  = '';
            $u->save();
            
            //Goi Email
            $to_name = 'HIỆP HỘI DOANH NGHIỆP TỈNH AN GIANG';
            $from_email = env('MAIL_FROM_ADDRESS');
            $email_list = [ $data['email'] ];
            $ds = array('data' => $data);
            Mail::send('Frontend.dang-ky-thanh-vien-email', $ds, function($message) use ($email_list) {
                $message->to($email_list)->subject('ĐĂNG KÝ THÀNH VIÊN THÀNH CÔNG');
                $message->from('trungminhphan@gmail.com', 'HIỆP HỘI DOANH NGHIỆP TỈNH AN GIANG');
            });
            $blnRegis = true;
        }
        return view('Frontend.dang-ky-thanh-vien-submit')->with(compact('blnRegis'));
    }
}
