@extends('layouts.backend')

@section('content')

    <h2>Changelog</h2>

    <table class="table table-bordered" id="changelog-table">
        <thead>
        <tr>
            <th>#</th>
            <th>Log</th>
            <th>Action</th>
            <th>Id</th>
            <th>Model</th>
            <th>User</th>
            <th>Old</th>
            <th>New</th>
            <th>Date</th>
        </tr>
        </thead>
    </table>

    <script>
        $(document).ready(function() {
            $('#changelog-table').DataTable({
                processing: true,
                serverSide: true,
                order: [[0, 'desc']],
                ajax: '{{ route('changelog.data') }}',
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'log_name', name: 'log_name'},
                    { data: 'description', name: 'description'},
                    { data: 'subject_id', name: 'subject_id'},
                    { data: 'subject_type', name: 'subject_type' },
                    { data: 'causer_id', name: 'causer_id'},
                    { data: 'old', name: 'old'},
                    { data: 'new', name: 'new'},
                    { data: 'created_at', name: 'created_at'},
                ]
            }) ;
        });
    </script>

@endsection
