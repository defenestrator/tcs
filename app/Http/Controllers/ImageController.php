<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageStoreRequest;
use App\Http\Requests\ImageUpdateRequest;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $images = Image::all();

        return view('image.index', compact('images'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('image.create');
    }

    /**
     * @param \App\Http\Requests\ImageStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageStoreRequest $request)
    {
        $image = Image::create($request->all());

        $request->session()->flash('image.id', $image->id);

        return redirect()->route('image.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Image $image)
    {
        return view('image.show', compact('image'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Image $image)
    {
        return view('image.edit', compact('image'));
    }

    /**
     * @param \App\Http\Requests\ImageUpdateRequest $request
     * @param \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function update(ImageUpdateRequest $request, Image $image)
    {
        $request->session()->flash('image.id', $image->id);

        return redirect()->route('image.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Image $image)
    {
        $image->delete();

        return redirect()->route('image.index');
    }
}
