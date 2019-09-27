@extends('layouts.app')

@section('content')

    <h2>Tags</h2>

    <div class="row">
            @foreach($tags as $tag)
                <div class="col-3 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('frontend.tagable.index', $tag->name) }}">{{ $tag->name }}</a></div>
                        </div>
                    </div>
            @endforeach
    </div>

@endsection
