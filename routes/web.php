<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ObjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DMDiaChiController;
use App\Http\Controllers\DMLinhVucController;
use App\Http\Controllers\DMNganhNgheController;
use App\Http\Controllers\DMThongTinController;
use App\Http\Controllers\DMSanPhamController;
use App\Http\Controllers\DMTaiLieuController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\ThongTinController;
use App\Http\Controllers\TaiLieuController;
use App\Http\Controllers\CDSKhaoSatController;
use App\Http\Controllers\DoanhNghiepController;

use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'index']);
Route::get('thong-tin', [FrontendController::class, 'thong_tin']);
Route::get('thong-tin/{taxonomy}', [FrontendController::class, 'thong_tin']);
Route::get('thong-tin-chi-tiet/{slug}', [FrontendController::class, 'thong_tin_chi_tiet']);
Route::get('goi-yeu-cau', [FrontendController::class, 'goi_yeu_cau']);
Route::get('tu-van-chuyen-doi-so', [FrontendController::class, 'tu_van_chuyen_doi_so']);
Route::post('tu-van-chuyen-doi-so-submit', [FrontendController::class, 'tu_van_chuyen_doi_so_submit']);
Route::get('doanh-nghiep/goi-yeu-cau', [FrontendController::class, 'goi_yeu_cau']);
Route::get('doanh-nghiep/tu-van-chuyen-doi-so', [FrontendController::class, 'tu_van_chuyen_doi_so']);
Route::get('thong-tin/tai-ve/{id}/{key}', [ThongTinController::class, 'download']);
Route::get('goi-yeu-cau', [FrontendController::class, 'goi_yeu_cau']);
Route::post('goi-yeu-cau-submit', [FrontendController::class, 'goi_yeu_cau_submit']);

Route::get('auth/login', [AuthController::class, 'getLogin'])->name('auth-login-get');
Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth-logout-get');
Route::post('auth/login', [AuthController::class,'authenticate'])->name('auth-login-post');;
Route::get('auth/not-permis', [AuthController::class,'notPermis'])->name('auth-not-permis');;
Route::get('slug/{str}', [ObjectController::class,'getSlug'])->name('slug-string');
Route::post('image/uploads', [ImageController::class, 'uploads'])->name('image-upload-post')->middleware('checkauth');
Route::get('image/delete/{filename}', [ImageController::class, 'delete'])->middleware('checkauth')->name('image.delete');
Route::post('file/uploads/{fileID}', [FileController::class,'fileUploads'])->middleware('checkauth');
Route::post('file/uploads', [FileController::class, 'uploads'])->middleware('checkauth');
Route::post('file/upload-json/{fileID}', [FileController::class, 'upload_json'])->middleware('checkauth');
Route::get('file/delete/{filename}', [FileController::class, 'delete'])->middleware('checkauth');
Route::get('file/download/{filename}', [FileController::class, 'download'])->middleware('checkauth');

Route::get('not-permissions', function () {
    return view('Admin.page_not_permis');
});


