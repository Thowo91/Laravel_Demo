<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProviderRequest;
use App\Provider;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.provider.indexDatatables');
    }

    public function indexDatatables() {

        $provider = Provider::all();

        return DataTables::of($provider)
            ->addColumn('actions', function($provider) {
                $html = '<a href="' . route('provider.edit', $provider->id) . '" class="btn-sm btn-primary">Edit</a>';
                return $html .= '<a href="' . route('provider.delete', $provider->id) . '" class="btn-sm btn-danger">Delete</a>';
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
        return view('backend.provider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProviderRequest $request
     * @return void
     */
    public function store(ProviderRequest $request)
    {
        Provider::create($request->all());

        return redirect()->route('provider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return view('backend.provider.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('backend.provider.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProviderRequest $request
     * @param \App\Provider $provider
     * @return void
     */
    public function update(ProviderRequest $request, Provider $provider)
    {
        $provider->update($request->all());

        return redirect()->route('provider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();

        return redirect()->route('provider.index');
    }
}
