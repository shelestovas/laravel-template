<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    //
    public function index(Request $request)
    {
        \Log::info(print_r($request->all(), true));
        return $request->all();
    }
}
