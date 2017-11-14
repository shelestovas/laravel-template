<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index()
    {

        \Breadcrumbs::register('admin.settings', function ($breadcrumbs) {
            $breadcrumbs->parent('admin.dashboard');
            $breadcrumbs->push('Основные настройки', route('admin.settings'));
        });

        return view('admin.settings.index');
    }
}
