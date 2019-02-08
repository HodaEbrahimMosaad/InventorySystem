@php $title = 'Log In'; @endphp
@extends('form_layout.master')
@section('form_content')
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">
                {!! get_session('error') !!}
                {!! get_session('suc') !!}
            </p>
            <form action="{{ aurl('login') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" name="rememberme" value="1"> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <p class="mb-1">
                <a href="{{ aurl('reset_password') }}">I forgot my password</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection

