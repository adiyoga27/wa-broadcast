<?php

namespace App\Actions\Device;

use App\Contracts\Actions;
use App\Models\Setting;
use App\Models\SettingPermission;
use Illuminate\Support\Facades\Auth;

class ListDevicePermission implements Actions
{
    public function execute()
    {
        return SettingPermission::where('user_id', auth()->user()->id)->pluck('setting_id')->values();
    }
}
