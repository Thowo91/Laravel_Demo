@extends('layouts.backend')

@section('content')

    <h2>Tarif </h2>

    <p><a href="{{ route('tarif.create') }}" class="btn btn-primary">Create</a></p>

    <table class="table table-bordered" id="tarif-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Provider</th>
                <th>Monatlicher Preis</th>
                <th>Anschlusspreis</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>

    <script>
        $(document).ready(function() {
           $('#tarif-table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{{ route('tarif.data') }}',
               columns: [
                   { data: 'id', name: 'id'},
                   { data: 'name', name: 'name'},
                   { data: 'provider.name', name: 'provider.name'},
                   { data: 'monthly_price', name: 'monthly_price'},
                   { data: 'connection_price', name: 'connection_price'},
                   { data: 'status', name: 'status'},
                   { data: 'actions', name: 'actions'},
               ]
           }) ;
        });
    </script>

@endsection
