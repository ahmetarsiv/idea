<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\CMS;
use App\Models\Locale;
use App\Services\CMSService;
use Illuminate\Http\Request;

class CMSController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected CMSService $cmsService)
    {
        $this->CMSService = $cmsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cms_pages = CMS::all();

        return view('admin.cms.index', compact('cms_pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales = Locale::select(['id', 'name'])->get();

        return view('admin.cms.create', compact('locales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->CMSService->store($request);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $cm
     * @return \Illuminate\Http\Response
     */
    public function edit(CMS $cm)
    {
        $locales = Locale::select(['id', 'name'])->get();

        return view('admin.cms.edit', compact('cm', 'locales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $cm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CMS $cm)
    {
        try {
            $this->CMSService->update($cm->id, $request);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $cm
     * @return \Illuminate\Http\Response
     */
    public function destroy(CMS $cm)
    {
        try {
            $this->CMSService->destroy($cm->id);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }
}
