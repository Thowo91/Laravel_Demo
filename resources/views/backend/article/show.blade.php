@extends('layouts.backend')

@section('content')

    <h2>Artikel {{ $article->name }}</h2>

    <p>Id: {{ $article->id }}</p>
    <p>Name: {{ $article->name }}</p>
    <p>Kategorie: {{ $article->categorie->name }}</p>
    <p>Hersteller: {{ $article->manufacturer->name }}</p>
    <p>Preis: {{ $article->price }}</p>
    <p>Beschreibung: {{ $article->description }}</p>
    <p>Status: {!! $article->statusBadge !!}</p>

    <div class="d-flex">

        <p><a href="{{ route('article.edit', $article->id) }}" class="btn btn-success">Edit</a></p>

        {{ Form::open(['route' => ['article.destroy', $article->id], 'method' => 'DELETE']) }}
        {{ Form::submit('Delete', ['class' => 'ml-1 btn btn-danger']) }}
        {{ Form::close() }}
    </div>


@endsection
