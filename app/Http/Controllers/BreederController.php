<?php

namespace App\Http\Controllers;

use App\Breeder;
use App\Http\Requests\BreederStoreRequest;
use App\Http\Requests\BreederUpdateRequest;
use Illuminate\Http\Request;

class BreederController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $breeders = Breeder::all();

        return view('breeder.index', compact('breeders'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('breeder.create');
    }

    /**
     * @param \App\Http\Requests\BreederStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BreederStoreRequest $request)
    {
        $breeder = Breeder::create($request->all());

        $request->session()->flash('breeder.id', $breeder->id);

        return redirect()->route('breeder.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Breeder $breeder
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Breeder $breeder)
    {
        return view('breeder.show', compact('breeder'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Breeder $breeder
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Breeder $breeder)
    {
        return view('breeder.edit', compact('breeder'));
    }

    /**
     * @param \App\Http\Requests\BreederUpdateRequest $request
     * @param \App\Breeder $breeder
     * @return \Illuminate\Http\Response
     */
    public function update(BreederUpdateRequest $request, Breeder $breeder)
    {
        $request->session()->flash('breeder.id', $breeder->id);

        return redirect()->route('breeder.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Breeder $breeder
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Breeder $breeder)
    {
        $breeder->delete();

        return redirect()->route('breeder.index');
    }
}
