@extends('layouts.backend')

@section('content')

    <h2>Kategorie</h2> <a href="{{ route('frontend.categorie.index') }}" target="_blank" class="btn btn-dark mb-2">Frontend</a>

    <p><a href="{{ route('categorie.create') }}" class="btn btn-primary">Create</a></p>

    <table class="table table-bordered" id="categorie-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Tags</th>
            <th>Actions</th>
        </tr>
        </thead>
    </table>

    <script>
        $(document).ready(function() {
            $('#categorie-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('categorie.data') }}',
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'name', name: 'name'},
                    { data: 'tags', name: 'tags' },
                    { data: 'actions', name: 'actions'},
                ]
            }) ;
        });
    </script>

@endsection
