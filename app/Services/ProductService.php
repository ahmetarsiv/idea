<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService
{
    /**
     * @param $request
     */
    public function store($request)
    {
        DB::transaction(function () use ($request) {
            $product                       = new Product();
            $product->name                 = Str::title($request->name);
            $product->sku                  = $request->sku;
            $product->slug                 = $request->slug;
            $product->price                = $request->price;
            $product->tax                  = $request->tax;
            $product->description          = $request->description;
            $product->default_category     = $request->default_category;
            $product->locale               = $request->locale;
            $product->meta_title           = $request->meta_title;
            $product->meta_description     = $request->meta_description;
            $product->meta_keywords        = $request->meta_keywords;
            $product->status               = isset($request->status) == 1 ? 1 : 0;
            if ($request->file('image')) {
                $path = request()->file('image')->store('product_image', 'public');
                $product->image = $path;
            }
            $product->save();
        });
    }

    /**
     * @param $id
     */
    public function update($id, $request)
    {
        DB::transaction(function () use ($id, $request) {
            $product                       = Product::find($id);
            $product->name                 = Str::title($request->name);
            $product->sku                  = $request->sku;
            $product->slug                 = $request->slug;
            $product->price                = $request->price;
            $product->tax                  = $request->tax;
            $product->description          = $request->description;
            $product->default_category     = $request->default_category;
            $product->locale               = $request->locale;
            $product->meta_title           = $request->meta_title;
            $product->meta_description     = $request->meta_description;
            $product->meta_keywords        = $request->meta_keywords;
            $product->status               = isset($request->status) == 1 ? 1 : 0;
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($product->image);
                $path = request()->file('image')->store('product_image', 'public');
                $product->image = $path;
            }
            $product->save();
        });
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        Storage::disk('public')->delete($product->image);
        $product->delete();
    }
}
