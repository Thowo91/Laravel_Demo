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
            Status: {!! $article->statusBadge !!}
        </div>
        <div class="col-6">
            <table>
                <tr>
                    <th>Artikelbild 1</th>
                    <th>Artikelbild 2</th>
                    <th>Artikelbild 3</th>
                </tr>
                <tr>
                    <td><img src="{{ Storage::disk('articleImages')->url($article->imageCountDimension(1, 'medium')) }}?{{ time() }}"></td>
                    <td><img src="{{ Storage::disk('articleImages')->url($article->imageCountDimension(2, 'medium')) }}?{{ time() }}"></td>
                    <td><img src="{{ Storage::disk('articleImages')->url($article->imageCountDimension(3, 'medium')) }}?{{ time() }}"></td>
                </tr>
            </table>
        </div>
    </div>

    <h3 class="mt-3">Arikelinformationen per Mail</h3>

    {{ Form::open(['route' => ['frontend.article.informationMail', $article->id]]) }}
    <div class="form-group">
        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email']) }}
        <div>{{ $errors->first('email') }}</div>
    </div>
    {{ Form::submit('Absenden', ['class' => 'btn btn-sm btn-primary mb-3']) }}
    {{ Form::close() }}

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

    @if(!empty($lastSeenArticle))
        <h2>Last Seen</h2>
        <div class="row">
            @foreach($lastSeenArticle as $item)
                <div class="col-2">
                    <div class="card">
                        <h5 class="card-header">{{ $item->id }} | {{ $item->name }}</h5>
                        <div class="card-body">
                            <div class="card-text">
                                <p>Kategorie: {{ $item->categorie->name }}</p>
                                <p>Hersteller: {{ $item->manufacturer->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

@endsection
