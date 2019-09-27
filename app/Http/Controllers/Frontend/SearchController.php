<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use App\Tarif;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {

        $search = explode(' ', $request->get('Search'));

        $queryArticle = new Article;

        foreach($search as $item) {
            $queryArticle = $queryArticle->where(function (Builder $query) use ($item) {
               $query->where('name', 'LIKE', '%' . $item . '%');
                $query->orWhereHas('manufacturer', function (Builder $query) use ($item) {
                    $query->where('name', 'LIKE', '%' . $item . '%');
                });
            });
        }
        $articles = $queryArticle->with('manufacturer', 'categorie')->get();

        $queryTarif = new Tarif;

        foreach($search as $item) {
            $queryTarif = $queryTarif->where(function (Builder $query) use ($item) {
                $query->where('name', 'LIKE', '%' . $item . '%');
                $query->orWhereHas('provider', function (Builder $query) use ($item) {
                    $query->where('name', 'LIKE', '%' . $item . '%');
                });
            });
        }
        $tarifs = $queryTarif->with('provider')->get();

        return view('frontend.search.search', compact('articles', 'tarifs'));
    }
}
