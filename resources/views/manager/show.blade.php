@php $title = 'Create Admin'; @endphp

@extends('layout.master')
@section('content')
    <div class="col-md-6" style="margin: 20px auto; height: -webkit-fill-available">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">About {{ $user->name }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fa fa-book mr-1"></i> Name</strong>

                <p class="text-muted">
                    {{ $user->name }}
                </p>

                <hr>
                <strong><i class="fa fa-book mr-1"></i> Email</strong>

                <p class="text-muted">
                    {{ $user->email }}
                </p>

                <hr>
                <strong><i class="fa fa-book mr-1"></i> Inventories</strong>

                <p class="text-muted">
                    @if(count($user->inventories)!=0)
                    <select class="form-control">
                        @php $inventories = $user->inventories; @endphp
                        @foreach( $inventories as $inventory)
                            <option>
                                {{ $inventory->name }}
                            </option>
                        @endforeach
                    </select>
                    @else
                        No Inventories
                    @endif
                </p>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection