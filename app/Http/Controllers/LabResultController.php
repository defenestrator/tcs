<?php

namespace App\Http\Controllers;

use App\Http\Requests\LabResultStoreRequest;
use App\Http\Requests\LabResultUpdateRequest;
use App\LabResult;
use App\Labresult;
use Illuminate\Http\Request;

class LabResultController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $labresults = Labresult::all();

        return view('labresult.index', compact('labresults'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('labresult.create');
    }

    /**
     * @param \App\Http\Requests\LabResultStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(LabResultStoreRequest $request)
    {
        $labresult = Labresult::create($request->all());

        $request->session()->flash('labresult.id', $labresult->id);

        return redirect()->route('labresult.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\LabResult $labResult
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, LabResult $labResult)
    {
        return view('labresult.show', compact('labresult'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\LabResult $labResult
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, LabResult $labResult)
    {
        return view('labresult.edit', compact('labresult'));
    }

    /**
     * @param \App\Http\Requests\LabResultUpdateRequest $request
     * @param \App\LabResult $labResult
     * @return \Illuminate\Http\Response
     */
    public function update(LabResultUpdateRequest $request, LabResult $labResult)
    {
        $request->session()->flash('labresult.id', $labresult->id);

        return redirect()->route('labresult.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\LabResult $labResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, LabResult $labResult)
    {
        $labresult->delete();

        return redirect()->route('labresult.index');
    }
}
