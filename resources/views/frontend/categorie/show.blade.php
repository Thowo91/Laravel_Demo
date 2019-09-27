@extends('layouts.app')

@section('content')

    <h2>Kategorie {{ $categorie->name }}</h2>

    <p>Id: {{ $categorie->id }}</p>
    <p>Name: {{ $categorie->name }}</p>
    <p>Tags:
        @foreach($categorie->tags as $tag)
            {!! $tag->tagBadge !!}
        @endforeach
    </p>

@endsection
