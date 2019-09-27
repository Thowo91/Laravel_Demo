@extends('layouts.backend')

@section('content')

    <h2>Tarif {{ $tarif->name }}</h2>

    <p>Id: {{ $tarif->id }}</p>
    <p>Name: {{ $tarif->name }}</p>
    <p>Provider: {{ $tarif->provider->name }}</p>

    <div class="d-flex">

        <p><a href="{{ route('tarif.edit', $tarif->id) }}" class="btn btn-success">Edit</a></p>

        {{ Form::open(['route' => ['tarif.destroy', $tarif->id], 'method' => 'DELETE']) }}
        {{ Form::submit('Delete', ['class' => 'ml-1 btn btn-danger']) }}
        {{ Form::close() }}
    </div>


@endsection
