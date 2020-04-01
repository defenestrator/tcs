<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Http\Requests\CouponStoreRequest;
use App\Http\Requests\CouponUpdateRequest;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $coupons = Coupon::all();

        return view('coupon.index', compact('coupons'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('coupon.create');
    }

    /**
     * @param \App\Http\Requests\CouponStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponStoreRequest $request)
    {
        $coupon = Coupon::create($request->all());

        $request->session()->flash('coupon.id', $coupon->id);

        return redirect()->route('coupon.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Coupon $coupon)
    {
        return view('coupon.show', compact('coupon'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Coupon $coupon)
    {
        return view('coupon.edit', compact('coupon'));
    }

    /**
     * @param \App\Http\Requests\CouponUpdateRequest $request
     * @param \App\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(CouponUpdateRequest $request, Coupon $coupon)
    {
        $request->session()->flash('coupon.id', $coupon->id);

        return redirect()->route('coupon.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Coupon $coupon)
    {
        $coupon->delete();

        return redirect()->route('coupon.index');
    }
}
