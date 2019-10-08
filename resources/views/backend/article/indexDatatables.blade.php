@extends('layouts.backend')

@section('content')

    <h2>Artikelverwaltung</h2> <a href="{{ route('frontend.article.index') }}" target="_blank" class="btn btn-dark mb-2">Frontend</a>
    <a href="{{ route('article.export') }}" class="btn btn-success mb-2">Export</a>

    <p><a href="{{ route('article.create') }}" class="btn btn-primary">Create</a></p>

    <table class="table table-bordered" id="article-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Kategorie</th>
                <th>Hersteller</th>
                <th>Tags</th>
                <th>Preis</th>
                <th>Beschreibung</th>
                <th>Status</th>
                <th>Aktive Tarife</th>
                <th>Actions</th>
            </tr>
        </thead>
    </table>

    <script>
        $(document).ready(function() {
           $('#article-table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{{ route('article.data') }}',
               columns: [
                   { data: 'id', name: 'articles.id'},
                   { data: 'name', name: 'name'},
                   { data: 'categorie.name', name: 'categorie.name'},
                   { data: 'manufacturer.name', name: 'manufacturer.name'},
                   { data: 'tags', name: 'tags' },
                   { data: 'price', name: 'price'},
                   { data: 'description', name: 'description'},
                   { data: 'status', name: 'status'},
                   { data: 'activeTarif', name: 'activeTarif'},
                   { data: 'actions', name: 'actions'},
               ]
           }) ;

           $(document).on("change", 'input[type=checkbox]', function() {
              var $this = $(this);

              $.ajax({
                  data: {
                      id: $this.attr('data-id'),
                      status: $this.is(':checked'),
                      _token: '{!! csrf_token() !!}'
                  },
                  url: '{!! route('article.changeStatus') !!}',
                  type: 'POST',
                  dataType: 'json',
                  success: function() {
                      toastr.success('Set ' + ($this.is(':checked') ? 'active' : 'inactive') , 'Article ' + $this.attr('data-id'))
                  }
              });

           });

        });
    </script>

@endsection
