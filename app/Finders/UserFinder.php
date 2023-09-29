<?php

namespace App\Finders;

use App\Models\User;

class UserFinder extends User
{
    public static function find_user($id){
        return Self::find($id);
    }
}
