<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reciept extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'reciept', 'path', 'reciever_id', 'status'];

    // belongs to user class
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
