<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageQueue extends Model
{
    use HasFactory;
    protected $fillable = ['message_id', 'name', 'phone','is_sent'];
}
