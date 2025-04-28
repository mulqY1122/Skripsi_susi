@extends('adminlte.layouts.auth')

@section('content')
<style>
    body {
      background: linear-gradient(135deg, #ffffff, #439b43, #a9f0b6);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .login-box {
        width: 400px;
    }
    .login-box, .card {
      background: linear-gradient(135deg, #2b8a32, #aceeac, #a9f0b6);
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        text-align: center;
    }
    .btn-primary {
        background-color: #5D7A2F !important;
        border-color: #5D7A2F !important;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #4E6928 !important;
        border-color: #4E6928 !important;
        transform: scale(1.05);
    }
    .login-logo a {
        color: #5D7A2F !important;
        font-size: 24px;
        font-weight: bold;
    }
    .input-group {
        border-radius: 5px;
        overflow: hidden;
        border: 1px solid #e9ece4;
    }
    .form-control {
        border: none;
        box-shadow: none;
    }
    .input-group-text {
        background-color: #f1f3ed;
        color: #fff;
        border: none;
    }
    .forgot-password, .register-link {
        margin-top: 10px;
        font-size: 14px;
    }
    .forgot-password a, .register-link a {
        color: #5D7A2F;
        font-weight: bold;
    }
    .forgot-password a:hover, .register-link a:hover {
        text-decoration: underline;
    }
</style>

<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="{{ route('home') }}"><b>{{ config('app.name', 'Laravel') }}</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>

          <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
              @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <!-- /.social-auth-links -->
          @if (Route::has('password.request'))
          <p class="forgot-password">
            <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
          </p>
          @endif
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->
@endsection