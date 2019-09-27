@extends('layouts.backend')

@section('content')
    <div class="row">
        <h2>{{ $tag->name }} bearbeiten</h2>
    </div>

    <div class="row">
        <div class="col-12">
            {{ Form::model($tag,['route' => ['tag.update', $tag->id], 'method' => 'PUT']) }}
            @include('backend.tag.form')
            {{ Form::close() }}
        </div>
        <div class="col-12">
            <a href="{{route('tag.index')}}" class="btn btn-danger mt-2">Zurück</a>
        </div>
    </div>
@endsection
