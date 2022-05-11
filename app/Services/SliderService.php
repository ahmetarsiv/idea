<?php

namespace App\Services;

use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SliderService
{
    /**
     * @param $request
     */
    public function store($request)
    {
        DB::transaction(function () use ($request) {
            $slider                   = new Slider();
            $slider->title            = Str::title($request->title);
            $slider->description      = $request->description;
            $slider->locale           = $request->locale;
            $slider->path             = $request->path;
            $slider->status           = isset($request->status) == 1 ? 1 : 0;
            if ($request->hasFile('image')) {
                $path = request()->file('image')->store('slider_image', 'public');
                $slider->image = $path;
            }
            $slider->save();
        });
    }

    /**
     * @param $id
     */
    public function update($id, $request)
    {
        DB::transaction(function () use ($id, $request) {
            $slider                   = Slider::find($id);
            $slider->title            = Str::title($request->title);
            $slider->description      = $request->description;
            $slider->locale           = $request->locale;
            $slider->path             = $request->path;
            $slider->status           = isset($request->status) == 1 ? 1 : 0;
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($slider->image);
                $path = request()->file('image')->store('slider_image', 'public');
                $slider->image = $path;
            }
            $slider->save();
        });
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        Storage::disk('public')->delete($slider->image);
        $slider->delete();
    }
}
