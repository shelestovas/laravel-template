<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Profile\UpdateProfileRequest;
use App\Http\Responses\Admin\Profile\ProfileIndexResponse;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //

    public function index()
    {
        $user = \Sentinel::getUser();

        return new ProfileIndexResponse($user);
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = \Sentinel::getUser();

        $user->name = $request->name;

        if (!empty($request->password)) {
            $user->password = \Hash::make($request->password);
        }

        $user->save();

        session()->flash('alert', [
            'type'    => 'success',
            'message' => 'Данные успешно обновленны.'
        ]);

        return redirect()->back();
    }
}
