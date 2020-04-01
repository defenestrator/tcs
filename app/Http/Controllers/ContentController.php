<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests\ContentStoreRequest;
use App\Http\Requests\ContentUpdateRequest;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contents = Content::all();

        return view('content.index', compact('contents'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('content.create');
    }

    /**
     * @param \App\Http\Requests\ContentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentStoreRequest $request)
    {
        $content = Content::create($request->all());

        $request->session()->flash('content.id', $content->id);

        return redirect()->route('content.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Content $content
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Content $content)
    {
        return view('content.show', compact('content'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Content $content
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Content $content)
    {
        return view('content.edit', compact('content'));
    }

    /**
     * @param \App\Http\Requests\ContentUpdateRequest $request
     * @param \App\Content $content
     * @return \Illuminate\Http\Response
     */
    public function update(ContentUpdateRequest $request, Content $content)
    {
        $request->session()->flash('content.id', $content->id);

        return redirect()->route('content.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Content $content
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Content $content)
    {
        $content->delete();

        return redirect()->route('content.index');
    }
}
