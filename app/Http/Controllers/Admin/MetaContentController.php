<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\MetaContent;
use App\Services\MetaContentService;
use Illuminate\Http\Request;

class MetaContentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected MetaContentService $metaContentService)
    {
        $this->MetaContentService = $metaContentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meta_contents = MetaContent::all();

        return view('admin.meta-data.content.index', compact('meta_contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meta-data.content.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->MetaContentService->store($request);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $meta_content
     * @return \Illuminate\Http\Response
     */
    public function edit(MetaContent $meta_content)
    {
        return view('admin.meta-data.content.edit', compact('meta_content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $meta_content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MetaContent $meta_content)
    {
        try {
            $this->MetaContentService->update($meta_content->id, $request);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $meta_content
     * @return \Illuminate\Http\Response
     */
    public function destroy(MetaContent $meta_content)
    {
        try {
            $this->MetaContentService->destroy($meta_content->id);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }
}
