<?php

namespace App\Http\Controllers;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(int $idCategory)
	{
		$model = new News();
		//dd($model->getNewsByCategoryId($idCategory));
		return view('news.index', [
			'idCategory' => $idCategory,
			'newsList' => $model->getNewsByCategoryId($idCategory)
		]);
	}

	public function show(int $idCategory, int $id, Request $request)
	{
		$model = new News();
		$news = $model->getNewsById($id, $idCategory);
		//dd($news);
		if ($request['title'] == "" ){
		return view('news.show', [
			'id' => $id,
			'idCategory' => $idCategory,
			"request" => ['title' => ""],
			'newsList' => $news
		]);
		} else {
		return view('news.show', [
			'id' => $id,
			'idCategory' => $idCategory,
			'request' => $request->all(),
			'newsList' => $news
		]);}
	}
	
	public function store(Request $request)
    {
		$request->validate([
			'title' => ['required', 'string', 'min:3']
		]);
		
		return redirect()->route('news.show');
    }
}
