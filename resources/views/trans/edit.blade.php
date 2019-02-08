@php $title = 'Edit'; @endphp

@extends('layout.master')
@section('content')
    <div class="col-md-6" style="margin: 20px auto; height: -webkit-fill-available">
    @include('layout.message')
    {!! get_session('suc') !!}
    <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Edit Transactions</h3>
            </div>
            <form action="{{ turl($transaction->id) }}" method="post" class="form-horizontal">
                @csrf
                @method('patch')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-10">
                            <select name="type" class="form-control">
                                <option value="add" @if( $transaction->type == "add") selected @endif>
                                    add
                                </option>
                                <option value="consume" @if( $transaction->type == "consume") selected @endif>
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
                                    <option @if($transaction->item_id == $item->id ) selected @endif value="{{ $item->id }}">
                                        {{ $item->name }} by  {{ $item->type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Amount({{ $item->type }}) </label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ $transaction->amount  }}" name="amount" required class="form-control" id="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Notes </label>
                        <div class="col-sm-10">
                            <textarea name="notes"  class="form-control">{{ $transaction->notes }}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">Save changs</button>
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