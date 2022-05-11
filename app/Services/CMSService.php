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
            $cms                   = new CMS();
            $cms->page_title       = Str::title($request->page_title);
            $cms->url_key          = $request->url_key;
            $cms->html_content     = $request->html_content;
            $cms->locale           = $request->locale;
            $cms->meta_title       = $request->meta_title;
            $cms->meta_description = $request->meta_description;
            $cms->meta_keywords    = $request->meta_keywords;
            $cms->save();
        });
    }

    /**
     * @param $id
     */
    public function update($id, $request)
    {
        DB::transaction(function () use ($id, $request) {
            $cms                   = CMS::find($id);
            $cms->page_title       = Str::title($request->page_title);
            $cms->url_key          = $request->url_key;
            $cms->html_content     = $request->html_content;
            $cms->locale           = $request->locale;
            $cms->meta_title       = $request->meta_title;
            $cms->meta_description = $request->meta_description;
            $cms->meta_keywords    = $request->meta_keywords;
            $cms->save();
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
