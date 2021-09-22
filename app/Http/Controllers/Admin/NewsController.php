<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index', [
			'newsList' => News::with('category')
			->paginate(
				config('news.paginate')
			)
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.news.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate([
			'title' => ['required', 'string', 'min:3']
		]);

        $news = News::create(
			$request->only(['category_id', 'title', 'author', 'description'])
		);

		if( $news ) {
			return redirect()
				->route('admin.news.index')
				->with('success', 'Запись успешно добавлена');
		}

		return back()
			->with('error', 'Запись не добавлена')
			->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
			'news' => $news,
			'categories' => Category::all()
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
		$request->validate([
			'title' => ['required', 'string', 'min:3']
		]);

        $news = $news->fill(
			$request->only(['category_id', 'title', 'author', 'description'])
		)->save();

		if( $news ) {
			return redirect()
				->route('admin.news.index')
				->with('success', 'Запись успешно обновлена');
		}

		return back()
			->with('error', 'Запись не обновлена')
			->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
