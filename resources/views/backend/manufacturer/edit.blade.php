@extends('layouts.backend')

@section('content')
    <div class="row">
        <h2>{{ $manufacturer->name }} bearbeiten</h2>
    </div>

    <div class="row">
        <div class="col-12">
            {{ Form::model($manufacturer,['route' => ['manufacturer.update', $manufacturer->id], 'method' => 'PUT']) }}
            @include('backend.manufacturer.form')
            {{ Form::close() }}
        </div>
        <div class="col-12">
            <a href="{{route('manufacturer.index')}}" class="btn btn-danger mt-2">Zurück</a>
        </div>
    </div>
@endsection
