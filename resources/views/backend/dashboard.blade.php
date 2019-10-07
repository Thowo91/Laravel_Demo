@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-6">
            {!! $articleCreationChart->container() !!}
        </div>
        <div class="col-6">
            {!! $articleCategorieChart->container() !!}
        </div>
        <div class="col-6">
            {!! $tagsPerItemChart->container() !!}
        </div>
        <div class="col-6">
            {!! $testChart->container() !!}
        </div>
    </div>

    {!! $articleCreationChart->script() !!}
    {!! $articleCategorieChart->script() !!}
    {!! $tagsPerItemChart->script() !!}
    {!! $testChart->script() !!}

@endsection
