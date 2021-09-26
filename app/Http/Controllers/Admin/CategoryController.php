<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStore;
use App\Http\Requests\CategoryUpdate;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index() // вывод всех категорий списком
    {
        $categories = Category::select(['id', 'title', 'description', 'created_at'])
            ->get();

        return view('admin.categories.index', [
            'categoryList' => $categories
        ]);
    }

    public function filter(int $id) // вывод всех новостей в конкретной категории
    {
        $category = Category::with('news')
            ->find($id);

        return view('admin.categories.filter', [
            'category' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStore $request)
    {
        $category = Category::create(
            $request->only(['title', 'color', 'description'])
        );

        if ($category) {
            return redirect()->route('admin.categories.index')
                ->with('success', __('message.admin.categories.created.success'));
        }

        return back()->with('error', __('message.admin.categories.created.error'));
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
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdate $request, Category $category)
    {
        $categoryStatus = $category->fill(
            $request->only(['title', 'color', 'description'])
        )->save();

        if ($categoryStatus) {
            return redirect()->route('admin.categories.index')
                ->with('success', __('message.admin.categories.updated.success'));
        }

        return back()->with('error', __('message.admin.categories.updated.error'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Category $category)
    {
        if ($request->ajax()) {
            try {
                $category->delete();
            } catch (\Exception $e) {
                report($e);
            }
        }
    }
}
