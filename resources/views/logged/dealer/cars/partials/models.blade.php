@if($models)

    <div class="form-group">
        {!! Form::label('model_id', 'Car Model:', ['class' => 'control-label']) !!}
        <div class="ui-widget">
            {!! Form::select('model_id', $models, old('model_id') ? old('model_id') : 'select', ['class' => 'form-control', 'id'=>'model-combobox']) !!}
        </div>
    </div>
    <script>
        $(function() {
            $( "#model-combobox" ).combobox({
                select: function(event, ui){
                    $('.car-data').show();
                },
                onRemoveIfInvalid: function(event) {
                    $('.car-data').hide();
                }
            });
        });
    </script>
@else
    <div class="form-group">
        <p>Please contact us at:</p>
    </div>
@endif


