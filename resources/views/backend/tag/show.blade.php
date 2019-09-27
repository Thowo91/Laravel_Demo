@extends('layouts.backend')

@section('content')

    <h2>Tag {{ $tag->name }}</h2>

    <p>Id: {{ $tag->id }}</p>
    <p>Name: {{ $tag->name }}</p>

    <div class="d-flex">

        <p><a href="{{ route('tag.edit', $tag->id) }}" class="btn btn-success">Edit</a></p>

        {{ Form::open(['route' => ['tag.destroy', $tag->id], 'method' => 'DELETE']) }}
        {{ Form::submit('Delete', ['class' => 'ml-1 btn btn-danger']) }}
        {{ Form::close() }}
    </div>


@endsection
