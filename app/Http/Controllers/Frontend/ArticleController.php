<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use App\Categorie;
use App\Http\Controllers\Controller;
use App\Mail\ArticleInformation;
use App\Manufacturer;
use App\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Helpers\SearchHelper as SearchHelper;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $categorieArray = request('categorie') ?? [];
        $manufacturerArray = request('manufacturer') ?? [];
        $tagArray = request('tag') ?? [];

        $query = Article::whereHas('categorie', function (Builder $q) use ($categorieArray) {
            if (!empty($categorieArray)) {
                $q->whereIn('name', $categorieArray);
            }
        })
            ->whereHas('manufacturer', function (Builder $q) use ($manufacturerArray) {
                if (!empty($manufacturerArray)) {
                    $q->whereIn('name', $manufacturerArray);
                }
            });
        if (!empty($tagArray)) {

            $query->whereHas('tags', function (Builder $q) use ($tagArray) {
                if (!empty($tagArray)) {
                    $q->whereIn('name', $tagArray);
                }
            });

        }
        $articles = $query->with('categorie', 'manufacturer', 'tags')->active()->paginate(12);

        $articles->withPath(SearchHelper::buildManufacturer(''));

        $categories = Categorie::whereHas('articles', function (Builder $q) {
            $q->active();
        })->get();

        $manufacturers = Manufacturer::whereHas('articles', function (Builder $q) {
            $q->active();
        })->get();

        $tags = Tag::whereHas('articles', function (Builder $q) {
            $q->active();
        })->get();

        return view('frontend.article.index', compact('articles', 'categories', 'manufacturers', 'tags'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $tarifs = $article->tarifs()->active()->wherePivot('status', '=', 1)->get();

        return view('frontend.article.show', compact('article', 'tarifs'));
    }

    /**
     * Article Information Mail
     *
     * @param Request $request
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse
     */
    public function articleInformationMail(Request $request, Article $article) {

        $validateData = $request->validate([
            'email' => 'required|email',
        ]);

        Mail::to($request->email)->send(new ArticleInformation($article));

        return redirect()->route('frontend.article.show', $article->id);
    }
}
