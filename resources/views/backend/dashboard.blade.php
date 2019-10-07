@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-6">
            {!! $testChart->container() !!}
        </div>
    </div>

    {!! $testChart->script() !!}

@endsection
