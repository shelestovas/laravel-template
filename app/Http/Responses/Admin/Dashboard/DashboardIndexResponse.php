<?php

namespace App\Http\Responses\Admin\Dashboard;

use Illuminate\Contracts\Support\Responsable;

class DashboardIndexResponse implements Responsable
{
    public function toResponse($request)
    {
        return view('admin.index');
    }

}