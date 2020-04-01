<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingAddressStoreRequest;
use App\Http\Requests\ShippingAddressUpdateRequest;
use App\ShippingAddress;
use App\Shippingaddress;
use Illuminate\Http\Request;

class ShippingAddressController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shippingaddresses = Shippingaddress::all();

        return view('shippingaddress.index', compact('shippingaddresses'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('shippingaddress.create');
    }

    /**
     * @param \App\Http\Requests\ShippingAddressStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingAddressStoreRequest $request)
    {
        $shippingaddress = Shippingaddress::create($request->all());

        $request->session()->flash('shippingaddress.id', $shippingaddress->id);

        return redirect()->route('shippingaddress.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ShippingAddress $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ShippingAddress $shippingAddress)
    {
        return view('shippingaddress.show', compact('shippingaddress'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ShippingAddress $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ShippingAddress $shippingAddress)
    {
        return view('shippingaddress.edit', compact('shippingaddress'));
    }

    /**
     * @param \App\Http\Requests\ShippingAddressUpdateRequest $request
     * @param \App\ShippingAddress $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function update(ShippingAddressUpdateRequest $request, ShippingAddress $shippingAddress)
    {
        $request->session()->flash('shippingaddress.id', $shippingaddress->id);

        return redirect()->route('shippingaddress.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ShippingAddress $shippingAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ShippingAddress $shippingAddress)
    {
        $shippingaddress->delete();

        return redirect()->route('shippingaddress.index');
    }
}
