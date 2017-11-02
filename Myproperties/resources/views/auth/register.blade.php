@extends('layouts.auth')
@section('page', 'register-page')
@section('title', 'Register')
@section('content')

  <div class="register-box">
    <div class="register-logo">
      <a href="{{ url('/') }}"><b>NG</b>Properties</a>
    </div>

    <div class="register-box-body">
      <p class="login-box-msg">Register a new account</p>

      <form method="post" action="{{ route('register') }}">
      {{ csrf_field() }} 

        <div class="form-group has-feedback">
          <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full name" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="0808-000-0000" required>
          <span class="glyphicon glyphicon-phone form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" name="password_confirmation" placeholder="Retype password" required>
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <input type="checkbox" required> I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="{{ route('login') }}" class="text-center">I already have an account</a>
    </div>
    <!-- /.form-box -->
  </div>
  <!-- /.register-box -->

@endsection