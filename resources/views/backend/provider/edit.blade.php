@extends('layouts.backend')

@section('content')
    <div class="row">
        <h2>{{ $provider->name }} bearbeiten</h2>
    </div>

    <div class="row">
        <div class="col-12">
            {{ Form::model($provider,['route' => ['provider.update', $provider->id], 'method' => 'PUT']) }}
            @include('backend.provider.form')
            {{ Form::close() }}
        </div>
        <div class="col-12">
            <a href="{{route('provider.index')}}" class="btn btn-danger mt-2">Zurück</a>
        </div>
    </div>
@endsection