Route::group(['prefix' => 'admin',  'middleware' => 'checkauth'], function(){
    Route::get('/', [AuthController::class, 'admin'])->middleware('checkauth');
    Route::get('dashboard', [AuthController::class, 'dashboard'])->middleware('checkauth');

    Route::get('chuyen-gia', [UserController::class, 'chuyen_gia'])->name('admin-thong-tin')->middleware('role:Admin,Manager,Business,ABA');

    Route::get('san-pham', [SanPhamController::class, 'list'])->name('admin-san-pham')->middleware('role:Admin,Manager,ABA');
    Route::get('san-pham/change-password', [SanPhamController::class, 'change_password'])->name('admin-san-pham-change-password')->middleware('role:Admin,Manager,Business,ABA');
    Route::post('san-pham/update-password', [SanPhamController::class, 'update_password'])->name('admin-san-pham-update-password')->middleware('role:Admin,Manager,Business,ABA');
    Route::get('san-pham/add', [SanPhamController::class, 'add'])->name('admin-san-pham-add')->middleware('role:Admin,Manager,Business,ABA');
    Route::post('san-pham/create', [SanPhamController::class, 'create'])->name('admin-san-pham-create')->middleware('role:Admin,Manager,Business,ABA');
    Route::get('san-pham/edit/{id}', [SanPhamController::class, 'edit'])->name('admin-san-pham-edit-id')->middleware('role:Admin,Manager,Business,ABA');
    Route::post('san-pham/update', [SanPhamController::class,'update'])->name('admin-san-pham-update')->middleware('role:Admin,Manager,Business,ABA');
    Route::get('san-pham/delete/{id}', [SanPhamController::class, 'delete'])->name('admin-san-pham-delete-id')->middleware('role:Admin,Manager,Business,ABA');

    Route::get('thong-tin', [ThongTinController::class, 'list'])->name('admin-thong-tin')->middleware('role:Admin,Manager,ABA');
    Route::get('thong-tin/change-password', [ThongTinController::class, 'change_password'])->name('admin-thong-tin-change-password')->middleware('role:Admin,Manager,Business,ABA');
    Route::post('thong-tin/update-password', [ThongTinController::class, 'update_password'])->name('admin-thong-tin-update-password')->middleware('role:Admin,Manager,Business,ABA');
    Route::get('thong-tin/add', [ThongTinController::class, 'add'])->name('admin-thong-tin-add')->middleware('role:Admin,Manager,Business,ABA');
    Route::post('thong-tin/create', [ThongTinController::class, 'create'])->name('admin-thong-tin-create')->middleware('role:Admin,Manager,Business,ABA');
    Route::get('thong-tin/edit/{id}', [ThongTinController::class, 'edit'])->name('admin-thong-tin-edit-id')->middleware('role:Admin,Manager,Business,ABA');
    Route::post('thong-tin/update', [ThongTinController::class,'update'])->name('admin-thong-tin-update')->middleware('role:Admin,Manager,Business,ABA');
    Route::get('thong-tin/delete/{id}', [ThongTinController::class, 'delete'])->name('admin-thong-tin-delete-id')->middleware('role:Admin,Manager,Business,ABA');

    Route::get('tai-lieu', [TaiLieuController::class, 'list'])->name('admin-tai-lieu')->middleware('role:Admin,Manager,ABA');
    Route::get('tai-lieu/change-password', [TaiLieuController::class, 'change_password'])->name('admin-tai-lieu-change-password')->middleware('role:Admin,Manager,Business,ABA');
    Route::post('tai-lieu/update-password', [TaiLieuController::class, 'update_password'])->name('admin-tai-lieu-update-password')->middleware('role:Admin,Manager,Business,ABA');
    Route::get('tai-lieu/add', [TaiLieuController::class, 'add'])->name('admin-tai-lieu-add')->middleware('role:Admin,Manager,Business,ABA');
    Route::post('tai-lieu/create', [TaiLieuController::class, 'create'])->name('admin-tai-lieu-create')->middleware('role:Admin,Manager,Business,ABA');
    Route::get('tai-lieu/edit/{id}', [TaiLieuController::class, 'edit'])->name('admin-tai-lieu-edit-id')->middleware('role:Admin,Manager,Business,ABA');
    Route::post('tai-lieu/update', [TaiLieuController::class,'update'])->name('admin-tai-lieu-update')->middleware('role:Admin,Manager,Business,ABA');
    Route::get('tai-lieu/delete/{id}', [TaiLieuController::class, 'delete'])->name('admin-tai-lieu-delete-id')->middleware('role:Admin,Manager,Business,ABA');

    
    Route::get('khao-sat-muc-do-cds', [CDSKhaoSatController::class, 'du_lieu'])->middleware('role:Admin,Manager,Business,ABA');
    Route::get('khao-sat-muc-do-cds/du-lieu', [CDSKhaoSatController::class, 'du_lieu'])->middleware('role:Admin,Manager,Business,ABA');
    Route::get('khao-sat-muc-do-cds/bieu-do', [CDSKhaoSatController::class, 'bieu_do'])->middleware('role:Admin,Manager,Business,ABA');
    Route::get('khao-sat-muc-do-cds/chi-tiet/{id}', [CDSKhaoSatController::class, 'chi_tiet'])->middleware('role:Admin,Manager,Business,ABA');
    Route::get('khao-sat-muc-do-cds/phan-tich', [CDSKhaoSatController::class, 'phan_tich'])->middleware('role:Admin,Manager,Business,ABA');
    Route::get('khao-sat-muc-do-cds/theo-doanh-nghiep', [CDSKhaoSatController::class, 'doanh_nghiep'])->middleware('role:Admin,Manager,Business,ABA');
    Route::get('khao-sat-muc-do-cds/doanh-nghiep/{lv}', [CDSKhaoSatController::class, 'doanh_nghiep_linh_vuc'])->middleware('role:Admin,Manager,Business,ABA');
    Route::get('khao-sat-muc-do-cds/theo-nganh-nghe', [CDSKhaoSatController::class, 'nganh_nghe'])->middleware('role:Admin,Manager,Business,ABA');
    Route::get('khao-sat-muc-do-cds/theo-linh-vuc', [CDSKhaoSatController::class, 'linh_vuc'])->middleware('role:Admin,Manager,Business,ABA');
    
    Route::get('doanh-nghiep', [DoanhNghiepController::class, 'list'])->middleware('role:Admin,Manager,Expert,ABA,Business');
    Route::get('doanh-nghiep/danh-sach', [DoanhNghiepController::class, 'list'])->middleware('role:Admin,Manager,Expert,ABA,Business');
    Route::get('doanh-nghiep/chi-tiet/{id}', [DoanhNghiepController::class, 'chi_tiet'])->middleware('role:Admin,Manager,ABA,Business');
    Route::get('doanh-nghiep/add', [DoanhNghiepController::class, 'add'])->middleware('role:Admin,Manager,Expert,Business,ABA');
    Route::post('doanh-nghiep/create', [DoanhNghiepController::class, 'create'])->middleware('role:Admin,Manager,ABA');
    Route::get('doanh-nghiep/edit/{id}', [DoanhNghiepController::class, 'edit'])->middleware('role:Admin,Manager,ABA,Business');
    Route::post('doanh-nghiep/update', [DoanhNghiepController::class, 'update'])->middleware('role:Admin,Manager,ABA,Business');
    Route::get('doanh-nghiep/delete/{id}', [DoanhNghiepController::class, 'delete'])->middleware('role:Admin,Manager,ABA');
    Route::get('doanh-nghiep/hoi-vien/{id}', [DoanhNghiepController::class, 'hoi_vien'])->middleware('role:Admin,Manager,ABA');
    Route::get('doanh-nghiep/tao-tai-khoan/{id}', [DoanhNghiepController::class, 'tao_tai_khoan'])->middleware('role:Admin,Manager,ABA');
    Route::get('doanh-nghiep/tu-van-chuyen-doi-so', [DoanhNghiepController::class, 'tu_van'])->middleware('role:Admin,Manager,ABA,Business');
    Route::get('doanh-nghiep/tu-van-chuyen-doi-so/add', [DoanhNghiepController::class, 'tu_van_add'])->middleware('role:Admin,Manager,ABA,Business');
    Route::post('doanh-nghiep/tu-van-chuyen-doi-so/create', [DoanhNghiepController::class, 'tu_van_create'])->middleware('role:Admin,Manager,ABA,Business');
    Route::get('doanh-nghiep/tu-van-chuyen-doi-so/chi-tiet/{id}', [DoanhNghiepController::class, 'tu_van_chi_tiet'])->middleware('role:Admin,Manager,ABA,Business');
    Route::post('doanh-nghiep/tu-van-chuyen-doi-so/chi-tiet/update', [DoanhNghiepController::class, 'tu_van_update'])->middleware('role:Admin,Manager,ABA,Business');
    Route::get('doanh-nghiep/tu-van-chuyen-doi-so/tinh-trang/{id}', [DoanhNghiepController::class, 'tu_van_tinh_trang'])->middleware('role:Admin,Manager,ABA');
    
    Route::get('doanh-nghiep/nhu-cau-chuyen-doi-so', [DoanhNghiepController::class, 'nhu_cau'])->middleware('role:Admin,Manager,ABA,Business');
    Route::get('doanh-nghiep/nhu-cau-chuyen-doi-so/add', [DoanhNghiepController::class, 'nhu_cau_add'])->middleware('role:Admin,Manager,ABA,Business');
    Route::post('doanh-nghiep/nhu-cau-chuyen-doi-so/create', [DoanhNghiepController::class, 'nhu_cau_create'])->middleware('role:Admin,Manager,ABA,Business');
    Route::get('doanh-nghiep/nhu-cau-chuyen-doi-so/chi-tiet/{id}', [DoanhNghiepController::class, 'nhu_cau_chi_tiet'])->middleware('role:Admin,Manager,ABA,Business');
    Route::post('doanh-nghiep/nhu-cau-chuyen-doi-so/chi-tiet/update', [DoanhNghiepController::class, 'nhu_cau_update'])->middleware('role:Admin,Manager,ABA,Business');
    Route::get('doanh-nghiep/nhu-cau-chuyen-doi-so/tinh-trang/{id}', [DoanhNghiepController::class, 'nhu_cau_tinh_trang'])->middleware('role:Admin,Manager,ABA');
        
    Route::group(['prefix' => 'danh-muc',  'middleware' => 'checkauth'], function(){
        Route::get('linh-vuc', [DMLinhVucController::class, 'list'])->name('admin-linh-vuc')->middleware('role:Admin');
        Route::get('linh-vuc/change-password', [DMLinhVucController::class, 'change_password'])->name('admin-linh-vuc-change-password')->middleware('checkauth');
        Route::post('linh-vuc/update-password', [DMLinhVucController::class, 'update_password'])->name('admin-linh-vuc-update-password')->middleware('checkauth');
        Route::get('linh-vuc/add', [DMLinhVucController::class, 'add'])->name('admin-linh-vuc-add')->middleware('role:Admin');
        Route::post('linh-vuc/create', [DMLinhVucController::class, 'create'])->name('admin-linh-vuc-create')->middleware('role:Admin');
        Route::get('linh-vuc/edit/{id}', [DMLinhVucController::class, 'edit'])->name('admin-linh-vuc-edit-id')->middleware('role:Admin');
        Route::post('linh-vuc/update', [DMLinhVucController::class,'update'])->name('admin-linh-vuc-update')->middleware('role:Admin');
        Route::get('linh-vuc/delete/{id}', [DMLinhVucController::class, 'delete'])->name('admin-linh-vuc-delete-id')->middleware('role:Admin');

        Route::get('nganh-nghe', [DMNganhNgheController::class, 'list'])->name('admin-nganh-nghe')->middleware('role:Admin');
        Route::get('nganh-nghe/change-password', [DMNganhNgheController::class, 'change_password'])->name('admin-nganh-nghe-change-password')->middleware('checkauth');
        Route::post('nganh-nghe/update-password', [DMNganhNgheController::class, 'update_password'])->name('admin-nganh-nghe-update-password')->middleware('checkauth');
        Route::get('nganh-nghe/add', [DMNganhNgheController::class, 'add'])->name('admin-nganh-nghe-add')->middleware('role:Admin');
        Route::post('nganh-nghe/create', [DMNganhNgheController::class, 'create'])->name('admin-nganh-nghe-create')->middleware('role:Admin');
        Route::get('nganh-nghe/edit/{id}', [DMNganhNgheController::class, 'edit'])->name('admin-nganh-nghe-edit-id')->middleware('role:Admin');
        Route::post('nganh-nghe/update', [DMNganhNgheController::class,'update'])->name('admin-nganh-nghe-update')->middleware('role:Admin');
        Route::get('nganh-nghe/delete/{id}', [DMNganhNgheController::class, 'delete'])->name('admin-nganh-nghe-delete-id')->middleware('role:Admin');

        Route::get('thong-tin', [DMThongTinController::class, 'list'])->name('admin-dm-thong-tin')->middleware('role:Admin');
        Route::get('thong-tin/change-password', [DMThongTinController::class, 'change_password'])->name('admin-dm-thong-tin-change-password')->middleware('checkauth');
        Route::post('thong-tin/update-password', [DMThongTinController::class, 'update_password'])->name('admin-dm-thong-tin-update-password')->middleware('checkauth');
        Route::get('thong-tin/add', [DMThongTinController::class, 'add'])->name('admin-dm-thong-tin-add')->middleware('role:Admin');
        Route::post('thong-tin/create', [DMThongTinController::class, 'create'])->name('admin-dm-thong-tin-create')->middleware('role:Admin');
        Route::get('thong-tin/edit/{id}', [DMThongTinController::class, 'edit'])->name('admin-dm-thong-tin-edit-id')->middleware('role:Admin');
        Route::post('thong-tin/update', [DMThongTinController::class,'update'])->name('admin-dm-thong-tin-update')->middleware('role:Admin');
        Route::get('thong-tin/delete/{id}', [DMThongTinController::class, 'delete'])->name('admin-dm-thong-tin-delete-id')->middleware('role:Admin');

        Route::get('san-pham', [DMSanPhamController::class, 'list'])->name('admin-san-pham')->middleware('role:Admin');
        Route::get('san-pham/change-password', [DMSanPhamController::class, 'change_password'])->name('admin-san-pham-change-password')->middleware('checkauth');
        Route::post('san-pham/update-password', [DMSanPhamController::class, 'update_password'])->name('admin-san-pham-update-password')->middleware('checkauth');
        Route::get('san-pham/add', [DMSanPhamController::class, 'add'])->name('admin-san-pham-add')->middleware('role:Admin');
        Route::post('san-pham/create', [DMSanPhamController::class, 'create'])->name('admin-san-pham-create')->middleware('role:Admin');
        Route::get('san-pham/edit/{id}', [DMSanPhamController::class, 'edit'])->name('admin-san-pham-edit-id')->middleware('role:Admin');
        Route::post('san-pham/update', [DMSanPhamController::class,'update'])->name('admin-san-pham-update')->middleware('role:Admin');
        Route::get('san-pham/delete/{id}', [DMSanPhamController::class, 'delete'])->name('admin-san-pham-delete-id')->middleware('role:Admin');

        Route::get('tai-lieu', [DMTaiLieuController::class, 'list'])->name('admin-dm-tai-lieu')->middleware('role:Admin');
        Route::get('tai-lieu/change-password', [DMTaiLieuController::class, 'change_password'])->name('admin-dm-tai-lieu-change-password')->middleware('checkauth');
        Route::post('tai-lieu/update-password', [DMTaiLieuController::class, 'update_password'])->name('admin-dm-tai-lieu-update-password')->middleware('checkauth');
        Route::get('tai-lieu/add', [DMTaiLieuController::class, 'add'])->name('admin-dm-tai-lieu-add')->middleware('role:Admin');
        Route::post('tai-lieu/create', [DMTaiLieuController::class, 'create'])->name('admin-dm-tai-lieu-create')->middleware('role:Admin');
        Route::get('tai-lieu/edit/{id}', [DMTaiLieuController::class, 'edit'])->name('admin-dm-tai-lieu-edit-id')->middleware('role:Admin');
        Route::post('tai-lieu/update', [DMTaiLieuController::class,'update'])->name('admin-dm-tai-lieu-update')->middleware('role:Admin');
        Route::get('tai-lieu/delete/{id}', [DMTaiLieuController::class, 'delete'])->name('admin-dm-tai-lieu-delete-id')->middleware('role:Admin');
    });

    Route::get('dia-chi', [DMDiaChiController::class, 'list'])->name('admin-danh-muc-dia-chi')->middleware('role:Manager,Admin');
    Route::get('dia-chi/{id}', [DMDiaChiController::class, 'list'])->name('admin-danh-muc-dia-chi-id')->middleware('role:Manager,Admin');
    Route::get('dia-chi/add', [DMDiaChiController::class, 'add'])->name('admin-danh-muc-dia-chi-add')->middleware('role:Manager,Admin');
    Route::post('dia-chi/create', [DMDiaChiController::class, 'create'])->name('admin-danh-muc-dia-chi-create')->middleware('role:Manager,Admin');
    Route::get('dia-chi/get-edit/{id}', [DMDiaChiController::class, 'getEdit'])->name('admin-danh-muc-dia-chi-get-edit-id')->middleware('role:Manager,Admin');
    Route::get('dia-chi/edit', [DMDiaChiController::class, 'edit'])->name('admin-danh-muc-dia-chi-edit')->middleware('role:Manager,Admin');
    Route::post('dia-chi/update', [DMDiaChiController::class, 'update'])->name('admin-danh-muc-dia-chi-update')->middleware('role:Manager,Admin');
    Route::get('dia-chi/get/{id}', [DMDiaChiController::class, 'getOptions'])->name('admin-danh-muc-dia-chi-get-id');
    Route::get('dia-chi/get/{id}/{id1}', [DMDiaChiController::class, 'getOptions1'])->name('admin-danh-muc-dia-chi-get-id-id1');
    Route::get('thong-tin-tai-khoan', [UserController::class, 'profiles']);

    
    Route::get('user', [UserController::class, 'list'])->name('admin-user')->middleware('role:Admin');
    Route::get('user/change-password', [UserController::class, 'change_password'])->name('admin-user-change-password')->middleware('checkauth');
    Route::post('user/update-password', [UserController::class, 'update_password'])->name('admin-user-update-password')->middleware('checkauth');
    Route::get('user/add', [UserController::class, 'add'])->name('admin-user-add')->middleware('role:Admin');
    Route::post('user/create', [UserController::class, 'create'])->name('admin-user-create')->middleware('role:Admin');
    Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('admin-user-edit-id')->middleware('role:Admin');
    Route::post('user/update', [UserController::class,'update'])->name('admin-user-update')->middleware('role:Admin');
    Route::get('user/delete/{id}', [UserController::class, 'delete'])->name('admin-user-delete-id')->middleware('role:Admin');
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});