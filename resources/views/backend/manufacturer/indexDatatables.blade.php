@extends('layouts.backend')

@section('content')

    <h2>Hersteller</h2> <a href="{{ route('frontend.manufacturer.index') }}" target="_blank" class="btn btn-dark mb-2">Frontend</a>

    <p><a href="{{ route('manufacturer.create') }}" class="btn btn-primary">Create</a></p>

    <table class="table table-bordered" id="manufacturer-table">
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
           $('#manufacturer-table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{{ route('manufacturer.data') }}',
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
