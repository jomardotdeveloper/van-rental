<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = ['incoming_msg_id', 'outgoing_msg_id','msg', 'read'];
    use HasFactory;
}
