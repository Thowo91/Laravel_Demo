<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    <div>{{ $errors->first('name') }}</div>
</div>
<div class="form-group">
    {{ Form::label('tags_id', 'Tags') }}
    {{ Form::select('tags_id[]', $tags, $selected, ['multiple'=>'multiple', 'class' => 'form-control']) }}
</div>
{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
