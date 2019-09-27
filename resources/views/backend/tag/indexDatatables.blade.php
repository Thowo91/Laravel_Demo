@extends('layouts.backend')

@section('content')

    <h2>Hersteller</h2>

    <p><a href="{{ route('tag.create') }}" class="btn btn-primary">Create</a></p>

    <table class="table table-bordered" id="tag-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>

    <script>
        $(document).ready(function() {
           $('#tag-table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{{ route('tag.data') }}',
               columns: [
                   { data: 'id', name: 'id'},
                   { data: 'name', name: 'name'},
                   { data: 'actions', name: 'actions'},
               ]
           }) ;
        });
    </script>

@endsection
