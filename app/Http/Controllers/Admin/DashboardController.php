<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Responses\Admin\Dashboard\DashboardIndexResponse;

class DashboardController extends Controller
{
    //

    public function index()
    {
        return new DashboardIndexResponse();
    }
}
