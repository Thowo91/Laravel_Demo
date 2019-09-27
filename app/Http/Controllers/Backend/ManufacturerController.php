<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ManufacturerRequest;
use App\Manufacturer;
use App\Tag;
use Yajra\DataTables\DataTables;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.manufacturer.indexDatatables');
    }

    public function indexDatatables() {

        $manufacturer = Manufacturer::with(['tags']);

        return DataTables::of($manufacturer)
            ->addColumn('actions', function($manufacturer) {
                $html = '<a href="' . route('manufacturer.edit', $manufacturer->id) . '" class="btn-sm btn-primary">Edit</a>';
                return $html .= '<a href="' . route('manufacturer.delete', $manufacturer->id) . '" class="btn-sm btn-danger">Delete</a>';
            })
            ->addColumn('tags', function($manufacturer) {
                $html = '';
                foreach ($manufacturer->tags as $tag) {
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

        return view('backend.manufacturer.create', compact('tags', 'selected'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ManufacturerRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManufacturerRequest $request)
    {
        $manufacturer = Manufacturer::create($request->all());
        $manufacturer->tags()->sync($request->tags_id);

        return redirect()->route('manufacturer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        return view('backend.manufacturer.show', compact('manufacturer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        $tags = Tag::all()->pluck('name', 'id')->toArray();
        $selected = $manufacturer->tags()->pluck('id');

        return view('backend.manufacturer.edit', compact('manufacturer', 'tags', 'selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ManufacturerRequest $request
     * @param \App\Manufacturer $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(ManufacturerRequest $request, Manufacturer $manufacturer)
    {
        $manufacturer->update($request->all());
        $manufacturer->tags()->sync($request->tags_id);

        return redirect()->route('manufacturer.index', $manufacturer->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Manufacturer $manufacturer
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->tags()->detach();
        $manufacturer->delete();

        return redirect()->route('manufacturer.index');
    }

}
