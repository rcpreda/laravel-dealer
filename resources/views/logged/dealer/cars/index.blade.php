@extends('layout')

@section('content')


    <div class="row">

        <div class="col-md-12">

            <h3>Cars</h3>
            @can('admin.car.create')
            <div class="text-right" style="margin-bottom: 5px;"><a href="{{ route('admin.car.create') }}" class="btn btn-sm btn-success">Add New</a></div>
            @endcan
            <table class="table table-bordered">
                <tr>
                    <th>#Id</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th class="col-md-2">Dtc</th>
                    <th class="col-md-2">Dtm</th>
                    <th class="col-md-3 text-center" colspan="2">Actions</th>
                </tr>
                @if(!$cars->isEmpty())
                    @foreach($cars as $car)
                        <tr>
                            <td>{{$car->id}}</td>
                            <td>{{$car->title}}</td>

                            <td>{{$car->manufacturer->name}}</td>
                            <td>{{$car->fuel->name}}</td>
                            <td>{{$car->order}}</td>

                            <td>{{$car->created_at}}</td>
                            <td>{{$car->updated_at}}</td>
                            @can('admin.car.edit')
                            <td style="width: 5%">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.car.edit', $car->id) }}" role="button">Edit</a>
                            </td>
                            @endcan
                            @can('admin.car.destroy')
                            <td style="width: 6%">
                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['admin.car.destroy', $car->id],
                                    'class' => 'col-md-2'
                                ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">No Cars!</td>
                    </tr>
                @endif
            </table>

            {!! $cars->render() !!}
        </div>

    </div>
@stop