<div id="field_{{ $id }}"{!! Html::classes(['form-group label-floating', 'is-empty has-error' => $hasErrors]) !!}>
    <div class="input-icon">
        {!! $input !!}
        {{ Form::label($id, $label, ['class' => 'control-label']) }}
        @if (!empty($errors))
            @foreach ($errors as $error)
                <span id="{{ $id }}-error" class="help-block text-danger">{{ $error }}</span>
            @endforeach
        @endif
    </div>
</div>