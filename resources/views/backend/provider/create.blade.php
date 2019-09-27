@extends('layouts.backend')

@section('content')
    <div class="row">
        <h2>Neuen Provider anlegen</h2>
    </div>

    <div class="row">
        <div class="col-12">
            {{ Form::open(['route' => 'provider.store']) }}
            @include('backend.provider.form')
            {{ Form::close() }}
        </div>
    </div>
@endsection
