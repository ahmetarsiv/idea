<?php

namespace App\Services;

use App\Models\Configuration;
use App\Models\MetaData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GlobalService
{
    /**
     * @param $id
     */
    public function userUpdate($request, $id): void
    {
        $user = User::find($id);
        $user->name = Str::title($request->name);
        $user->email = $request->email;
        isset($request->password) ? $user->password = Hash::make($request->password) : null;
        $user->save();
    }

    /**
     * @param $id
     */
    public function metaDataUpdate($request, $id)
    {
        $meta_datum                   = MetaData::find($id);
        $meta_datum->html_content     = $request->html_content;
        $meta_datum->product_service  = $request->product_service;
        $meta_datum->footer_left      = $request->footer_left;
        $meta_datum->footer_center    = $request->footer_center;
        $meta_datum->slider_allow     = isset($request->slider_allow) == 1 ? 1 : 0;
        $meta_datum->meta_title       = $request->meta_title;
        $meta_datum->meta_description = $request->meta_description;
        $meta_datum->meta_keywords    = $request->meta_keywords;
        $meta_datum->save();
    }

    /**
     * @param $id
     */
    public function configurationUpdate($request, $id)
    {
        $configuration                   = Configuration::find($id);
        $configuration->copyright        = Str::title($request->copyright);
        $configuration->copyright_allow  = isset($request->copyright_allow) == 1 ? 1 : 0;
        $configuration->blog_allow       = isset($request->blog_allow) == 1 ? 1 : 0;
        $configuration->product_allow    = isset($request->product_allow) == 1 ? 1 : 0;
        $configuration->category_allow   = isset($request->category_allow) == 1 ? 1 : 0;
        $configuration->cms_allow        = isset($request->cms_allow) == 1 ? 1 : 0;
        $configuration->custom_css       = $request->custom_css;
        $configuration->custom_js        = $request->custom_js;
        $configuration->save();
    }

    public function destroy($id)
    {
        //
    }
}
