<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use App\Http\Controllers\Controller;
use App\Manufacturer;
use App\Provider;
use App\Tarif;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request) {

//        dd($request->get('Search'));

        $articles = Article::all();
        $manufacturers = Manufacturer::all();
        $providers = Provider::all();
        $tarifs = Tarif::all();

        return view('frontend.search.search', compact('articles', 'manufacturers', 'providers', 'tarifs'));
    }
}
