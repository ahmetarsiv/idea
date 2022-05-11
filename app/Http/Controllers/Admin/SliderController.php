<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\Locale;
use App\Models\Slider;
use App\Services\SliderService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected SliderService $sliderService)
    {
        $this->SliderService = $sliderService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales = Locale::select(['id', 'name'])->get();

        return view('admin.sliders.create', compact('locales'));
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
            $this->SliderService->store($request);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        $locales = Locale::select(['id', 'name'])->get();

        return view('admin.sliders.edit', compact( 'slider', 'locales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        try {
            $this->SliderService->update($slider->id, $request);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        try {
            $this->SliderService->destroy($slider->id);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }
}
