@extends('layouts.app')

@section('content')

    <h2>Kategorie</h2>

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Tags</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $categorie)
            <tr>
                <td>{{ $categorie->id }}</td>
                <td><a href="{{ action('Frontend\CategorieController@show', $categorie->id) }}">{{ $categorie->name }}</a></td>
                <td>
                    @foreach($categorie->tags as $tag)
                        {!! $tag->tagBadge !!}
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}

@endsection
