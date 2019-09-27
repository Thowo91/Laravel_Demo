@extends('layouts.backend')

@section('content')
    <div class="row">
        <h2>{{ $article->name }} bearbeiten</h2>
    </div>

    <div class="row">
        <div class="col-12">
            {{ Form::model($article,['route' => ['article.update', $article->id], 'method' => 'PUT']) }}
            @include('backend.article.form')
            {{ Form::close() }}
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            @include('backend.article.tarif_form')
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{route('article.index')}}" class="btn btn-danger mt-2">Zurück</a>
        </div>
    </div>
@endsection
