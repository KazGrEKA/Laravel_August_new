<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\FeedBack;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(int $idCategory)
	{
		$model = new News();
		return view('news.index', [
			'idCategory' => $idCategory,
			'newsList' => $model->getNewsByCategoryId($idCategory)
		]);
	}

	public function show(int $idCategory, int $id, Request $request)
	{
		if ($request->get('name')){
		$request->validate([
			'name' => ['required', 'string', 'min:3']
		]);
		$request->validate([
			'email' => ['required', 'email']
		]);
		$request->validate([
			'feedback' => ['required', 'string', 'min:3']
		]);
        	$FeedBack = FeedBack::create(['news_id' => $id]+$request->only([$id, 'name', 'email', 'feedback'])
		);

		if( $FeedBack ) {
			return redirect()
				->route('news.show', ['id' => $id, 'idCategory' => $idCategory])
				->with('success', 'Запись успешно добавлена');
		}

		return back()
			->with('error', 'Запись не добавлена')
			->withInput();
		}
		
		$model = new News();
		$news = $model->getNewsById($id, $idCategory);
		$feedback = new Feedback();
		$feedbacks = $feedback->getFeedBack($id);
		return view('news.show', [
			'id' => $id,
			'idCategory' => $idCategory,
			'newsList' => $news,
			'feedbackList' => $feedbacks
		]);
	}
	
	public function store(Request $request)
    {
		$request->validate([
			'title' => ['required', 'string', 'min:3']
		]);
		
		return redirect()->route('news.show');
    }
}
