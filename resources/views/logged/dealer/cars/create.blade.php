@extends('layout')

@section('content')

    <div class="row create-car">
        <div class="col-md-12">

            @include('partials.forms')

            {!! Form::open([
                    'method' => 'POST',
                    'route' => ['admin.car.store'],
                ]) !!}

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#create-car" aria-controls="create-car" role="tab" data-toggle="tab">Create Car</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="create-car">
                    <div class="row">

                        <div class="col-sm-6">

                            <div class="row">
                                <div class="col-xs-8 col-sm-6 text-left">

                                    <div class="form-group">
                                        {!! Form::label('type_condition_id', 'Condition:', ['class' => 'control-label']) !!}
                                        {!! Form::select('type_condition_id', $conditions, old('type_condition_id') ? old('type_condition_id') : 'select', ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('manufacturer_id', 'Car Manufacturer:', ['class' => 'control-label']) !!}
                                        <div class="ui-widget">
                                            {!! Form::select('manufacturer_id', $manufacturers, old('manufacturer_id') ? old('manufacturer_id') : 'select', ['class' => 'form-control', 'id'=>'combobox']) !!}
                                        </div>
                                    </div>
                                        {!! Form::hidden('old_model_id', old('old_model_id'), ['id' => 'old-model-id']) !!}
                                        {!! Form::hidden('status', 0) !!}
                                        {!! Form::hidden('action', 0) !!}
                                        {!! Form::hidden('type_approval_id', 0) !!}
                                        {!! Form::hidden('is_featured', 0) !!}
                                        {!! Form::hidden('dealer_site_id', 0) !!}
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

                               </div>

                                <div class="col-xs-8 col-sm-6 text-left">

                                    <div class="form-group">
                                        {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                                        {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                                        {!! Form::textarea('description', old('description'), ['size' => '35x5', 'class' => 'control-label']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('miles', 'Miles:', ['class' => 'control-label']) !!}
                                        {!! Form::text('miles', old('miles'), ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('type_color_id', 'Color:', ['class' => 'control-label']) !!}
                                        {!! Form::select('type_color_id', $colors, old('type_fuel_id') ? old('type_fuel_id') : 'select', ['class' => 'form-control']) !!}
                                    </div>

                                    <div class="form-group">
                                        {!! Form::label('is_featured', 'Featured: ', ['class' => 'control-label']) !!}
                                        {!!  Form::checkbox('is_featured', '1', old('is_featured')) !!}
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-6">
                                {!! Form::submit('Add Car', ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>

                        </div>

                        <!--<div class="col-md-6 text-left">
                            <form id="dpzz" class="dropzone">
                                <div class="dropzone-previews"></div>
                                <input type="email" name="username" />
                                <input type="password" name="password" />

                                <button type="submit">Submit data and files!</button>
                            </form>
                        </div> -->



                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">.sdfsdfs</div>
            </div>

        </div>





    </div>
    <script>

        //var myDropzone = new Dropzone("div#myDrop", { url: "/file/post"});

        // If you use jQuery, you can use the jQuery plugin Dropzone ships with:
        //$("div#myDrop").dropzone({ url: "/file/post" });


        Dropzone.options.dpzz = {
            url: "/file/post",
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 100,
            maxFiles: 100,
            addRemoveLinks: true,

            init: function() {

                var myDropzone = this;

                // First change the button to actually tell Dropzone to process the queue.
                this.element.querySelector("button[type=submit]").addEventListener("click", function(e) {
                    // Make sure that the form isn't actually being sent.
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });

                // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
                // of the sending event because uploadMultiple is set to true.
                this.on("sendingmultiple", function() {
                    // Gets triggered when the form is actually being sent.
                    // Hide the success button or the complete form.
                });
                this.on("successmultiple", function(files, response) {
                    // Gets triggered when the files have successfully been sent.
                    // Redirect user or notify of success.
                });
                this.on("errormultiple", function(files, response) {
                    // Gets triggered when there was an error sending the files.
                    // Maybe show form again, and notify user of error
                });

            }
        }


        var getCarModels = function(value) {
            var url = "/admin/ajax/car-models/" + value + "/";
            $.ajax({
                type: 'POST',
                dataType: 'html',
                data: {model: $('#old-model-id').val()},
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
                    $('#old-model-id').val('');
                },
                create: function( event, ui ) {
                    if ($.isNumeric($( "#combobox").val())){
                        getCarModels($( "#combobox").val());
                    }
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