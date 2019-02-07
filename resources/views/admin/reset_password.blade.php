@php $title = 'Reset Password'; @endphp
@extends('form_layout.master')
@section('content')
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">
                {!! get_session('error') !!}
            </p>
            <form action="{{ aurl('reset_password') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Email">
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