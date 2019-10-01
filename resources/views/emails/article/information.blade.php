@component('mail::message')
# Article Information
## {{ $article->name }}

Danke das Sie sich für diesen Artikel interessieren

<img src="{{ Storage::disk('articleImages')->url($article->imageCountDimension(1, 'medium')) }}?{{ time() }}">

@component('mail::table')
    |             |                                     |
     ------------ |-------------
     Kategorie    | {{ $article->categorie->name }}
     Hersteller   | {{ $article->manufacturer->name }}
     Preis        | {{ $article->price }}
     Beschreibung | {{ $article->description }}
@endcomponent

@component('mail::button', ['url' => url('/article/' . $article->id)])
    Detail Page
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
