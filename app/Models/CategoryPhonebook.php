<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPhonebook extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function setting()
    {
        return $this->hasOne(Setting::class, 'id', 'setting_id');
    }
}
