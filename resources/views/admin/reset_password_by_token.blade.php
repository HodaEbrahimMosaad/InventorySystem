@php $title = 'Reset Password'; @endphp
@extends('form_layout.master')
@section('form_content')
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">
                {!! get_session('error') !!}
                @include('layout.message')
            </p>
            <form method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="email" value="{{ $admin_token->email }}" class="form-control" placeholder="Email">
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Reset Password">
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Reset</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection