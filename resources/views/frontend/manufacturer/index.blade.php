@extends('layouts.app')

@section('content')

    <h2>Hersteller</h2>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Tags</th>
            </tr>
        </thead>
        <tbody>
        @foreach($manufacturers as $manufacturer)
            <tr>
                <td>{{ $manufacturer->id }}</td>
                <td><a href="{{ action('Frontend\ManufacturerController@show', $manufacturer->id) }}">{{ $manufacturer->name }}</a></td>
                <td>
                    @foreach($manufacturer->tags as $tag)
                        {!! $tag->tagBadge !!}
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $manufacturers->links() }}

@endsection
