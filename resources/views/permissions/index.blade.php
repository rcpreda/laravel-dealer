@extends('layout')

@section('content')


    <div class="row">

        <div class="col-md-6 col-md-offset-3">
            <h3>Permission controller index</h3>
            <a href="{{ route('admin.permissions.store') }}">Store</a> <br />
            <a href="{{ route('admin.permissions.create') }}">Create</a> <br />
            <a href="{{ route('admin.permissions.edit', 1) }}">Edit</a> <br />
            <a href="{{ route('admin.permissions.destroy', 1) }}">Delete</a> <br />
            <a href="{{ route('admin.permissions.show', 1) }}">Show</a> <br />

            @can('admin.permissions.destroy')
                <div class="col-md-6 text-right">
                    {!! Form::open([
                        'method' => 'DELETE',
                        'route' => ['admin.permissions.destroy', 1]
                    ]) !!}
                    {!! Form::submit('Delete this task?', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </div>
            @endcan




        </div>

    </div>
@stop