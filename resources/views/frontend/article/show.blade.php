@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-6">
            <h2>Artikel {{ $article->name }}</h2>

            <p>Id: {{ $article->id }}</p>
            <p>Name: {{ $article->name }}</p>
            <p>Kategorie: {{ $article->categorie->name }}</p>
            <p>Hersteller: {{ $article->manufacturer->name }}</p>
            <p>Tags:
                @foreach($article->tags as $tag)
                    {!! $tag->tagBadge !!}
                @endforeach
            </p>
            <p>Preis: {{ $article->price }}</p>
            <p>Beschreibung: {{ $article->description }}</p>
            <p>Status: {!! $article->statusBadge !!}</p>
        </div>
        <div class="col-6">
            <img src="{{ Storage::disk('articleImages')->url($article->articleImage) }}?{{ time() }}" style="height: 350px;">
        </div>
    </div>


    <h2>Mögliche Tarife</h2>
    <div class="row">

        @foreach($tarifs as $tarif)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="card mb-2">
                    <h5 class="card-header">{{ $tarif->provider->name }} | {{ $tarif->name }}</h5>
                    <div class="card-body">
                        <div class="card-text">
                            <p>Packetpreis: {{ $tarif->pivot->price }}</p>
                            <p>Anschlusspreis: {{ $tarif->connection_price }}</p>
                            <p>Monatliche Kosten: {{ $tarif->monthly_price }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection
