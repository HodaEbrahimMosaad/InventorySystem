@php $title = 'Create Item'; @endphp

@extends('layout.master')
@section('content')
    <div class="col-md-6" style="margin: 20px auto; height: -webkit-fill-available">
    @include('layout.message')
    {!! get_session('suc') !!}
    <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Create Item</h3>
            </div>
            <form action="{{ iurl() }}" method="post" class="form-horizontal">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" required class="form-control" id="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Unit</label>
                        <div class="col-sm-10">
                           <select name="type" class="form-control">
                               <option value="KG">
                                   KG
                               </option>
                               <option value="Liter">
                                   Liter
                               </option>
                               <option value="Quantity">
                                   Quantity
                               </option>
                           </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Supplier</label>
                        <div class="col-sm-10">
                            <select name="supplier_id" class="form-control">

                                @foreach( $suppliers as $supplier)
                                    <option value="{{ $supplier->id }}"> {{ $supplier->name }}</option>
                                @endforeach
                            </select>
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