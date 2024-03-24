<?php

namespace App\Services;

use App\Models\User;

interface UserServiceInterface
{
    public function createUser(array $userData);

    public function updateUser(User $user, array $userData);

    public function deleteUser(User $user);

    public function getDeletedUsers();
    
    public function restoreUser(int $userId);

    public function forceDeleteUser(int $userId);
}
