@php $title = 'Create Manager'; @endphp

@extends('layout.master')
@section('content')
    <div class="col-md-6" style="margin: 20px auto; height: -webkit-fill-available">
    @include('layout.message')
    {!! get_session('suc') !!}
    <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Create Manager</h3>
            </div>
            <form action="{{ surl() }}" method="post" class="form-horizontal">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" required class="form-control" id="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" required class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">Phone Num</label>
                        <div class="col-sm-10">
                            <input id="phone" type="text" name="phone" required class="form-control"  placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Additional Info</label>
                        <div class="col-sm-10">
                            <textarea name="info" required class="form-control" >
                            </textarea>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Create</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('.login-box').removeClass('login-box');
        $( "div.col-sm-10:has(input[type='email']), div.col-sm-10:has(textarea), div.col-sm-10:has(input[type='text'])").css({
            'float':'right',
            'width': '100%'
        })
    </script>
@endsection