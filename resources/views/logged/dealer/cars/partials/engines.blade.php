@if($engines)

    <div class="form-group">
        {!! Form::label('engine_id', 'Engine:', ['class' => 'control-label']) !!}
        <div class="ui-widget">
            {!! Form::select('engine_id', $engines, old('engine_id') ? old('engine_id') : 'select', ['class' => 'form-control', 'id'=>'engine-combobox']) !!}
        </div>
    </div>

    <script>
        $(function() {
            $( "#engine-combobox" ).combobox({
                select: function(event, ui){
                    //show(or load) image container
                },
                onRemoveIfInvalid: function(event) {
                    //hide(or unload) image container
                }
            });
        });
    </script>

@else
    <div class="form-group">
        <p>Engine not found!</p>
        <p>Please contact us at: </p>
    </div>
@endif