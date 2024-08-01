<?php

namespace App\Services;

use App\Interfaces\AuthServiceInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class UserService
{
    public static function getUser($id)
    {
        return User::find($id);
    }
    public function createUser(array $data){
        return User::insertGetId($data);
    }
    public function updateUser(int $id,array $data){
        User::where('id',$id)->update($data);
    }
    public function deleteUser(int $id){
        User::where('id',$id)->delete();
    }
    public static function findEmailUser($email){
        return User::where('email',$email)->first();
    }
}
