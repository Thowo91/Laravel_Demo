<?php

namespace App\Http\Controllers\Backend;

use App\Categorie;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategorieRequest;
use App\Tag;
use Yajra\DataTables\DataTables;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.categorie.indexDatatables');
    }

    public function indexDatatables() {

        $categorie = Categorie::with(['tags']);

        return DataTables::of($categorie)
            ->addColumn('actions', function($categorie) {
                $html = '<a href="' . route('categorie.edit', $categorie->id) . '" class="btn-sm btn-primary">Edit</a>';
                return $html .= '<a href="' . route('categorie.delete', $categorie->id) . '" class="btn-sm btn-danger">Delete</a>';
            })
            ->addColumn('tags', function($categorie) {
                $html = '';
                foreach ($categorie->tags as $tag) {
                    $html .= $tag->tagBadge;
                }
                return $html;
            })
            ->rawColumns([
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
        $tags = Tag::all()->pluck('name', 'id')->toArray();
        $selected = [];

        return view('backend.categorie.create', compact('tags', 'selected'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategorieRequest $request
     * @return void
     */
    public function store(CategorieRequest $request)
    {
        $categorie = Categorie::create($request->all());
        $categorie->tags()->sync($request->tags_id);

        return redirect()->route('categorie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        return view('backend.categorie.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        $tags = Tag::all()->pluck('name', 'id')->toArray();
        $selected = $categorie->tags()->pluck('id');

        return view('backend.categorie.edit', compact('categorie', 'tags', 'selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategorieRequest $request
     * @param \App\Categorie $categorie
     * @return void
     */
    public function update(CategorieRequest $request, Categorie $categorie)
    {
        $categorie->update($request->all());
        $categorie->tags()->sync($request->tags_id);

        return redirect()->route('categorie.index', $categorie->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Categorie $categorie
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->tags()->detach();
        $categorie->delete();

        return redirect()->route('categorie.index');
    }
}
