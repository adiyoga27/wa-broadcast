<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Phonebook;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $auth = Auth::user();
        $data = array(
            'phonebooks' => Phonebook::whereHas('category_phonebooks', function ($qry) use ($auth) {
                $qry->where('category_phonebooks.user_id', $auth->id);
            })->count() ?? 0,
            'messages' => Message::whereHas('settings', function ($query) use ($auth) {
                $query->where('user_id', $auth->id);
            })->count() ?? 0,
            'devices' => Setting::where('user_id', $auth->id)->count() ?? 0,
        );
        return view('index', compact('data'));
    }
}
