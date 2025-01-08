<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Str;
class ImageController extends Controller
{
  function uploads(Request $request, $locale = '')
  {
    $files = $request->file('hinhanh_files');
    if (!empty($files)) :
      foreach ($files as $file) :
        $extension = $file->getClientOriginalExtension();
        $realname = $file->getClientOriginalName();
        $filename = date("YmdHis") . '_' . strtolower(uniqid()) . '.' . $extension;
        // Lưu file gốc
        Storage::disk('local')->put('images/' . $filename, file_get_contents($file));
        // Tạo và lưu các phiên bản ảnh
        $origin = Storage::disk('public')->path('images/origin/' . $filename);
        Image::make($file->getRealPath())->save($origin);

        $thumb = Storage::disk('public')->path('images/thumb_360x200/' . $filename);
        Image::make($file->getRealPath())->resize(360, null, function ($constraint) {
          $constraint->aspectRatio();
        })->save($thumb);

        $thumb_50 = Storage::disk('public')->path('images/thumb_50/' . $filename);
        Image::make($file->getRealPath())->resize(null, 50, function ($constraint) {
          $constraint->aspectRatio();
        })->save($thumb_50);

        echo '<div class="col-sm-6 col-md-4 items draggable-element text-center position-relative">
                    <input type="hidden" name="hinhanh_aliasname[]" value="' . $filename . '" readonly/>
                    <input type="hidden" name="hinhanh_filename[]" class="form-control" value="' . $realname . '" />
                    <input type="hidden" name="hinhanh_type[]" class="form-control" value="' . $extension . '" />
                    <a href="' . asset('storage/images/origin/' . $filename) . '" class="image-popup">
                        <div class="portfolio-masonry-box">
                            <div class="portfolio-masonry-img">
                                <img src="'.asset('storage/images/thumb_360x200/' . $filename) . '" class="thumb-img img-fluid" alt="' . $filename . '">
                            </div>
                            <div class="portfolio-masonry-detail">
                                <p>' . $realname . '</p>
                            </div>
                        </div>
                    </a>
                    <a href="' . route('image.delete', ['filename' => $filename]) . '" onclick="return false;" class="btn btn-danger btn-sm delete_file" style="position:absolute;top:4px;right:4px;">
                        <i class="fa fa-trash"></i>
                    </a>
                    <input type="hidden" name="hinhanh_title[]"  value="' . $realname . '" />
                </div>';
      endforeach;
    endif;
  }

  function delete(Request $request, $filename = '')
  {
    Storage::disk('local')->delete('images/' . $filename);
    Storage::disk('public')->delete('images/origin/' . $filename);
    Storage::disk('public')->delete('images/thumb_360x200/' . $filename);
    Storage::disk('public')->delete('images/thumb_50/' . $filename);
  }

  static function remove($filename)
  {
    Storage::disk('local')->delete('images/' . $filename);
    Storage::disk('public')->delete('images/origin/' . $filename);
    Storage::disk('public')->delete('images/thumb_360x200/' . $filename);
    Storage::disk('public')->delete('images/thumb_50/' . $filename);
  }

  static function save($file)
  {
    if (!empty($file)) :
      $extension = $file->getClientOriginalExtension();
      $realname = $file->getClientOriginalName();
      $filename = date("YmdHis") . '_' . strtolower(uniqid()) . '.' . $extension;

      
      Storage::disk('public')->put('images/' . $filename, file_get_contents($file));

      $origin = Storage::disk('public')->path('images/origin/' . $filename);
      Image::make($file->getRealPath())->save($origin);


      $thumb = Storage::disk('public')->path('images/thumb_360x200/' . $filename);
      Image::make($file->getRealPath())->resize(360, null, function ($constraint) {
        $constraint->aspectRatio();
      })->save($thumb);

      $thumb_50 = Storage::disk('public')->path('images/thumb_50/' . $filename);
      Image::make($file->getRealPath())->resize(null, 50, function ($constraint) {
        $constraint->aspectRatio();
      })->save($thumb_50);

      return [
        'aliasname' => $filename,
        'title' => $realname,
        'type' => $extension
      ];
    endif;
  }

  static function save_many($files)
  {
    $arr = array();
    if (!empty($files)) :
      foreach ($files as $file) :
        $extension = $file->getClientOriginalExtension();
        $realname = $file->getClientOriginalName();
        $filename = date("YmdHis") . '_' . strtolower(uniqid()) . '.' . $extension;

        Storage::disk('public')->put('images/' . $filename, file_get_contents($file));

        $origin = Storage::disk('public')->path('images/origin/' . $filename);
        Image::make($file->getRealPath())->save($origin);

        $thumb = Storage::disk('public')->path('images/thumb_360x200/' . $filename);
        Image::make($file->getRealPath())->resize(360, null, function ($constraint) {
          $constraint->aspectRatio();
        })->save($thumb);

        $thumb_50 = Storage::disk('public')->path('images/thumb_50/' . $filename);
        Image::make($file->getRealPath())->resize(null, 50, function ($constraint) {
          $constraint->aspectRatio();
        })->save($thumb_50);

        $arr[] =  [
          'aliasname' => $filename,
          'title' => $realname,
          'type' => $extension
        ];
      endforeach;
      return $arr;
    endif;
  }

  static function toSaveArray($data)
  {
    $arr_hinhanh = array();
    if (isset($data['hinhanh_aliasname'])) {
      foreach ($data['hinhanh_aliasname'] as $key => $dk) {
        $arr = array(
          'aliasname' => $dk,
          'title' => $data['hinhanh_title'][$key],
          'type' => $data['hinhanh_type'][$key]
        );
        $arr_hinhanh[] = $arr;
      }
    }
    return $arr_hinhanh;
  }
}
