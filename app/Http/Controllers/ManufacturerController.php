<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManufacturerStoreRequest;
use App\Http\Requests\ManufacturerUpdateRequest;
use App\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $manufacturers = Manufacturer::all();

        return view('manufacturer.index', compact('manufacturers'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('manufacturer.create');
    }

    /**
     * @param \App\Http\Requests\ManufacturerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManufacturerStoreRequest $request)
    {
        $manufacturer = Manufacturer::create($request->all());

        $request->session()->flash('manufacturer.id', $manufacturer->id);

        return redirect()->route('manufacturer.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Manufacturer $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Manufacturer $manufacturer)
    {
        return view('manufacturer.show', compact('manufacturer'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Manufacturer $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Manufacturer $manufacturer)
    {
        return view('manufacturer.edit', compact('manufacturer'));
    }

    /**
     * @param \App\Http\Requests\ManufacturerUpdateRequest $request
     * @param \App\Manufacturer $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(ManufacturerUpdateRequest $request, Manufacturer $manufacturer)
    {
        $request->session()->flash('manufacturer.id', $manufacturer->id);

        return redirect()->route('manufacturer.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Manufacturer $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Manufacturer $manufacturer)
    {
        $manufacturer->delete();

        return redirect()->route('manufacturer.index');
    }
}
