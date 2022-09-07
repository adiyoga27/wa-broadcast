<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function whatsapp($id)
    {
        
        return view('setting.whatsapp', compact('id'));
    }
}
