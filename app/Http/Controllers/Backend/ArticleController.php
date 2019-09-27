<?php

namespace App\Http\Controllers\Backend;

use App\Article;
use App\Categorie;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Manufacturer;
use App\Tag;
use App\Tarif;
use Illuminate\Http\Request;
use Storage;
use Yajra\DataTables\DataTables;
use function foo\func;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.article.indexDatatables');
    }


    public function indexDatatables() {

        $article = Article::with(['manufacturer', 'categorie', 'tags',])->select('articles.*');

        return DataTables::of($article)
            ->editColumn('status', '{!! $model->statusBadge !!}')
            ->addColumn('actions', function($article) {
                $html = '<a href="' . route('article.edit', $article->id) . '" class="btn-sm btn-primary">Edit</a>';
                return $html .= '<a href="' . route('article.delete', $article->id) . '" class="btn-sm btn-danger">Delete</a>';
            })
            ->addColumn('tags', function($article) {
                $html = '';
                foreach ($article->tags as $tag) {
                    $html .= $tag->tagBadge;
                }
                return $html;
            })
            ->addColumn('activeTarif', function($article) {
                return $article->tarifs()->active()->wherePivot('status', '=', 1)->count();
            })
            ->rawColumns([
                'status',
                'tags',
                'actions',
            ])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new Article();

        $status = [
            '1' => 'Active',
            '0' => 'Inactive',
        ];

        $manufacturer = Manufacturer::all()->pluck('name', 'id')->toArray();
        $categorie = Categorie::all()->pluck('name', 'id')->toArray();
        $tags = Tag::all()->pluck('name', 'id')->toArray();
        $selected = [];

        return view('backend.article.create', compact('article','status', 'manufacturer', 'categorie', 'tags', 'selected'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->all());
        $article->tags()->sync($request->tags_id);

        $this->imageUpload($request, $article);

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resourc
     *
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('backend.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $status = [
        '1' => 'Active',
        '0' => 'Inactive',
        ];

        $manufacturer = Manufacturer::all()->pluck('name', 'id')->toArray();
        $categorie = Categorie::all()->pluck('name', 'id')->toArray();
        $tags = Tag::all()->pluck('name', 'id')->toArray();
        $selected = $article->tags()->pluck('id');

        $tarife = Tarif::all();
        $selectedTarif = [];

        foreach($article->tarifs as $tarif) {
            $selectedTarif[$tarif->pivot->tarif_id]['status'] = $tarif->pivot->status;
            $selectedTarif[$tarif->pivot->tarif_id]['price'] = $tarif->pivot->price;
        }

        return view('backend.article.edit', compact('article', 'status', 'manufacturer', 'categorie', 'tags', 'selected', 'tarife', 'selectedTarif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleRequest $request
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {

        $article->update($request->all());
        $article->tags()->sync($request->tags_id);

        $this->imageUpload($request, $article);

        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Article $article
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        $article->tags()->detach();
        $article->delete();

        return redirect()->route('article.index');
    }

    public function saveTarif(Request $request, Article $article) {

        foreach ($request->tarif as $key => $value) {

            if(empty($value['price'])) {
                $article->tarifs()->detach($key);
            } else {
                $article->tarifs()->syncWithoutDetaching([$key => [
                    'price' => $value['price'],
                    'status' => (array_key_exists('status',$value)) ? 1 : 0,
                ]]);
            }
        }

        return redirect()->route('article.index');
    }

    public function imageUpload(Request $request, Article $article) {

        if ($request->hasFile('articleImage')) {

            $request->validate([
                'articleImage' => 'image',
            ]);

            $file = $request->file('articleImage');

            $article->articleImage = $article->id . '.' . $file->getClientOriginalExtension();
            $article->save();

            $file->storeAs(null, $article->articleImage, 'articleImages');
        };

    }

    public function imageDelete(Article $article) {

        Storage::disk('articleImages')->delete($article->articleImage);

        $article->articleImage = null;
        $article->save();

        return redirect()->route('article.edit', $article->id);
    }
}
