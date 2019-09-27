@extends('layouts.backend')

@section('content')
    <div class="row">
        <h2>Neuen Tag anlegen</h2>
    </div>

    <div class="row">
        <div class="col-12">
            {{ Form::open(['route' => 'tag.store']) }}
            @include('backend.tag.form')
            {{ Form::close() }}
        </div>
    </div>
@endsection
