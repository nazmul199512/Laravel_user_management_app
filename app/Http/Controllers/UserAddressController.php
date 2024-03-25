<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function create()
    {
        $users = User::select('id', 'name')->get();
        return view('address.create', compact('users'));
    }

    public function store()
{
    $validatedData = $this->request->validate([
        'user_id' => 'required|exists:users,id',
        'address' => 'required|string|max:255',
    ]);

    $userAddress = new UserAddress([
        'user_id' => $validatedData['user_id'],
        'address' => $validatedData['address'],
    ]);

    $userAddress->save();

    return redirect()->route('users.index')->with('success', 'User address created successfully!');
}
}