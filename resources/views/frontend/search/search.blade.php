@extends('layouts.app')

@section('content')

    <h2>Suche</h2>

    <div class="row">
        @foreach($articles as $item)
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-2 text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->id }} | {{ $item->name }}</h5>
                        <div class="card-text">
                            <p>Kategorie: {{ $item->categorie->name }}</p>
                            <p>Hersteller: {{ $item->manufacturer->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($tarifs as $item)
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-2 text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->id }} | {{ $item->name }}</h5>
                        <div class="card-text">
                            <p>Provider: {{ $item->provider->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



@endsection
