@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-6 mb-3">
            <example-input-list/>
        </div>
        <div class="col-6 mb-3">
            <example-computed-properties/>
        </div>
        <div class="col-6 mb-3">
            <example-styling/>
        </div>
        <div class="col-12 mb-3">
            <example-event/>
        </div>
        <div class="col-12 mb-3">
            <example-listener/>
        </div>
    </div>

@endsection
