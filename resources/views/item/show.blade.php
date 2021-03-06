@php $title = 'Show'; @endphp

@extends('layout.master')
@section('content')
    <div class="col-md-6" style="margin: 20px auto; height: -webkit-fill-available">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">About {{ $item->name }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fa fa-book mr-1"></i> Name</strong>

                <p class="text-muted">
                    {{ $item->name }}
                </p>

                <hr>
                <strong><i class="fa fa-map-marker mr-1"></i> Unit</strong>

                <p class="text-muted">
                    {{ $item->type }}
                </p>
                <hr>
                <strong><i class="fa fa-map-marker mr-1"></i> Supplier</strong>

                <p class="text-muted">
                    {{ $item->supplier->name }}
                </p>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection