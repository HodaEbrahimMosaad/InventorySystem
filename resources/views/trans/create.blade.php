@php $title = 'Create Item'; @endphp

@extends('layout.master')
@section('content')
    <div class="col-md-6" style="margin: 20px auto; height: -webkit-fill-available">
    @include('layout.message')
    {!! get_session('suc') !!}
    <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Create Transactions</h3>
            </div>
            <form action="{{ turl() }}" method="post" class="form-horizontal">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-10">
                            <select name="type" class="form-control">
                                <option value="add">
                                    add
                                </option>
                                <option value="consume">
                                    consume
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Item</label>
                        <div class="col-sm-10">
                           <select name="item_id" class="form-control">
                               @foreach( $items as $item)
                                   <option value="{{ $item->id }}">
                                       {{ $item->name }} by  {{ $item->type }}
                                   </option>
                               @endforeach
                           </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Amount({{ $item->type }}) </label>
                        <div class="col-sm-10">
                            <input type="text" name="amount" required class="form-control" id="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Notes </label>
                        <div class="col-sm-10">
                            <textarea name="notes" class="form-control"></textarea>
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
        $( "div.col-sm-10:has(textarea), div.col-sm-10:has(select), div.col-sm-10:has(input[type='text'])").css({
            'float':'right',
            'width': '100%'
        })
    </script>
@endsection