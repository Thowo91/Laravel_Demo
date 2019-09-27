@extends('layouts.backend')

@section('content')
    <div class="row">
        <h2>Neuen Artikel anlegen</h2>
    </div>

    <div class="row">
        <div class="col-12">
            {{ Form::open(['route' => 'article.store', 'files' => 'true']) }}
            @include('backend.article.form', ['action' => 'create'])
            {{ Form::close() }}
        </div>
    </div>
@endsection
