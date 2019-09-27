@extends('layouts.app')

@section('content')

    <h2>Suche</h2>

    <div class="row">
        @foreach($articles as $item)
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-2 text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->id }} | {{ $item->name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($manufacturers as $item)
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-2 text-white bg-secondary">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->id }} | {{ $item->name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($providers as $item)
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-2 text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->id }} | {{ $item->name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($tarifs as $item)
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-2 text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->id }} | {{ $item->name }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



@endsection
