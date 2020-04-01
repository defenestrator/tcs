<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingCarrierStoreRequest;
use App\Http\Requests\ShippingCarrierUpdateRequest;
use App\ShippingCarrier;
use App\Shippingcarrier;
use Illuminate\Http\Request;

class ShippingCarrierController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shippingcarriers = Shippingcarrier::all();

        return view('shippingcarrier.index', compact('shippingcarriers'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('shippingcarrier.create');
    }

    /**
     * @param \App\Http\Requests\ShippingCarrierStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingCarrierStoreRequest $request)
    {
        $shippingcarrier = Shippingcarrier::create($request->all());

        $request->session()->flash('shippingcarrier.id', $shippingcarrier->id);

        return redirect()->route('shippingcarrier.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ShippingCarrier $shippingCarrier
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ShippingCarrier $shippingCarrier)
    {
        return view('shippingcarrier.show', compact('shippingcarrier'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ShippingCarrier $shippingCarrier
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ShippingCarrier $shippingCarrier)
    {
        return view('shippingcarrier.edit', compact('shippingcarrier'));
    }

    /**
     * @param \App\Http\Requests\ShippingCarrierUpdateRequest $request
     * @param \App\ShippingCarrier $shippingCarrier
     * @return \Illuminate\Http\Response
     */
    public function update(ShippingCarrierUpdateRequest $request, ShippingCarrier $shippingCarrier)
    {
        $request->session()->flash('shippingcarrier.id', $shippingcarrier->id);

        return redirect()->route('shippingcarrier.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ShippingCarrier $shippingCarrier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ShippingCarrier $shippingCarrier)
    {
        $shippingcarrier->delete();

        return redirect()->route('shippingcarrier.index');
    }
}
