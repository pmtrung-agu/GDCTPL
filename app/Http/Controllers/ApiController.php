<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ThongTin;
use App\Models\SanPham;
use App\Models\TaiLieu;
use App\Models\DoanhNghiep;
use App\Models\User;
class ApiController extends Controller
{
    //
    function thong_tin() {
        $data = ThongTin::All();
        return json_encode($data);
    }

    function thong_tin_slug($slug = '') {
        $data = ThongTin::where('slug', '=', $slug)->first();
        return json_encode($data);
    }

    function tai_lieu() {
        $data = TaiLieu::All();
        return json_encode($data);
    }

    function tai_lieu_slug($slug = '') {
        $data = TaiLieu::where('slug', '=', $slug)->first();
        return json_encode($data);
    }

    function san_pham() {
        $data = SanPham::where('status','=', 1)->get();
        return json_encode($data);
    }

    function san_pham_slug($slug = '') {
        $data = SanPham::where('slug', '=', $slug)->first();
        return json_encode($data);
    }

    function doanh_nghiep() {
        $data = DoanhNghiep::All();
        return json_encode($data);
    }

    function doanh_nghiep_slug($slug = '') {
        $data = DoanhNghiep::where('slug', '=', $slug)->first();
        return json_encode($data);
    }

    function chuyen_gia() {
        $data = User::where('roles','Expert')->orderBy('updated_at','desc')->get();
        return json_encode($data);
    }

    function dang_ky_thanh_vien(Request $request) {
        $ten = $request->input('ten');
        $dien_thoai = $request->input('dien_thoai');
        $email = $request->input('email');
        return $ten . ' - ' . $dien_thoai . ' - ' . $email;
    }

    function dang_nhap(Request $request) {
        $username = $request->input('username');
        $password = $request->input('password');
        $remember = true;

        if (Auth::attempt(['username' => $username, 'password' => $password, 'active' => 1], $remember) ||  Auth::attempt(['phone' => $username, 'password' => $password, 'active' => 1], $remember)) {
            $user = User::where('username', '=', $username)->orWhere('phone', '=', $username)->first();
            return json_encode($user);
        } else {
            return 'Đăng nhập không thành công';
        }
        //return $username . ' - ' . $password;
    }


}
