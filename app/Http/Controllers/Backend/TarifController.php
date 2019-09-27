<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TarifRequest;
use App\Provider;
use App\Tarif;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class TarifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.tarif.indexDatatables');
    }

    public function indexDatatables() {

        $tarif = Tarif::with(['provider'])->select('tarifs.*');

        return DataTables::of($tarif)
            ->editColumn('status', '{!! $model->statusBadge !!}')
            ->addColumn('actions', function($tarif) {
                $html = '<a href="' . route('tarif.edit', $tarif->id) . '" class="btn-sm btn-primary">Edit</a>';
                return $html .= '<a href="' . route('tarif.delete', $tarif->id) . '" class="btn-sm btn-danger">Delete</a>';
            })
            ->rawColumns([
                'status',
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
        $status = [
            '1' => 'Active',
            '0' => 'Inactive',
        ];

        $provider = Provider::all()->pluck('name', 'id')->toArray();

        return view('backend.tarif.create', compact('provider', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TarifRequest $request)
    {
        Tarif::create($request->all());

        return redirect()->route('tarif.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function show(Tarif $tarif)
    {
        return view('backend.tarif.show', compact('tarif'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarif $tarif)
    {
        $status = [
            '1' => 'Active',
            '0' => 'Inactive',
        ];

        $provider = Provider::all()->pluck('name', 'id')->toArray();

        return view('backend.tarif.edit', compact('tarif', 'provider', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TarifRequest $request
     * @param \App\Tarif $tarif
     * @return void
     */
    public function update(TarifRequest $request, Tarif $tarif)
    {
        $tarif->update($request->all());

        return redirect()->route('tarif.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarif $tarif)
    {
        $tarif->delete();

        return redirect()->route('tarif.index');
    }
}
