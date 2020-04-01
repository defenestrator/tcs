<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryStoreRequest;
use App\Http\Requests\ProductCategoryUpdateRequest;
use App\ProductCategory;
use App\Productcategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productcategories = Productcategory::all();

        return view('productcategory.index', compact('productcategories'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('productcategory.create');
    }

    /**
     * @param \App\Http\Requests\ProductCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryStoreRequest $request)
    {
        $productcategory = Productcategory::create($request->all());

        $request->session()->flash('productcategory.id', $productcategory->id);

        return redirect()->route('productcategory.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, ProductCategory $productCategory)
    {
        return view('productcategory.show', compact('productcategory'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, ProductCategory $productCategory)
    {
        return view('productcategory.edit', compact('productcategory'));
    }

    /**
     * @param \App\Http\Requests\ProductCategoryUpdateRequest $request
     * @param \App\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryUpdateRequest $request, ProductCategory $productCategory)
    {
        $request->session()->flash('productcategory.id', $productcategory->id);

        return redirect()->route('productcategory.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ProductCategory $productCategory)
    {
        $productcategory->delete();

        return redirect()->route('productcategory.index');
    }
}
