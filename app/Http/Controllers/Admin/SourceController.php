<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SourceStore;
use App\Http\Requests\SourceUpdate;
use App\Models\Category;
use App\Models\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sources = Source::with('category')
            ->get();

        return view('admin.sources.index', [
            'sourceList' => $sources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all() ;

        return view('admin.sources.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SourceStore $request)
    {
        $data = $request->validated();
        
        $source = Source::create($data);

        if ($source) {
            return redirect()->route('admin.sources.index')
                ->with('success', __('message.admin.sources.created.success'));
        }

        return back()->with('error', __('message.admin.sources.created.error'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function edit(Source $source)
    {
        $categories = Category::all();

        return view('admin.sources.edit', [
            'source' => $source,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function update(SourceUpdate $request, Source $source)
    {
        $data = $request->validated();
        
        $sourceStatus = $source->fill($data)->save();

        if ($sourceStatus) {
            return redirect()->route('admin.sources.index')
                ->with('success', __('message.admin.sources.updated.success'));
        }

        return back()->with('error', __('message.admin.sources.updated.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Source $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Source $source)
    {
        if ($request->ajax()) {
            try {
                $source->delete();
            } catch (\Exception $e) {
                report($e);
            }
        }
    }
}
