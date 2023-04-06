@extends('admin.master_login')
@section('module','Login')
@section('action','')
@push('css')
  <link rel="stylesheet" href="{{ asset('adminNe/css/form-login/style.css') }}">
@endpush

@section('content')

<div style='display: flex;justify-content: center;align-items: center;height: 100vh;'>
  
  <div class="login-box">
    @if(Session::has('success'))
      <p class="alert alert-danger">{{ Session::get('success') }}</p>
    @endif
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body" style='    border-radius: 20px;'>
        <form action="{{ route('login') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="email" class="form-control" name='email' placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name='password' placeholder="Mật khẩu">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-5">
              <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>              
            </div>
            <div class="col-5">
              <a href="{{route('index')}}" class="btn btn-primary btn-block">Trang chủ</a>
            </div>
            <div class="col">
              <a class="btn btn-primary btn-block" onclick="alert('tk: billtran111@email.com pass:1234567890');">?</a>
            </div>

            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
</div>

@endsection