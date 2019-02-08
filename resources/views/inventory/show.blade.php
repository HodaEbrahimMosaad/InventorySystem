@php $title = 'Create Admin'; @endphp

@extends('layout.master')
@section('content')
    <div class="col-md-6" style="margin: 20px auto; height: -webkit-fill-available">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">About {{ $inventory->name }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <strong><i class="fa fa-book mr-1"></i> Name</strong>

            <p class="text-muted">
                {{ $inventory->name }}
            </p>

            <hr>
            <strong><i class="fa fa-map-marker mr-1"></i> Description</strong>

            <p class="text-muted">
                {{ $inventory->description }}
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    </div>
@endsection