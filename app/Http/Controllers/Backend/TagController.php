<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Tag;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.tag.indexDatatables');
    }

    public function indexDatatables() {

        $tag = Tag::query();

        return DataTables::of($tag)
            ->addColumn('actions', function($tag) {
                $html = '<a href="' . route('tag.edit', $tag->id) . '" class="btn-sm btn-primary">Edit</a>';
                return $html .= '<a href="' . route('tag.delete', $tag->id) . '" class="btn-sm btn-danger">Delete</a>';
            })
            ->rawColumns([
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
        return view('backend.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TagRequest $request
     * @return void
     */
    public function store(TagRequest $request)
    {
        Tag::create($request->all());

        return redirect()->route('tag.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('backend.tag.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('backend.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TagRequest $request
     * @param \App\Tag $tag
     * @return void
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->all());

        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->articles()->detach();
        $tag->manufacturers()->detach();
        $tag->categories()->detach();

        $tag->delete();

        return redirect()->route('tag.index');
    }
}
