@extends('layouts.backend')

@section('content')
    <div class="row">
        <h2>{{ $categorie->name }} bearbeiten</h2>
    </div>

    <div class="row">
        <div class="col-12">
            {{ Form::model($categorie,['route' => ['categorie.update', $categorie->id], 'method' => 'PUT']) }}
            @include('backend.categorie.form')
            {{ Form::close() }}
        </div>
        <div class="col-12">
            <a href="{{route('categorie.index')}}" class="btn btn-danger mt-2">Zurück</a>
        </div>
    </div>
@endsection
