<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    /**
     * @param $request
     */
    public function store($request)
    {
        DB::transaction(function () use ($request) {
            $user                   = new User();
            $user->name             = Str::title($request->name);
            $user->email            = $request->email;
            $user->password         = Hash::make($request->password);
            $user->role_id          = $request->role_id;
            $user->save();
        });
    }

    /**
     * @param $id
     */
    public function update($id, $request)
    {
        DB::transaction(function () use ($id, $request) {
            $user                   = User::find($id);
            $user->name             = Str::title($request->name);
            $user->email            = $request->email;
            $user->password         = Hash::make($request->password);
            $user->role_id          = $request->role_id;
            $user->save();
        });
    }

    /**
     * @param $id
     */
    public function destroy($id)
    {
        User::find($id)->delete($id);
    }
}
