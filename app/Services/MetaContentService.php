<?php

namespace App\Services;

use App\Models\MetaContent;
use Illuminate\Support\Facades\DB;

class MetaContentService
{
    /**
     * @param $request
     */
    public function store($request)
    {
        DB::transaction(function () use ($request) {
            $meta_content                   = new MetaContent();
            $meta_content->title            = $request->title;
            $meta_content->slug             = $request->slug;
            $meta_content->target           = $request->target;
            $meta_content->status           = isset($request->status) == 1 ? 1 : 0;
            $meta_content->save();
        });
    }

    /**
     * @param $id
     */
    public function update($id, $request)
    {
        DB::transaction(function () use ($id, $request) {
            $meta_content                   = MetaContent::find($id);
            $meta_content->title            = $request->title;
            $meta_content->slug             = $request->slug;
            $meta_content->target           = $request->target;
            $meta_content->status           = isset($request->status) == 1 ? 1 : 0;
            $meta_content->save();
        });
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        MetaContent::find($id)->delete($id);
    }
}
