@extends('layouts.app')

@section('content')

    <h1>Tag {{ $tag->name }}</h1>

    <h2>Hersteller</h2>
    <div class="row">
        @foreach($tag->manufacturers as $manufacturer)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <div class="card-body">
                        {{ $manufacturer->name }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <h2>Kategorie</h2>
    <div class="row">
        @foreach($tag->categories as $categorie)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <div class="card-body">
                        {{ $categorie->name }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <h2>Artikle</h2>
    <div class="row">
        @foreach($tag->articles as $article)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
                <div class="card mb-2">
                    <h5 class="card-header"><a href="{{ route('frontend.article.show', $article->id) }}">{{ $article->id }} | {{ $article->name }}</a></h5>
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->name }}</h5>
                        <div class="card-text">
                            <p>Kategorie: {{ $article->categorie->name }}</p>
                            <p>Hersteller: {{ $article->manufacturer->name }}</p>
                            @foreach($article->tags as $tag)
                                {!! $tag->tagBadge !!}
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
