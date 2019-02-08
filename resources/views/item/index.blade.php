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
            <th>Unit</th>
            <th>Supplier</th>
            <th>Actions</th>
            </thead>
            <tbody>
            @foreach( $items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->supplier->name }}</td>
                    <td>
                        <a target="_blank" class="btn btn-primary edit btn-sm" href="{{ iurl($item->id.'/edit') }}">
                            <i class="fa fa-edit">
                                edit
                            </i>
                        </a>
                        <a data-toggle="modal" data-target="#exampleModal" class="btn btn-danger delete btn-sm" data-id="{{ $item->id }}">
                            <i class="fa fa-trash">
                                delete
                            </i>
                        </a>
                        <a target="_blank" href="{{ url($item->id) }}"  class='btn btn-info btn-sm' >
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
                    <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <br>

                </div>

                <div class="modal-body">
                    Delete Manager ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="delete">Delete</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="addBtn" style="display: none;">Add</button>
                </div>
            </div>
        </div>
    </div>

@section('js')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTable.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/itm_index.js') }}"></script>
    <script>
        $('#myTable').DataTable();
    </script>
@endsection
@endsection