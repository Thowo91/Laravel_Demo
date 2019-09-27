@extends('layouts.backend')

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card mb-2">
                <h5 class="card-header">Hersteller</h5>
                <div class="card-body">
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="{{ route('manufacturer.index') }}" class="btn btn-primary">Übersicht</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card mb-2">
                <h5 class="card-header">Kategorie</h5>
                <div class="card-body">
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="{{ route('categorie.index') }}" class="btn btn-primary">Übersicht</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card mb-2">
                <h5 class="card-header">Artikel</h5>
                <div class="card-body">
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="{{ route('article.index') }}" class="btn btn-primary">Übersicht</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card mb-2">
                <h5 class="card-header">Tag</h5>
                <div class="card-body">
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="{{ route('tag.index') }}" class="btn btn-primary">Übersicht</a>
                </div>
            </div>
        </div>
    </div>
@endsection
