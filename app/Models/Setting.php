<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function booted()
    {
        static::created(function ($model) {
            $jml = $model->whereDate('created_at', date('Y-m-d'))->count();
            $prefix = (1000) + $jml + 1;
            $model->device_id = $prefix;
            $model->save();
        });
    }
}
