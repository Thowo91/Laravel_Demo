<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
    <div>{{ $errors->first('name') }}</div>
</div>
<div class="form-group">
    {{ Form::label('provider_id', 'Provider') }}
    {{ Form::select('provider_id', $provider, null, ['placeholder' => 'Provider', 'class' => 'form-control']) }}
    <div>{{ $errors->first('provider_id') }}</div>
</div>
<div class="form-group">
    {{ Form::label('monthly_price', 'Monatlicher Preis') }}
    {{ Form::number('monthly_price', null, ['class' => 'form-control']) }}
    <div>{{ $errors->first('monthly_price') }}</div>
</div>
<div class="form-group">
    {{ Form::label('connection_price', 'Anschlusspreis') }}
    {{ Form::number('connection_price', null, ['class' => 'form-control']) }}
    <div>{{ $errors->first('connection_price') }}</div>
</div>
<div class="form-group">
    {{ Form::label('status', 'Status') }}
    {{ Form::select('status', $status, null, ['class' => 'form-control']) }}
    <div>{{ $errors->first('status') }}</div>
</div>
{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
