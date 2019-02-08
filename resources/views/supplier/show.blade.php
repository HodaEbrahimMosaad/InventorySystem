@php $title = 'Create Admin'; @endphp

@extends('layout.master')
@section('content')
    <div class="col-md-6" style="margin: 20px auto; height: -webkit-fill-available">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">About {{ $supplier->name }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fa fa-book mr-1"></i> Name</strong>

                <p class="text-muted">
                    {{ $supplier->name }}
                </p>

                <hr>
                <strong><i class="fa fa-book mr-1"></i> Email</strong>

                <p class="text-muted">
                    {{ $supplier->email }}
                </p>

                <hr>
                <strong><i class="fa fa-book mr-1"></i> Phone Number</strong>

                <p class="text-muted">
                    {{ $supplier->phone }}
                </p>

                <hr>
                <strong><i class="fa fa-book mr-1"></i> Additional Information</strong>

                <p class="text-muted">
                    @if($supplier->additional_information)
                        {{ $supplier->additional_information }}
                    @else
                        No Additional Info
                    @endif
                </p>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection