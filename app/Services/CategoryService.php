<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryService
{
    /**
     * @param $request
     */
    public function store($request)
    {
        DB::transaction(function () use ($request) {
            $category                   = new Category();
            $category->name             = Str::title($request->name);
            $category->slug             = $request->slug;
            $category->description      = $request->description;
            $category->locale           = $request->locale;
            $category->meta_title       = $request->meta_title;
            $category->meta_description = $request->meta_description;
            $category->meta_keywords    = $request->meta_keywords;
            $category->status           = isset($request->status) == 1 ? 1 : 0;
            if ($request->hasFile('image')) {
                $path = request()->file('image')->store('category_image', 'public');
                $category->image = $path;
            }
            $category->save();
        });
    }

    /**
     * @param $id
     */
    public function update($id, $request)
    {
        DB::transaction(function () use ($id, $request) {
            $category                   = Category::find($id);
            $category->name             = Str::title($request->name);
            $category->slug             = $request->slug;
            $category->description      = $request->description;
            $category->locale           = $request->locale;
            $category->meta_title       = $request->meta_title;
            $category->meta_description = $request->meta_description;
            $category->meta_keywords    = $request->meta_keywords;
            $category->status           = isset($request->status) == 1 ? 1 : 0;
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($category->image);
                $path = request()->file('image')->store('category_image', 'public');
                $category->image = $path;
            }
            $category->save();
        });
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        Storage::disk('public')->delete($category->image);
        $category->delete();
    }
}
