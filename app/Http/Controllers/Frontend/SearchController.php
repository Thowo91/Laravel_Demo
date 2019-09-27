<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request) {

        $search = explode(' ', $request->get('Search'));

        $queryArticle = DB::table('articles');
        self::whereInLike($queryArticle, $search);
        $articles = $queryArticle->get();

        $queryManufacturers = DB::table('manufacturers');
        self::whereInLike($queryManufacturers, $search);
        $manufacturers = $queryManufacturers->get();

        $queryProviders = DB::table('providers');
        self::whereInLike($queryProviders, $search);
        $providers = $queryProviders->get();

        $queryTarifs = DB::table('tarifs');
        self::whereInLike($queryTarifs, $search);
        $tarifs = $queryTarifs->get();

        return view('frontend.search.search', compact('articles', 'manufacturers', 'providers', 'tarifs'));
    }

    public static function whereInLike(Builder $query, Array $search) {
        foreach ($search as $item) {
            $query->where('name', 'LIKE', "%{$item}%", 'or');
        }
    }
}
