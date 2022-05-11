<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogService
{
    /**
     * @param $request
     */
    public function store($request)
    {
        DB::transaction(function () use ($request) {
            $blog                       = new Blog();
            $blog->name                 = Str::title($request->name);
            $blog->slug                 = $request->slug;
            $blog->short_description    = $request->short_description;
            $blog->description          = $request->description;
            $blog->default_category     = $request->default_category;
            $blog->author               = $request->author;
            $blog->tags                 = $request->tags;
            $blog->locale               = $request->locale;
            $blog->meta_title           = $request->meta_title;
            $blog->meta_description     = $request->meta_description;
            $blog->meta_keywords        = $request->meta_keywords;
            $blog->published_at         = $request->published_at;
            $blog->status               = isset($request->status) == 1 ? 1 : 0;
            if ($request->file('image')) {
                $path = request()->file('image')->store('blog_image', 'public');
                $blog->image = $path;
            }
            $blog->save();
        });
    }

    /**
     * @param $id
     */
    public function update($id, $request)
    {
        DB::transaction(function () use ($id, $request) {
            $blog                       = Blog::find($id);
            $blog->name                 = Str::title($request->name);
            $blog->slug                 = $request->slug;
            $blog->short_description    = $request->short_description;
            $blog->description          = $request->description;
            $blog->default_category     = $request->default_category;
            $blog->author               = $request->author;
            $blog->tags                 = $request->tags;
            $blog->locale               = $request->locale;
            $blog->meta_title           = $request->meta_title;
            $blog->meta_description     = $request->meta_description;
            $blog->meta_keywords        = $request->meta_keywords;
            $blog->published_at         = $request->published_at;
            $blog->status               = isset($request->status) == 1 ? 1 : 0;
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($blog->image);
                $path = request()->file('image')->store('blog_image', 'public');
                $blog->image = $path;
            }
            $blog->save();
        });
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        Storage::disk('public')->delete($blog->image);
        $blog->delete();
    }
}
