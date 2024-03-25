<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    public function createUser(array $userData)
    {        
        $userData['password'] = Hash::make($userData['password']);

        return User::create($userData);
    }

    public function updateUser(User $user, array $userData)
    {
        
        if (isset($userData['password'])) {
            $userData['password'] = Hash::make($userData['password']);
        }

        $user->update($userData);

        return $user;
    }

    public function deleteUser(User $user)
    {
        $user->delete();        
        return true;
    }

    public function getDeletedUsers()
    {
        return User::onlyTrashed()->get();
    }
    
    public function restoreUser(int $userId)
    {
        $user = User::onlyTrashed()->find($userId);

        if ($user) {
            $user->restore();
            return true;
        }

        return false;
    }

    public function forceDeleteUser(int $userId)
    {
        $user = User::onlyTrashed()->find($userId);

        if ($user) {
            $user->forceDelete();
            return true;
        }

        return false;
    }
}
