<?php

namespace App\Services;

use App\Models\CMS;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CMSService
{
    /**
     * @param $request
     */
    public function store($request)
    {
        DB::transaction(function () use ($request) {
            $locale                   = new CMS();
            $locale->page_title       = Str::title($request->page_title);
            $locale->url_key          = $request->url_key;
            $locale->html_content     = $request->html_content;
            $locale->meta_title       = $request->meta_title;
            $locale->meta_description = $request->meta_description;
            $locale->meta_keywords    = $request->meta_keywords;
            $locale->save();
        });
    }

    /**
     * @param $id
     */
    public function update($id, $request)
    {
        DB::transaction(function () use ($id, $request) {
            $locale                   = CMS::find($id);
            $locale->page_title       = Str::title($request->page_title);
            $locale->url_key          = $request->url_key;
            $locale->html_content     = $request->html_content;
            $locale->meta_title       = $request->meta_title;
            $locale->meta_description = $request->meta_description;
            $locale->meta_keywords    = $request->meta_keywords;
            $locale->save();
        });
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        CMS::find($id)->delete($id);
    }
}
