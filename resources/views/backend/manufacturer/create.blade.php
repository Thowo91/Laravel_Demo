@extends('layouts.backend')

@section('content')
    <div class="row">
        <h2>Neuen Hersteller anlegen</h2>
    </div>

    <div class="row">
        <div class="col-12">
            {{ Form::open(['route' => 'manufacturer.store']) }}
            @include('backend.manufacturer.form')
            {{ Form::close() }}
        </div>
    </div>
@endsection
