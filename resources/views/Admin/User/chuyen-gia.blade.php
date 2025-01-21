@extends('Admin.layout')
@section('title', __('Danh sách tài khoản'))
@section('css')
  <link href="{{ env('APP_URL') }}assets/backend/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
  @endsection
@section('body')
<div class="wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card-box table-responsive">
            <h3 class="m-t-0"><a href="{{ env('APP_URL') }}admin/user/add?url={{ Request::fullUrl() }}" class="btn btn-primary"><i class="mdi mdi-account-plus"></i></a> {{ __('Danh sách Chuyên gia Tư vấn') }}</h3>
            @if($users)
            <div class="row">
                @foreach($users as $key => $user)
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="member-card">
                            <div class="thumb-lg member-thumb mx-auto">
                                @if(isset($user['photos'][0]['aliasname']) && $user['photos'][0]['aliasname'])
                                <img src="{{ env('APP_URL') }}storage/images/thumb_360x200/{{ $user['photos'][0]['aliasname'] }}" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                                @else
                                    <img src="{{ env('APP_URL') }}assets/backend/images/users/avatar-2.jpg" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">
                                @endif
                            </div>
                            <div class="">
                                <h4>{{ isset($user['fullname']) ? $user['fullname'] : '' }}</h4>
                                <p>Email: {{ isset($user['username']) ? $user['username'] : '' }}</p>
                                <p>Điện thoại: {{ isset($user['phone']) ? $user['phone'] : '' }}</p>
                                <p style="font-weight:bold;">{{ $user['ghi_chu'] }}</p>
                            </div>
                            <ul class="social-links list-inline">
                                <li class="list-inline-item">
                                    <a href="{{ env('APP_URL') }}admin/user/delete/{{ $user['_id'] }}?url={{ Request::fullUrl() }}" onclick="return confirm('Chắc chắn xóa?')"><i class="fa fa-trash"></i></a>
                                </li>
                                
                                <li class="list-inline-item">
                                    <a href="{{ env('APP_URL') }}admin/user/edit/{{ $user['_id'] }}?url={{ Request::fullUrl() }}"><i class="fa fa-pencil-alt" title="Chỉnh sửa tài khoản người dùng"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- end col -->
                @endforeach
            </div>
           @endif
{{-- 
          <table id="responsive-datatable" class="table table-bordered table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th data-sort-initial="true" data-toggle="true">{{ __('STT') }}</th>
                <th>{{ __('Username') }}</th>
                <th>{{ __('Họ tên') }}</th>
                <th>{{ __('Quyền') }}</th>
                <th class="text-center">{{ __('Tình trạng') }}</th>
                <th data-sort-ignore="true" class="text-center">{{ __('Hiệu chỉnh') }}</th>
              </tr>
            </thead>
            <tbody>
              @if($users)
                  @foreach($users as $key => $user)
                  <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ isset($user['username']) ? $user['username'] : '' }}</td>
                      <td>{{ isset($user['fullname']) ? $user['fullname'] : '' }}</td>
                      <td>
                        @if(isset($user['roles']) && $user['roles'])
                          @foreach($user['roles'] as $role)
                            <span class="badge badge-pill badge-primary">{{ $roles[$role] }}</span>
                          @endforeach
                        @endif
                      </td>
                      <td class="text-center">
                        @if($user['active'] == 1)
                          <i class="mdi mdi-check-circle text-info"></i>
                        @else
                          <i class="mdi mdi-close-circle text-danger"></i>
                        @endif
                      </td>
                      <td class="text-center">
                          <a href="{{ env('APP_URL') }}admin/user/delete/{{ $user['_id'] }}?url={{ Request::fullUrl() }}" onclick="return confirm('Chắc chắn xóa?')" title="Xóa tài khoản người dùng"><i class="mdi mdi-delete text-danger"></i></a>
                          <a href="{{ env('APP_URL') }}admin/user/edit/{{ $user['_id'] }}?url={{ Request::fullUrl() }}" ><i class="mdi mdi-account-edit" title="Chỉnh sửa tài khoản người dùng"></i></a>
                      </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
 --}}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
  <script src="{{ env('APP_URL') }}assets/backend/libs/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ env('APP_URL') }}assets/backend/libs/datatables/dataTables.bootstrap4.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#responsive-datatable').DataTable();
    });
  </script>
@endsection
