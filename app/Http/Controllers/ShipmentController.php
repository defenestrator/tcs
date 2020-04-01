<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShipmentStoreRequest;
use App\Http\Requests\ShipmentUpdateRequest;
use App\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shipments = Shipment::all();

        return view('shipment.index', compact('shipments'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('shipment.create');
    }

    /**
     * @param \App\Http\Requests\ShipmentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShipmentStoreRequest $request)
    {
        $shipment = Shipment::create($request->all());

        $request->session()->flash('shipment.id', $shipment->id);

        return redirect()->route('shipment.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Shipment $shipment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Shipment $shipment)
    {
        return view('shipment.show', compact('shipment'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Shipment $shipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Shipment $shipment)
    {
        return view('shipment.edit', compact('shipment'));
    }

    /**
     * @param \App\Http\Requests\ShipmentUpdateRequest $request
     * @param \App\Shipment $shipment
     * @return \Illuminate\Http\Response
     */
    public function update(ShipmentUpdateRequest $request, Shipment $shipment)
    {
        $request->session()->flash('shipment.id', $shipment->id);

        return redirect()->route('shipment.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Shipment $shipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Shipment $shipment)
    {
        $shipment->delete();

        return redirect()->route('shipment.index');
    }
}
