<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\Locale;
use App\Services\LocaleService;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected LocaleService $localeService)
    {
        $this->LocaleService = $localeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locales = Locale::all();

        return view('admin.locales.index', compact('locales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.locales.create');
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
            $this->LocaleService->store($request);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $locale
     * @return \Illuminate\Http\Response
     */
    public function edit(Locale $locale)
    {
        return view('admin.locales.edit', compact('locale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $locale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Locale $locale)
    {
        try {
            $this->LocaleService->update($locale->id, $request);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $locale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Locale $locale)
    {
        try {
            $this->LocaleService->destroy($locale->id);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }
}
