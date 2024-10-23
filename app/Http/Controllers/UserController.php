<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        // Fetch all users
        $users = User::all();
        return view('admin.user.user', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // Validate password and confirmation
        ]);

        // Hash the password before storing
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Generate remember_token
        $validatedData['remember_token'] = Str::random(10);

        // Create a new user
        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }


    /**
     * Display the specified user.
     */
    public function show($id)
    {
        // Fetch a specific user by ID
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        // Fetch a specific user by ID for editing
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {
        // Fetch the user to be updated
        $user = User::findOrFail($id);

        // Validate input
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'sometimes|nullable|string|min:8|confirmed',
        ]);

        // Check if password was provided, hash if necessary
        if ($request->filled('password')) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']); // Jangan update password jika tidak diisi
        }

        // Update user data
        $user->update($validatedData);

        return redirect('/users')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        // Find and delete the user
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'User deleted successfully.');
    }
}
