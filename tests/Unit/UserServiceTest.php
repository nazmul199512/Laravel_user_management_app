<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Services\UserService;

class UserServiceTest extends TestCase
{
   
    public function test_create_user()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('12345678'),
        ];

        $userService = new UserService();
        $user = $userService->createUser($userData);

        $this->assertNotNull($user);
        $this->assertEquals($userData['name'], $user->name);
        $this->assertEquals($userData['email'], $user->email);
    }

    public function test_update_user()
    {
        $user = User::factory()->create();

        $updatedData = [
            'name' => 'Mr. Jason Wuckert',
            'email' => 'Jason@example.com',
        ];

        $userService = new UserService();
        $updatedUser = $userService->updateUser($user, $updatedData);

        $this->assertEquals($updatedData['name'], $updatedUser->name);
        $this->assertEquals($updatedData['email'], $updatedUser->email);
    }

    public function test_soft_delete_user()
    {
        $user = User::factory()->create();

        $userService = new UserService();
        $userService->deleteUser($user);

        $this->assertTrue($user->trashed());
    }

    public function test_restore_user()
{
    $user = User::factory()->create();
    $user->delete();

    $this->assertTrue($user->trashed());

    $userService = new UserService();
    $userService->restoreUser($user->id);

    $restoredUser = User::withTrashed()->find($user->id);

    $this->assertFalse($restoredUser->trashed());
}

    public function test_force_delete_user()
    {
        $user = User::factory()->create();
        $user->delete();

        $userService = new UserService();
        $userService->forceDeleteUser($user->id);

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}