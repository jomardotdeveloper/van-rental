<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['user_id','latitude','longitude'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
