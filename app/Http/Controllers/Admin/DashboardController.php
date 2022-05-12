<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\MetaData;
use App\Models\User;
use App\Services\GlobalService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        return view('admin.index');
    }

    public function indexProfile()
    {
        $user = User::find(auth()->id());

        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request, GlobalService $globalService)
    {
        try {
            $globalService->userUpdate($request, auth()->id());
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    public function indexMetaData()
    {
        $meta_datum = MetaData::findOrFail(1);

        return view('admin.meta-data.index', compact('meta_datum'));
    }

    public function updateMetaData(Request $request, GlobalService $globalService)
    {
        try {
            $globalService->metaDataUpdate($request, 1);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }

    public function indexConfiguration()
    {
        $configuration = Configuration::findOrFail(1);

        return view('admin.configuration.index', compact('configuration'));
    }

    public function updateConfiguration(Request $request, GlobalService $globalService)
    {
        try {
            $globalService->configurationUpdate($request, 1);
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            return response(ResponseMessage::ErrorMessage());
        }
    }
}
