<?php

namespace App\Http\Controllers;

use App\Http\Requests\LaboratoryStoreRequest;
use App\Http\Requests\LaboratoryUpdateRequest;
use App\Laboratory;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $laboratories = Laboratory::all();

        return view('laboratory.index', compact('laboratories'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('laboratory.create');
    }

    /**
     * @param \App\Http\Requests\LaboratoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LaboratoryStoreRequest $request)
    {
        $laboratory = Laboratory::create($request->all());

        $request->session()->flash('laboratory.id', $laboratory->id);

        return redirect()->route('laboratory.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Laboratory $laboratory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Laboratory $laboratory)
    {
        return view('laboratory.show', compact('laboratory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Laboratory $laboratory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Laboratory $laboratory)
    {
        return view('laboratory.edit', compact('laboratory'));
    }

    /**
     * @param \App\Http\Requests\LaboratoryUpdateRequest $request
     * @param \App\Laboratory $laboratory
     * @return \Illuminate\Http\Response
     */
    public function update(LaboratoryUpdateRequest $request, Laboratory $laboratory)
    {
        $request->session()->flash('laboratory.id', $laboratory->id);

        return redirect()->route('laboratory.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Laboratory $laboratory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Laboratory $laboratory)
    {
        $laboratory->delete();

        return redirect()->route('laboratory.index');
    }
}
