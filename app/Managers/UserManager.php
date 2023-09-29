<?php

namespace App\Managers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Finders\UserFinder;

class UserManager extends User
{
    public function update_password($data){
        $user = Auth::user();
        $db_pass = $user->password;

        if(Hash::check($data['password'], $db_pass)){
            $result = Hash::make($data['new_password']);
            Log::info($user->password);
            Log::info($result);

            $user->update([
                'password' => $result
            ]);

            return ['status' => 200, 'message' => 'Password Updated'];
        }else{
            return ['status' => 401, 'message' => 'Password Incorrect'];
        }
    }
}
