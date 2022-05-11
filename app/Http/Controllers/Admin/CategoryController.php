<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Locale;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected CategoryService $categoryService)
    {
        $this->CategoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();

        $categories = Category::all();

        return view('admin.categories.index', compact('blogs', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales = Locale::select(['id', 'name'])->get();

        return view('admin.categories.create', compact('locales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->CategoryService->store($request);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $locales = Locale::select(['id', 'name'])->get();

        return view('admin.categories.edit', compact('category', 'locales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        try {
            $this->CategoryService->update($category->id, $request);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $this->CategoryService->destroy($category->id);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }
}
