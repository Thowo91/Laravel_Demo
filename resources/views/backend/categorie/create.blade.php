@extends('layouts.backend')

@section('content')
    <div class="row">
        <h2>Neue Kategorie anlegen</h2>
    </div>

    <div class="row">
        <div class="col-12">
            {{ Form::open(['route' => 'categorie.store']) }}
            @include('backend.categorie.form')
            {{ Form::close() }}
        </div>
    </div>
@endsection
