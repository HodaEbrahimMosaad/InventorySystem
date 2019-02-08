@php $title='Dashboard'; @endphp
@extends('layout.master')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/dataTable.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fix_datatable.css') }}">

@endsection
@section('content')
    <div class="col-md-10 test" style="float: right;margin: 20px auto; height: -webkit-fill-available" id="freshItems">
        {!! get_session('suc') !!}
        @include('layout.message')
    <table id="myTable" class="table table-bordered table-hover">
        <thead class="thead-dark">
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Manager</th>
        <th>Actions</th>
        </thead>
        <tbody>
        @foreach( $inventories as $inventory)
        <tr>
            <td>{{ $inventory->id }}</td>
            <td>{{ $inventory->name }}</td>
            <td>{{ $inventory->description }}</td>
            <td>{{ $inventory->manager->name ?? "not yet"}}</td>

            <td>
                <a class="btn btn-primary edit btn-sm" data-id="{{ $inventory->id }}">
                    <i class="fa fa-edit">
                        edit
                    </i>
                </a>
                <a class="btn btn-danger delete btn-sm" data-id="{{ $inventory->id }}">
                    <i class="fa fa-trash">
                        delete
                    </i>
                </a>
                <a target="_blank" href="{{ aiurl($inventory->id) }}"  class='btn btn-info btn-sm' >
                    <i class="fa fa-search">
                        view
                    </i>
                </a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <br>

                </div>

                <div class="modal-body">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
                    <button type="button" class="btn btn-danger" id="delete" style="display: none;">Delete</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="addBtn" style="display: none;">Add</button>
                </div>
            </div>
        </div>
    </div>

    @section('js')
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTable.bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/inv_index.js') }}"></script>
        <script>
            $('#myTable').DataTable();
        </script>
    @endsection
@endsection