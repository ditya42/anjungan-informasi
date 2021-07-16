@extends('admin.admin_pengaduan.content')
@section('title') Edit User @endsection
@section('breadcrumb') Edit User @endsection

@section('content')
<form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('users.update', ['id'=>$user->id])}}" method="POST">
  @csrf
  <input type="hidden" value="PUT" name="_method">
 <div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title"></h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label>Nama Lengkap</label>
          <input value="{{ $user->name }}" type="text" class="form-control {{$errors->first('name') ? "is-invalid": ""}}"  name="name" id="name">
          <div class="invalid-feedback">
              {{$errors->first('name')}}
          </div>
        </div>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
      <div class="col-md-3">
        <div class="form-group">
          <label for="username">Username</label>
          <input value="{{ $user->username }}" type="text" class="form-control {{$errors->first('username') ? "is-invalid" : ""}}"
          name="username" id="username">
          <div class="invalid-feedback">
              {{$errors->first('username')}}
          </div>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-3">
        <div class="form-group">
          <label for="phone">No. HP</label>
          <input value="{{ $user->phone }}" type="text" name="phone" class="form-control {{$errors->first('phone') ? "is-invalid" : ""}}">
          <div class="invalid-feedback">
              {{$errors->first('phone')}}
          </div>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-3">
        <div class="form-group">
          <label for="email">Email</label>
          <input value="{{ $user->email }}" class="form-control {{$errors->first('email') ? "is-invalid" : "" }}"  type="text" name="email" id="email"/>
          <div class="invalid-feedback">
              {{$errors->first('email')}}
          </div>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-3">
        <div class="form-group">
          <label for="password">Password</label>
          <input class="form-control {{$errors->first('password') ? "isinvalid" : ""}}" type="password" name="password" id="password"/>
          <div class="invalid-feedback">
              {{$errors->first('password')}}
          </div>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-3">
        <div class="form-group">
          <label for="password_confirmation">Password Confirmation</label>
          <input class="form-control {{$errors->first('password_confirmation') ? "is-invalid" : ""}}" type="password" name="password_confirmation" id="password_confirmation"/>
          <div class="invalid-feedback">
              {{$errors->first('password_confirmation')}}
          </div>
        </div>
      </div>
      <!-- /.col -->
      <!-- /.col -->
      <div class="col-md-3">
        <div class="form-group">
          <label for="avatar">Gambar Avatar</label>
          <br>
          <input id="avatar" name="avatar" type="file" class="form-control">
          <div class="invalid-feedback">
              {{$errors->first('avatar')}}
          </div>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label for="address">Alamat</label>
          <textarea name="address" id="address" class="form-control {{$errors->first('address') ? "is-invalid" : ""}}">{{ $user->address }}</textarea>
          <div class="invalid-feedback">
              {{$errors->first('address')}}
          </div>
        </div>
      </div>
      <div class="col-md-3">
          <label for="roles">Roles</label>
          <br>
          <input type="checkbox" {{in_array("ADMIN", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="ADMIN" value="ADMIN">
          <label for="ADMIN">Admin</label>

          <input type="checkbox" {{in_array("OPERATOR", json_decode($user->roles)) ? "checked" : ""}} name="roles[]" id="OPERATOR" value="OPERATOR">
          <label for="OPERATOR">Operator</label>
      </div>
    </div>
  </div>
  <div class="box-footer">
    <button type="submit" class="btn btn-primary btn-save"><i class="fa fa-floppy-o"></i> Simpan </button>
    <a href="{{ route('users.index') }}" class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> Batal</a>
  </div>
</div>
</form>
<!-- /.box -->
@endsection
