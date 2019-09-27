@extends('layouts.backend')

@section('content')
    <div class="row">
        <h2>{{ $tarif->name }} bearbeiten</h2>
    </div>

    <div class="row">
        <div class="col-12">
            {{ Form::model($tarif,['route' => ['tarif.update', $tarif->id], 'method' => 'PUT']) }}
            @include('backend.tarif.form')
            {{ Form::close() }}
        </div>
        <div class="col-12">
            <a href="{{route('tarif.index')}}" class="btn btn-danger mt-2">Zurück</a>
        </div>
    </div>
@endsection
