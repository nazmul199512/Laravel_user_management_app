<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    protected $request;

    public function __construct(UserServiceInterface $userService, Request $request)
    {
        $this->userService = $userService;
        $this->request = $request;
    }

    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store()
    {
        $userData = $this->request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = $this->userService->createUser($userData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(User $user)
    {
        $userData = $this->request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        if ($this->request->filled('password')) {
            $userData['password'] = $this->request->input('password');
        }

        $this->userService->updateUser($user, $userData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $this->userService->deleteUser($user);

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function deleted()
    {
        $softDeletedUsers = $this->userService->getDeletedUsers();

        return view('user.deleted', compact('softDeletedUsers'));
    }

    public function restore($userId)
    {
        $restored = $this->userService->restoreUser($userId);

        if ($restored) {
            return redirect()->route('users.index')->with('success', 'User restored successfully.');
        }

        return redirect()->route('users.deleted')->with('error', 'Failed to restore user.');
    }

    public function forceDelete($userId)
    {
        $permanentlyDeleted = $this->userService->forceDeleteUser($userId);

        if ($permanentlyDeleted) {
            return redirect()->route('users.deleted')->with('success', 'User permanently deleted.');
        }

        return redirect()->route('users.deleted')->with('error', 'Failed to permanently delete user.');
    }
}
