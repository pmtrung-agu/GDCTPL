@extends('Admin.layout')
@section('title', 'Quản lý danh sách sản phẩm')
@section('css')
  <link href="{{ env('APP_URL') }}assets/backend/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ env('APP_URL') }}assets/backend/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="{{ env('APP_URL') }}assets/backend/libs/switchery/switchery.min.css">
@endsection
@section('body')
<div class="wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
          <div class="card-box">
            <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/san-pham/add" class="btn btn-info"><i class="mdi mdi-folder-plus"></i></a> Danh sách sản phẩm</h3>
            {{ $danhsach->withPath(env('APP_URL').'admin/san-pham') }}
            <table id="responsive-datatable" class="table table-bordered table-bordered table-striped table-sm" cellspacing="0">
                <thead>
                  <tr>
                    <th>STT</th>
                    <th>Hình</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Tình trạng</th>
                    @if(App\Http\Controllers\UserController::is_roles('Admin,Manager'))
                      <th>Người bán</th>
                    @endif
                    <th>#</th>
                  </tr>
                </thead>
                <tbody>
                @if($danhsach)
                  @foreach($danhsach as $k=>$ds)
                  <tr>
                    <td>{{ $k+1 }}</td>
                    <td class="text-center">
                      @if(isset($ds['photos'][0]['aliasname']) && $ds['photos'][0]['aliasname'])
                        <img src="{{ env('APP_URL') }}storage/images/thumb_50/{{ $ds['photos'][0]['aliasname'] }}" style="height:30px;"/>
                      @else
                        <img src="{{ env('APP_URL') }}assets/backend/images/logo_sm.png" style="height:30px;"/>
                      @endif
                    </td>
                    <td><a href="{{ env('APP_URL') }}san-pham-chi-tiet/{{ $ds['slug'] }}" target="_blank">{{ $ds['code'] }}</a></td>
                    <td>{{ $ds['title'] }}</td>
                    <td class="text-right">{{ number_format($ds['prices'],0, ",", ".") }}</td>
                    <td class="text-center">
                      <input type="checkbox" name="{{ $ds['_id'] }}" class="js-switch status" data-plugin="switchery" @if($ds['status'] == 1) checked="checked" @endif data-size="small" data-color="#009efb" value="1"/>
                    </td>
                    @if(App\Http\Controllers\UserController::is_roles('Admin, Manager'))
                      <td>
                        {{-- @php
                          $seller = App\Models\User::find($ds['id_seller']);
                          echo $seller['store'] ? $seller['store'] : $seller['email'];
                        @endphp --}}
                      </td>
                    @endif
                    <td class="text-center">
                      <a href="{{ env('APP_URL') }}admin/san-pham/delete/{{ $ds['_id'] }}" class="btn btn-sm btn-danger" onclick="return confirm('Chắc chắn xóa?')"><i class="mdi mdi-delete"></i> Xóa</a>
                      <a href="{{ env('APP_URL') }}admin/san-pham/edit/{{ $ds['_id'] }}" class="btn btn-sm btn-info"><i class="mdi mdi-pencil-circle"></i> Sửa</a>
                    </td>
                  </tr>
                  @endforeach
                @endif
              </tbody>
            </table>
            {{ $danhsach->withPath(env('APP_URL').'admin/san-pham') }}
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
@section('js')
  <script src="{{ env('APP_URL') }}assets/backend/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/libs/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/libs/switchery/switchery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.js-switch').each(function() {
        new Switchery($(this)[0], $(this).data());
      });
      /*$('#responsive-datatable').DataTable();*/
      $(".status").change(function(){
        var id = $(this).attr("name");
        $.get("{{ env('APP_URL') }}admin/san-pham/update-status/"+id);
      });
      
    });
  </script>
@endsection
