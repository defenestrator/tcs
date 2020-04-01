<?php

namespace App\Http\Controllers;

use App\Http\Requests\StrainStoreRequest;
use App\Http\Requests\StrainUpdateRequest;
use App\Strain;
use Illuminate\Http\Request;

class StrainController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $strains = Strain::all();

        return view('strain.index', compact('strains'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('strain.create');
    }

    /**
     * @param \App\Http\Requests\StrainStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StrainStoreRequest $request)
    {
        $strain = Strain::create($request->all());

        $request->session()->flash('strain.id', $strain->id);

        return redirect()->route('strain.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Strain $strain
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Strain $strain)
    {
        return view('strain.show', compact('strain'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Strain $strain
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Strain $strain)
    {
        return view('strain.edit', compact('strain'));
    }

    /**
     * @param \App\Http\Requests\StrainUpdateRequest $request
     * @param \App\Strain $strain
     * @return \Illuminate\Http\Response
     */
    public function update(StrainUpdateRequest $request, Strain $strain)
    {
        $request->session()->flash('strain.id', $strain->id);

        return redirect()->route('strain.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Strain $strain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Strain $strain)
    {
        $strain->delete();

        return redirect()->route('strain.index');
    }
}
