@extends('layout')

@section('content')


    <div class="row">

        <div class="col-md-6 col-md-offset-3">
            <h3>Permission controller Store</h3>
            <a href="{{ route('admin.permissions.store') }}">Store</a> <br />
            <a href="{{ route('admin.permissions.create') }}">Create</a> <br />
            <a href="{{ route('admin.permissions.edit', 1) }}">Edit</a> <br />
            <a href="{{ route('admin.permissions.destroy', 1) }}">Delete</a> <br />
            <a href="{{ route('admin.permissions.show', 1) }}">Show</a> <br />
        </div>

    </div>
@stop