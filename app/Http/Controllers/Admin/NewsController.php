<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStore;
use App\Http\Requests\NewsUpdate;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::with('category')
            ->get();

        return view('admin.news.index', [
            'newsList' => $news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.news.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsStore $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        
        $news = News::create($data);

        if ($news) {
            return redirect()->route('admin.news.index')
                ->with('success', __('message.admin.news.created.success'));
        }

        return back()->with('error', __('message.admin.news.created.error'));
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
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = Category::all();

        return view('admin.news.edit', [
            'news' => $news,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdate $request, News $news)
    {
        
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = md5($file->getClientOriginalName() . time());
            $fileExt = $file->getClientOriginalExtension();

            $newFileName = "$fileName.$fileExt";

            $data['image'] = $file->storeAs('news', $newFileName, 'public');
        }

        $newsStatus = $news->fill($data)->save();

        if ($newsStatus) {
            return redirect()->route('admin.news.index')
                ->with('success', __('message.admin.news.updated.success'));
        }

        return back()->with('error', __('message.admin.news.updated.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, News $news)
    {
        if ($request->ajax()) {
            try {
                $news->delete();
            } catch (\Exception $e) {
                report($e);
            }
        }
    }
}
