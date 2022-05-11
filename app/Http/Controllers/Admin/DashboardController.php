<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\ResponseMessage;
use App\Http\Controllers\Controller;
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
            $globalService->update($request, auth()->id());
            return response(ResponseMessage::SuccessMessage());
        } catch (\Exception $ex) {
            dd($ex);
            return response(ResponseMessage::ErrorMessage());
        }
    }
}
