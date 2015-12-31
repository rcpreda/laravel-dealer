@extends('layout')

@section('content')

    <div class="row create-car">
        <div class="col-md-12">

            @include('partials.forms')

            {!! Form::open([
                    'method' => 'POST',
                    'route' => ['admin.car.store']
                ]) !!}

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="row">

                        <div class="col-md-4 text-left">

                            <div class="form-group">
                                {!! Form::label('manufacturer_id', 'Car Manufacturer:', ['class' => 'control-label']) !!}
                                <div class="ui-widget">
                                {!! Form::select('manufacturer_id', $manufacturers, old('manufacturer_id') ? old('manufacturer_id') : 'select', ['class' => 'form-control', 'id'=>'combobox']) !!}
                                </div>
                            </div>

                            <div class="model-engine-partial">

                            </div>

                            <div class="car-data" style="display: none">
                                <div class="form-group" >

                                    {!! Form::label('type_fuel_id', 'Fuel Type:', ['class' => 'control-label']) !!}
                                    <div class="ui-widget">
                                        {!! Form::select('type_fuel_id', $fuelTypes, old('fuel_type_id') ? old('fuel_type_id') : 'select', ['class' => 'form-control', 'id'=>'fuel-combobox']) !!}
                                    </div>
                                </div>

                                <div class="form-group">

                                    {!! Form::label('year', 'Year:', ['class' => 'control-label']) !!}
                                    <div class="ui-widget">
                                        {!! Form::select('year', $years, old('year') ? old('year') : 'select', ['class' => 'form-control', 'id'=>'year-combobox']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="engines-partial">

                            </div>


                            <!--{!! Form::label('type_fuel_id', 'Fuel Type:', ['class' => 'control-label']) !!}
                            {!! Form::select('type_fuel_id', $fuelTypes, old('type_fuel_id') ? old('type_fuel_id') : 'select', ['class' => 'form-control', 'id' => 'car-type-fuel']) !!}-->

                            <!--<div class="form-group">
                                {!! Form::label('car_engine', 'Engine:', ['class' => 'control-label']) !!}
                                {!! Form::text('engine_id', old('car_model'), ['class' => 'form-control', 'id'=> 'model-autocomplete', 'disabled'=> 'disabled']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('order', 'Car Option Order:', ['class' => 'control-label']) !!}
                                {!! Form::text('order', old('order') , ['class' => 'form-control']) !!}
                            </div>-->

                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">.sdfsdfs</div>
                <div role="tabpanel" class="tab-pane" id="messages">...</div>
                <div role="tabpanel" class="tab-pane" id="settings">...</div>
            </div>

        </div>
        <div class="col-md-12">
            {!! Form::submit('Add Car', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>


    </div>
    <script>

        var getCarModels = function(value) {
            var url = "/admin/ajax/car-models/" + value + "/";
            $.ajax({
                type: 'POST',
                dataType: 'html',
                data: {token: 'test'},
                url: url
            }).done(function(result) {
                $('.model-engine-partial').html(result);
            }).error(function(result) {
                $('.model-engine-partial').html(result);
            });
        }

        var getCarEngines = function(make,model,fuel,year) {
            var url = "/admin/ajax/car-engines/";
            $.ajax({
                type: 'POST',
                dataType: 'html',
                data: {make: make, model: model, fuel: fuel, year: year},
                url: url
            }).done(function(result) {
                $('.engines-partial').html(result);
            }).error(function(result) {
                $('.engines-partial').html(result);
            });
        }


        $(function() {
            $( "#combobox" ).combobox({
                select: function(event, ui){
                    getCarModels(ui.item.value);
                },
                onRemoveIfInvalid: function(event) {
                    $('.model-engine-partial').html('');
                    $('.car-data').hide();
                }

            });

            $('#fuel-combobox').combobox();
            $('#year-combobox').combobox({
                select: function(event, ui) {
                    if ($.isNumeric($('#fuel-combobox').val()) && $.isNumeric(ui.item.value) ) {
                        var make = $( "#combobox").val();
                        var model = $( "#model-combobox" ).val();
                        var fuel = $('#fuel-combobox').val();
                        var year = ui.item.value;
                        getCarEngines(make,model,fuel,year);
                    }
                },
                onRemoveIfInvalid: function(event) {
                    console.log('add error');
                }
            });


        });

        $(document).ready(function(){

        });
    </script>
@stop