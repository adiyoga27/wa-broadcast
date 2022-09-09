<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function whatsapp($id)
    {
        $device = Setting::find($id);
        return view('setting.whatsapp', compact('device'));
    }
}
