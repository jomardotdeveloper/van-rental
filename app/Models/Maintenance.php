<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','starting_date','end_date','description','status'];

    // belongs to user class
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
