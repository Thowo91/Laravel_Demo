@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-6">
            <canvas id="myChart" width="200" height="100">
                <p>Fallback</p>
            </canvas>
        </div>
    </div>

    <script src="{{ asset('js/all.js') }}"></script>


@endsection
