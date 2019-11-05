@extends('layouts.app')

@section('content')
    <h1>Startpage</h1>
    <div>
        <strong>@lang('test.greeting')</strong>
        {{ Form::open(['action' => 'Frontend\\LanguageController@changeLanguage']) }}
        {{ Form::select('lang',['lang','fr'=>'fr','de'=>'de','en'=>'en'],'lang',['onchange'=>'submit()'])}}
        {{ Form::close()}}

    </div>
@endsection
