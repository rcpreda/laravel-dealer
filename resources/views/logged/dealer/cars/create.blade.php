@extends('layout')

<style>

    .bs-example-tabs .nav-tabs {
        margin-bottom: 20px;
    }

    .tab-pane {
        margin-top: 20px;
    }

    .custom-combobox a.ui-button {
        position: absolute;
    }

    .custom-combobox .ui-state-default {
        background-image: none;
        background-color: white;
    }

</style>

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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        (function( $ ) {
            $.widget( "custom.combobox", {
                _create: function() {
                    this.wrapper = $( "<span>" )
                            .addClass( "custom-combobox" )
                            .insertAfter( this.element );

                    this.element.hide();
                    this._createAutocomplete();
                    this._createShowAllButton();
                },

                _createAutocomplete: function() {
                    var selected = this.element.children( ":selected" ),
                            value = selected.val() ? selected.text() : "";

                    this.input = $( "<input>" )
                            .appendTo( this.wrapper )
                            .val( value )
                            .attr( "title", "" )
                            .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
                            .autocomplete({
                                delay: 0,
                                minLength: 0,
                                source: $.proxy( this, "_source" )
                            })
                            .tooltip({
                                tooltipClass: "ui-state-highlight"
                            });

                    this._on( this.input, {
                        autocompleteselect: function( event, ui ) {
                            ui.item.option.selected = true;
                            this._trigger( "select", event, {
                                item: ui.item.option
                            });
                        },

                        autocompletechange: function(event, ui) {
                            this._removeIfInvalid(event, ui);


                        }
                    });
                },

                _createShowAllButton: function() {
                    var input = this.input,
                            wasOpen = false;

                    $( "<a>" )
                            .attr( "tabIndex", -1 )
                            .attr( "title", "Show All Items" )
                            .tooltip()
                            .appendTo( this.wrapper )
                            .button({
                                icons: {
                                    primary: "ui-icon-triangle-1-s"
                                },
                                text: false
                            })
                            .removeClass( "ui-corner-all" )
                            .addClass( "custom-combobox-toggle ui-corner-right" )
                            .mousedown(function() {
                                wasOpen = input.autocomplete( "widget" ).is( ":visible" );
                            })
                            .click(function() {
                                input.focus();

                                // Close if already visible
                                if ( wasOpen ) {
                                    return;
                                }

                                // Pass empty string as value to search for, displaying all results
                                input.autocomplete( "search", "" );
                            });
                },

                _source: function( request, response ) {
                    var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
                    response( this.element.children( "option" ).map(function() {
                        var text = $( this ).text();
                        if ( this.value && ( !request.term || matcher.test(text) ) )
                            return {
                                label: text,
                                value: text,
                                option: this
                            };
                    }) );
                },

                _removeIfInvalid: function( event, ui ) {

                    // Selected an item, nothing to do
                    if ( ui.item ) {
                        return;
                    }

                    // Search for a match (case-insensitive)
                    var value = this.input.val(),
                            valueLowerCase = value.toLowerCase(),
                            valid = false;
                    this.element.children( "option" ).each(function() {
                        if ( $( this ).text().toLowerCase() === valueLowerCase ) {
                            this.selected = valid = true;
                            return false;
                        }
                    });

                    // Found a match, nothing to do
                    if ( valid ) {
                        return;
                    }

                    // Remove invalid value
                    this.input
                            .val( "" )
                            .attr( "title", value + " didn't match any item" )
                            .tooltip( "open" );
                    this.element.val( "" );
                    this._delay(function() {
                        this.input.tooltip( "close" ).attr( "title", "" );
                    }, 2500 );

                    this._trigger( "onRemoveIfInvalid", event);
                },

                _destroy: function() {
                    this.wrapper.remove();
                    this.element.show();
                }
            });




        })( jQuery );

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