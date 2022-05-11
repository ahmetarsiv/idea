<?php

namespace App\Services;

use App\Models\Locale;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LocaleService
{
    /**
     * @param $request
     */
    public function store($request)
    {
        DB::transaction(function () use ($request) {
            $locale                   = new Locale();
            $locale->name             = Str::title($request->name);
            $locale->code             = $request->code;
            if ($request->hasFile('image')) {
                $path = request()->file('image')->store('locale_image', 'public');
                $locale->image = $path;
            }
            $locale->save();
        });
    }

    /**
     * @param $id
     */
    public function update($id, $request)
    {
        DB::transaction(function () use ($id, $request) {
            $locale                   = Locale::find($id);
            $locale->name             = Str::title($request->name);
            $locale->code             = $request->code;
            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($locale->image);
                $path = request()->file('image')->store('locale_image', 'public');
                $locale->image = $path;
            }
            $locale->save();
        });
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        $locale = Locale::find($id);
        Storage::disk('public')->delete($locale->image);
        $locale->delete();
    }
}
