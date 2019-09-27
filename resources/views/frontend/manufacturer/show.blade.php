@extends('layouts.app')

@section('content')

    <h2>Hersteller {{ $manufacturer->name }}</h2>

    <p>Id: {{ $manufacturer->id }}</p>
    <p>Name: {{ $manufacturer->name }}</p>
    <p>Tags:
        @foreach($manufacturer->tags as $tag)
            {!! $tag->tagBadge !!}
        @endforeach
    </p>


@endsection
