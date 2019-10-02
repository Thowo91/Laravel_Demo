@extends('layouts.backend')

@section('content')
    <div class="row">
        <h2>{{ $article->name }} bearbeiten</h2>
    </div>

    <div class="row">
        <div class="col-12">
            {{ Form::model($article,['route' => ['article.update', $article->id], 'method' => 'PUT', 'files' => 'true']) }}
            @include('backend.article.form', ['action' => 'edit'])
            {{ Form::close() }}
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            @include('backend.article.tarif_form')
        </div>
    </div>
    <div class="row mt-3">
        <h2>Changelog</h2>
        <table class="table table-bordered">
            <tr>
                <th>Action</th>
                <th>User</th>
                <th>Old</th>
                <th>New</th>
                <th>Date</th>
            </tr>
            @foreach($activity as $entry)
                <tr>
                    <td>{{ $entry->description }}</td>
                    <td>{{ $entry->causer->name }}</td>
                    @foreach($entry->changes as $item)
                        <td>
                            @foreach($item as $key => $value)
                                <p>{{ $key }}: {{ $value }}</p>
                            @endforeach
                        </td>
                    @endforeach
                    <td>{{ $entry->created_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="row">
        <div class="col-12">
            <a href="{{route('article.index')}}" class="btn btn-danger mt-2">Zurück</a>
        </div>
    </div>
@endsection
