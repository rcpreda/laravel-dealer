@extends('layout')

@section('content')


    <div class="row">

        <div class="col-md-6 col-md-offset-3">
            <h3>Permission controller index</h3>
            <a href="">Create</a>
            <a href="{{ route('admin.permissions.edit', 1) }}">Edit</a>
            <a href="{{ route('admin.permissions.destroy', 1) }}">Delete</a>
            <a href="{{ route('admin.permissions.show', 1) }}">Show</a>
        </div>

    </div>
@stop