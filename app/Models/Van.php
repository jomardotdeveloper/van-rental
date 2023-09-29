<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Van extends Model
{
    protected $fillable = ['user_id','idnumber','orcr','platenumber','fullname','companyname','address','model','bag','seat','ac','fuel','status_approve'];
    use HasFactory;

    // belongs to user class
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

