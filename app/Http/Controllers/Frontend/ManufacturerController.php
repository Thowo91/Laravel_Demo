<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturer::select()->paginate(10);

        return view('frontend.manufacturer.index', compact('manufacturers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        return view('frontend.manufacturer.show', compact('manufacturer'));
    }
}
