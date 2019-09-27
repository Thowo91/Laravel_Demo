@extends('layouts.backend')

@section('content')

    <h2>Kategorie {{ $categorie->name }}</h2>

    <p>Id: {{ $categorie->id }}</p>
    <p>Name: {{ $categorie->name }}</p>

    <p><a href="{{ route('categorie.edit', $categorie->id) }}" class="btn btn-success">Edit</a></p>
    {{ Form::open(['route' => ['categorie.destroy', $categorie->id], 'method' => 'DELETE']) }}
    {{ Form::submit('Delete', ['class' => 'ml-1 btn btn-danger']) }}
    {{ Form::close() }}


@endsection
