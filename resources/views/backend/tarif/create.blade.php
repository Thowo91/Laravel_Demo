@extends('layouts.backend')

@section('content')
    <div class="row">
        <h2>Neuen Tarif anlegen</h2>
    </div>

    <div class="row">
        <div class="col-12">
            {{ Form::open(['route' => 'tarif.store']) }}
            @include('backend.tarif.form')
            {{ Form::close() }}
        </div>
    </div>
@endsection
