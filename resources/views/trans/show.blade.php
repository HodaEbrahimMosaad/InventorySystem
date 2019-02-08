@php $title = 'Show'; @endphp

@extends('layout.master')
@section('content')
    <div class="col-md-6" style="margin: 20px auto; height: -webkit-fill-available">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">About Transaction</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fa fa-book mr-1"></i> Type</strong>

                <p class="text-muted">
                    {{ $transaction->type }}
                </p>

                <hr>
                <strong><i class="fa fa-map-marker mr-1"></i>Item</strong>

                <p class="text-muted">
                    {{ $transaction->item->name }}
                </p>
                <hr>
                <strong><i class="fa fa-map-marker mr-1"></i>Amount</strong>

                <p class="text-muted">
                    {{ $transaction->amount }}
                </p>
                <hr>
                <strong><i class="fa fa-map-marker mr-1"></i> Notes</strong>

                <p class="text-muted">
                    {{ $transaction->notes }}
                </p>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection