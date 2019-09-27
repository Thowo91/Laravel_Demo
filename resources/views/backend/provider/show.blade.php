@extends('layouts.backend')

@section('content')

    <h2>Provider {{ $manufacturer->name }}</h2>

    <p>Id: {{ $manufacturer->id }}</p>
    <p>Name: {{ $manufacturer->name }}</p>

    <div class="d-flex">

        <p><a href="{{ route('provider.edit', $manufacturer->id) }}" class="btn btn-success">Edit</a></p>

        {{ Form::open(['route' => ['provider.destroy', $manufacturer->id], 'method' => 'DELETE']) }}
        {{ Form::submit('Delete', ['class' => 'ml-1 btn btn-danger']) }}
        {{ Form::close() }}
    </div>


@endsection
