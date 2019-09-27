@extends('layouts.backend')

@section('content')

    <h2>Provider </h2>

    <p><a href="{{ route('provider.create') }}" class="btn btn-primary">Create</a></p>

    <table class="table table-bordered" id="provider-table">
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
           $('#provider-table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{{ route('provider.data') }}',
               columns: [
                   { data: 'id', name: 'id'},
                   { data: 'name', name: 'name'},
                   { data: 'actions', name: 'actions'},
               ]
           }) ;
        });
    </script>

@endsection
