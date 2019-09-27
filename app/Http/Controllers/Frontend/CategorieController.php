<?php

namespace App\Http\Controllers\Frontend;

use App\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::select()->paginate(10);

        return view('frontend.categorie.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        return view('frontend.categorie.show', compact('categorie'));
    }
}
