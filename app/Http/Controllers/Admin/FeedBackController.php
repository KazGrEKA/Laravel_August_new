<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeedBack;
use App\Models\News;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.feedback.index', [
			'FeedBackList' => FeedBack::with('news')
			->paginate(
				config('feedback.paginate')
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
        return view('admin.feedback.create', ['NewsList' => News::all()]);
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
			'name' => ['required', 'string', 'min:3']
		]);
		$request->validate([
			'email' => ['required', 'email']
		]);
		$request->validate([
			'feedback' => ['required', 'string', 'min:3']
		]);

        	$FeedBack = FeedBack::create(
			$request->only(['news_id', 'name', 'email', 'feedback'])
		);

		if( $FeedBack ) {
			return redirect()
				->route('admin.feedback.index')
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
    public function edit(FeedBack $feedback)
    {
        return view('admin.feedback.edit', [
			'feedback' => $feedback,
			'NewsList' => News::all()
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeedBack $feedback)
    {
		$request->validate([
			'name' => ['required', 'string', 'min:3']
		]);
		$request->validate([
			'feedback' => ['required', 'string', 'min:3']
		]);

        $FeedBack = $feedback->fill(
			$request->only(['news_id', 'name', 'email', 'feedback'])
		)->save();

		if( $FeedBack ) {
			return redirect()
				->route('admin.feedback.index')
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
