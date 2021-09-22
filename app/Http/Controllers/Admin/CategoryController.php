<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index', [
			'categories' => Category::withCount('news')->paginate(
                config('categories.paginate')
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
        return view('admin.categories.create');
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

		$category = Category::create(
			$request->only(['title', 'description'])
		);

		if( $category ) {
			return redirect()
				->route('admin.categories.index')
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
       return view('admin.categories.edit', [
		   'category' => $category
	   ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
			'title' => ['required', 'string', 'min:3']
		]);
        
        $category = $category->fill(
			$request->only(['title', 'description'])
		)->save();

		if($category) {
			return redirect()
			    ->route('admin.categories.index')
				->with('success', 'Запись успешно обновлена');
		}

		return back()
			->with('error', 'Запись не была обновлена')
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
