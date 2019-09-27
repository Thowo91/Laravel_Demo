<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class TagableController extends Controller
{
    public function index() {

        $tag = Tag::where('name', '=', \Route::current()->parameter('tag'))->with('manufacturers', 'categories', 'articles')->firstOrFail();
//        dd($tag);

        return view('frontend.tagable.index', compact('tag'));
    }
}
